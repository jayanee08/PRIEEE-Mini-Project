<div class="topbar">
<div class="container">
<div class="row">
<!-- <div class="col-md-6 text-left">
<p><i class="fa fa-graduation-cap"></i> RajaLakshmi Engineering College</p>
</div> -->
<div class="col-md-6 text-right">
<ul class="list-inline">
<?php if($_SESSION['login'])
{
?> 
            
                <a href="logout.php" class="btn btn-danger pull-right">LOG ME OUT</a>
            
            <?php }?>

</ul>
</div>
</div>
</div>
</div>

<?php if($_SESSION['login'])
{
?>    

<header class="header">
<div class="container">
<div class="hovermenu ttmenu">

<div class="navbar navbar-default" role="navigation">
<div class="logo" style="display:flex;align-items:center;">
<a class="navbar-brand" href="dashboard.php"></a></div>

<div class="navbar-header" style="display: flex; align-items: center;">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
<img src="assets/img/rec.jpg" style="max-width: 60px; height: auto; margin-right: 10px; transform: translateY(-3px);">
<p style="margin: 10px; font-weight: bold; color: black;">Rajalakshmi Engineering College</p>
<span class="sr-only">Toggle navigation</span>
<span class="fa fa-bars"></span>
</button>
</div>

<div class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-right">                    
<li><a href="book-search.php"> <img src="images/search-icon.webp" alt="img" style="max-width: 20px; max-height: 24px"></img></a></li>
<li><a href="issued-books.php">Issued Books</a></li>							

<ul class="dropdown-menu">
<li>
<div class="ttmenu-content">
<div class="row">
<div class="col-md-6">
<div class="box">
<ul>

</ul>
</div>
</div>
</div>
</div>
</li>
</ul>
</li>
</ul>
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
<a class="navbar-brand" href="dashboard.php">
</a></div>

<div class="navbar-header" style="display: flex; align-items: center;"><img src="assets/img/rec.jpg" style="max-width: 60px; height: auto;; margin-right: 10px; vertical-align: middle; transform: translateY(-3px);">
<p style="margin: 10px; font-weight: bold; color: black; text-align:left; font-size:20px;">Rajalakshmi Engineering College</p>
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="fa fa-bars"></span>
</button>
</div>

<div class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-right">  


							<li><a href="./admin/index.php">Admin Login</a></li>
                            <li><a href="signup.php">User Signup</a></li>
                             <li><a href="index.php">User Login</a></li>						
</ul>

</div>
</div>
</div>
</div>
</header>
      

    <?php } ?>


