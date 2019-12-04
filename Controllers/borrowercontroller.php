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
			return "false";
		}else if(empty($name))
		{
			return "false";
		}else if(empty($email))
		{
			return "false";
		}else if(empty($pass))
		{
			return "false";
		}else{
			$this->borrower->set("name",$name);
			$this->borrower->set("email",$email);
			$this->borrower->set("password",$pass);
			$this->borrower->set("created",$created);
			$this->borrower->set("updated",$update);
			$this->borrower->set("id_rol",2);
			echo $this->borrower->signup();
		}
	}
}



 ?>