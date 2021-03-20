<DOCTYPE html>
<html>
  <head>
    <title>My Test Form</title>
  </head>

  <body>
    <h1>1</h1><br>
    <form method="POST">
      <p>Please, choose the salary id to proceed result:</p>

      <p>
        <label for="salarieids">SalarieID:</label>
                <?php
	                $host = 'us-cdbr-east-03.cleardb.com';
	                $user = 'b8a00bf633cf68';
	                $pass = '1a8113a0';
	                $db = 'heroku_69459908ed082cc';
	                $mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
                  $query = "SELECT TICKER FROM heroku_69459908ed082cc.backtest GROUP BY(TICKER)";
                  $result = mysql_query($query);
                  if ($result) :
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
