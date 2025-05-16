<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{?>

<!DOCTYPE html>

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<meta name="keywords" content="">
<title>RajaLakshmi Engineering College | </title>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>

<link rel="stylesheet" type="text/css" href="rs-plugin/css/A.settings.css.pagespeed.cf.xeOyGChsgq.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="A.fonts%2c%2c_font-awesome-4.3.0%2c%2c_css%2c%2c_font-awesome.min.css%2bcss%2c%2c_bootstrap.css%2bcss%2c%2c_animate.css%2cMcc.kSNwpaaMDX.css.pagespeed.cf.w2G3xGgFf0.css"/>
<link rel="stylesheet" type="text/css" href="css/A.menu.css.pagespeed.cf.0_hLwXzYkZ.css">
<link rel="stylesheet" type="text/css" href="css/A.carousel.css.pagespeed.cf.VktteGiLwl.css">
<link rel="stylesheet" type="text/css" href="A.style.css%2bcss%2c%2c_custom.css%2cMcc.HvWh1qoob-.css.pagespeed.cf.pWH5huNcWh.css"/>
	
</head>

<body>
<div id="loader">
<div class="loader-container">
<img src="images/site.gif" alt="" class="loader-site">
</div>
</div>
<div id="wrapper">
<?php include('includes/header1.php');?> 
<!--header section ends-->
<section class="grey section">
<div class="container">
<div class="row">
<div id="content" class="col-md-12 col-sm-8 col-xs-12">
<div class="blog-wrapper">
<div class="row second-bread">
<div class="col-md-6 text-left">
<h1>Page Sidebar</h1>
</div>
<div class="col-md-6 text-right">
<div class="bread">
<ol class="breadcrumb">
<li><a href="#">Home</a></li>
<li class="active">Sidebar</li>
</ol>
</div>
</div>
</div>
</div>
<div class="row">

 <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-success back-widget-set text-center">
                            <i class="fa fa-book fa-5x"></i>
<?php 
$sql ="SELECT id from tblbooks ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$listdbooks=$query->rowCount();
?>


                            <h3><?php echo htmlentities($listdbooks);?></h3>
                      Books Listed
                        </div>
                    </div>

            
                 <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-info back-widget-set text-center">
                            <i class="fa fa-bars fa-5x"></i>
<?php 
$sql1 ="SELECT id from tblissuedbookdetails ";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$issuedbooks=$query1->rowCount();
?>

                            <h3><?php echo htmlentities($issuedbooks);?> </h3>
                           Times Book Issued
                        </div>
                    </div>
             
               <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-warning back-widget-set text-center">
                            <i class="fa fa-recycle fa-5x"></i>
<?php 
$status=1;
$sql2 ="SELECT id from tblissuedbookdetails where RetrunStatus=:status";
$query2 = $dbh -> prepare($sql2);
$query2->bindParam(':status',$status,PDO::PARAM_STR);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$returnedbooks=$query2->rowCount();
?>

                            <h3><?php echo htmlentities($returnedbooks);?></h3>
                          Times  Books Returned
                        </div>
                    </div>
               <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-danger back-widget-set text-center">
                            <i class="fa fa-users fa-5x"></i>
                            <?php 
$sql3 ="SELECT id from tblstudents ";
$query3 = $dbh -> prepare($sql3);
$query3->execute();
$results3=$query3->fetchAll(PDO::FETCH_OBJ);
$regstds=$query3->rowCount();
?>
                            <h3><?php echo htmlentities($regstds);?></h3>
                           Registered Users
                        </div>
                    </div>

        </div>



 <div class="row">

 <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-success back-widget-set text-center">
                            <i class="fa fa-user fa-5x"></i>
<?php 
$sql4 ="SELECT id from tblauthors ";
$query4 = $dbh -> prepare($sql4);
$query4->execute();
$results4=$query4->fetchAll(PDO::FETCH_OBJ);
$listdathrs=$query4->rowCount();
?>


                            <h3><?php echo htmlentities($listdathrs);?></h3>
                      Authors Listed
                        </div>
                    </div>

            
                 <div class="col-md-3 col-sm-3 rscol-xs-6">
                      <div class="alert alert-info back-widget-set text-center">
                            <i class="fa fa-file-archive-o fa-5x"></i>
<?php 
$sql5 ="SELECT id from tblcategory ";
$query5 = $dbh -> prepare($sql5);
$query5->execute();
$results5=$query5->fetchAll(PDO::FETCH_OBJ);
$listdcats=$query5->rowCount();
?>

                            <h3><?php echo htmlentities($listdcats);?> </h3>
                           Listed Categories
                        </div>
                    </div>
             

        </div>             

<!--div class="blog-wrapper">
<div class="blog-image">
<a href="single.html" title=""><img src="upload/xslider_new_01.jpg.pagespeed.ic.RgCY2ieSzC.jpg" alt="" class="img-responsive"></a>
</div>
<div class="blog-desc">
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unk...</p>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unk...</p>
<blockquote>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text </blockquote>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standardrd dummy text ever since the 1500s, when an unknown printer took.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unk.. dummy text ever since the 1500s, when an unknown printer took.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unk...</p>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standardrd dummy text ever since the 1500s, when an unknown printer took.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unk.. dummy text ever since the 1500s, when an unknown printer took.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unk...</p>
</div>
</div-->
</div>

</div>
</div>
</section>
</div>
<footer class="dark footer section">
<div class="container">
<div class="row">
<div class="col-md-3 col-md-6 col-xs-12">
<div class="widget">
<div class="widget-title">
<h4>About Library Management System</h4>
<hr>
</div>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took...</p>

</div>
</div>
<div class="col-md-3 col-md-6 col-xs-12">

</div>
<div class="col-md-3 col-md-6 col-xs-12">

</div>
<div class="col-md-3 col-md-6 col-xs-12">
<div class="widget">
<div class="widget-title">
<h4>Contact Details</h4>
<hr>
</div>
<ul class="contact-details">
<li><i class="fa fa-link"></i> <a href="#">www.yoursite.com</a></li>
<li><i class="fa fa-envelope"></i> <a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
<li><i class="fa fa-phone"></i> +90 123 45 67</li>
<li><i class="fa fa-fax"></i> +90 123 45 68</li>
<li><i class="fa fa-home"></i>  INC 22 Elizabeth Str. Melbourne. Victoria 8777.</li>
</ul>
</div>
</div>
</div>
</div>
</footer>

 <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>

<script src="js/jquery.min.js.pagespeed.jm.iDyG3vc4gw.js"></script>
<script src="js/bootstrap.min.js%2bretina.js%2bwow.js.pagespeed.jc.pMrMbVAe_E.js"></script><script>eval(mod_pagespeed_gFRwwUbyVc);</script>
<script>eval(mod_pagespeed_rQwXk4AOUN);</script>
<script>eval(mod_pagespeed_U0OPgGhapl);</script>
<script src="js/carousel.js%2bcustom.js%2bjquery.fitvids.js.pagespeed.jc.ghpaVHFgk4.js"></script><script>eval(mod_pagespeed_6Ja02QZq$f);</script>
<script>eval(mod_pagespeed_KxQMf5X6rF);</script>
<script>eval(mod_pagespeed_ehrgEOlD2f);</script>
</body>

<!-- page-sidebar40:34 GMT -->
</html>
<?php } ?>