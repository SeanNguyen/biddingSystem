<?php
require('includes/config.php'); 
$code = $_REQUEST['code'];
$bid = $_REQUEST['bid'];
$action = $_REQUEST['action'];
$matric = $_SESSION['username'];

switch ($action) {
    case 'add_new_module':
        add_new_module($code, $bid, $matric);
        break;
}

function add_new_module($code, $bid, $matric) {
    $conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
                // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }   

    // No. of Bidders
    $moduleNumSQL = "SELECT b.matric FROM bid b WHERE b.module_code = '" .$code. "'";
    $numBidders = mysqli_num_rows(mysqli_query($conn, $moduleNumSQL));
    // Vacancies
    $quotaSQL = "SELECT q.quota FROM has_quota q WHERE q.module_code = '" .$code. "'";
    $quotaRes = mysqli_query($conn, $quotaSQL);
    $quota = mysqli_fetch_assoc($quotaRes); //todo: take into account faculty
    $vacancies = $quota["quota"] - $numBidders;                      
    if ($vacancies < 0) {
        $vacancies = 0;
    }

    if ($vacancies == 0){
        echo "There is no quota left for module {$code}";
        exit;
    }      

    $stmt = "select * from bid where matric='{$matric}' and module_code='{$code}'";
    $result = mysqli_query($conn, $stmt);
    if (mysqli_num_rows($result) > 0){
        echo "You have already bid on {$code}";
        exit;
    }

    $stmt = "select point from student where matric='{$matric}'";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $stmt)); 
    if ($row['point'] < $bid){
        echo "You do not have enough points to bid on {$code}";
        exit;
    }  

    $stmt = "insert into bid values ('{$_SESSION['username']}', '{$code}', 1, $bid)";
    //echo $stmt . "\n";
    $result = mysqli_query($conn, $stmt);

    //update user point
    $stmt = "update student set bid=bid-{$bid} where matric='{$matric}'";
    //echo $stmt . "\n";
    $result = mysqli_query($conn, $stmt);

    echo "Succesfully bid on module {code}";
    exit;
}

?>