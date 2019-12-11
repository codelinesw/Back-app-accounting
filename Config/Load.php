<?php namespace Config;

class Load{

	public function loading($controller,$action,$parameter)
	{

		$controller = isset($controller) ? $controller : "index";

		$file = 'Controllers/'.$controller.'controller.php';


		$controllers= array(
			'index' => ['index'],
			'login' => ['index','sign_in','update', 'delete'],
			'user_profile_choice' => ['index'],
			'register' => ['index','register_','register_to_complete','register_complete_one','choose_picture','profile'],
			'borrower' => ['index','register_','register_to_complete','register_complete_one','choose_picture','upload_picture','profile'],
			'portal' => ['index'],
			'cuidadores' => ['index'],
			'calendar' => ['index']
		);
		
		if(!file_exists($file)){
			echo "Este archivo no existe";
		}else{
			if(array_key_exists($controller, $controllers))
			{
				require_once($file);
				$action = isset($action) ? $action : "";
				if(in_array($action, $controllers[$controller])){
					$con = "Controllers\\".$controller;
					$object = new $con;
					if(isset($parameter)){
						call_user_func(array($object,$action),$parameter);
					}else{
						call_user_func(array($object,"index"));
					}
				}else{
					$con = "Controllers\\".$controller;
					$object = new $con;
					call_user_func(array($object,"index"));
					
				}
			}else{
				echo "No existe el controlador";
			}
		}
	}
}



 ?>