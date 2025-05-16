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
$author=$_POST['author'];
$sql="INSERT INTO  tblauthors(AuthorName) VALUES(:author)";
$query = $dbh->prepare($sql);
$query->bindParam(':author',$author,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$_SESSION['msg']="Author Listed successfully";
header('location:manage-authors.php');
}
else 
{
$_SESSION['error']="Something went wrong. Please try again";
header('location:manage-authors.php');
}

}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include('includes/head.php');?>
<body>
      <!------MENU SECTION START-->
<?php include('includes/header1.php');?>
<!-- MENU SECTION END-->
    
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Add Author</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Author Info
</div>
<div class="panel-body">
<form role="form" method="post">
<div class="form-group">
<label>Author Name</label>
<input class="form-control" type="text" name="author" autocomplete="off"  required />
</div>

<button type="submit" name="create" class="btn btn-info">Add </button>

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
