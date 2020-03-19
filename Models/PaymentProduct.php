<?php namespace Models;

require('Connection.php');

class PaymentProduct{

	private $connection;
	private $p_payment_product_id;
	private $s_sales_id;
	private $p_payment_product;
	private $p_balance;
	private $p_date_payment;
	private $p_end_date_payment;
	private $c_client_id;

	public function __construct(){

		$this->connection = new Connection();

	}

	public function set($attr,$value){
		$this->$attr = $value;
	}


	public function get($attr){
		return $this->$attr;
	}
	public function getDateFormat($date){
		//echo $date;
		$date_ = explode('/', $date);
		$date__ = explode(' ', $date_[2]);
		$current_date =  $date__[0]."-".$date_[1]."-".$date_[0]." ".$date__[1];
		return $current_date;
	}

	public function add()
	{
		$sql = 'INSERT INTO p_payment_product
				SELECT NULL, sa.s_sales_id,:amount,(sa.s_price-:amount),:p_date_payment FROM s_sales sa
				WHERE sa.c_client_id =:c_client_id 
				AND sa.s_sales_id =:s_sales_id
				';
		$date = $this->getDateFormat($this->p_date_payment);	
		$query = $this->connection->_prepare_($sql);
		$query->bindParam(':c_client_id',$this->c_client_id,\PDO::PARAM_INT);
		$query->bindParam(':s_sales_id',$this->s_sales_id,\PDO::PARAM_INT);
		$query->bindParam(':amount',$this->p_payment_product,\PDO::PARAM_INT);
		$query->bindParam(':p_date_payment',$date,\PDO::PARAM_STR);
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
		$sql = 'SELECT cli.c_client_id,cli.c_name,pro.p_name,sa.s_price,sa.s_count,sa.s_sale_date, CASE WHEN pay.p_payment_product IS NULL THEN 0 ELSE SUM(pay.p_payment_product) END as p_payment_product, CASE WHEN pay.p_balance IS NULL THEN sa.s_price ELSE (SUM(pay.p_payment_product)-sa.s_price) END as p_balance,sa.s_sales_id,cli.c_phone FROM s_sales sa LEFT JOIN p_payment_product pay ON pay.s_sales_id = sa.s_sales_id INNER JOIN c_clients cli ON cli.c_client_id = sa.c_client_id INNER JOIN p_products pro ON pro.p_products_id = sa.p_product_id GROUP BY sa.s_sales_id ORDER BY sa.s_sale_date DESC';
		$query = $this->connection->_prepare_($sql);
		$query->execute();

		if($query){
			if($query->rowCount() > 0){
				return json_encode($query->fetchAll(\PDO::FETCH_ASSOC));
			}
		}			
	}

	public function get_end_day_month($date){
		$date = explode('/', $date);
		if($date[1] == '1' || $date[1] == '3' || $data[1] == '5' || $data[1] == '7' || $data[1] == '8' || $data[1] == '10' || $data[1] == '12'){
			return '31'.'/'.$date[1].'/'.$data[2];
		}else{
			return '30'.'/'.$date[1].'/'.$data[2];
		}
		
	}
	public function list_for_date(){

		$sql = 'SELECT cli.c_name,pro.p_name,sa.s_price,sa.s_count,pay.p_date_payment,pay.p_payment_product,pay.p_balance FROM 
			p_payment_product pay 
			INNER JOIN s_sales sa ON sa.s_sales_id = pay.s_sales_id
			INNER JOIN c_clients cli ON cli.c_client_id = sa.c_client_id
			INNER JOIN p_products pro ON pro.p_products_id = sa.p_product_id
			WHERE pay.p_date_payment BETWEEN :start_date AND :end_date
			';
		$end_date = $this->get_end_day_month($this->p_date_payment);	
		$query = $this->connection->_prepare_($sql);
		$query->bindParam(':start_date',$this->p_date_payment,\PDO::PARAM_STR);
		$query->bindParam(':end_date',$end_date,\PDO::PARAM_STR);
		$query->execute();

		if($query){
			if($query->rowCount() > 0){
				return json_encode($query->fetchAll(\PDO::FETCH_ASSOC));
			}
		}
	}

	public function list_id()
	{
		$sql = "
			SELECT pro.p_name,sa.s_count,sa.s_sale_date, sa.s_price as price,
			CASE
			WHEN pay.p_payment_product IS NULL THEN 0
			WHEN pay.p_payment_product = 0 THEN pay.p_payment_product
			ELSE SUM(pay.p_payment_product)
			END
			as p_payment_product,
			CASE 
			WHEN pay.p_payment_product IS NULL THEN (sa.s_price-0)
			WHEN pay.p_payment_product = 0 THEN (sa.s_price-SUM(pay.p_payment_product))
			ELSE (sa.s_price-SUM(pay.p_payment_product))
			END
			as balance FROM s_sales sa
			INNER JOIN p_products pro ON pro.p_products_id = sa.p_product_id
			LEFT JOIN p_payment_product pay ON pay.s_sales_id = sa.s_sales_id
			WHERE sa.c_client_id=:c_client_id
			GROUP BY sa.p_product_id
		";
		$query = $this->connection->_prepare_($sql);
		$query->bindParam(':c_client_id',$this->c_client_id,\PDO::PARAM_INT);
		$query->execute();

		if($query){
			if($query->rowCount() > 0){
				return json_encode($query->fetchAll(\PDO::FETCH_ASSOC));
			}else{
				return json_encode(array(array('response' => 'empty')));
			}
		}
	}

	public function update()
	{
		$sql = "UPDATE p_payment_product SET c_client_id =:c_client_id,s_sales_id=:s_sales_id,p_payment_product=:amount,p_date_payment=:p_date_payment";
		$date = $this->getDateFormat($this->p_date_payment);		
		$query = $this->connection->_prepare_($sql);
		$query->bindParam(':c_client_id',$this->c_client_id,\PDO::PARAM_INT);
		$query->bindParam(':s_sales_id',$this->s_sales_id,\PDO::PARAM_INT);
		$query->bindParam(':amount',$this->p_payment_product,\PDO::PARAM_INT);
		$query->bindParam(':p_date_payment',$date,\PDO::PARAM_STR);
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


	public function delete()
	{
		$sql = "DELETE FROM p_payment_product WHERE p_payment_product_id = :id";
		$query = $this->connection->_prepare_($sql);
		$query->bindParam(':id',$this->p_payment_product_id,\PDO::PARAM_INT);
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