<html>
		<head>
	<title>Find a record</title>
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
	Find a record
		</h1>	</div>
				<div data-role="content">
<?php
$servername = "us-cdbr-azure-central-a.cloudapp.net";
$username = "bce24378a793fe";
$password = "3026fa65";
$dbname = "jmdronebase";


               $fname = (isset($_POST['fname'])    ? $_POST['fname']   : '');
               $lname = (isset($_POST['lname'])    ? $_POST['lname']   : '');
            

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql= "SELECT id,fname, lname FROM mytable where fname = '$fname' AND lname = '$lname' LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<b>id: " . $row["id"]. "</b><br>";
        echo "<b>Name: " . $row["fname"]. " " . $row["lname"]. "</b><br>";
    }
} else {
    echo "Sorry there are no matches! Please check your entry and try again.";
}

mysqli_close($conn);

?>



				<div data-role="footer" data-theme="b">
	  <h4>JMurlowski &copy; 2017</h4>
	</div>
	</body>
</html>