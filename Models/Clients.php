<?php namespace Models;

require('Connection.php');

class Clients{

	private $connection;
	private $c_client_id;
	private $c_value;
	private $c_name;
	private $c_address;
	private $c_phone;
	private $ad_role_id;
	

	public function __construct(){

		$this->connection = new Connection();

	}

	public function set($attr,$value){
		$this->$attr = $value;
	}


	public function get($attr){
		return $this->$attr;
	}

	public function add()
	{
		$sql = 'INSERT INTO c_clients VALUES(NULL,:value,:name,:address,:phone,:id_role,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)';
		$query = $this->connection->_prepare_($sql);
		$query->bindParam(':value',$this->c_value,\PDO::PARAM_INT);
		$query->bindParam(':name',$this->c_name,\PDO::PARAM_STR);
		$query->bindParam(':address',$this->c_address,\PDO::PARAM_STR);
		$query->bindParam(':phone',$this->c_phone,\PDO::PARAM_INT);
		$query->bindParam(':id_role',$this->ad_role_id,\PDO::PARAM_INT);
		$query->execute();
		if($query){
			if($query->rowCount() > 0)
			{
				return true;
			}else{
				return false;
			}
		}

	}


	public function list()
	{

		$sql = 'SELECT * FROM c_clients ORDER BY c_date DESC';
		$query = $this->connection->_prepare_($sql);
		$query->execute();

		if($query){
			if($query->rowCount() > 0){
				return json_encode($query->fetchAll(\PDO::FETCH_ASSOC));

			}else{
				return json_encode(array(array('response' => 'empty')));
			}
		}			
	}

	public function list_old(){
		$sql = 'SELECT * FROM c_clients ORDER BY c_date ASC';
		$query = $this->connection->_prepare_($sql);
		$query->execute();

		if($query){
			if($query->rowCount() > 0){
				return json_encode($query->fetchAll(\PDO::FETCH_ASSOC));

			}
		}
	}

	public function list_id()
	{

	}

	public function update()
	{
		$sql = 'UPDATE c_clients 
		SET c_name=:c_name,c_address=:c_address,c_phone=:c_phone
		WHERE c_client_id =:c_client_id';

		$query = $this->connection->_prepare_($sql);
		$query->bindParam(':c_name',$this->c_name,\PDO::PARAM_STR);
		$query->bindParam(':c_address',$this->c_address,\PDO::PARAM_STR);
		$query->bindParam(':c_phone',$this->c_phone,\PDO::PARAM_INT);
		$query->bindParam(':c_client_id',$this->c_client_id,\PDO::PARAM_INT);
		$query->execute();
		

		if($query){
			if($query->rowCount() > 0){
				return true;
			}else{
				return false;
			}
		}
	}


	public function delete()
	{
		$sql = 'DELETE  FROM c_clients WHERE c_client_id =:c_client_id';
		$query = $this->connection->_prepare_($sql);
		$query->bindParam(':c_client_id',$this->c_client_id,\PDO::PARAM_INT);
		$query->execute();

		if($query){
			if($query->rowCount() > 0){
				return true;
			}else{
				return false;
			}
		}
	}

	
}



 ?>