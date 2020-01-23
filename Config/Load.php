<?php namespace Config;

class Load{

	public function loading($controller,$action,$parameter)
	{

		$controller = isset($controller) ? $controller : "index";

		$file = 'Controllers/'.$controller.'controller.php';

		$controllers= array(
			'index' => ['index'],
			'clients_' => ['index','add','list','update', 'delete','listar_prueba'],
			'sales_' => ['add','list','list_for_client','list_id'],
			'payment_product' => ['add','list']
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