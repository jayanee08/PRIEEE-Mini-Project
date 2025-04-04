document.addEventListener("DOMContentLoaded", function () {
    fetchBooks(); 
    document.getElementById("applyFilters").addEventListener("click", applyFilters);
});

async function fetchBooks() {
    try {
        const response = await fetch('fetch_book.php');
        if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);

        const books = await response.json();
        console.log("Fetched Books:", books); 

        displayBooks(books);
    } catch (error) {
        console.error("Error fetching books:", error);
        document.getElementById("booksList").innerHTML = `<p style="color: red;">${error.message}</p>`;
    }
}

function displayBooks(books) {
    const booksList = document.getElementById("booksList");
    booksList.innerHTML = "";  
    books.forEach(book => {
        console.log(book); 

        booksList.innerHTML += `
            <div class="book" data-genre="${book.genre}" data-author="${book.author}" data-title="${book.title}">
                <input type="checkbox" value="${book.id}">
                <strong>${book.title}</strong> <br>  <!-- Use book.title instead of book.name -->
                <span>Author: ${book.author}</span> <br>
                <span>Genre: ${book.genre}</span>
            </div>
         `;
    });
}
function applyFilters() {
    console.log("Applying Filters..."); 

    const genreFilter = document.getElementById("genreFilter").value.toLowerCase();
    const authorFilter = document.getElementById("authorFilter").value.toLowerCase();
    const nameFilter = document.getElementById("nameFilter").value.toLowerCase();

    const books = document.querySelectorAll(".book");

    books.forEach(book => {
        const bookGenre = book.getAttribute("data-genre").toLowerCase();
        const bookAuthor = book.getAttribute("data-author").toLowerCase();
        const bookTitle = book.getAttribute("data-title").toLowerCase();

        if (
            (genreFilter === "" || bookGenre.includes(genreFilter)) &&
            (authorFilter === "" || bookAuthor.includes(authorFilter)) &&
            (nameFilter === "" || bookTitle.includes(nameFilter))
        ) {
            book.style.display = "block";
        } else {
            book.style.display = "none";
        }
    });
}
document.addEventListener("DOMContentLoaded", function () {
    fetchBooks();  

    let borrowButton = document.getElementById("borrowBtn");

    if (!borrowButton) {
        console.error("❌ borrowBtn not found!");
        return;
    } else {
        console.log("✅ borrowBtn found.");
    }

    borrowButton.addEventListener("click", borrowBooks);
});


document.getElementById("borrowBtn").addEventListener("click", function () {
    console.log("📢 Borrow button clicked!");

    let selectedBooks = [];
    let checkboxes = document.querySelectorAll('.book input[type="checkbox"]:checked');

    checkboxes.forEach(input => {
        selectedBooks.push(input.value);
    });

    let userId = localStorage.getItem("user_id"); 

    if (!userId) {
        alert("⚠️ User is not logged in!");
        return;
    }

    if (selectedBooks.length === 0) {
        alert("⚠️ Please select at least one book to borrow.");
        return;
    }

    console.log("📚 Selected Books:", selectedBooks);
    console.log("👤 User ID:", userId);

    fetch("borrow.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ user_id: userId, books: selectedBooks }) 
    })
    .then(response => response.json())
    .then(data => {
        console.log("📊 Server Response:", data);
        if (data.success) {
            alert("✅ Books borrowed successfully!");
            window.location.href = "borrowreturn.html";
        } else {
            alert("⚠️ Error borrowing books: " + (data.message || "Unknown error"));
        }
    })
    .catch(error => {
        console.error("❌ Fetch error:", error);
        alert("Failed to borrow books. Try again later.");
    });
});


