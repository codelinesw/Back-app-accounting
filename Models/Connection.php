<?php namespace Models;

class Connection{
	
	private $host = "localhost;";
	private $user = "root";
	private $pass = "";
	private $database = "accounting";
	private $connection_;

	public function __construct()
	{
		$this->connection_ = new \PDO("mysql:host=".$this->host."dbname=".$this->database,$this->user,$this->pass);
		
	}

	public function _prepare_($sql){
		if($this->connection_){
			$data = $this->connection_->prepare($sql);
			return $data;	
		}
		
	}

	public function proteccion($text){
		if($this->connection_){
			$string = $this->connection_->quote($text);
			return $string;
		}
	}
}



 ?>