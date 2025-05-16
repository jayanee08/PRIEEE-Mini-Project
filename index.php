<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['login']!=''){
$_SESSION['login']='';
}
if(isset($_POST['login']))
{
  
$email=$_POST['emailid'];
$password=md5($_POST['password']);
$sql ="SELECT EmailId,Password,StudentId,Status FROM tblstudents WHERE EmailId=:email and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
 foreach ($results as $result) {
 $_SESSION['stdid']=$result->StudentId;
if($result->Status==1)
{
$_SESSION['login']=$_POST['emailid'];
echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
} else {
echo "<script>alert('Your Account Has been blocked .Please contact admin');</script>";

}
}

} 

else{
echo "<script>alert('Invalid Details');</script>";
}
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    
<?php include('includes/head.php');?> 
<style>
        body {
            background-image: url('assets/img/banner-1.jpg');
            background-size: cover; 
            background-repeat: no-repeat;
            background-position: center center; 
            background-attachment: fixed; 
        }
    </style>
</head>
<body>
<div id="loader">
<div class="loader-container">
<img src="images/site.gif" alt="" class="loader-site">
</div>
</div>
  <?php include('includes/header.php');?> 
<div class="content-wrapper">
<div class="container">
<div class="row pad-botm">
<div class="col-md-12">
<h4 class="header-line" style="color:white;">USER LOGIN FORM</h4>
</div>
</div>
    
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel panel-info">
<div class="panel-heading">
 USER LOGIN FORM
</div>
<div class="panel-body">
<form role="form" method="post">

<div class="form-group">
<label>Enter Email id</label>
<input class="form-control" type="text" name="emailid" required autocomplete="off" />
</div>
<div class="form-group">
<label>Password</label>
<input class="form-control" type="password" name="password" required autocomplete="off"  />

</div>



 <button type="submit" name="login" class="btn btn-info">LOGIN </button> | <a href="signup.php">Not Register Yet</a>
</form>
 </div>
</div>
</div>
</div>  
           
             
 
    
    </div>
	</div>
    </div>
    
 <?php include('includes/footer1.php');?>

    <script src="assets/js/jquery-1.10.2.js"></script>
  
    <script src="assets/js/bootstrap.js"></script>
	  
	<script src="assets/js/carousel.js%2bcustom.js%2bjquery.fitvids.js.pagespeed.jc.ghpaVHFgk4.js"></script>
	<script>eval(mod_pagespeed_KxQMf5X6rF);</script>

</body>
</html>
