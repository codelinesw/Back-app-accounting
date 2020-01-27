<?php namespace Models;

require('Connection.php');

class Sales{

	private $connection;
	private $c_sales_id;
	private $p_product_id;
	private $c_client_id;
	private $s_description;
	private $s_price;
	private $s_sale_date;
	

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
		$date_ = explode('/', $date);
		$date__ = explode(' ', $date_[2]);
		$current_date =  $date__[0]."-".$date_[1]."-".$date_[0]." ".$date__[1];
		return $current_date;
	}

	public function add()
	{
		$sql = 'INSERT INTO s_sales VALUES(NULL,:p_product_id,:c_client_id,:s_description,:s_price,:s_count,:s_sale_date)';
		$query = $this->connection->_prepare_($sql);
		
		$date_ = $this->getDateFormat($this->s_sale_date);
		$query->bindParam(':p_product_id',$this->p_product_id,\PDO::PARAM_INT);
		$query->bindParam(':c_client_id',$this->c_client_id,\PDO::PARAM_INT);
		$query->bindParam('s_description',$this->s_description,\PDO::PARAM_STR);
		$query->bindParam(':s_price',$this->s_price,\PDO::PARAM_INT);
		$query->bindParam(':s_count',$this->s_count,\PDO::PARAM_INT);
		$query->bindParam(':s_sale_date',$date_,\PDO::PARAM_STR);
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

		$sql = 'SELECT cli.c_name,cli.c_client_id,pro.p_name,sa.s_count,sa.s_sale_date, sa.s_price as s_price,sa.s_description,sa.s_sales_id,
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
			as p_balance FROM s_sales sa
			INNER JOIN p_products pro ON pro.p_products_id = sa.p_product_id
			LEFT JOIN p_payment_product pay ON pay.s_sales_id = sa.s_sales_id
			INNER JOIN c_clients cli ON cli.c_client_id = sa.c_client_id
			GROUP BY sa.p_product_id';
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
		$sql = "
			SELECT cli.c_client_id,cli.c_name,pro.p_name,sa.s_count,sa.s_sale_date, sa.s_price as price,sa.s_description,sa.s_sales_id,
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
			INNER JOIN c_clients cli ON cli.c_client_id = sa.c_client_id
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

	public function list_id_sale()
	{
	 $sql = "
			SELECT pro.p_name,sa.s_count,sa.s_sale_date, sa.s_price as price,sa.s_description,sa.s_sales_id,pay.p_payment_product_id,pay.p_date_payment,
			CASE
			WHEN pay.p_payment_product IS NULL THEN 0
			WHEN pay.p_payment_product = 0 THEN pay.p_payment_product
			ELSE pay.p_payment_product
			END
			as p_payment_product,
			CASE 
			WHEN pay.p_payment_product IS NULL THEN (sa.s_price-0)
			WHEN pay.p_payment_product = 0 THEN (sa.s_price-pay.p_payment_product)
			ELSE (sa.s_price-pay.p_payment_product)
			END
			as balance FROM s_sales sa
			INNER JOIN p_products pro ON pro.p_products_id = sa.p_product_id
			/*LEFT*/
			INNER JOIN p_payment_product pay ON pay.s_sales_id = sa.s_sales_id
			WHERE sa.c_client_id=:c_client_id
			AND sa.s_sales_id=:c_sales_id
		";
		$query = $this->connection->_prepare_($sql);
		$query->bindParam(':c_client_id',$this->c_client_id,\PDO::PARAM_INT);
		//echo $this->c_sales_id;
		$query->bindParam(':c_sales_id',$this->c_sales_id,\PDO::PARAM_INT);
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

	}


	public function delete()
	{

	}

	
}



 ?>