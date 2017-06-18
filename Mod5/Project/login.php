<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sign in</title>
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
          <h1 class="text-center">Logged on</h1>
        </div>
      </div>
    </div>
  </div>
	   </header>


<?PHP
$uname = "";
$pword = "";
$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	require 'config.php';

	$uname = $_POST['username'];
	$pword = $_POST['password'];

	$database = "login";


	$db_found = new mysqli($dbhost, $dbuser, $dbpass, $dbname );

	if ($db_found) {

	$SQL = $db_found->prepare('SELECT * FROM login WHERE L1 = ?');
	$SQL->bind_param('s', $uname);
	$SQL->execute();
	$result = $SQL->get_result();
		
		if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Username: " . $row["L1"]. "<br>";
    }
}

		if ($result->num_rows == 1) {

			$db_field = $result->fetch_assoc();

			if (password_verify($pword, $db_field['L2'])) {
				session_start();
				$_SESSION['login'] = "1";
				header ("Location: page1.php");
			}
			else {
				$errorMessage = "Login FAILED";
				session_start();
				$_SESSION['login'] = '';
			}
		}
		else {
			$errorMessage = "username FAILED";
		}
	}
}
?>



</body>
</html>