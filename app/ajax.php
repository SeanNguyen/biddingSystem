<?php
require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: index.php'); } 
header('Location: index.php');

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'add_new_module':
            $code = $_POST['code'];
            $bid = $_POST['bid'];
            
            add_new_module($code, $bid);
            break;
    }
}


function add_new_module($code, $bid) {
    $conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
                // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }   
    $stmt = "insert into bid values ('{$_SESSION['username']}', '{$code}', 1, $bid)";
    $result = mysqli_query($conn, $stmt);
    exit;
}


?>