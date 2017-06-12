<<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Record Results</title>
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
          <h1 class="text-center">Records Report</h1>
        </div>
      </div>
    </div>
  </div>
 </header>
</nav>

  <div data-role="content">
<h1>
	List
		</h1>	</div>
				<div data-role="content">

<?php

					include 'config.php';
					include 'opendb.php';
					
              		$ltime = (isset($_POST['ltime'])    ? $_POST['ltime']   : '');	
					$ftime = (isset($_POST['ftime'])    ? $_POST['ftime']   : '');
					$aircraft_id = (isset($_POST['aircraft_id'])    ? $_POST['aircraft_id']   : '');
								

					$sql= "SELECT aircraft_id, ftime, ltime 
						FROM flightrecords
						WHERE aircraft_id LIKE '$aircraft_id' LIMIT 100";
					
					/// Multiple search criteria
					///$sql = "SELECT ltime, ftime, aircraft_id FROM 'flightrecords' WHERE"
					////	if(!empty($_POST['ltime'])) $sql .= " `ltime` = '".mysql_real_escape_string($_POST['ltime'])."' AND ";
						///if(!empty($_POST['ftime'])) $sql .= " `ftime` = '".mysql_real_escape_string($_POST['ftime'])."' AND ";
						///if(!empty($_POST['aircraft_id'])) $sql .= " `aircraft_id` = '".mysql_real_escape_string($_POST['aircraft_id'])."' AND ";



					
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0) {
					
					    while($row = mysqli_fetch_assoc($result)) {
									echo "Flight Time: " . $row["ftime"]. "<br>";
									echo "Aircraft Number: " . $row["aircraft_id"]. "<br>";
					        		echo "Date/Time: " . $row["ltime"]. "<br>";
	
					    }
					} else {
					    echo "0 results";
					}

					mysqli_close($conn);

					?>
<footer class="text-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <p>Copyright 2017 © JMurlowski UAVLog. All rights reserved.</p>
      </div>
    </div>
  </div>
</footer>
</div>

</body>
</html>