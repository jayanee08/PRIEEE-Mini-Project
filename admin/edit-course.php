<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['update']))
{
$athrid=intval($_GET['athrid']);
$course=$_POST['course'];
$sql="update  tblcourse set CourseName=:course where id=:athrid";
$query = $dbh->prepare($sql);
$query->bindParam(':course',$course,PDO::PARAM_STR);
$query->bindParam(':athrid',$athrid,PDO::PARAM_STR);
$query->execute();
$_SESSION['updatemsg']="Course info updated successfully";
header('location:manage-course.php');



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
                <h4 class="header-line">Edit Course</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Course Info
</div>
<div class="panel-body">
<form role="form" method="post">
<div class="form-group">
<label>Course Name</label>
<?php 
$athrid=intval($_GET['athrid']);
$sql = "SELECT * from  tblcourse where id=:athrid";
$query = $dbh -> prepare($sql);
$query->bindParam(':athrid',$athrid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>   
<input class="form-control" type="text" name="course" value="<?php echo htmlentities($result->CourseName);?>" required />
<?php }} ?>
</div>

<button type="submit" name="update" class="btn btn-info">Update </button>
</form>
            </div>
        </div>
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