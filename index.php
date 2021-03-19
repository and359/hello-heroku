<!DOCTYPE html>
<html>
<head>
	
	
	<!--<script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
	<script type="text/javascript" src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>-->
	<script async src="//jsfiddle.net/KnuU6/21/embed/"></script>
	
      
</head>
<body>
	
	<div class="navbar-fixed">
	<nav>
		<div class="nav-wrapper">
			<a href="#" class="brand-logo center">Trading Results: </a>	
		</div>
	</nav>
	</div>

	<script>
		$(".btn").click(function() {
		    if($("#collapseme").hasClass("out")) {
			$("#collapseme").addClass("in");
			$("#collapseme").removeClass("out");
		    } else {
			$("#collapseme").addClass("out");
			$("#collapseme").removeClass("in");
		    }
		});
	</script>
	
	
	<table class="table table-bordered table-striped">
        <tr>
            <td>
              <button type="button" class="btn">
                Click to expand
              </button>
            </td>
        </tr>
        <tr id="collapseme" class="collapse out"><td><div>Should be collapsed</div></td></tr>
    </table>
	
	 		
</body>
</html>
