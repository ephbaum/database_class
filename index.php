<?php
require_once('action.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>DB Connection Work</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="DB Connection Work">
    <meta name="author" content="F. Stephen Kirschbaum">

    <link href="lib/css/bootstrap.min.css" rel="stylesheet">
    
    </head>

    <body>
      <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand visible-sm visible-xs" data-toggle="collapse" data-target="#navbar-collapse">Database</a>
          <a class="navbar-brand visible-lg visible-md">Database</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a class="#" href="index.html"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            <li><a href="#sCRUD"><i class="glyphicon glyphicon-user"></i> sCRUD</a></li>
            <li><a href="#"><i class="glyphicon glyphicon-envelope"></i> Contact</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

      <div class="container">
        <div class="jumbotron">
          <h1>Database Stuff</h1>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-12">
            <p>Informative information will go here or something of that sort.</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-12">
            <!-- here's where we log connection status... -->
            <p><span class="lead">Connection status is: </span><?=$connectionStatus?></p>
          </div>
        </div>
        <hr>
        <!-- <div class="row">
          <div class="col-sm-12"> -->
            <!-- loopy loopy over the crap we stuff into that array earlier  -->
            <?php // foreach($data as $elem) {
              //echo "<p>$elem<p>";
              //}?>
          <!-- </div>
        </div>
        <hr> -->
        <div class="row">
          <div class="col-sm-12">
            <h3>Simple sCRUD stuff</h3>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-12">
            <h4>Create</h4>
            <p>Create means to create...</p>
          </div>
        </div>
        <form class="form-horizontal" role="form">
          <div class="row">
            <div class="form-group">
              <label for="insertValue" class="col-sm-3 control-label">Content to Create</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="insertValue" id="insertValue">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <div class="col-sm-2 col-sm-offset-3">
                <button type="button" id="insertSubmit" class="btn btn-primary">Create</button>
              </div>
            </div>
        </form>
        <hr>
        <div class="row">
          <div class="col-sm-12">
            <h4>Read</h4>
            <p>Read means to read...</p>
          </div>
        </div>
        <form class="form-horizontal" role="form">
          <div class="row">
            <div class="form-group">
              <label for="readValue" class="col-sm-3 control-label">Value to Find</label>
              <div class="col-sm-9">
                <input type="text" name="readValue" id="readValue" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <div class="col-sm-2 col-sm-offset-3">
                <button type="button" id="readValueSubmit" class="btn btn-primary">Read Value</button>
              </div>
              <div class="col-sm-2">
                <button type="button" id="readSubmit" class="btn btn-primary">Read</button>
              </div>
            </div>
          </div>
        </form>
        <div id="readResults" class="row" style="display: none;">
          <div class="col-sm-9 col-sm-offset-3">
            <table id="readInsert" class="table table-striped">
            </table>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-12">
            <h4>Update</h4>
            <p>Update means to update...</p>
          </div>
        </div>
        <form class="form-horizontal" role="form">
          <div class="row">
            <div class="form-group">
              <label for="updateValue" class="col-sm-3 control-label">Content to Update</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="updateValue" id="updateValue">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <label for="updateNewValue" class="col-sm-3 control-label">Update to</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="updateNewValue" id="updateNewValue">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <div class="col-sm-2 col-sm-offset-3">
                <button type="button" class="btn btn-primary" id="updateSubmit">Update</button>
              </div>
            </div>
          </div>
        </form>
        <hr>
        <div class="row">
          <div class="col-sm-12">
            <h4>Delete</h4>
            <p>Delete means to delete...</p>
          </div>
        </div>
        <form class="form-horizontal" role="form">
          <div class="row">
            <div class="form-group">
              <label for="deleteValue" class="col-sm-3 control-label">Value to Delete</label>
              <div class="col-sm-9">
                <input type="text" name="deleteValue" id="deleteValue" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <div class="col-sm-2 col-sm-offset-3">
                <button type="button" class="btn btn-primary" id="deleteSubmit">Delete</button>
              </div>
            </div>
          </div>
        </form>
        <hr>
        <footer>
          <div class="row">
            <div class="col-xs-12 footer">
              <p>Footer Information</p>
            </div>
          </div>
        </footer>
      </div><!-- /container -->

    <script src="lib/js/jquery-1.11.0.min.js"></script>
    <script src="lib/js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
  </body>
</html>