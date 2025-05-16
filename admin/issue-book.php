<?php
session_start();
error_reporting(0);
include('includes/config.php');
 //$isSubmitDisabled = true;
 
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['issue']))
{
$studentid=strtoupper($_POST['studentid']);
$bookid=$_POST['bookdetails'];
$datetime=$_POST['datetime'];
error_log($_POST['datetime']);
$sql="INSERT INTO  tblissuedbookdetails(StudentID,BookId,ToReturnDate) VALUES(:studentid,:bookid,:datetime)";
$query = $dbh->prepare($sql);
$query->bindParam(':studentid',$studentid,PDO::PARAM_STR);
$query->bindParam(':bookid',$bookid,PDO::PARAM_STR);
$query->bindParam(':datetime',$datetime,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$_SESSION['msg']="Book issued successfully";
header('location:manage-issued-books.php');
}
else 
{
$_SESSION['error']="Something went wrong. Please try again";
header('location:manage-issued-books.php');
}

}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <?php include('includes/head.php');?>
	
<script>
// function for get student name
$isSubmitDisabled = true;
function getstudent() {
$("#loaderIcon").show();
jQuery.ajax({
url: "get_student.php",
data:'studentid='+$("#studentid").val(),
type: "POST",
success:function(data){
$("#get_student_name").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

//function for book details
function getbook() {
$("#loaderIcon").show();
console.log("getbook");
//getstock();
jQuery.ajax({
url: "get_book.php",
data:'bookid='+$("#bookid").val(),
type: "POST",
success:function(data){
$("#get_book_name").html(data);
$("#loaderIcon").hide();
getstock();

},
error:function (){}
});
}

//function for Stock details
function getstock() {
$("#loaderIcon").show();
//console.log($('#get_book_name').value);
jQuery.ajax({
url: "get_stock.php",
data:'bookid='+$("#bookid").val(),
//data:'3',
type: "POST",
success:function(data){
$("#get_stock_details").html(data);
console.log(data);
 $('#response').text('Stock Available : ' + data);
 //utput=data;
 if (data > 0)
 {
	 $("#issue").attr("disabled",false);
 }
 else{
	 $("#issue").attr("disabled",true);
 }
 //$isSubmitDisabled = true;
$("#loaderIcon").hide();
},
error:function (){}
});
}


</script> 
<style type="text/css">
  .others{
    color:red;
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
                <br>
                <br>
                <h4 class="header-line">Issue a New Book</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1"">
<div class="panel panel-info">
<div class="panel-heading">
Issue a New Book
</div>
<div class="panel-body">
<form role="form" method="post">

<div class="form-group">
<label>Student id<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="studentid" id="studentid" onBlur="getstudent()" autocomplete="off"  required />
</div>

<div class="form-group">
<span id="get_student_name" style="font-size:16px;"></span> 
</div>





<div class="form-group">
<label>ISBN Number<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="booikid" id="bookid" onBlur="getbook()"  required="required" />
</div>

 <div class="form-group">

  <select  class="form-control" name="bookdetails" id="get_book_name" readonly>
   
 </select>
 </div>
 
 <!--div class="form-group">

  <select  class="form-control" name="stockdetails" id="get_stock_details" readonly>
   
 </select>
 </div-->
 <div class="form-group">
 <div id='response' style="color:green;">Stock Available :</div>
 </div>
 <div class="form-group">
 <label>Return Date<span style="color:red;">*</span></label>
        <div style="position: relative">
 
            <!-- Include input field with id so
                that we can use it in JavaScript
                to set attributes.-->
            <input class="form-control"
                type="text" id="datetime" name="datetime" required="required"/>
        </div>
		</div>
 
							<button type="submit" name="issue" id="issue" disabled="disabled" class="btn btn-info">Issue Book </button>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.js">	</script>
	
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

	<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
	
	
	<!-- BOOTSTRAP SCRIPTS  -->

		<!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
	<!-- Include Bootstrap DateTimePicker CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

 
  
	 <script>
 
        // Below code sets format to the
        // datetimepicker having id as
        // datetime
        $('#datetime').datetimepicker({
                 format: 'YYYY-MM-DDTHH:mm:ss',minDate:new Date()
           }); 
        
    </script>
</body>
</html>
<?php } ?>
