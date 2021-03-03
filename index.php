<!DOCTYPE html>
<html>
<body>

<h1>My first PHP page 1 2 3</h1>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/annotations.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>



<style>
.button {
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.button1 {background-color: #008CBA;} /* Blue */
}
  
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
  
  
  if(array_key_exists('button1', $_POST)) { 
            button1(); 
        } 
        else if(array_key_exists('button2', $_POST)) { 
            button2(); 
        } 
        function button1() { 
            echo "This is Button1 that is selected"; 
        } 
        function button2() { 
            echo "This is Button2 that is selected"; 
        } 
?>

  <form method="post"> 
        <input type="submit" name="button1"
                class="button" value="Button1" /> 
          
        <input type="submit" name="button2"
                class="button" value="Button2" /> 
    </form>
  
  </style>
</body>
</html>
