<?php namespace Controllers; 

require('Models/mborrower.php');

use Models\mborrower as mborrower;


class borrower{

	private $borrower;

	public function __construct(){

		$this->borrower = new mborrower();
	}

	public function index()
	{
		include_once('Views/borrower.php');
	}

	public function profile()
	{
		include_once('Views/profile/profile.php');
	}

	public function register_to_complete()
	{
		include_once('Views/register_to_complete.php');
	}


	public function choose_picture()
	{
		include_once('Views/choose_picture.php');
	}

	public function invertString($string){
		return "24de".strrev($string)."Cadames24";
	}

	public function removeQuotation($string){
		return str_replace("'", "", $string);
	}

	public function hashString($cadena){
		$def__pass = password_hash($cadena, PASSWORD_DEFAULT);
		return $def__pass;
	}

	public function register_()
	{
		$name = isset($_POST['name']) ? $_POST['name'] : "";
		$email = isset($_POST['email']) ? $_POST['email'] : "";
		$pass = isset($_POST['pass']) ? $this->hashString($this->invertString($this->removeQuotation($_POST['pass']))) : "";
		$created = date('Y-m-d H:i:s');
		$update = date('Y-m-d H:i:s');

		if(empty($name) && empty($email) && empty($pass))
		{
			echo "false";
		}else if(empty($name))
		{
			echo "false";
		}else if(empty($email))
		{
			echo "false";
		}else if(empty($pass))
		{
			echo "false";
		}else{
			$this->borrower->set("name",$name);
			$this->borrower->set("email",$email);
			$this->borrower->set("password",$pass);
			$this->borrower->set("created",$created);
			$this->borrower->set("updated",$update);
			$this->borrower->set("id_rol",2);
			if($this->borrower->signup() == "true")
			{
				setcookie('email_user', $email,time()+1800,'/','localhost');
				echo json_encode(array('action' =>  'true','URL' => 'http://localhost:8089/website-testing/borrower/register_to_complete/'));
			}else{
				echo "failed";
			}
		}
	}

	public function register_complete_one()
	{
		if(isset($_COOKIE['email_user']))
		{
			$email = isset($_COOKIE['email_user']) ? $_COOKIE['email_user'] : "";
			$this->borrower->set('email',$email);
			$data = $this->borrower->list_for_email();
			$id_user = ($data['id'] > 0 || $data != undefined || !empty($data)) ? $data['id'] : 0;
			$value = isset($_POST['value']) ? $_POST['value'] : '';
			$birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : '';
			$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
			$city = isset($_POST['city']) ? $_POST['city'] : '';
			$neigh = isset($_POST['neigh']) ? $_POST['neigh'] : '';
			$number_phone = isset($_POST['number_phone']) ? $_POST['number_phone'] : '';

			if(empty($id_user) && empty($value) && empty($birthdate) && empty($gender) && empty($city) && empty($neigh) && empty($number_phone))
			{
				echo "false";
			}else if(empty($id_user) || $id_user == 0)
			{
				echo "false";
			}else if(empty($value))
			{
				echo "false";
			}else if(empty($birthdate))
			{
				echo "false";
			}else if(empty($gender))
			{
				echo "false";
			}else if(empty($city))
			{
				echo "false";
			}else if(empty($neigh))
			{
				echo "false";
			}else if(empty($number_phone))
			{
				echo "false";
			}else{
				$picture_default = 'doggy_avatar.svg';
				$status_default = 2;
				$id_uprofile = 1;
				$this->borrower->set("id_user",$id_user);
				$this->borrower->set("value",$value);
				$this->borrower->set("birthdate",$birthdate);
				$this->borrower->set("gender",$gender);
				$this->borrower->set("city",$city);
				$this->borrower->set("neigh_service",$neigh);
				$this->borrower->set("phone",$number_phone);
				$this->borrower->set("picture",$picture_default);
				$this->borrower->set("status",$status_default);
				$this->borrower->set("id_uprofile",$id_uprofile);
				
				if($this->borrower->signup_to_complete() == "true")
				{
					setcookie('email_user', $email,time()+1800,'/','localhost');
					echo json_encode(array('action' =>  'true','URL' => 'http://localhost:8089/website-testing/register/choose_picture/'));
				}else{
					echo "failed";
				}
			}

		}
	}
}



 ?>