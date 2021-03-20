<!DOCTYPE html>
<html>
<head>
</head>

	<style type="text/css">
		.bg{
			background-image: linear-gradient(to top left,black,blue);
		}
		nav{
			background-image: linear-gradient(to top right,red,yellow); 
			padding-left: 200px;
			padding-right: -200px;
		}
		.content{
			padding-left: 200px;
			padding-right: -200px;
			height:100%;
		}
		.card-bg{
			background: rgba(0,0,0,0);
		}
		@media only screen and (max-width: 992px){
			.content,nav{
				padding-left: 0;
			}
		}
	</style>
	
<body>
	<div class="content bg">
		<div class="container">
		<div class="row">
			<div class="col l12 m6 s12">
				<div class="card card-bg">
					<div class="card-content">
						<!--<canvas id="sel1"></canvas>-->
						<form><div class="form-group">
						      <label for="sel1">Select list (select one):</label>
						      <select class="form-control" id="sel1">
							<option>ETSY</option>
							<option>TSLA</option>
							<option>IVW</option>
						      </select>
						      <br>
						    </div>
						    <button onclick="myFunction()">Try it</button>
						 </form>
						<p id="demo"></p>
						<script>
						    function myFunction() {
							var x = document.getElementById("sel1").value;
							document.getElementById("demo").innerHTML = x;
							}

						</script>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	
</body>
</html>
