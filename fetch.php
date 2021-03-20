<?php
//fetch.php
$connect = mysqli_connect("us-cdbr-east-03.cleardb.com", "b8a00bf633cf68", "1a8113a0", "heroku_69459908ed082cc");
$query = "SELECT * FROM heroku_69459908ed082cc.tbl_tweet ORDER BY tweet_id DESC";
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_array($result))
 {
  echo '<p>'.$row["tweet"].'</p>';
 }
}
?>
