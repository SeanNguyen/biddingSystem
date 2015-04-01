<?php require('includes/config.php'); 

//if logged in redirect to members page
if( $user->is_logged_in() ){ header('Location: memberpage.php'); } 

$stmt = $db->prepare('SELECT resetToken, resetComplete FROM student WHERE resetToken = :token');
$stmt->execute(array(':token' => $_GET['key']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

//if no token from db then kill the page
if(empty($row['resetToken'])){
	$stop = 'Invalid token provided, please use the link provided in the reset email.';
} elseif($row['resetComplete'] == 'Yes') {
	$stop = 'Your password has already been changed!';
}

//if form has been submitted process it
if(isset($_POST['submit'])){

	//basic validation

    if($_POST['password'] != $_POST['passwordConfirm']){
        $error[] = 'Passwords do not match.';
    }

	if(strlen($_POST['password']) < 5){
		$error[] = 'Password is too short.';
	}

	if(strlen($_POST['passwordConfirm']) < 5){
		$error[] = 'Confirm password is too short.';
	}

	//if no errors have been created carry on
	if(!isset($error)){

		try {

			$stmt = $db->prepare("UPDATE student SET password = :password, resetComplete = 'Yes'  WHERE resetToken = :token");
			$stmt->execute(array(
				':password' => $_POST['password'],
				':token' => $row['resetToken']
			));

			//redirect to index page
			header('Location: index.php?action=resetAccount');
			exit;

		//else catch the exception and show the error.
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}

	}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Bidding System</title>
    <!-- build:css(.) _/css/vendor.css -->
    <!-- bower:css -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css" />
    <!-- endbower -->
    <!-- endbuild -->
</head>

<body>

	<nav class="navbar navbar-inverse">
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
            <a href='index.php'><button type="button" class="btn btn-default navbar-btn" id="signOutButton">Sign In</button></a>
        </ul>
        </div>
      </div>
    </nav>

    <div class="container">
    
        <div class="row">
    
            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    
    
                <?php if(isset($stop)){
    
                    echo "<p class='bg-danger'>$stop</p>";
    
                } else { ?>
    
                    <form role="form" method="post" action="" autocomplete="off">
                        <h2>Change Password</h2>
                        <hr>
    
                        <?php
                        //check for any errors
                        if(isset($error)){
                            foreach($error as $error){
                                echo '<p class="bg-danger">'.$error.'</p>';
                            }
                        }
                        ?>
    
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="1">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg" placeholder="Confirm Password" tabindex="1">
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        <div class="row">
                            <div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Change Password" class="btn btn-primary btn-block btn-lg" tabindex="3"></div>
                        </div>
                    </form>
    
                <?php } ?>
            </div>
        </div>
    
    </div>
</body>
</html>