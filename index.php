<DOCTYPE html>
<html>
  <head>
    <title>My Test Form</title>
  </head>

  <body>
    <h1>2</h1><br>
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
                                  $sql = "SELECT Ticker FROM heroku_69459908ed082cc.backtest GROUP BY(Ticker);";
                                      $result = mysqli_query($mysqli, $sql);
                                    while ($row = mysql_fetch_assoc($result)) {
                                      echo '<option value="', $row['Ticker'], '">', $row['Ticker'], '</option>'; 
                                      }
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
