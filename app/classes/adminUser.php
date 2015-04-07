<?php
class AdminUser {
	public function login($username,$password){
		if($username == 'admin' && $password == 'admin') {
		    
			$_SESSION['loggedin'] = true;
			$_SESSION['userType'] = "admin";
			$_SESSION['username'] = $username;
			
			return true;
		} 	
	}
		
	public function logout(){
		session_destroy();
	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['userType'] == 'admin'){
			return true;
		}		
	}
	
}


?>