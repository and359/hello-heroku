<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Collapse test</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap-collapse.js"></script>
    </head>
    <body>

    <table class="table table-bordered table-striped">
        <tr>
            <td>
              <button type="button" class="btn" data-toggle="collapse" data-target="#collapseme">
                Click to expand
              </button>
            </td>
        </tr>
        <tr><td><div class="collapse out" id="collapseme">Should be collapsed</div></td></tr>
    </table>
</body>
</html>
