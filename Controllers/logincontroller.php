<?php namespace Controllers;

class login{

	public function index(){
		include_once('Views/login.php');
	}

	public function invertString($string){
		return strrev($string);
	}

	public function removeQuotation($string){
		return str_replace("'", "", $string);
	}

	public function hashString($cadena){
		$def__pass = password_hash($cadena, PASSWORD_DEFAULT);
		return $def__pass;
	}

	public function sign_in(){
		$user = isset($_POST['user']) ? $_POST['user'] : "";
		$pass = isset($_POST['pass']) ? $_POST['pass'] : "";

		if (!empty($usuario) && !empty($pass)) 
		{
			$usuario = filter_var(trim(strip_tags($usuario)), FILTER_SANITIZE_STRING);
			$pass = filter_var(trim(strip_tags($pass)), FILTER_SANITIZE_STRING);

			$response = $this->Main->validateLogin($username);
			
			if(response != "failed" || !isset($response))
			{	
				$hash = $response['u_password'];
				$password = $this->invertString($pass);
				if(password_verify($password,$hash))
				{
					session_start();
					$_SESSION['name'] = $response['name_user'];
					$_SESSION['user'] = $response['u_username'];
					$_SESSION['picture'] = $response['picture_'];
					$_SESSION['id_user'] = $response['id_user'];

				}else{
					echo "failed";
				}
			}else{
				echo "failed";
			}				
			

		}
	}



}

 ?>