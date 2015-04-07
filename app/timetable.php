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

    <title>Bidding Management</title>

    <!-- build:css(.) _/css/vendor.css -->
    <!-- bower:css -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css" />
    <!-- endbower -->
    <!-- endbuild -->
    <!-- build:css(.) _/css/bidding_mgt.css -->
    <link rel="stylesheet" href="styles/bidding_mgt.css">
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
            <li><a href="#">Modules Selection</a></li>
            <li><a href=" bidding_mgt.php">Bidding Management <span class="sr-only">(current)</span></a></li>
            <li class="active"><a href="timetable.php">Current Timetable <span class="sr-only">(current)</span></a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Timetable</h1>
          <div class="table-responsive">
            <h3> Secured Modules </h5>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Code Name</th>
                  <th>Time Slots</th>
                  <th>No. of Students</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  // Create connection
                  $conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
                  // Check connection
                  if (!$conn) {
                      die("Connection failed: " . mysqli_connect_error());
                  }

                  //$result = mysqli_query($conn, "SELECT * FROM take t WHERE t.matric = '{$_SESSION['username']}'");
                  $result = mysqli_query($conn, "SELECT m.* FROM take t, module m WHERE 
                                                  t.module_code = m.module_code AND
                                                  t.slotID = m.slotID AND
                                                  t.matric = 'A0156156L'");
                  if (mysqli_num_rows($result) > 0) {
                    // check conflict
                    $numRes = mysqli_num_rows($result);
                    $moduleList = array();
                    $conflictList = array();
                    while($row = mysqli_fetch_assoc($result)) {
                      $moduleList[] = $row;
                    }                  

                    foreach ($moduleList as $key1=>$row1){
                       foreach ($moduleList as $key2=>$row2){
                          //continue if they are the same row
                          if ($row1["module_code"] == $row2["module_code"] &&
                              $row1["slotID"] == $row2["slotID"]){
                            continue;
                          }
                          $startTime1 = DateTime::createFromFormat('H:i:s', $row1["start_time"]);
                          $endTime1 = DateTime::createFromFormat('H:i:s', $row1["end_time"]);
                          $startTime2 = DateTime::createFromFormat('H:i:s', $row2["start_time"]);
                          $endTime2 = DateTime::createFromFormat('H:i:s', $row2["end_time"]);    
                          
                          if ($row1["weekday"] == $row2["weekday"] &&
                              ($startTime1 < $endTime2 && $startTime2 < $endTime1)){
                            $conflictList[$key1] = true;
                            $conflictList[$key2] = true;
                            echo $row1["module_code"];
                          }
                       }
                      
                    }
                    // output data of each module

                    foreach ($moduleList as $key1=>$row){
                      //Module code and slot ID
                      $curMod = $row["module_code"];
                      $slotID = $row["slotID"];
                      $conflictIndicator = "";
                      if (array_key_exists($key1, $conflictList)){
                         $conflictIndicator = "class='danger'";
                      }
                      $numStuSQL = "SELECT * FROM take t WHERE t.module_code='{$curMod}' AND t.slotID={$slotID}";
                      $numStu = mysqli_num_rows(mysqli_query($conn, $numStuSQL));
                      
                      echo "<tr {$conflictIndicator}>";
                      echo "<td>{$row["name"]}</td>";
                      echo "<td>{$row["module_code"]}</td>";
                      echo "<td>{$row["weekday"]}, {$row["start_time"]} - {$row["end_time"]}";
                      echo "<td>{$numStu}</td>";
                      echo "</tr>";
                    }
                  }
                ?>          
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 200 200" preserveAspectRatio="none" style="visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs></defs><text x="0" y="10" style="font-weight:bold;font-size:10pt;font-family:Arial, Helvetica, Open Sans, sans-serif;dominant-baseline:middle">200x200</text></svg></body></html>