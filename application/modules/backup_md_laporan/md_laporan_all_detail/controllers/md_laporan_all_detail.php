<?php
class md_laporan_all_detail extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_laporan_all_detail');

	
		
	}
	function index() {
		$this->fnlaporan();
	}
	function fnlaporan()	{
		$vData["pilihLayanan"]=$this->mo_laporan_all_detail->getPilihLayanan();
		$vData["pilihLoket"]=$this->mo_laporan_all_detail->getPilihLoket();
		$vData["pilihUser"]=$this->mo_laporan_all_detail->getPilihUser();
		$this->load->view('vw_laporan_all_detail', $vData);
	}
	// ======================================== 'Datagrid User Section'
	function fntransaksiData() {
	
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');		
		//$vemployeeKeyword=$this->input->post('#search')	;	
		$vStartKeyword=$this->input->post('StartKeyword');
		$vFinishKeyword=$this->input->post('FinishKeyword');
		$vLayananKeyword=$this->input->post('LayananKeyword');
		$vLoketKeyword=$this->input->post('LoketKeyword');
		$vUserKeyword=$this->input->post('UserKeyword');
		$vSort=$this->input->post('sort');
		$vOrder=$this->input->post('order');
		if(!$vPage) {
			$vPage=1;
		}
		if(!$vRows) {
			$vRows=20;
		}
		if(!$vSort) {
		
		$vSort='id_transaksi';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_laporan_all_detail->fntransaksiCount($vStartKeyword,$vFinishKeyword,$vLayananKeyword,$vLoketKeyword,$vUserKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_laporan_all_detail->fntransaksiData($vStartKeyword,$vFinishKeyword,$vLayananKeyword,$vLoketKeyword,$vUserKeyword,$vOffset,$vRows,$vSort,$vOrder);		
		echo json_encode($vResult);
	}	

	
//===========Print Report================================================

	function fntransaksiDataPrint($vcityKeyword,$vkecKeyword,$vLayananKeyword,$vLoketKeyword,$vUserKeyword){

			$pdf_filename = tempnam(sys_get_temp_dir(), "Data_Antrian_");
		   $pdf_file= "Data Antrian";
   
			$sts_scty=FALSE;
			$direct_download=TRUE;
		
		   $data_header=array('title'=>'PDF',);   
		   
         $data_master['data_master'] = $this->mo_laporan_all_detail->fntransaksiDataPrint($vcityKeyword,$vkecKeyword,$vLayananKeyword,$vLoketKeyword,$vUserKeyword);        		   
		   $output=$this->load->view('transaksi_excel',$data_master,true);   
			$scty="";

         echo $output;	
   }	
      
}
?>

	   