<!DOCTYPE html>
<html>
    <head>
        
        <title>Collapse test 5</title>
        
        <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        
    </head>
	
	<style>
	.hiddenRow {
  display: none;
}
	</style>
    <body>

        
        <script>
           (function() {
	$('#carsTable .toggle').on('click', function() {
  	$('#carsTable .hideableRow').toggleClass('hiddenRow');
  })
})()
        </script>
        
   <table class="table table-sm table-hover" id="carsTable">
<thead class="thead-inverse">


    <tr>
        <th colspan="6"></th>
        <th colspan="3">Current Month</th>
        <th colspan="3">Year-to-Date</th>
    </tr>
</thead>
<tbody>
    <tr data-toggle="collapse" data-target="#cars" class="toggle">
        <th colspan="6">Cars</th>
        <td colspan="3">456 mi</td>
        <td colspan="3">700 mi</td>
    </tr>
    <tr class="hideableRow">
        <td colspan="1"></td>
        <td colspan="5">Toyota</td>
        <td colspan="3">534 mi</td>
        <td colspan="3">800 mi</td>
    </tr>
    <tr class="hideableRow">
        <th colspan="1"></th>
        <th colspan="5">Honda</th>
        <td colspan="3">600 mi</td>
        <td colspan="3">770 mi</td>
    </tr>
</tbody>
</table>
	</body>
</html>
