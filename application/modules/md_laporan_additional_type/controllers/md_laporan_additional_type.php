<?php
class md_laporan_additional_type extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_laporan_additional_type');
	}
	function index() {
		$this->fnlaporan();
	}
	function fnlaporan(){
		$this->load->view('vw_laporan_additional_type', $vData);
	}
	// ======================================== 'Datagrid User Section'
	function fnAdditionalTypeData() {
	
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');		
		//$vemployeeKeyword=$this->input->post('#search')	;	
		$vStartKeyword=$this->input->post('StartKeyword');
		$vFinishKeyword=$this->input->post('FinishKeyword');
		$vAdditionalTypeKeyword=$this->input->post('AdditionalTypeKeyword');
		$vAdditionalTypeNoAntrian=$this->input->post('AdditionalTypeNoAntrian');
		$vSort=$this->input->post('sort');
		$vOrder=$this->input->post('order');
		if(!$vPage) {
			$vPage=1;
		}
		if(!$vRows) {
			$vRows=20;
		}
		if(!$vSort) {
		
		$vSort='adty_id';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_laporan_additional_type->fnAdditionalTypeCount($vStartKeyword,$vFinishKeyword,$vAdditionalTypeKeyword,$vAdditionalTypeNoAntrian);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_laporan_additional_type->fnAdditionalTypeData($vStartKeyword,$vFinishKeyword,$vAdditionalTypeKeyword,$vAdditionalTypeNoAntrian,$vOffset,$vRows,$vSort,$vOrder);		
		echo json_encode($vResult);
	}	

	
//===========Print Report================================================

	function fnAdditionalTypeDataPrint($vStartKeyword,$vFinishKeyword,$vAdditionalTypeKeyword,$vAdditionalTypeNoAntrian,$excel=true){

			$pdf_filename = tempnam(sys_get_temp_dir(), "Data_Antrian_");
		   $pdf_file= "Data Additional Type";
   
			$sts_scty=FALSE;
			$direct_download=TRUE;
		
		   $data_header=array('title'=>'PDF',);   
		   
         $data_master['data_master'] = $this->mo_laporan_additional_type->fnAdditionalTypeDataPrint($vStartKeyword,$vFinishKeyword,$vAdditionalTypeKeyword,$vAdditionalTypeNoAntrian);
         $data_master['data_company'] = $this->mo_laporan_additional_type->getDataCompany();

		   if($excel) {
		   	$output=$this->load->view('transaksi_excel',$data_master,true);
		   } else {
		   	$output=$this->load->view('transaksi_report_text',$data_master,true);
		   }

			$scty="";

         echo $output;	
   }

   function fnAdditionalTypeDataPrintText($vStartKeyword,$vFinishKeyword,$vAdditionalTypeKeyword,$vAdditionalTypeNoAntrian){
		$this->fnAdditionalTypeDataPrint($vStartKeyword,$vFinishKeyword,$vAdditionalTypeKeyword,$vAdditionalTypeNoAntrian,false);
   }	
      
}
?>

	   