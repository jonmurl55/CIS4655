<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles/custom.css" />
<link rel="stylesheet" href="themes/rasmussenthemeroller.min.css" />
<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<script src="javascript/storage.js"></script>
</head>

<body>
	<div data-role="page" id="page" data-theme="a" data-add-back-btn="true">

 <nav class="ui-navbar">
  <div class="container-fluid">
   <div class="navbar-header">
	   <center><a href="index.html" data-transition="pop" role="button" data-holder-rendered="true"> <img src="images/Logo.png" width="50">
	   <a class="navbar-brand" href="index.html">Home</a>
    </div>
  </div>
  
  <header>
  <div class="jumbotron">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <h1 class="text-center">Fight Record Status</h1>
        </div>
      </div>
    </div>
  </div>
	   </header>
	   
				<div data-role="content">
          <?php

$mysqli = new mysqli( 'us-cdbr-azure-central-a.cloudapp.net', 'bce24378a793fe','3026fa65', 'jmdronebase' );
					
               $ftime = (isset($_POST['ftime'])    ? $_POST['ftime']   : '');
               $ltime = (isset($_POST['ltime'])    ? $_POST['ltime']   : '');
               $aircraft_id = (isset($_POST['aircraft_id'])    ? $_POST['aircraft_id']   : '');
               $geo = (isset($_POST['geo'])    ? $_POST['geo']   : '');



			  // Insert our data
			  $sql = "INSERT INTO flightrecords (ftime, ltime, aircraft_id, geo) 	VALUES ( '{$mysqli->real_escape_string(isset($_POST['ftime'])    ? $_POST['ftime']   : '')}' , '{$mysqli->real_escape_string(isset($_POST['ltime'])    ? $_POST['ltime']   : '')}'	, '{$mysqli->real_escape_string(isset($_POST['aircraft_id'])    ? $_POST['aircraft_id']   : '')}' 	, '{$mysqli->real_escape_string(isset($_POST['geo'])    ? $_POST['geo']   : '')}'	)";


			  $insert = $mysqli->query($sql);

			  // Print response from MySQL
			  if ( $insert ) {
				echo "Success! Row ID: {$mysqli->insert_id}";
			  } else {
				die("Error: {$mysqli->errno} : {$mysqli->error}");
			  }

           ?>
</body>
</html>