<?php 
  require('includes/config.php'); 

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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
            <li><a href="module_selection.php">Modules Selection</a></li>
            <li class="active"><a href="#">Bidding Management <span class="sr-only">(current)</span></a></li>
            <li><a href="timetable.php">Current Timetable</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Bidding Management</h1>
          <div class="table-responsive">
            <table class="table">
              <tr>
                <td>
                  <div id="end_time"><b>End Time of Round: </b>23 Jun 2015 17:52</div>
                </td>
              </tr>

              <tr>
                <td>
                  <div id="p_acc"><b>Account Points: </b>1850 </div>
                </td>
              </tr>
              <tr>
                <td>
                <div><b>Matriculation Number: </b>
                  <span id="display-matric">
                    <?php
                      //User token
                      $matric = $_SESSION['username'];
                      echo $matric;
                    ?>
                  </span>
                </div>
              </td>
              </tr>
            </table>
          </div>

          <h2 class="sub-header">Modules Available in Current Round: </h2>
          <h5>Note: Please enter 0 if you want to retract a bid. </h5>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Module</th>
                  <th>Vacancy</th>
                  <th>Highest / Lowest Bid Point</th>
                  <th>No. of Bidders</th>
                  <th>Next Minimum Bid</th>
                  <th>Your Bid</th>
                  <th>Bid Status</th>
                  <th>Place Bid</th>
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
                $matric = $_SESSION['username'];                      
                $result = mysqli_query($conn, "SELECT * FROM bid b WHERE b.matric = '".$matric."'");
                //$result = mysqli_query($conn, "SELECT * FROM bid b WHERE b.matric = 'A0123546Y'");

                if (mysqli_num_rows($result) > 0) {
                    // output data of each module
                    while($row = mysqli_fetch_assoc($result)) {
                      // Module
                      $curMod = $row["module_code"];

                      // No. of Bidders
                      $moduleNumSQL = "SELECT b.matric FROM bid b WHERE b.module_code = '" .$curMod. "'";
                      $numBidders = mysqli_num_rows(mysqli_query($conn, $moduleNumSQL));
                      // Highest Bid Point
                      $maxSQL = "SELECT MAX(b.bidPoint) As hbp FROM bid b WHERE b.module_code = '" .$curMod. "'";
                      $maxRes = mysqli_query($conn, $maxSQL);
                      $max = mysqli_fetch_assoc($maxRes);

                      // Lowest Bid Point
                      $minSQL = "SELECT MIN(b.bidPoint) As lbp FROM bid b WHERE b.module_code = '" .$curMod. "'";
                      $minRes = mysqli_query($conn, $minSQL);
                      $min = mysqli_fetch_assoc($minRes);

                      // Vacancies
                      $quotaSQL = "SELECT q.quota FROM has_quota q WHERE q.module_code = '" .$curMod. "'";
                      $quotaRes = mysqli_query($conn, $quotaSQL);
                      $quota = mysqli_fetch_assoc($quotaRes); //todo: take into account faculty
                      $vacancies = $quota["quota"] - $numBidders;                      
                      if ($vacancies < 0) {
                        $vacancies = 0;
                      }

                      // Next Minimum bid 
                      // This is the lowest successful bidder + 1, if quota all filled.
                      $nextMinBid = 1;
                      if ($vacancies < 0) { 
                        $bidPtsSQL = "SELECT b.bidPoint FROM bid b WHERE b.module_code = '" .$curMod. "' ORDER BY b.bidPoint DESC";
                        $bidPtsRes = mysqli_query($conn, $bidPtsSQL);

                        $counter = 0;
                        while($bidPts = mysqli_fetch_assoc($bidPtsRes)) {
                          $counter++;
                          if ($counter == $quota) {
                            $nextMinBid = $bidPts["bidPoint"] + 1;
                            break;
                          }
                        }
                      }

                      echo "<tr>";
                      echo "<td class='mod-code'>" . $curMod . "</td>";
                      echo "<td>" .$vacancies. "</td>";
                      echo "<td>" . $max["hbp"]. "/" . $min["lbp"]. "</td>";
                      echo "<td>" .$numBidders. "</td>";
                      echo "<td>" .$nextMinBid. "</td>";
                      echo "<td><form class='form-inline'><div class='form-group'>";
                      echo "<input type='text' class='form-control' value='" .$row["bidPoint"]. "'>";
                      echo "</div></form></td>";
                      echo "<td>Accepted</td>";

                      echo "<td><button type='submit' class='btn btn-default submit-bid'>Bid</button></td>";
                      echo "</tr>";                        
                }
                } else {
                    //echo "0 results";
                }

                mysqli_close($conn);
                ?>
                <script type="text/javascript">
                var newBid, mod, matricNo;
                  $(".submit-bid").click(function() {
                  var row = $(this).closest("tr");    // Find the row
                  newBid = row.find('.form-control').val(); // Find the text
                  mod = row.find('.mod-code').text();
                  matricNo = $('#display-matric').text();

                  $.ajax({
                      url: "receive_data.php",
                      type: "POST",
                      async: true, 
                      data: { message: newBid,
                              matric: matricNo,
                              code: mod }, //your form data to post goes here as a json object
                      dataType: "html",

                      success: function(data) {
                          console.log("post success \n" + data);  
                      },
                      error: function(XMLHttpRequest, textStatus, errorThrown)  {
                          console.log("Status: " + textStatus);
                          //console.log("Error: " + errorThrown); 
                      }
                  });                  
                });
                

                </script>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

<svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 200 200" preserveAspectRatio="none" style="visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs></defs><text x="0" y="10" style="font-weight:bold;font-size:10pt;font-family:Arial, Helvetica, Open Sans, sans-serif;dominant-baseline:middle">200x200</text></svg></body></html>