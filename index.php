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
            <li><a href="#"><i class="glyphicon glyphicon-user"></i> User</a></li>
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
        <div class="row">
          <div class="col-sm-12">
            <!-- loopy loopy over the crap we stuff into that array earlier  -->
            <?php foreach($data as $elem) {
              echo "<p>$elem<p>";
            }?>
          </div>
        </div>
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
  </body>
</html>