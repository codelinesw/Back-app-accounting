<?php namespace Controllers;

class register{

	public function index()
	{
		include_once('Views/register.php');
	}

	public function register_to_complete()
	{
		include_once('Views/register_to_complete.php');
	}

	public function chosee_picture()
	{
		include_once('Views/chosee_picture.php');
	}

	public function register_()
	{	
		$name = isset($_POST['name']) ? $_POST['name'] : "";
		$email = isset($_POST['email']) ? $_POST['email'] : "";
		$pass = isset($_POST['pass']) ? $_POST['pass'] : "";
		$created = date('y-m-d h:mm:ss');
		$update = date('y-m-d h:mm:ss');

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
			echo "The information has been saved";
		}

	}

}



 ?>