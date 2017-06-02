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
	<div id="page" data-role="page" data-theme="b" >
	<div data-role="header" data-theme="b">
<h1>
	Insert a record
		</h1>	</div>
				<div data-role="content">
          <?php

                // Connect to MySQL
 				$mysqli = new mysqli( 'localhost', 'YOUR_USERNAME','YOUR_PASSWORD', 'YOUR_DBNAME' );



               $fname = (isset($_POST['fname'])    ? $_POST['fname']   : '');
               $lname = (isset($_POST['lname'])    ? $_POST['lname']   : '');
               $email = (isset($_POST['address'])    ? $_POST['email']   : '');
               $comments = (isset($_POST['comments'])    ? $_POST['comments']   : '');



			  // Insert our data
			  $sql = "INSERT INTO [YOUR_TABLE_NAME] ( fname, lname, email, comments) 	VALUES ( '{$mysqli->real_escape_string(isset($_POST['fname'])    ? $_POST['fname']   : '')}' , '{$mysqli->real_escape_string(isset($_POST['lname'])    ? $_POST['lname']   : '')}'	, '{$mysqli->real_escape_string(isset($_POST['email'])    ? $_POST['email']   : '')}' 	, '{$mysqli->real_escape_string(isset($_POST['comments'])    ? $_POST['comments']   : '')}'	)";


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