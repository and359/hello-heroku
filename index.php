<!DOCTYPE html>
<html>
	<head>
    	<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
		<script async src="//jsfiddle.net/beaver71/3qkcLk6v/embed/"></script>
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
		
	    <div class="container">	</div>
	    
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
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		    
	    <h1>USE CHART.JS WITH MYSQL DATASETS Refresh 7</h1>       
			<!--<canvas id="chart" style="width: 100%; height: 65vh; background: #222; border: 1px solid #555652; margin-top: 10px;"></canvas>-->
			<canvas id="ctx"></canvas>


			<script type="text/javascript">
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

	    
	</body>
</html>
