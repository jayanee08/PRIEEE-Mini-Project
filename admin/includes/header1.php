
<div class="topbar">
<div class="container">
<div class="row">
<!-- <div class="col-md-6 text-left">
<p><i class="fa fa-graduation-cap"></i> RajaLakshmi Engineering College</p>
</div> -->
<div class="col-md-6 text-right">
<ul class="list-inline">
<style>
*{
  background-image: url('bgadmin.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style>

</ul>
</div>
</div>
</div>
</div>

<?php if($_SESSION['alogin'])
{
?>
<header class="header">
<div class="container">
<div class="hovermenu ttmenu">

<div class="navbar navbar-default" role="navigation">
<div class="logo">
<a class="navbar-brand" href="dashboard.php"><img src="assets/img/rec.jpg" style="max-width:30%; margin-right: 10px; vertical-align: middle; transform: translateY(-3px);">
    <p style="margin: 0; font-weight: bold; color: black;">Rajalakshmi Engineering College</p></a>
 
</div>

<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="fa fa-bars"></span>
</button>

</div>
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-right">

<!-- <li class="dropdown ttmenu-half"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Categories <b class="fa fa-angle-down"></b></a>
<ul class="dropdown-menu">
<li>
<div class="ttmenu-content">
<div class="row">
<div class="col-md-6">
<div class="box"> -->
<!-- <ul>
<li><a href="add-category.php">Add Category</a></li>
<li><a href="manage-categories.php">Manage Categories</a></li>
</ul> -->
<!-- </div>
</div>
</div>
</div>
</li>
</ul>
</li>

<li class="dropdown ttmenu-half"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Authors <b class="fa fa-angle-down"></b></a>
<ul class="dropdown-menu">
<li>
<div class="ttmenu-content">
<div class="row">
<div class="col-md-6">
<div class="box">
<ul>
<li><a href="add-author.php">Add Author</a></li>
<li><a href="manage-authors.php">Manage Authors</a></li>
</ul>
</div>
</div>
</div>
</div>
</li>
</ul>
</li>

<li class="dropdown ttmenu-half"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Publications <b class="fa fa-angle-down"></b></a>
<ul class="dropdown-menu">
<li>
<div class="ttmenu-content">
<div class="row">
<div class="col-md-6">
<div class="box">
<ul>
<li><a href="add-publication.php">Add Publication</a></li>
<li><a href="manage-publication.php">Manage Publication</a></li>
</ul>
</div>
</div>
</div>
</div>
</li>
</ul>
</li>

<li class="dropdown ttmenu-half"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Course <b class="fa fa-angle-down"></b></a>
<ul class="dropdown-menu">
<li>
<div class="ttmenu-content">
<div class="row">
<div class="col-md-6">
<div class="box">
<ul>
<li><a href="add-course.php">Add Course</a></li>
<li><a href="manage-course.php">Manage Course</a></li>
</ul>
</div>
</div>
</div>
</div>
</li>
</ul>
</li> -->



<li class="dropdown ttmenu-half"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Books <b class="fa fa-angle-down"></b></a>
<ul class="dropdown-menu">
<li>
<div class="ttmenu-content">
<div class="row">
<div class="col-md-6">
<div class="box">
<ul>
<li><a href="add-book.php">Add Book</a></li>
<li><a href="manage-books.php">Manage Books</a></li>
<li><a href="issue-book.php">Issue New Book</a></li>
<li><a href="manage-issued-books.php">Manage Issued Books</a></li>
<!-- <li><a href="alert-return-books.php">Alert Return Books</a></li> -->
</ul>
</div>
</div>
</div>
</div>
</li>
</ul>
</li>

<li><a href="reg-students.php">Reg Students</a></li>
<li><a href="book-search.php"> <img src="images/search-icon.webp" alt="img" style="max-width: 20px; max-height: 24px"></img></a></li>
<li>
			<button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <img src="assets/img/person.svg"/>
  </button>
			<ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
				
				<!-- <li role="presentation"><a role="menuitem" tabindex="-1" href="change-password.php">Change Password</a></li> -->
				<li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php">Logout</a></li>      
				
				</div></ul></li>

</ul>
<!--ul class="nav navbar-nav navbar-right">
<li><a class="btn btn-primary" href="course-login.html"><i class="fa fa-sign-in"></i> Register Now</a></li>
</ul-->
</div>
</div>
</div>
</div>
</header>
<?php } else { ?>
        <header class="header">
<div class="container">
<div class="hovermenu ttmenu">

<div class="navbar navbar-default" role="navigation">
<div class="logo">
<a class="navbar-brand" href="dashboard.php"><img src="assets/img/rec.jpg" style="max-width:30%; margin-right: 10px; vertical-align: middle; transform: translateY(-3px);">
<p style="margin: 0; font-weight: bold; color: black;">Rajalakshmi Engineering College</p></a></div>
<br>

<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="fa fa-bars"></span>
</button>
</div>

<div class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-right">                    
							<li><a href="./index.php">Admin Login</a></li>
                            <li><a href="../signup.php">User Signup</a></li>
                             <li><a href="../index.php">User Login</a></li>						
</ul>
<!--ul class="nav navbar-nav navbar-right">
<li><a class="btn btn-primary" href="course-login.html"><i class="fa fa-sign-in"></i> Register Now</a></li>
</ul-->
</div>
</div>
</div>
</div>
</header>

    <?php } ?>


