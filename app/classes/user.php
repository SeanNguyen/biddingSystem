<?php
include('password.php');
class User extends Password{

    private $_db;

    function __construct($db){
    	parent::__construct();
    
    	$this->_db = $db;
    }

	private function get_user_password($username){	

		try {
			$stmt = $this->_db->prepare('SELECT password FROM student WHERE matric = :username');
			$stmt->execute(array('username' => $username));
			
			$row = $stmt->fetch();
			return $row['password'];

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}

	public function login($username,$password){

		$correctPassword = $this->get_user_password($username);
		
		if($this->password_verify($password,$correctPassword)){
		    
		    $_SESSION['loggedin'] = true;
		    $_SESSION['userType'] = 'student';
			$_SESSION['username'] = $username;
			
		    return true;
		} 	
	}
		
	public function logout(){
		session_destroy();
	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['userType'] == 'student'){
			return true;
		}		
	}
	
}


?>