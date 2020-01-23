<?php namespace Controllers; 

require('Models/Sales.php');

use Models\Sales as Sales;

class sales_{

	private $Sales;

	public function __construct(){

		$this->Sales = new Sales();
	}

	public function validate_fields($p_product_id,$c_client_id,$s_price,$s_count,$s_sale_date){
		if(empty($p_product_id) && empty($c_client_id) && empty($s_sale_date)){
		  return false;
		}else if(empty($p_product_id)){
		  return false;
		}else if(empty($c_client_id)){
		  return false;
		}else if($s_price == 0 || empty($s_price)){
		  return false;
		}else if($s_count == 0 || empty($s_count)){
		  return false;
		}else if(empty($s_sale_date)){
		  return false;
		}else{
			return true;
		}
	}

	public function setData($p_product_id,$c_client_id,$s_description,$s_price,$s_count,$s_sales_id,$s_sale_date){

		$this->Sales->set("p_product_id",$p_product_id);
		$this->Sales->set("c_client_id",$c_client_id);
		$this->Sales->set("s_description",$s_description);
		$this->Sales->set("s_price",$s_price);
		$this->Sales->set("s_count",$s_count);
		$this->Sales->set("s_sale_date",$s_sale_date);
		$this->Sales->set("c_sales_id",$s_sales_id);
	}
	
	public function add()
	{
		// Getting the received JSON into $Received_JSON variable.
 		$Received_JSON = file_get_contents('php://input');
 
 		// decoding the received JSON and store into $obj variable.
 		$request = json_decode($Received_JSON,true);

		$p_product_id = isset($request['p_product_id']) ? $request['p_product_id'] : '';
		$c_client_id = isset($request['c_client_id']) ? $request['c_client_id'] : '';
		$s_description = isset($request['s_description']) ? $request['s_description'] : 'Venta de';
		$s_price = isset($request['s_price']) ? str_replace('.','',$request['s_price']) : 0;
		$s_count = isset($request['s_count']) ? $request['s_count'] : 0;
		$s_sale_date = isset($request['s_sale_date']) ? $request['s_sale_date'] : '';

		if($this->validate_fields($p_product_id,$c_client_id,0,$s_sale_date)){
			$this->setData($p_product_id,$c_client_id,$s_description,$s_price,$s_count,0,$s_sale_date);
			if($this->Sales->add()){
				echo json_encode(array(array('response' => 'ok')));
			}else{
				echo json_encode(array(array('response' => 'failed')));
			}
		}else{
		  echo json_encode(array(array('response' => 'empty')));
		}
		
	}

	public function list(){
	  echo $this->Sales->list();
	}
	public function list_id()
	{
		// Getting the received JSON into $Received_JSON variable.
 		$Received_JSON = file_get_contents('php://input');
 		// decoding the received JSON and store into $obj variable.
 		$request = json_decode($Received_JSON,true);
		$c_client_id = (isset($request['itemId'])) ? $request['itemId'] : '';
		$s_sales_id = (isset($request['itemIdProduct'])) ? $request['itemIdProduct'] : '';
		$this->Sales->set("c_client_id",$c_client_id);
		if(empty($s_sales_id) || $s_sales_id == "NO-IDP"){
			if(empty($c_client_id)){
				echo json_encode(array(array('response' => 'empty')));
			}else{
				echo $this->Sales->list_id();
			}
		}else{
			$this->Sales->set("c_sales_id",$s_sales_id);
			if(empty($c_client_id)){
				echo json_encode(array(array('response' => 'empty')));
			}else{
				echo $this->Sales->list_id_sale();
			}
		}

	}

}




?>