<!DOCTYPE html>
<html>

<head>
	<title>DateTimepicker</title>

	<!-- Include Bootstrap CDN -->
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
	<!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
	
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" type="text/css" href="assets/rs-plugin/css/A.settings.css.pagespeed.cf.xeOyGChsgq.css" media="screen"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="assets/css/A.menu.css.pagespeed.cf.0_hLwXzYkZ.css">
<link rel="stylesheet" type="text/css" href="assets/css/A.carousel.css.pagespeed.cf.VktteGiLwl.css">
<link rel="stylesheet" type="text/css" href="assets/A.style.css%2bcss%2c%2c_custom.css%2cMcc.HvWh1qoob-.css.pagespeed.cf.pWH5huNcWh.css"/>


	<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js">
	</script>
	<script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
	</script>

	<!-- Include Moment.js CDN -->
	<script type="text/javascript" src=
"https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js">
	</script>

	<!-- Include Bootstrap DateTimePicker CDN -->
		<!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
	<!-- Include Bootstrap DateTimePicker CDN -->
	<link
		href=
"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css"
		rel="stylesheet">

	<script src=
"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js">
		</script>
</head>

<body>

	<!-- Include datetime input to display
		datetimepicker in container with
		relative position -->
	<div class="container" style="margin:100px">
<div class="input-group date" id="datetime">

	  <input type="text" class="form-control" />

	  <span class="input-group-addon">

	    <span class="glyphicon glyphicon-calendar"></span>

	  </span>

	</div>
	</div>

	<script>

		// Below code sets format to the
		// datetimepicker having id as
		// datetime
		$('#datetime').datetimepicker({
			format: 'hh:mm:ss a'
		});
	</script>
</body>

</html>
