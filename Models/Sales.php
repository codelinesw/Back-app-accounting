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
	public function getDateFormat($date,$action){
		$date_ = explode('/', $date);
		$date__ = ($action == "add") ? explode(' ', $date_[2]) : $date_;
		$current_date =  $date__[0]."-".$date_[1]."-".$date_[0]." ".$date__[1];
		return $current_date;
	}

	public function add()
	{
		$sql = 'INSERT INTO s_sales VALUES(NULL,:p_product_id,:c_client_id,:s_description,:s_price,:s_count,:s_sale_date)';
		$query = $this->connection->_prepare_($sql);
		
		$date_ = $this->getDateFormat($this->s_sale_date,"add");
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
			SELECT cli.c_client_id,cli.c_name,pro.p_name,sa.s_count,sa.s_sale_date, sa.s_price as price,sa.s_description,sa.s_sales_id,pro.p_products_id,
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

	public function formatDate($date){
    	$date = explode('-', $date);
    	$month = substr($date[2], 0,strpos($date[2]," "));
    	$date = $date[1].'/'.$month.'/'.$date[0];
    	return trim($date);
    }

    public function number_format_($number){
    	$number =str_replace("COP ","", money_format("%i", $number)); 
    	return $number;
    }

	public function data_to_print(){
		$sql = "SELECT cli.c_name,cli.c_phone,cli.c_address,pro.p_name,sa.s_count,sa.s_sale_date, sa.s_price as price,sa.s_description,sa.s_sales_id,pay.p_payment_product_id,pay.p_date_payment, CASE WHEN pay.p_payment_product IS NULL THEN 0 WHEN pay.p_payment_product = 0 THEN pay.p_payment_product ELSE pay.p_payment_product END as p_payment_product, CASE WHEN pay.p_payment_product IS NULL THEN (sa.s_price-0) WHEN pay.p_payment_product = 0 THEN (sa.s_price-pay.p_payment_product) ELSE (sa.s_price-pay.p_payment_product) END as balance FROM s_sales sa INNER JOIN p_products pro ON pro.p_products_id = sa.p_product_id /*LEFT*/ INNER JOIN p_payment_product pay ON pay.s_sales_id = sa.s_sales_id INNER JOIN c_clients cli ON cli.c_client_id = sa.c_client_id WHERE sa.c_client_id=:c_client_id AND sa.s_sales_id=:c_sales_id";
		$query = $this->connection->_prepare_($sql);
		$query->bindParam(':c_client_id',$this->c_client_id,\PDO::PARAM_INT);
		$query->bindParam(':c_sales_id',$this->c_sales_id,\PDO::PARAM_INT);
		$query->execute();

		if($query){
			if($query->rowCount() > 0){
				$info = "";
				setlocale(LC_MONETARY,"en_ES");
				$count = 0;
				$balance = 0;
				$total_abono = 0;
				$current_balance = 0;
				while($row = $query->fetch()){
					if($count == 0 && $count < 1){
						$info = '<h1>'.$row["c_name"].'</h1><br><h3>Telefono: </h3><h3>'.$row["c_phone"].'</h3><br><h3>Direccion: </h3><h3>'.$row["c_address"].'</h3><br><h3>Venta: </h3><h3>'.substr($row["s_description"],8).'</h3><br><hr><ul style="backgroundColor:red;">
			<li style="width:120px;">Item</li>
			<li style="width:220px;"></li>
			<li style="width:220px;">Prenda Vendida</li>
			<li style="width:220px;"></li>
			<li style="width:220px;"></li>
			<li style="width:220px;"></li>
			<li style="width:220px;">Fecha de Abono</li>
			<li style="width:220px;"></li>
			<li style="width:220px;"></li>
			<li style="width:220px;">Valor de la venta</li>
			<li style="width:220px;"></li>
			<li style="width:220px;"></li>
			<li style="width:220px;">Abono</li>
			<li style="width:220px;"></li>
			<li style="width:220px;"></li>
			<li style="width:220px;"></li>
			<li style="width:220px;">Saldo</li>
			</ul><br><hr>';
					}
					$total_abono += $row["p_payment_product"];
					$balance =($row["price"]-$total_abono);
					$count  = ($count == 0) ? 1  : $count++;
					$info .= '<h1>    </h1><ul><li style="width:220px;margin-left:15px;">'.$count.'</li>
					<li style="width:220px;"></li>
					<li style="width:220px;">'.substr(str_replace("Venta de ", "", $row["s_description"]), 0,strpos(str_replace("Venta de ", "", $row["s_description"]), "por")).'</li>
					<li style="width:220px;"></li>
					<li style="width:220px;"></li>
					<li style="width:220px;"></li>
					<li style="width:220px;">'.$this->formatDate($row["p_date_payment"]).'</li>
					<li style="width:220px;"></li>
					<li style="width:220px;">$'.$this->number_format_($row["price"]).'</li>
					<li style="width:220px;"></li>
					<li style="width:220px;"></li>
					<li style="width:220px;">$'.$this->number_format_($row["p_payment_product"]).'</li>
					<li style="width:220px;"></li>
					<li style="width:220px;">$'.str_replace("COP ","",money_format('%i',$balance)).'</li></ul><br>';
					$current_balance = ($row["price"]-$total_abono);
					$count++;
				}

				$info .= '<hr><h1></h1><ul><li style="width:220px;margin-left:15px;"></li><li style="width:220px;"><strong>Saldo actual: </strong></li><li style="width:220px;">$'.str_replace("COP ","",money_format('%i',$current_balance)).'</li></ul><br>';

				return $info;
			}else{
				return 'empty';
			}
		}
	}

	public function update()
	{
		$sql = 'UPDATE s_sales SET p_product_id=:p_product_id,c_client_id=:c_client_id,s_description=:s_description,s_price=:s_price,s_count=:s_count,s_sale_date=:s_sale_date WHERE s_sales_id =:s_sales_id';
		$query = $this->connection->_prepare_($sql);
		
		$date_ = $this->getDateFormat($this->s_sale_date,"update");

		// echo $this->p_product_id.' '.$this->c_client_id.$this->s_description.$this->s_price.' '.$this->s_count.' '.$date_.' '.$this->c_sales_id;

		$query->bindParam(':p_product_id',$this->p_product_id,\PDO::PARAM_INT);
		$query->bindParam(':c_client_id',$this->c_client_id,\PDO::PARAM_INT);
		$query->bindParam('s_description',$this->s_description,\PDO::PARAM_STR);
		$query->bindParam(':s_price',$this->s_price,\PDO::PARAM_INT);
		$query->bindParam(':s_count',$this->s_count,\PDO::PARAM_INT);
		$query->bindParam(':s_sale_date',$date_,\PDO::PARAM_STR);
		$query->bindParam(':s_sales_id',$this->c_sales_id,\PDO::PARAM_INT);
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
		$sql = "DELETE FROM s_sales WHERE s_sales_id = :id";
		$query = $this->connection->_prepare_($sql);
		$query->bindParam(':id',$this->c_sales_id,\PDO::PARAM_INT);
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