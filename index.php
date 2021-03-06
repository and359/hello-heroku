<!DOCTYPE html>
<html>
	
	<head>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
		<title>S&P500</title>

	</head>

	
	<!--username-->	

	<!--end of username-->	
	
	
<body>

	
<h1>S&P500 Performance (PHP) updated 21</h1>

----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
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


<div class="container">
	<div class="row">
		<div class="col-sm-6 col-md-6">
			<div id="container1"></div>
		</div>
		<div class="col-sm-6 col-md-6"></div>
		<div class="col-sm-6 col-md-6"></div>
		<div class="col-sm-6 col-md-6"></div>
</div>
</div>
	
	
<script type="text/javascript">
// Now create the chart
Highcharts.chart('container1', {

    chart: {
        type: 'area',
        zoomType: 'x',
        panning: false //,
        //panKey: 'shift'
	    //,
        //scrollablePlotArea: {
        //    minWidth: 1000
        //}
    },

    caption: {
        text: 'This chart uses the Highcharts Annotations feature to place labels at various points of interest. The labels are responsive and will be hidden to avoid overlap on small screens.'
    },

    title: {
        text: '2017 Tour de France Stage 8: Dole - Station des Rousses'
    },

    accessibility: {
        description: 'Image description: An annotated line graph illustrates the 8th stage of the 2017 Tour de France cycling race from the start point in Dole to the finish line at Station des Rousses. Altitude is plotted on the Y-axis at increments of 500m and distance is plotted on the X-axis in increments of 25 kilometers. The line graph is interactive, and the user can trace the altitude level at every 100-meter point along the stage. The graph is shaded below the data line to visualize the mountainous altitudes encountered on the 187.5-kilometre stage. The three largest climbs are highlighted at Col de la Joux, Côte de Viry and the final 11.7-kilometer, 6.4% gradient climb to Montée de la Combe de Laisia Les Molunes which peaks at 1200 meters above sea level. The stage passes through the villages of Arbois, Montrond, Bonlieu, Chassal and Saint-Claude along the route.'
    },

    credits: {
        enabled: false
    },

    annotations: [{
        labelOptions: {
            backgroundColor: 'rgba(255,255,255,0.5)',
            verticalAlign: 'top',
            y: 15
        },
        labels: [{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 100,
                y: 100
            },
            text: 'Mont-sur-Monnet'
        }, {
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 150,
                y: 150
            },
            x: -10,
            text: 'Bonlieu'
        }]
    }, {
        labels: [{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 200,
                y: 200
            },
            x: -30,
            text: 'Col de la Joux'
        }]
    }, {
        labelOptions: {
            shape: 'connector',
            align: 'right',
            justify: false,
            crop: true,
            style: {
                fontSize: '0.8em',
                textOutline: '1px white'
            }
        },
        labels: [{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 96.2,
                y: 783
            },
            text: '6.1 km climb<br>4.6% on avg.'
        }, {
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 134.5,
                y: 540
            },
            text: '7.6 km climb<br>5.2% on avg.'
        }, {
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 172.2,
                y: 925
            },
            text: '11.7 km climb<br>6.4% on avg.'
        }]
    }],

    xAxis: {
        labels: {
            format: '{value}'
        },
        minRange: 0,
        title: {
            text: 'Distance'
        },
        accessibility: {
            rangeDescription: 'Range: 0 to 187.8km.'
        }
    },

    yAxis: {
        startOnTick: true,
        endOnTick: false,
        maxPadding: 0.35,
        title: {
            text: null
        },
        labels: {
            format: '${value}'
        }
    },

    tooltip: {
        headerFormat: 'Distance: {point.x:.1f} km<br>',
        pointFormat: '{point.y} m a. s. l.',
        shared: true
    },

    legend: {
        enabled: false
    },

    series: [{
        accessibility: {
            keyboardNavigation: {
                enabled: false
            }
        },      
        data: [[100, 100],[200, 200]],
	
        lineColor: Highcharts.getOptions().colors[1],
        color: Highcharts.getOptions().colors[2],
        fillOpacity: 0.5,
        name: 'Elevation',
        marker: {
            enabled: true
        },
        threshold: null
    }]

});</script>

	
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------	
<br><br>	
	
	
	
	***line chart 
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
	<div class="container">	
	    <h1>USE CHART.JS WITH MYSQL DATASETS</h1>       
			<canvas id="chart" style="width: 100%; height: 65vh; background: #222; border: 1px solid #555652; margin-top: 10px;"></canvas>

			<script>
				var ctx = document.getElementById("chart").getContext('2d');
    			var myChart = new Chart(ctx, {
        		type: 'line',
		        data: {
		            labels: ["1JAN21","2JAN21","3JAN21","4JAN21","5JAN21","6JAN21"],
		            datasets: 
		            [{
		                label: 'Data 1',
		                data: [<?php echo $data1; ?>],
		                backgroundColor: 'transparent',
		                borderColor:'rgba(255,99,132)',
		                borderWidth: 3
		            },

		            {
		            	label: 'Data 2',
		                data: [<?php echo $data2; ?>],
		                backgroundColor: 'transparent',
		                borderColor:'rgba(0,255,255)',
		                borderWidth: 3	
		            }]
		        },
		     
		        options: {
		            scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
		            tooltips:{mode: 'index'},
		            legend:{display: true, position: 'top', labels: {fontColor: 'rgb(255,255,255)', fontSize: 16}}
		        }
		    });
			</script>
	    </div>
	
	***line chart end <br><br>
	
	
	
	
	
	
<style>
table, th, td {
  border: 1px solid black;
}
</style>

<?php
//echo "FINALLY!!! AUNTY IS STAYING!!!!";
  
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

//$sql = "SELECT * FROM heroku_69459908ed082cc.`s&p500_returns`;";
	$sql = "SELECT * FROM heroku_69459908ed082cc.`rtd`;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	echo "<table border=1><tr><th>#</th><th>Ticker</th><th>Desc</th><th>Close Price</th><th>Returns</th><th>Sector</th><th>Industry</th><th>Volume</th><th>Index</th></tr>";
	
    while($row = $result->fetch_assoc()) {
        //echo ++$row_num . ") Ticker: " . $row["Ticker"]. " - Value Date: " . $row["ValueDate"]. " - Close Price: " . $row["ClosePx"]. " Returns: " . $row["Returns_Percent"]. " - Volume: " . $row["Volume"]. " - Uploaded: " . $row["UploadTime"]. " " . "<br>";
	
	echo "<tr><td>" . ++$row_num . ")</td><td>" . $row["Ticker"]. "</td><td>" . $row["Desc"]. "</td><td>" . $row["LastPx"]. "</td><td>" . $row["RtnPercent"]. "</td><td>" . $row["Sector"]. "</td><td>" . $row["Industry"]. "</td><td>" . $row["Volume"]. "</td><td>" . $row["Index_"]. "</td></tr>";
	
    }	echo "</table>";
} else {
    echo "0 results";
}
	
	$sql = "select uploadtime from `heroku_69459908ed082cc`.`rtd` limit 1;";
$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	echo "Table updated on: " . $row["uploadtime"] . "<br><br>";
	
$conn->close();
	
	echo "TGIF";
	
?>
	<p>
<script> document.write(new Date().toLocaleDateString()); </script>
</p>
</body>
</html>
