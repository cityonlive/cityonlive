<?php

include 'db-connect/db-connect.php';

$sql = "SELECT IDNOy, name, occupation, country, timenow FROM testtb";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br>"."id: " . $row["IDNOy"]. " - Name: " . $row["name"]. " - working as  " . $row["occupation"]. " captured at " .$row["timenow"];
    }
} else {
    echo "0 resultsddd";
}

mysqli_close($mysqli);
?>
