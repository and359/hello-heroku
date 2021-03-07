<?php
	/* Database connection settings */
	$host = 'us-cdbr-east-03.cleardb.com';
	$user = 'b8a00bf633cf68';
	$pass = '1a8113a0';
	$db = 'heroku_69459908ed082cc';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

	$data1 = '';
	$data2 = '';

	//query to get data from the table
	$sql = "SELECT * FROM `datasets` ";
    $result = mysqli_query($mysqli, $sql);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {

		$data1 = $data1 . '"'. $row['data1'].'",';
		$data2 = $data2 . '"'. $row['data2'] .'",';
	}

	$data1 = trim($data1,",");
	$data2 = trim($data2,",");
?>

<!DOCTYPE html>
<html>
	<head>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
		<title>Accelerometer data</title>

		<style type="text/css">			
			body{
				font-family: Arial;
			    margin: 80px 100px 10px 100px;
			    padding: 0;
			    color: white;
			    text-align: center;
			    background: #555652;
			}

			.container {
				color: #E8E9EB;
				background: #222;
				border: #555652 1px solid;
				padding: 10px;
			}
		</style>

	</head>

	<body>	   
	    <div class="container">	
	    <h1>USE CHART.JS WITH MYSQL DATASETS</h1>       
			<!--<canvas id="chart" style="width: 100%; height: 65vh; background: #222; border: 1px solid #555652; margin-top: 10px;"></canvas>-->
			<canvas id="ctx"></canvas>

	<!-- data 1: 1, 4, 3, 6, 2, 0, 3, 1, 4, 3, 6, 2, 0, 3 -->
	<!-- data 2: 2, 5, 5, 7, 4, 3, 2, 2, 5, 5, 7, 4, 3, 2 -->

			<script>
			var marketing = ['2017-08-05', '2017-08-12'];
			var amount = [50, 70];
			// populate 'annotations' array dynamically based on 'marketing'
			var annotations = marketing.map(function(date, index) {
			   return {
			      type: 'line',
			      id: 'vline' + index,
			      mode: 'vertical',
			      scaleID: 'x-axis-0',
			      value: date,
			      borderColor: 'green',
			      borderWidth: 1,
			      label: {
				 enabled: true,
				 position: "center",
				 content: amount[index]
			      }
			   }
			});

			var chart = new Chart(ctx, {
			   type: 'line',
			   data: {
			      labels: ['2017-08-02', '2017-08-05', '2017-08-09', '2017-08-12', '2017-08-14'],
			      datasets: [{
				 label: 'LINE',
				 data: [3, 1, 4, 2, 5],
				 backgroundColor: 'rgba(0, 119, 290, 0.2)',
				 borderColor: 'rgba(0, 119, 290, 0.6)'
			      }]
			   },
			   options: {
			      scales: {
				 yAxes: [{
				    ticks: {
				       beginAtZero: true
				    }
				 }]
			      },
			      annotation: {
				 drawTime: 'afterDatasetsDraw',
				 annotations: annotations
			      }
			   }
			});

			</script>
	    </div>
	    
	</body>
</html>
