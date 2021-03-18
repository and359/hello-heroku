<!DOCTYPE html>
<html>
	
	<head>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
		<title>S&P500</title>

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
		</style>-->

	</head>

<body>
<h1>S&P500 Performance (PHP) 53</h1>

	
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

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

	
	<!--mysql-->
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
	<!--end of MySQL-->
	
	<!--Structure Data Loop-->
		<script>
		var marketing = [<?php echo $data6; ?>];
		var amount = [<?php echo $data1; ?>];
		var marketing3 = [<?php echo $data7; ?>];
		var amount4 = [<?php echo $data4; ?>];
		var px4 = [<?php echo $data8; ?>];
		var B_S = [<?php echo $data5; ?>];
		var txt = "";
		
		var test3 = marketing.map(function(date1, index1) {
		
			
			return [
			Number(marketing[index1]), Number(amount[index1])
			];
		
		});
		
		//annotations	
		var test4 = marketing3.map(function(date2, px2, index2) {
		
			if (B_S[index2]=='Buy'){
			return {
			//type: 'line', borderColor: 'green', id: 'vline' + index2, mode: 'vertical', scaleID: 'x-axis-0', value: date2, borderWidth: 1, label: {enabled: true, position: "bottom", content: amount4[index2]}}
			labels: [{point: {xAxis: 0,yAxis: 0,x: date2,y: px4[px2]},x: -30,text: amount4[index2]}]}
			} else {
			return{
			//type: 'line', borderColor: 'red', id: 'vline' + index2, mode: 'vertical', scaleID: 'x-axis-0', value: date2, borderWidth: 1, label: {enabled: true, position: "top", content: amount4[index2]}}
			labelOptions: {backgroundColor: 'rgba(255,255,255,0.5)',verticalAlign: 'top',y: 15},labels: [{point: {xAxis: 0,yAxis: 0,x: date2,y: px4[px2]},text: amount4[index2]}]}
			};
		
		});		
		</script>
	
	
<script type="text/javascript">
// Data generated from http://www.bikeforums.net/professional-cycling-fans/1113087-2017-tour-de-france-gpx-tcx-files.html
	
	
	
	var elevationData = test3;
	
	

// Now create the chart
Highcharts.chart('container1', {

    chart: {
        type: 'area',
        zoomType: 'x',
        panning: true,
        panKey: 'shift',
        scrollablePlotArea: {
            minWidth: 600
        }
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
	
	
    annotations: test4
	/*[
	    {labelOptions: {
            backgroundColor: 'rgba(255,255,255,0.5)',
            verticalAlign: 'top',
            y: 15
        },
        labels: [{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 1583798400000,
                y: 57.970001
            },
            text: 'Arbois'
        }]}, 
	{labels: [{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 1613692800000,
                y: 227.270004
            },
            x: -30,
            text: 'Col de la Joux'
        }]}
		 ]*/,	

    xAxis: {
	    labels: {
      format: "{value:%b %e}"
    },
    //tickInterval: 604800000,
    type: "datetime"//,
    //min: 1569888000000
	    /*,
      labels: {
        formatter: function() {
          return Highcharts.dateFormat('%b/%e/%Y', this.value);
        }
      }*/
        /*labels: {
            format: '{value}'
        },
        minRange: 5,
        title: {
            text: 'Distance'
        },
        accessibility: {
            rangeDescription: 'Range: 0 to 187.8km.'
        }*/
    },

    yAxis: {
        startOnTick: true,
        endOnTick: false,
        maxPadding: 0.35,
        title: {
            text: null
        },
        labels: {
            format: '{value}'
        }
    },

    tooltip: {
        formatter: function() {
                return  '<b>' + this.series.name +'</b><br/>' +
                    Highcharts.dateFormat('%e - %b - %Y',
                                          new Date(this.x))
                + ' date, ' + this.y ;
            }//,headerFormat: 'Date: {point.x}<br>',
        //pointFormat: '{point.y}',
        //shared: true
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
        data: elevationData,
        lineColor: Highcharts.getOptions().colors[1],
        color: Highcharts.getOptions().colors[2],
        fillOpacity: 0.5,
        name: 'Elevation',
        marker: {
            enabled: false
        },
        threshold: null
    }]

});</script>


</body>
</html>
