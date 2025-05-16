<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:index.php');
}
else{ 
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "delete from tblbooks  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
$_SESSION['delmsg']="Category deleted scuccessfully ";
header('location:manage-books.php');

}


    ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    
<?php include('includes/head.php');?>
<style>
body {
  background-image: url('bgmain.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  
}
</style>

</head>
<body>
<?php include('includes/header.php');?>

    <div class="content-wrapper">
         
      
    <section class="grey section">
<div class="container">
<div class="row">
<div id="content" class="col-md-12 col-sm-8 col-xs-12">
<div class="blog-wrapper">
<div class="row second-bread">
<div class="col-md-6 text-left">
<h1>Student Dashboard</h1>
</div>
<div class="col-md-6 text-right">
<div class="bread">
<ol class="breadcrumb">
<li><a href="#">Home</a></li>
<li class="active">Dashboard</li>
</ol>
</div>
</div>
</div>
</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <br>
                          Issued Books 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Book Name</th>
                                            <th>ISBN </th>
                                            <th>Issued Date</th>
                                            <th>To Return Date</th>
											<th>Returned Date</th>
                                            <th>Fine in(Rs)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$sid=$_SESSION['stdid'];
$sql="SELECT tblbooks.BookName,tblbooks.ISBNNumber,tblissuedbookdetails.IssuesDate,tblissuedbookdetails.ToReturnDate,tblissuedbookdetails.ReturnedDate,tblissuedbookdetails.id as rid,tblissuedbookdetails.fine from  tblissuedbookdetails join tblstudents on tblstudents.StudentId=tblissuedbookdetails.StudentId join tblbooks on tblbooks.id=tblissuedbookdetails.BookId where tblstudents.StudentId=:sid order by tblissuedbookdetails.id desc";
$query = $dbh -> prepare($sql);
$query-> bindParam(':sid', $sid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>                                      
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt);?></td>
                                            <td class="center"><?php echo htmlentities($result->BookName);?></td>
                                            <td class="center"><?php echo htmlentities($result->ISBNNumber);?></td>
                                            <td class="center"><?php echo htmlentities($result->IssuesDate);?></td>
											<td class="center"><?php echo htmlentities($result->ToReturnDate);?></td>
                                            <td class="center"><?php if($result->ReturnedDate=="")
                                            {?>
                                            <span style="color:red">
                                             <?php   echo htmlentities("Not Return Yet"); ?>
                                                </span>
                                            <?php } else {
                                            echo htmlentities($result->ReturnedDate);
                                        }
                                            ?></td>
                                              <td class="center"><?php echo htmlentities($result->fine);?></td>
                                         
                                        </tr>
 <?php $cnt=$cnt+1;}} ?>                                      
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                  
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
 
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
      

</body>
</html>
<?php } ?>
