<?php
$servername = "us-cdbr-azure-central-a.cloudapp.net";
$username = "bce24378a793fe";
$password = "3026fa65";
$dbname = "jmdronebase";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql= "SELECT ftime, ltime, anumber FROM [flightrecord]";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Flight Time: " . $row["ftime"]. "<br>";
        echo "Launch Time: " . $row["ltime"]. "<br>";
        echo "Aircraft Number: " . $row["anumber"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);

?>