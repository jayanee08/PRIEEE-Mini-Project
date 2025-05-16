<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

// code for block student    
if(isset($_GET['inid']))
{
$id=$_GET['inid'];
$status=0;
$sql = "update tblstudents set Status=:status  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> execute();
header('location:reg-students.php');
}



//code for active students
if(isset($_GET['id']))
{
$id=$_GET['id'];
$status=1;
$sql = "update tblstudents set Status=:status  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> execute();
header('location:reg-students.php');
}


    ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
   
<?php include('includes/head.php');?>
<style>
	.dataTables_wrapper .dataTables_paginate .paginate_button {
  min-width: 0.5em !important; 
  padding: 0.1em .5em !important;
} 
	</style>
</head>
<body>
      <!------MENU SECTION START-->
<?php include('includes/header1.php');?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Search Books</h4>
    </div>


        </div>

<div class="row">
<form action="" method="post" class="mb-3">
<div class="col-md-3">
<div class="form-group">
<!--label> Category<span style="color:red;">*</span></label-->
<select class="form-control" name="category">
<option value=""> Select Category</option>
<?php 
$status=1;
$sql = "SELECT * from tblcategory where Status=:status";
$query = $dbh -> prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{?>  
<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->CategoryName);?></option>
 <?php }} ?> 
</select>
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<!--label> Author<span style="color:red;">*</span></label-->
<select class="form-control" name="author" >
<option value=""> Select Author</option>
<?php 

$sql = "SELECT * from  tblauthors ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->AuthorName);?></option>
 <?php }} ?> 
</select>
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<!--label> Publication<span style="color:red;">*</span></label-->
<select class="form-control" name="publication">
<option value=""> Select Publication</option>
<?php 

$sql = "SELECT * from  tblpublication";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->PublisherName);?></option>
 <?php }} ?> 
</select>
</div>
</div>
<div class="col-md-3">
<div class="form-group">

<input type="submit" class="btn btn-primary" name="submit" value="Search Books">
</div>
</div>
</form>
</div>

            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Books Listing
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Book Name</th>
                                            <th>Category</th>
                                            <th>Author</th>
											<th>Publication</th>
                                            <th>ISBN</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

<?php 
$results = "";
if(isset($_POST['submit'])){
	
	//echo 'You have chosencat: ' .  $_POST['category']; 
	/*if(empty($_POST['publication']) and empty($_POST['category']) and empty($_POST['author'])) {
		echo 'You all empty';    
	}
	else
	{
		$pub = $_POST['publication'];
		$auth = $_POST['author'];
		$cat = $_POST['category'];
		echo 'You have chosenpub: ' . $pub;    
		echo 'You have chosenauth: ' . $auth;    
		echo 'You have chosencat: ' . $cat;    
	}*/
	
    if(!empty($_POST['publication']) or !empty($_POST['category']) or !empty($_POST['author'])) {
        $pub = $_POST['publication'];
		$auth = $_POST['author'];
		$cat = $_POST['category'];
        echo 'You have chosenpub: ' . $pub;    
		echo 'You have chosenauth: ' . $auth;    
		echo 'You have chosencat: ' . $cat;    
		//$id=6;
		$sql = "SELECT tblbooks.BookName,tblcategory.CategoryName,tblauthors.AuthorName,tblpublication.PublisherName,tblbooks.ISBNNumber,tblbooks.BookPrice,tblbooks.id as bookid from tblbooks join tblcategory on tblcategory.id=tblbooks.CatId join tblauthors on tblauthors.id=tblbooks.AuthorId join tblpublication on tblpublication.id=tblbooks.PubId where " ;
		/*if(!empty($_POST['publication']))
		{
			$sql .= 'tblpublication.id=:pubid';
			//where  and tblcategory.id=:catid and tblauthor.id=:authid
		}*/
		if((!empty($_POST['publication']) and !empty($_POST['category'])) or (!empty($_POST['publication']) and !empty($_POST['author'])))
		{
			$sql .= ' and tblpublication.id=:pubid';
			//where  and tblcategory.id=:catid and tblauthor.id=:authid
		}
		elseif (!empty($_POST['publication']))
		{
			$sql .= 'tblpublication.id=:pubid';
			
		}
		if((!empty($_POST['category']) and !empty($_POST['publication'])) or (!empty($_POST['category']) and !empty($_POST['author'])))
		{
			$sql .= ' and tblcategory.id=:catid';
			//where  and tblcategory.id=:catid and tblauthor.id=:authid
		}
		elseif (!empty($_POST['category']))
		{
			$sql .= 'tblcategory.id=:catid';
			
		}
		if((!empty($_POST['author']) and !empty($_POST['publication'])) or (!empty($_POST['author']) and !empty($_POST['category'])))
		{
			$sql .= ' and tblauthor.id=:authid';
			//where  and tblcategory.id=:catid and tblauthor.id=:authid
		}
		elseif (!empty($_POST['author']))
		{
			$sql .= 'tblauthors.id=:authid';
			
		}
		//echo 'You query: ' . $sql;    
		$query = $dbh -> prepare($sql);
				
		//$query -> bindParam(':tblcategory.id',$id, PDO::PARAM_STR);
		if(!empty($_POST['publication']))
		{$query -> bindParam(':pubid',$pub, PDO::PARAM_STR);}
		
		//$query -> bindParam(':authid',$auth, PDO::PARAM_STR);
		if(!empty($_POST['category']))
		{$query -> bindParam(':catid',$cat, PDO::PARAM_STR);}
		if(!empty($_POST['author']))
		{$query -> bindParam(':authid',$auth, PDO::PARAM_STR);}
		//$query -> bindParam(':status',$status, PDO::PARAM_STR);
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		$cnt=1;
	//	echo 'You query: ' . $sql;    
} else {
        echo 'Inside else';
		$sql = "SELECT tblbooks.BookName,tblcategory.CategoryName,tblauthors.AuthorName,tblbooks.ISBNNumber,tblbooks.BookPrice,tblbooks.id as bookid from  tblbooks join tblcategory on tblcategory.id=tblbooks.CatId join tblauthors on tblauthors.id=tblbooks.AuthorId" ;
		$query = $dbh -> prepare($sql);
		$query->execute();		
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		$cnt=1;
    }
    }
	
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>                                      
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt);?></td>
                                            <td class="center"><?php echo htmlentities($result->BookName);?></td>
                                            <td class="center"><?php echo htmlentities($result->CategoryName);?></td>
                                            <td class="center"><?php echo htmlentities($result->AuthorName);?></td>
											<td class="center"><?php echo htmlentities($result->PublisherName);?></td>
                                            <td class="center"><?php echo htmlentities($result->ISBNNumber);?></td>
                                            <td class="center"><?php echo htmlentities($result->BookPrice);?></td>
                                            <td class="center">

                                            <a href="edit-book.php?bookid=<?php echo htmlentities($result->bookid);?>"><button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> 
                                          <a href="manage-books.php?del=<?php echo htmlentities($result->bookid);?>" onclick="return confirm('Are you sure you want to delete?');"" >  <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
                                            </td>
                                        </tr>
 <?php $cnt=$cnt+1;}} ?>                                      
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>

            
    </div>
    </div>

     <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('includes/footer1.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" crossorigin="anonymous"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
	<script>
	$('#dataTables-example').dataTable({
  drawCallback: function(settings) {
    var pagination = $(this).closest('.dataTables_wrapper').find('.dataTables_paginate');
    pagination.toggle(this.api().page.info().pages > 1);
  }
})
</script>
</body>
</html>
<?php } ?>
