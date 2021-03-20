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
	$host = 'us-cdbr-east-03.cleardb.com';
	$user = 'b8a00bf633cf68';
	$pass = '1a8113a0';
	$db = 'heroku_69459908ed082cc';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
          $query = "SELECT TICKER FROM heroku_69459908ed082cc.backtest GROUP BY(TICKER)";
          $result = mysql_query($mysqli , $query);
          if ($result) :
        ?>
        <select id="salarieids" name="salarieid">
          <?php
            while ($row = mysql_fetch_assoc($result)) {
              echo '<option value="', $row['TICKER'], '">', $row['TICKER'], '</option>'; //between <option></option> tags you can output something more human-friendly (like $row['name'], if table "salaried" have one)
            }
          ?>
        </select>
        <?php endif ?>
      </p>
      <p>
        <input type="submit" value="Sumbit my choice"/>
      </p>
    </form>

    <?php if isset($_POST['TICKER']) : ?>
      <?php
        $query = "SELECT * FROM `backtest` WHERE Ticker = '" . $_POST['salarieid'] . "';";
        $result = mysql_query($mysqli , $query);
        if ($result) :
      ?>
        <table>
          <?php
            while ($row = mysql_fetch_assoc($result)) {
              echo '<tr>';
              echo '<td>', $row['Ticker'], '</td><td>', $row['PriceDate'], '</td>'; // and others
              echo '</tr>';
            }
          ?>
        </table>
      <?php endif?>
    <?php endif ?>


  </body>
</html>
