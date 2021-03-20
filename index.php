<DOCTYPE html>
<html>
  <head>
    <title>My Test Form</title>
  </head>

  <body>
    <form method="POST">
      <p>Please, choose the salary id to proceed result:</p>

      <p>
        <label for="salarieids">SalarieID:</label>
                                        <?php
                                  /* Database connection settings */
                                  $host = 'us-cdbr-east-03.cleardb.com';
                                  $user = 'b8a00bf633cf68';
                                  $pass = '1a8113a0';
                                  $db = 'heroku_69459908ed082cc';
                                  $mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

                                  $data1 = '';
                                  $data2 = '';
                                  $date = '';
                                  $data3 = '';
                                  $data4 = '';
                                  $data5 = '';
                                  $data6 = '';

                                  //query to get data from the table
                                  $sql = "SELECT * FROM `backtest`;";
                                      $result = mysqli_query($mysqli, $sql);

                                  //loop through the returned data
                                  while ($row = mysqli_fetch_array($result)) {

                                    $data1 = $data1 . '"'. $row['Price'].'",';
                                    $date = $date . '"'. $row['PriceDate'] .'",';
                                    $data6 = $data6 . '"'. $row['UnixTime'].'",';
                                  }

                                  $data1 = trim($data1,",");
                                  //$data2 = trim($data2,",");
                                  $date = trim($date,",");
                                  $data6 = trim($data6,",");

                                  $sql = "select Ticker from `heroku_69459908ed082cc`.`backtest` order by Ticker desc limit 1;";
                                      $result = mysqli_query($mysqli, $sql);
                                  $row = mysqli_fetch_array($result);
                                  $data2 = $data2 . $row['Ticker'];

                                  $sql = "select * from `heroku_69459908ed082cc`.`buy_sell`;";
                                      $result = mysqli_query($mysqli, $sql);
                                  while ($row = mysqli_fetch_array($result)) {

                                    $data3 = $data3 . '"'. $row['TradeDate'].'",';
                                    $data4 = $data4 . '"'. $row['Remarks'].'",';
                                    $data5 = $data5 . '"'. $row['BuySell'].'",';
                                    $data7 = $data7 . '"'. $row['UnixTime'].'",';
                                    $data8 = $data8 . '"'. $row['Price'].'",';

                                  }

                                  $data3 = trim($data3,",");
                                  $data4 = trim($data4,",");
                                  $data5 = trim($data5,",");
                                  $data7 = trim($data7,",");
                                  $data8 = trim($data8,",");


                                  ?>

        <select id="salarieids" name="salarieid">
          
        </select>
        
      </p>
      <p>
        <input type="submit" value="Sumbit my choice"/>
      </p>
    </form>

    
        <table>
          
        </table>
      

  </body>
</html>
