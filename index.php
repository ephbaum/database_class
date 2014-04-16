<?php
require_once 'includes/action.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>PDO Database Connector</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PDO Database Connection Demo">
    <meta name="author" content="F. Stephen Kirschbaum">

    <link rel="stylesheet" href="lib/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/index.css">
    
    </head>

    <body>
      <nav id="home" class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand hidden-xs visible-sm visible-md visible-lg">Database</a>
          <a class="navbar-brand visible-xs hidden-sm hidden-md hidden-lg" data-toggle="collapse" data-target="#navbar-collapse">Database</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a class="active" href="#home"><i class="glyphicon glyphicon-home"></i> Information</a></li>
            <li><a href="#sCRUD"><i class="glyphicon glyphicon-user"></i> sCRUD Examples</a></li>
            <li><a href="#contact"><i class="glyphicon glyphicon-envelope"></i> Contact</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
      <div class="container">
        
        <div class="jumbotron">
          <h2><small>Agnostic</small><br>
            PDO Database Connector</h2>
        </div>
        
        <hr>
        
        <div class="row">
          <div class="col-sm-12">
            <h3>What's all this then?</h3>
            <p>This is an example of a simple database connector written in PHP using BootStrap with jQuery for the <i class="fa fa-html5"></i> front-end. The primary purpose for this to exist is to provide an example of a working database abstraction class that allows simple operation in an application that isn't completely dependant on PHP. The reason this was created was for use with smaller webhosts that don't provide a great deal of low-level access to PHP code so that installing a functional framework isn't always possible as well as for use with smaller applications that may not need all the script overhead. The idea is that this should be lean and mean while still being simple and functional.</p>
            <p>The source for this project is located on <a href="http://github.com/fskirschbaum/database_class/" target="_blank"><i class="fa fa-github-alt"></i> github</a>. Feel free to check it out, fork it, modify it, whatever you'd like. If you have some suggestions for improvements, I'm quite open to them.</p> 
          </div>
        </div>
        
        <hr>
        
        <div class="row">
          <div class="col-sm-12 text-center">
            <!-- here's where we log connection status... -->
            <p><span class="text-muted">Database connection status is: </span><?=$connectionStatus?></p>
          </div>
        </div>
        
        <hr>
        
        <div id="sCRUD" class="row">
          <div class="col-sm-6">
            <h4>sCRUD</h4>
            <p>CRUD is an acronym that means Create - Read - Update - Delete. It's a simple description of the actions relating to the typical use of a web applications.</p>
            <p>Somethimes you'll see the 's' leading CRUD as it stands for 'search'. I personally don't really follow the distinction, but to each their own.
            <p>A somewhat deeper explanation can be found on the <a href="http://en.wikipedia.org/wiki/Create,_read,_update_and_delete" target="_blank">Wikipedia entry</a>.</p>
          </div>
          <div class="col-sm-6">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Operation</th>
                  <th>SQL</th>
                  <th>HTTP</th>
                </tr>
              </thead>
            <tbody>
              <tr>
                <td>Create</td>
                <td>INSERT</td>
                <td>PUT / POST</td>
              </tr>
              <tr>
                <td>Read (Retrieve)</td>
                <td>SELECT</td>
                <td>GET</td>
              </tr>
              <tr>
                <td>Update (Modify)</td>
                <td>UPDATE</td>
                <td>PUT / PATCH</td>
              </tr>
              <tr>
                <td>Delete (Destroy)</td>
                <td>DELETE</td>
                <td>DELETE</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
        
      <hr>
        
      <div class="row">
        <div class="col-sm-2">
          <p class="text-right hidden-xs visible-sm visible-md visible-lg"><strong>Create</strong></p>
          <p class="visible-xs hidden-sm hidden-md hidden-lg"><strong>Create</strong></p>
        </div>
        <div class="col-sm-10">
          <p>Here you can add a value to the database by entering text in the box below and clicking 'Create'.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <form class="form-horizontal" role="form">
            <div class="form-group">
              <label for="createValue" class="col-sm-2 control-label">Create Value</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="insertValue" id="createValue">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-2 col-sm-offset-2">
                <button type="button" id="createSubmit" class="btn btn-primary btn-block">Create</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      
      <div class="row" id="createResults" style="display: none">
        <div class="col-sm-10 col-sm-offset-2">
          <p id="createInsert" class="alert-success"></p>
        </div>
      </div>

      <hr>
        
      <div class="row">
        <div class="col-sm-2">
          <p class="text-right hidden-xs visible-sm visible-md visible-lg"><strong>Read</strong></p>
          <p class="visible-xs hidden-sm hidden-md hidden-lg"><strong>Read</strong></p>
        </div>
        <div class="col-sm-10">
          <p>Here you can either search the database for a specific value by entering the search term in the box below and clicking 'Read Value'. Otherwise you can read everything in the database by clicking 'Read'. The values will be displayed in a table below.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <form class="form-horizontal" role="form">
            <div class="form-group">
              <label for="readValue" class="col-sm-2 control-label">Find Value</label>
              <div class="col-sm-10">
                <input type="text" name="readValue" id="readValue" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-2 col-sm-offset-2 col-margin">
                <button type="button" id="readValueSubmit" class="btn btn-primary btn-block">Read Value</button>
              </div>
              <div class="col-sm-2 col-margin">
                <button type="button" id="readSubmit" class="btn btn-primary btn-block">Read</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div id="readResults" class="row" style="display: none">
        <div class="col-sm-10 col-sm-offset-2">
          <table id="readInsert" class="table table-striped">
          </table>
        </div>
      </div>

      <hr>

      <div class="row">
        <div class="col-sm-2">
          <p class="text-right hidden-xs visible-sm visible-md visible-lg"><strong>Update</strong></p>
          <p class="visible-xs hidden-sm hidden-md hidden-lg"><strong>Update</strong></p>
        </div>
        <div class="col-sm-10">
          <p>To update an existing value in the Database, simply enter the value you want updated in 'Content to Update' and the value you want it updated to in 'Update to' and then click the 'Update' button. Be warned that this will blindly update <em>all</em> instances of that value in the database.</p>
        </div>
      </div>
      <div class="row">
        <form class="form-horizontal" role="form">
          <div class="col-sm-12">
            <div class="form-group">
              <label for="updateValue" class="col-sm-2 control-label">Update Value</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="updateValue" id="updateValue">
              </div>
            </div>
            <div class="form-group">
              <label for="updateNewValue" class="col-sm-2 control-label">Update to</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="updateNewValue" id="updateNewValue">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-2 col-sm-offset-2">
                <button type="button" class="btn btn-primary btn-block" id="updateSubmit">Update</button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="row" id="updateResults" style="display: none">
        <div class="col-sm-10 col-sm-offset-2">
          <p id="updateInsert" class="alert-success"></p>
        </div>
      </div>
      
      <hr>
        
      <div class="row">
        <div class="col-sm-2">
          <p class="text-right hidden-xs visible-sm visible-md visible-lg"><strong>Delete</strong></p>
          <p class="visible-xs hidden-sm hidden-md hidden-lg"><strong>Delete</strong></p>
        </div>
        <div class="col-sm-10">
          <p>To delete an existing value from the database, simply enter the value you want deleted in the box below and then click the 'Delete' button. Be warned that this will blindly delete <em>all</em> instances of that value in the database. If you'd like to clear the entire <span id="deleteAll">database</span> of all content you can click the first use of the word database in this sentence and then confirm when the dialog appears. This cannot be undone.</p>
        </div>
      </div>
      <div class="row">
        <form class="form-horizontal" role="form">
          <div class="col-sm-12">
            <div class="form-group">
              <label for="deleteValue" class="col-sm-2 control-label">Delete Value</label>
              <div class="col-sm-10">
                <input type="text" name="deleteValue" id="deleteValue" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-2 col-sm-offset-2">
                <button type="button" class="btn btn-primary btn-block" id="deleteSubmit">Delete</button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="row" id="deleteResults" style="display: none">
        <div class="col-sm-10 col-sm-offset-2">
          <p id="deleteInsert" class="alert-success"></p>
        </div>
      </div>
      
      <hr>
      
      <div class="row" id="contact">
        <div class="col-sm-12">
          <h4>Contact Me</h4>
          <p>Who am I? Who are you?!? Seriously, though... there are plenty of ways to get a hold of me... if you want... </p>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-xs-4"><a href="http://twitter.com/fyrephlie" target="_blank"><i class="fa fa-twitter-square fa-5x"></i></a></div>
        <div class="col-xs-4"><a href="http://github.com/fskirschbaum" target="_blank"><i class="fa fa-github-square fa-5x"></i></a></div>
        <div class="col-xs-4"><a href="http://doginflight.com/fskirschbaum/" target="_blank"><i class="fa fa-globe fa-5x"></i></a></div>
      </div>
      
      <hr>
      
      <footer>
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2 footer text-center">
            <p>All content copyright &copy; 2014 F. Stephen Kirschbaum...</p>
            <p class="text-muted">Except any code or content that doesn't already belong to me, which is copyright &copy; the respective owners of said code / content.</p>
            <p>All rights reserved.</p>
          </div>
        </div>
      </footer>

    </div><!-- /container -->

    <script src="lib/js/jquery-1.11.0.min.js"></script>
    <script src="lib/js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>

  </body>
</html>