<?php namespace Controllers; 

require('Models/Clients.php');

use Models\Clients as Clients;


class clients_{

	private $Clients;

	public function __construct(){

		$this->Clients = new Clients();
	}

	public function index()
	{
		include_once('Views/borrower.php');
	}

	public function validate_fields($name,$address,$phone){
		if(empty($name) && empty($address) && empty($phone)){
			return false;
		}else if(empty($name)){
			return false;
		}else if(empty($address)){
			return false;
		}else if(empty($phone)){
			return false;
		}else{
			return true;
		}
	}

	public function setData($value,$name,$address,$phone,$id_rol,$c_client_id){
	  $this->Clients->set("c_value",$value);
	  $this->Clients->set("c_name",$name);
	  $this->Clients->set("c_address",$address);
	  $this->Clients->set("c_phone",$phone);
	  $this->Clients->set("ad_role_id",$id_rol);
	  $this->Clients->set("c_client_id",$c_client_id);
	}

	public function add()
	{
		// Getting the received JSON into $Received_JSON variable.
 		$Received_JSON = file_get_contents('php://input');
 
 		// decoding the received JSON and store into $obj variable.
 		$request = json_decode($Received_JSON,true);

		$value = 212223;
		$name = isset($request['c_name']) ? $request['c_name'] : '';
		$address = isset($request['c_address']) ? $request['c_address'] : '';
		$phone = isset($request['c_phone']) ? $request['c_phone'] : '';
		$id_rol = 2;

		if($this->validate_fields($name,$address,$phone)){
			$this->setData($value,$name,$address,$phone,$id_rol,0);
			if($this->Clients->add()){
				echo 'ok';
			}else{
				echo 'failed';
			}
		}else{
			echo json_encode(array(array('response' => 'empty')));
		}
		
	}

	public function list(){
	   // Getting the received JSON into $Received_JSON variable.
 	   echo $this->Clients->list();
	}

	public function listar_old(){
		echo $this->Clients->list_old();
	}

	public function update(){
		// Getting the received JSON into $Received_JSON variable.
 		$Received_JSON = file_get_contents('php://input');
 		// decoding the received JSON and store into $obj variable.
 		$request = json_decode($Received_JSON,true);
		$name = isset($request['c_name']) ? $request['c_name'] : '';
		$address = isset($request['c_address']) ? $request['c_address'] : '';
		$phone = isset($request['c_phone']) ? $request['c_phone'] : '';
		$c_client_id = isset($request['c_client_id']) ? $request['c_client_id'] : '';

		if($this->validate_fields($name,$address,$phone)){
			$this->setData(0,$name,$address,$phone,0,$c_client_id);
			if($this->Clients->update()){
				echo 'ok';
			}else{
				echo 'failed';
			}
		}else{
			echo 'empty';
		}

	}

	public function delete(){
		// Getting the received JSON into $Received_JSON variable.
 		$Received_JSON = file_get_contents('php://input');
 		// decoding the received JSON and store into $obj variable.
 		$request = json_decode($Received_JSON,true);
		$c_client_id = isset($request['c_client_id']) ? $request['c_client_id'] : '';

		if(!empty($c_client_id)){
			$this->setData(0,0,0,0,0,$c_client_id);
			if($this->Clients->delete()){
				echo 'ok';
			}else{
				echo 'failed';
			}
		}else{
			echo 'empty';
		}

	}
}



 ?>