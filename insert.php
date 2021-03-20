<?php
//insert.php
if(isset($_POST["tweet"]))
{
 $connect = mysqli_connect("us-cdbr-east-03.cleardb.com", "b8a00bf633cf68", "1a8113a0", "heroku_69459908ed082cc");
 $tweet = mysqli_real_escape_string($connect, $_POST["tweet"]);
 $sql = "INSERT INTO heroku_69459908ed082cc.tbl_tweet (tweet) VALUES ('".$tweet."')";
 mysqli_query($connect, $sql);
}

?>
