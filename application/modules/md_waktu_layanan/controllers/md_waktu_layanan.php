<?php
class md_waktu_layanan extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_waktu_layanan');
	}
	function index() {
		$this->fnwaktu_layanan();
	}
	function fnwaktu_layanan()	{
		$this->load->view('vw_waktu_layanan');
	}
	// ======================================== 'Datagrid User Section'
	function fnwaktu_layananData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$vwaktu_layananKeyword=$this->input->post('waktu_layananKeyword');
		$vSort=$this->input->post('sort');
		$vOrder=$this->input->post('order');
		if(!$vPage) {
			$vPage=1;
		}
		if(!$vRows) {
			$vRows=20;
		}
		if(!$vcustomerKeyword) {
			$vcustomerKeyword='';
		}
		if(!$vSort) {
		
		$vSort='id_waktu_layanan';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_waktu_layanan->fnwaktu_layananCount($vwaktu_layananKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_waktu_layanan->fnwaktu_layananData($vwaktu_layananKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}	
	function fnwaktu_layananAdd() {
		$this->load->view('waktu_layanan_add_main');
	}
	
	function fnwaktu_layananCreate() {
		$vData = array(
         		
			'vid_waktu_layanan'=>$this->input->post('id_waktu_layanan'),
       		
			'vwaktu_awal_1'=>$this->input->post('waktu_awal_1'),
       		
			'vwaktu_akhir_1'=>$this->input->post('waktu_akhir_1'),
       		
			'vwaktu_awal_2'=>$this->input->post('waktu_awal_2'),
       		
			'vwaktu_akhir_2'=>$this->input->post('waktu_akhir_2'),
       		
			'vwaktu_awal_3'=>$this->input->post('waktu_awal_3'),
       		
			'vwaktu_akhir_3'=>$this->input->post('waktu_akhir_3'),
       		
			'vketerangan'=>$this->input->post('keterangan'),
       				
		);
		
		
	$this->mo_waktu_layanan->fnCreatewaktu_layanan($vData);
	}
	function fnwaktu_layananEdit($pwaktu_layananId) {
		$vData['vwaktu_layananId'] = $pwaktu_layananId;
		$this->load->view('waktu_layanan_add_main',$vData);
	}
	function fnwaktu_layananRow($pwaktu_layananId) {
		$this->mo_waktu_layanan->fnwaktu_layananRow($pwaktu_layananId);
	}
	
	function fnwaktu_layananDelete() {
		$vDelwaktu_layananId = intval($_POST['Id']);
		$this->mo_waktu_layanan->fnwaktu_layananDelete($vDelwaktu_layananId);
	}
	
	function fnwaktu_layananUpdate($pwaktu_layananId) {
		$vData = array(
		
         		
			'vid_waktu_layanan'=>$this->input->post('id_waktu_layanan'),
       		
			'vwaktu_awal_1'=>$this->input->post('waktu_awal_1'),
       		
			'vwaktu_akhir_1'=>$this->input->post('waktu_akhir_1'),
       		
			'vwaktu_awal_2'=>$this->input->post('waktu_awal_2'),
       		
			'vwaktu_akhir_2'=>$this->input->post('waktu_akhir_2'),
       		
			'vwaktu_awal_3'=>$this->input->post('waktu_awal_3'),
       		
			'vwaktu_akhir_3'=>$this->input->post('waktu_akhir_3'),
       		
			'vketerangan'=>$this->input->post('keterangan'),
       		

		);
		$this->mo_waktu_layanan->fnUpdatewaktu_layanan($pwaktu_layananId,$vData);
	}
}
?>

	   