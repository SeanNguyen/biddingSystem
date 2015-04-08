<?php require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: index.php'); } 
?>

<html lang="en"><script type="text/javascript">window["_gaUserPrefs"] = { ioo : function() { return true; } }</script><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Modules Selection</title>

    <!-- build:css(.) _/css/vendor.css -->
    <!-- bower:css -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css" />
    <!-- endbower -->
    <!-- endbuild -->
    <!-- build:css(.) _/css/bidding_mgt.css -->
    <link rel="stylesheet" href="styles/module_selection.css">
    <!-- endbuild -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <style type="text/css"></style></head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">NUS Centralised Online Registration System</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
            <a href='logout.php'><button type="button" class="btn btn-default navbar-btn" id="signOutButton">Sign Out</button></a>
        </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="#">Home</a></li>
            <li class="active"><a href="#">Modules Selection<span class="sr-only">(current)</span></a></li>
            <li><a href="bidding_mgt.php">Bidding Management </a></li>
            <li><a href="timetable.php">Current Timetable</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Modules Selection</h1>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <td>
                  <div id="cur_round"><b>Academic Year </b>2014/2015 Semester 2 </div>
                </td>
              </tr>
            </table>
          </div>
          <div class="table-responsive">
          <div id="table-wrapper">
            <div id="table-scroll">
            <table class="table table-striped">
            <!--<thead>
            <<tr>
            <th><span class="text">A</span></th>
            <th><span class="text">B</span></th>
            <th><span class="text">C</span></th>
            </tr>
            </thead>-->
            <tbody>
            <tr> <td>EG2604</td> <td>Innovation Programme</td> </tr>
            <tr> <td>CS2103</td> <td>Software Engineering</td> </tr>
            <tr> <td>MA1506</td> <td>Mathematics I</td> </tr>
            <tr> <td>CG2271</td> <td>Real-time Operating Systems</td> </tr>
            <tr> <td>ACC1001X</td> <td>Accounting</td> </tr>
            <tr> <td>GEK1002</td> <td>Introduction to Japanese Studies</td> </tr>
            <tr> <td>PC1432</td> <td>Physics IE</td> </tr>
            <tr> <td>ME2334</td> <td>Fluid Mechanics</td> </tr>
            <tr> <td>PC1109</td> <td>Understanding Our Universe</td> </tr>
            <tr> <td>EG2604</td> <td>Innovation Programme</td> </tr>
            <tr> <td>EG2604</td> <td>Innovation Programme</td> </tr>
            <tr> <td>EG2604</td> <td>Innovation Programme</td> </tr>
            <tr> <td>EG2604</td> <td>Innovation Programme</td> </tr>
            <tr> <td>EG2604</td> <td>Innovation Programme</td> </tr>
            <tr> <td>EG2604</td> <td>Innovation Programme</td> </tr>
            <tr> <td>EG2604</td> <td>Innovation Programme</td> </tr>
            <tr> <td>EG2604</td> <td>Innovation Programme</td> </tr>
            <tr> <td>EG2604</td> <td>Innovation Programme</td> </tr>                                                                                    
            <tr> <td>
            </tbody>
            </table>
            </div>
          </div>
          </div>
          <button type='submit' class='btn btn-default'>Add selected module</button>          
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 200 200" preserveAspectRatio="none" style="visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs></defs><text x="0" y="10" style="font-weight:bold;font-size:10pt;font-family:Arial, Helvetica, Open Sans, sans-serif;dominant-baseline:middle">200x200</text></svg></body></html>