<body>
<?php

$servername = "localhost";
$username = "root";
$password = "luvkiev";
$db = 'testdb';

//// Create connection
//$conn = new mysqli($servername, $username, $password, $db);
//
//// Check connection
//if ($conn->connect_error) {
//    die("Connection failed222: " . $conn->connect_error);
//}
$link = mysqli_connect("localhost", "root", "luvkiev", "testdb");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>
</body>
