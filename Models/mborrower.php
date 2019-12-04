<?php namespace Models;

require('Connection.php');

class mborrower{

	private $connection;
	private $id_user;
	private $name;
	private $email;
	private $password;
	private $value;
	private $gender;
	private $city;
	private $neigh_service;
	private $phone;
	private $picture;
	private $status;
	private $id_rol;
	private $id_uprofile;
	private $created;
	private $updated;

	public function __construct(){

		$this->connection = new Connection();

	}

	public function set($attr,$value){
		$this->$attr = $value;
	}


	public function get($attr){
		return $this->$attr;
	}

	public function signup()
	{
		$sql = 'INSERT INTO u_users VALUES(NULL,:name,:email,:password,:created,:updated,:id_rol)';
		$query = $this->connection->_prepare_($sql);
		$query->bindParam(':name',$this->name,\PDO::PARAM_STR);
		$query->bindParam(':email',$this->email,\PDO::PARAM_STR);
		$query->bindParam(':password',$this->password,\PDO::PARAM_STR);
		$query->bindParam(':created',$this->created,\PDO::PARAM_STR);
		$query->bindParam(':updated',$this->updated,\PDO::PARAM_STR);
		$query->bindParam(':id_rol',$this->id_rol,\PDO::PARAM_INT);
		$query->execute();

		if($query){
			if($query->rowCount() > 0)
			{
				return "true";
			}else{
				return "false";
			}
		}

	}


	public function list()
	{
		$sql = 'SELECT * FROM u_users us 
				INNER JOIN u_users_info usi ON usi.id_user = us.id_user
				INNER JOIN u_profile up ON upid = usi.id_u_profile';

		$query = $this->connection->_prepare_($sql);
		$query->execute();

		if($query){
			if($query->rowCount() > 0){
				return $query->fetch_array();
			}
		}			
	}

	public function list_id()
	{

	}

	public function update()
	{

	}

	public function delete()
	{

	}

	public function change_password()
	{

	}
}



 ?>