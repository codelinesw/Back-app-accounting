<?php namespace Controllers; 

require('Models/PaymentProduct.php');

use Models\PaymentProduct as PaymentProduct;


class payment_product{

	private $PaymentProduct;

	public function __construct(){

		$this->PaymentProduct = new PaymentProduct();
	}

	public function index()
	{
		include_once('Views/borrower.php');
	}

	public function add()
	{
		// Getting the received JSON into $Received_JSON variable.
 		$Received_JSON = file_get_contents('php://input');
 		// decoding the received JSON and store into $obj variable.
 		$request = json_decode($Received_JSON,true);

 		$c_client_id = (isset($request['c_client_id'])) ? $request['c_client_id'] : '';
 		$this->PaymentProduct->set("c_client_id",$c_client_id);
 		$s_sales_id = (isset($request['s_sales_id'])) ? $request['s_sales_id'] : '';
 		$this->PaymentProduct->set("s_sales_id",$s_sales_id);
 		$amount = (isset($request['amount'])) ? str_replace('.','',$request['amount']) : '';
 		$this->PaymentProduct->set("p_payment_product",$amount);
 		$p_date_payment = (isset($request['p_date_payment'])) ? $request['p_date_payment'] : '';
 		$this->PaymentProduct->set("p_date_payment",$p_date_payment);

		if(empty($c_client_id) && empty($s_sales_id) && empty($amount) && empty($p_date_payment)){
			echo json_encode(array(array('response' => $request['name'])));
		}else if(empty($c_client_id)){
			echo json_encode(array(array('response' => 'empty')));
		}else if(empty($s_sales_id)){
			echo json_encode(array(array('response' => 'empty')));
		}else if(empty($amount)){
			echo json_encode(array(array('response' => 'empty')));
		}else if(empty($p_date_payment)){
			echo json_encode(array(array('response' => 'empty')));
		}else{
			if($this->PaymentProduct->add()){
				echo json_encode(array(array('response' => 'ok')));
			}else{
				echo json_encode(array(array('response' => 'failed')));
			}
		}
	}

	public function list(){
		// Getting the received JSON into $Received_JSON variable.
 		$Received_JSON = file_get_contents('php://input');
 		$request = json_decode($Received_JSON,true);

 		$type = (isset($request['filter'])) ? $request['filter'] : '' ;
 		if(!empty($type)){
 			if($type == "all"){
 				echo $this->PaymentProduct->list();
 			}else if($type == "date"){
 				$data = isset($request['sendata']) ? $request['sendata'] : '';
				$this->Clients->set("p_date_payment",$data);
 				echo $this->PaymentProduct->list_for_date();
 			}
 		}	
	}
}



 ?>