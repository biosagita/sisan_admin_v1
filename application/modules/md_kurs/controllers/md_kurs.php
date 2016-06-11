<?php
class md_kurs extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_kurs');
	}
	function index() {
		$this->fnkurs();
	}
	function fnkurs()	{
		$this->load->view('vw_kurs');
	}
	// ======================================== 'Datagrid User Section'
	function fnkursData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$vkursKeyword=$this->input->post('kursKeyword');
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
		
		$vSort='id_kurs';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_kurs->fnkursCount($vkursKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_kurs->fnkursData($vkursKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}	
	function fnkursAdd() {
		$this->load->view('kurs_add_main');
	}
	
	function fnkursCreate() {
		$vData = array(
         	'vid_kurs'=>$this->input->post('id_kurs'),
       		
			'vnama_kurs'=>$this->input->post('nama_kurs'),
       		
			'vsimbol_kurs'=>$this->input->post('simbol_kurs'),

			'vkurs_jual'=>$this->input->post('kurs_jual'),
       		
			'vkurs_beli'=>$this->input->post('kurs_beli'),		
		);
		
		
	$this->mo_kurs->fnCreatekurs($vData);
	}
	function fnkursEdit($pkursId) {
		$vData['vkursId'] = $pkursId;
		$this->load->view('kurs_add_main',$vData);
	}
	function fnkursRow($pkursId) {
		$this->mo_kurs->fnkursRow($pkursId);
	}
	
	function fnkursDelete() {
		$vDelkursId = intval($_POST['Id']);
		$this->mo_kurs->fnkursDelete($vDelkursId);
	}
	
	function fnkursUpdate($pkursId) {
		$vData = array(
			'vid_kurs'=>$this->input->post('id_kurs'),
       		
			'vnama_kurs'=>$this->input->post('nama_kurs'),
       		
			'vsimbol_kurs'=>$this->input->post('simbol_kurs'),

			'vkurs_jual'=>$this->input->post('kurs_jual'),
       		
			'vkurs_beli'=>$this->input->post('kurs_beli'),
         		

		);
		$this->mo_kurs->fnUpdatekurs($pkursId,$vData);
	}
}
?>

	   