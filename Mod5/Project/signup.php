<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register</title>
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
          <h1 class="text-center">Register</h1>
        </div>
      </div>
    </div>
  </div>
	   </header>

<?PHP
$uname = "";
$pword = "";
$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

		if ($result->num_rows > 0) {
			$errorMessage = "Username already taken";
		}
		else {
			$phash = password_hash($pword, PASSWORD_DEFAULT);
			$SQL = $db_found->prepare("INSERT INTO login (L1, L2) VALUES (?, ?)");
			$SQL->bind_param('ss', $uname, $phash);
			$SQL->execute();

			header ("Location: login.php");
		}
	}
	else {
		$errorMessage = "Database Not Found";
	}
}
?>
</body>
</html>