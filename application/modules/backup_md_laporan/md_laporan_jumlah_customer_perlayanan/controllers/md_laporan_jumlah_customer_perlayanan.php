<?php
class md_laporan_jumlah_customer_perlayanan extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_laporan_jumlah_customer_perlayanan');

	
		
	}
	function index() {
		$this->fnlaporan();
	}
	function fnlaporan()	{
		$vData["pilihLayanan"]=$this->mo_laporan_jumlah_customer_perlayanan->getPilihLayanan();
		$vData["pilihLoket"]=$this->mo_laporan_jumlah_customer_perlayanan->getPilihLoket();
		$vData["pilihUser"]=$this->mo_laporan_jumlah_customer_perlayanan->getPilihUser();
		$this->load->view('vw_laporan_jumlah_customer_perlayanan', $vData);
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
		$vPilihanKeyword=$this->input->post('PilihanKeyword');
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
		$vRs=$this->mo_laporan_jumlah_customer_perlayanan->fntransaksiCount($vStartKeyword,$vFinishKeyword,$vLayananKeyword,$vLoketKeyword,$vUserKeyword,$vPilihanKeyword);
		$vResult["total"]=$vRs;
		$vResult["rows"]=$this->mo_laporan_jumlah_customer_perlayanan->fntransaksiData($vStartKeyword,$vFinishKeyword,$vLayananKeyword,$vLoketKeyword,$vUserKeyword,$vPilihanKeyword,$vOffset,$vRows,$vSort,$vOrder);		
		echo json_encode($vResult);
	}	

	
//===========Print Report================================================

	function fntransaksiDataPrint($vcityKeyword,$vkecKeyword,$vLayananKeyword,$vLoketKeyword,$vUserKeyword,$vPilihanKeyword){

			$pdf_filename = tempnam(sys_get_temp_dir(), "Data_Antrian_");
		   $pdf_file= "Data Antrian";
   
			$sts_scty=FALSE;
			$direct_download=TRUE;
		
		   $data_header=array('title'=>'PDF',);   
		   
         $data_master['data_master'] = $this->mo_laporan_jumlah_customer_perlayanan->fntransaksiDataPrint($vcityKeyword,$vkecKeyword,$vLayananKeyword,$vLoketKeyword,$vUserKeyword,$vPilihanKeyword);        		   
		   $output=$this->load->view('transaksi_excel',$data_master,true);   
			$scty="";

         echo $output;	
   }	
      
}
?>

	   