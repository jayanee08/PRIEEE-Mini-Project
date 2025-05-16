<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['create']))
{
$course=$_POST['course'];
$sql="INSERT INTO  tblcourse(CourseName) VALUES(:course)";
$query = $dbh->prepare($sql);
$query->bindParam(':course',$course,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$_SESSION['msg']="Course Listed successfully";
header('location:manage-course.php');
}
else 
{
$_SESSION['error']="Something went wrong. Please try again";
header('location:manage-course.php');
}

}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include('includes/head.php');?>
</head>
<body>
      <!------MENU SECTION START-->
<?php include('includes/header1.php');?>
<!-- MENU SECTION END-->
    
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Add Course</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
<div class="panel panel-default">
<div class="panel-heading">
Course Info
</div>
<div class="panel-body">
<form role="form" method="post">
<div class="form-group">
<label>Course Name</label>
<input class="form-control" type="text" name="course" autocomplete="off"  required />
</div>

<button type="submit" name="create" class="btn btn-info">Add </button>

                                    </form>
                            </div>
                        </div>
                            </div>
							<div class="row">
							</div>

        </div>
   
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('includes/footer1.php');?>
     
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      
</body>
</html>
<?php } ?>
