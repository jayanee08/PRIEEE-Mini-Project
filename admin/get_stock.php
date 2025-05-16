<?php 
require_once("includes/config.php");
if(!empty($_POST["bookid"])) {
    $bookid=$_POST["bookid"];
	//$bookid=3;
	
	error_log("sudha stock".$bookid,0); 
	$sql ="SELECT BookName,id,stock FROM tblbooks WHERE (ISBNNumber=:bookid)";
	$query= $dbh -> prepare($sql);
	$query-> bindParam(':bookid', $bookid, PDO::PARAM_STR);
	$query-> execute();
	error_log($query->rowCount(),0);
	if($query->rowCount() > 0)
	{
	$result = $query -> fetch();
	$bookid = $result["id"];
	$stock =  $result["stock"];
    $sql ="SELECT count(*) as stock FROM `tblissuedbookdetails` where Bookid=:bookid and RetrunStatus=0 ";
	$query= $dbh -> prepare($sql);
	$query-> bindParam(':bookid', $bookid, PDO::PARAM_STR);
	$query-> execute();
	$result = $query -> fetch();
	$stock = $stock-$result["stock"];
	echo $stock;
	}
}
/*	$results = $query -> fetchAll(PDO::FETCH_OBJ);
	$cnt=1;
if($query -> rowCount() > 0)
{

foreach ($results as $result) {?>
<option value="<?php echo htmlentities($result->stock);?>"><?php echo htmlentities($result->stock);?></option>
<b>Stock Count :</b> 
<?php  
echo htmlentities($result->stock);
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
else{?>  
<option class="others"> Invalid ISBN Number</option>
<?php
 echo "<script>$('#submit').prop('disabled',true);</script>";
}
}
*/
?>