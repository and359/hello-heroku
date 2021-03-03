<!DOCTYPE html>
<html>
<body>

<h1>My first PHP page 1 2 3</h1>

<?php
echo "FINALLY!!! AUNTY IS STAYING!!!!";
  
echo "<table>";

echo "<tr><th>Table Heading</th><th>Table Heading</th><th>Table Heading</th><th>Table Heading</th></tr>";

echo "<tr><td>Hello world.</td><td>Hello world.</td><td>Hello world.</td><td>Hello world.</td></tr>";

echo "</table>";
  
$servername = "us-cdbr-east-03.cleardb.com";
$username = "b8a00bf633cf68";
$password = "1a8113a0";
$dbname = "heroku_69459908ed082cc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM heroku_69459908ed082cc.`s&p500_returns`;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Ticker: " . $row["Ticker"]. " - Value Date: " . $row["ValueDate"]. " - Close Price: " . $row["ClosePx"]. " Returns: " . $row["Returns_Percent"]. " - Volume: " . $row["Volume"]. " - Uploaded: " . $row["UploadTime"]. " " . "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

</body>
</html>
