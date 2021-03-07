<!DOCTYPE html>
<html>
	<head>
    	<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
		<title>Accelerometer data</title>

		<!--<style type="text/css">			
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
		</style> -->

	</head>

	<body>	   
	    <div class="container">	
	    <h1>USE CHART.JS WITH MYSQL DATASETS Refresh 2</h1>       
			<!--<canvas id="chart" style="width: 100%; height: 65vh; background: #222; border: 1px solid #555652; margin-top: 10px;"></canvas>-->
			<canvas id="ctx"></canvas>


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
