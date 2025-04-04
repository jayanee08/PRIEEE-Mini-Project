document.addEventListener("DOMContentLoaded", function () {
    const userId = localStorage.getItem("user_id"); 

    if (!userId) {
        alert("User not logged in. Redirecting to login page...");
        window.location.href = "student_login.html"; 
        return;
    }

    fetchBorrowedBooks(userId); 
});

function fetchBorrowedBooks(userId) {
    fetch(`fetchborrow.php?user_id=${userId}`) 
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                alert(data.error);
                return;
            }
            displayBorrowedBooks(data);
        })
        .catch(error => console.error("Error fetching borrowed books:", error));
}

function displayBorrowedBooks(books) {
    const borrowedBooksList = document.getElementById("borrowedBooksList");
    borrowedBooksList.innerHTML = ""; 

    if (books.length === 0) {
        borrowedBooksList.innerHTML = "<tr><td colspan='5'>No borrowed books found.</td></tr>";
        return;
    }

    books.forEach(book => {
        const returnDate = new Date(book.return_date);
        const today = new Date();
        let lateFee = 0;

        if (today > returnDate) {
            const lateDays = Math.floor((today - returnDate) / (1000 * 60 * 60 * 24)); // Convert ms to days
            lateFee = lateDays * 5; 
        }

        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${book.title}</td>
            <td>${book.borrow_date}</td>
            <td>${book.return_date}</td>
            <td>${lateFee > 0 ? `₹${lateFee}` : "None"}</td>
            <td><button onclick="returnBook(${book.id}, ${lateFee})">Return</button></td>
        `;
        borrowedBooksList.appendChild(row);
    });
}

function returnBook(bookId, lateFee) {
    const userId = localStorage.getItem("user_id"); 

    if (lateFee > 0) {
        const confirmReturn = confirm(`This book is overdue. You have a late fee of ₹${lateFee}. Do you still want to return it?`);
        if (!confirmReturn) return;
    }

    fetch("return_book.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ user_id: userId, book_id: bookId, late_fee: lateFee })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Thank you for returning the book!");
            fetchBorrowedBooks(userId); 
        } else {
            alert("Error returning book: " + data.error);
        }
    })
    .catch(error => console.error("Error:", error));
}

