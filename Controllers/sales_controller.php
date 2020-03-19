<?php namespace Controllers; 

require('Models/Sales.php');
require('fpdf182/fpdf.php');

use Models\Sales as Sales;

class sales_{

	private $Sales;
	private $pdf;
	private $B=0;
    private $I=0;
    private $U=0;
    private $HREF='';
    private $ALIGN='';

	public function __construct(){

		$this->Sales = new Sales();
		$this->pdf = new FPDF();
	}

	public function index()
	{
		
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
		$productname = isset($request['productname']) ? $request['productname'] : "";
		$s_count = isset($request['qty']) ? $request['qty'] : 0;
		$s_price = isset($request['price']) ? str_replace('.','',$request['price']) : 0;
		$s_sale_date = isset($request['s_sale_date']) ? $request['s_sale_date'] : '';
		$s_description = "Venta de ".$s_count." ".$productname." por una valor de $".$s_price;
		if($this->validate_fields($p_product_id,$c_client_id,$s_price,$s_count,$s_sale_date)){
			$this->setData($p_product_id,$c_client_id,$s_description,$s_price,$s_count,0,$s_sale_date);
			if($this->Sales->add()){
				echo 'ok';
			}else{
				echo 'failed';
			}
		}else{
		  echo 'empty';
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
		$c_client_id = (isset($request['c_client_id'])) ? $request['c_client_id'] : '';
		$this->Sales->set("c_client_id",$c_client_id);
		if(empty($c_client_id)){
		   echo json_encode(array(array('response' => 'empty')));
	    }else{
		   echo $this->Sales->list_id();
		}

	}

	public function list_id_sale()
	{
		// Getting the received JSON into $Received_JSON variable.
 		$Received_JSON = file_get_contents('php://input');
 		// decoding the received JSON and store into $obj variable.
 		$request = json_decode($Received_JSON,true);
		$c_client_id = (isset($request['c_client_id'])) ? $request['c_client_id'] : '';
		$this->Sales->set("c_client_id",$c_client_id);
		$s_sales_id = (isset($request['s_sales_id'])) ? $request['s_sales_id'] : '';
		$this->Sales->set("c_sales_id",$s_sales_id);
		if(empty($c_client_id)){
		   echo json_encode(array(array('response' => 'empty')));
	    }else{
		   echo $this->Sales->list_id_sale();
		}

	}
	
    function WriteHTML($html)
    {
        //HTML parser
        $html=str_replace("\n",' ',$html);
        $a=preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
        foreach($a as $i=>$e)
        {
            if($i%2==0)
            {
                //Text
                if($this->HREF)
                    $this->pdf->PutLink($this->HREF,$e);
                elseif($this->ALIGN=='center')
                    $this->pdf->Cell(0,5,$e,0,1,'C');
                else
                    $this->pdf->Write(5,$e);
            }
            else
            {
                //Tag
                if($e[0]=='/')
                    $this->CloseTag(strtoupper(substr($e,1)));
                else
                {
                    //Extract properties
                    $a2=explode(' ',$e);
                    $tag=strtoupper(array_shift($a2));
                    $prop=array();
                    foreach($a2 as $v)
                    {
                        if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                            $prop[strtoupper($a3[1])]=$a3[2];
                    }
                    $this->OpenTag($tag,$prop);
                }
            }
        }
    }

    function OpenTag($tag,$prop)
    {
        //Opening tag
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->pdf->SetStyle($tag,true);
        if($tag=='A')
            $this->pdf->HREF=$prop['HREF'];
        if($tag=='BR')
            $this->pdf->Ln(5);
        if($tag=='P')
            $this->pdf->ALIGN=$prop['ALIGN'];
        if($tag=='HR')
        {
            if( !empty($prop['WIDTH']) )
                $Width = $prop['WIDTH'];
            else
                $Width = $this->pdf->w - $this->pdf->lMargin-$this->pdf->rMargin;
            $this->pdf->Ln(2);
            $x = $this->pdf->GetX();
            $y = $this->pdf->GetY();
            $this->pdf->SetLineWidth(0.4);
            $this->pdf->Line($x,$y,$x+$Width,$y);
            $this->pdf->SetLineWidth(0.2);
            $this->pdf->Ln(2);
        }
    }

    function CloseTag($tag)
    {
        //Closing tag
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->pdf->SetStyle($tag,false);
        if($tag=='A')
            $this->pdf->HREF='';
        if($tag=='P')
            $this->pdf->ALIGN='';
    }

    function SetStyle($tag,$enable)
    {
        //Modify style and select corresponding font
        $this->pdf->$tag+=($enable ? 1 : -1);
        $style='';
        foreach(array('B','I','U') as $s)
            if($this->pdf->$s>0)
                $style.=$s;
        $this->pdf->SetFont('',$style);
    }

    function PutLink($URL,$txt)
    {
        //Put a hyperlink
        $this->pdf->SetTextColor(0,0,255);
        $this->pdf->SetStyle('U',true);
        $this->pdf->Write(5,$txt,$URL);
        $this->pdf->SetStyle('U',false);
        $this->pdf->SetTextColor(0);
    }

	public function view_pdf($params){
		//we split it's all params
		$params = explode('-', $params);
		$this->pdf->AddPage();
		$this->pdf->SetFont('Arial','B',15);
		$this->WriteHTML('<h1>Saldos del cliente</h1><br>');
		$this->pdf->SetFont('Arial','',10);
		//get all data for print.
		$c_client_id = (isset($params[0])) ? $params[0] : '';
		$this->Sales->set("c_client_id",$c_client_id);
		$s_sales_id = (isset($params[1])) ? $params[1] : '';
		$this->Sales->set("c_sales_id",$s_sales_id);
		$data = $this->Sales->data_to_print();
		$this->WriteHTML($data);
		$this->pdf->Output();
		
		
	}

	public function download_file(){
		$file = $this->view_pdf();
		$filename = "SALDOS-DE-JHON.pdf";
		header('Content-type: application/pdf');
		header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
		header('Content-Transfer-Encoding: binary');
		readfile($filename);
	}

	public function update(){
		// Getting the received JSON into $Received_JSON variable.
 		$Received_JSON = file_get_contents('php://input');
 
 		// decoding the received JSON and store into $obj variable.
 		$request = json_decode($Received_JSON,true);

		$p_product_id = isset($request['p_product_id']) ? $request['p_product_id'] : '';
		$c_client_id = isset($request['c_client_id']) ? $request['c_client_id'] : '';
		$productname = isset($request['productname']) ? $request['productname'] : "";
		$s_count = isset($request['qty']) ? $request['qty'] : 0;
		$s_price = isset($request['price']) ? str_replace('.','',$request['price']) : 0;
		$s_sale_date = isset($request['s_sale_date']) ? $request['s_sale_date'] : '';
		$s_description = "Venta de ".$s_count." ".$productname." por una valor de $".$s_price;
		$s_sales_id = isset($request['s_sales_id']) ? $request['s_sales_id'] : '';
		//print_r($request);
		if($this->validate_fields($p_product_id,$c_client_id,$s_price,$s_count,$s_sale_date)){
			$this->setData($p_product_id,$c_client_id,$s_description,$s_price,$s_count,$s_sales_id,$s_sale_date);
			if($this->Sales->update()){
				echo 'ok';
			}else{
				echo 'failed';
			}
		}else{
		  echo 'empty';
		}
	}

	public function delete(){
		$Received_JSON = file_get_contents('php://input');
 		// decoding the received JSON and store into $obj variable.
 		$request = json_decode($Received_JSON,true);
		$s_sales_id = (isset($request['s_sales_id'])) ? $request['s_sales_id'] : '';
		$this->Sales->set("c_sales_id",$s_sales_id);
		//print_r($request);
		if(empty($s_sales_id)){
		   echo 'empty';
	    }else{
		   if($this->Sales->delete()){
		   		echo "ok";
		   }else{
		   		echo "failed";
		   }
		}
	}

}




?>