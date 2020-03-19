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

 		$c_client_id = (isset($request['c_client_id'])) ? str_replace('"', '', $request['c_client_id']) : '';
 		$this->PaymentProduct->set("c_client_id",$c_client_id);
 		$s_sales_id = (isset($request['s_sales_id'])) ? $request['s_sales_id'] : '';
 		$this->PaymentProduct->set("s_sales_id",$s_sales_id);
 		$amount = (isset($request['amount'])) ? str_replace('.','',$request['amount']) : '';
 		$this->PaymentProduct->set("p_payment_product",$amount);
 		$p_date_payment = (isset($request['p_date_payment'])) ? $request['p_date_payment'] : '';
 		$this->PaymentProduct->set("p_date_payment",$p_date_payment);

		if(empty($c_client_id) && empty($s_sales_id) && empty($amount) && empty($p_date_payment)){
			echo 'empty';
		}else if(empty($c_client_id)){
			echo 'empty';
		}else if(empty($s_sales_id)){
			echo 'empty';
		}else if(empty($amount)){
			echo 'empty';
		}else if(empty($p_date_payment)){
			echo 'empty';
		}else{
			//echo $c_client_id." - ".$s_sales_id." - ".$amount." - ".$p_date_payment;
			if($this->PaymentProduct->add()){
				echo 'ok';
			}else{
				echo 'failed';
			}
		}
	}

	public function list(){
		// Getting the received JSON into $Received_JSON variable.
 		$Received_JSON = file_get_contents('php://input');
 		$request = json_decode($Received_JSON,true);
 		echo $this->PaymentProduct->list();
	}

	public function delete(){
		$Received_JSON = file_get_contents('php://input');
 		$request = json_decode($Received_JSON,true);

 		$id = (isset($request['p_payment_product_id'])) ? $request['p_payment_product_id'] : '' ;
 		if(!empty($id)){
 			$this->PaymentProduct->set('p_payment_product_id',$id);
 			if($this->PaymentProduct->delete()){
 				echo "ok";
 			}else{
 				echo "failed";
 			}
 		}else{
 			echo "empty";
 		}
	}
}



 ?>