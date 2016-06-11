<?php
class md_counter_display extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_counter_display');
	}
	function index() {
		$this->fncounter_display();
	}
	function fncounter_display()	{
		$this->load->view('vw_counter_display');
	}
	// ======================================== 'Datagrid User Section'
	function fncounter_displayData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$vcounter_displayKeyword=$this->input->post('counter_displayKeyword');
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
		
		$vSort='id_address';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_counter_display->fncounter_displayCount($vcounter_displayKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_counter_display->fncounter_displayData($vcounter_displayKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}	
	function fncounter_displayAdd() {
		$vData['listloket'] = $this->mo_counter_display->listloket();
		$this->load->view('counter_display_add_main', $vData);
	}
	
	function fncounter_displayCreate() {
		$vData = array(
         		
			'vid_counter_display'=>$this->input->post('id_address'),
       		
			'vaddress_cd'=>$this->input->post('address_cd'),
       		
			'vid_loket'=>$this->input->post('id_loket'),
       				
		);
		
		
	$this->mo_counter_display->fnCreatecounter_display($vData);
	}
	function fncounter_displayEdit($pcounter_displayId) {
		$vData['vcounter_displayId'] = $pcounter_displayId;
		$vData['listloket'] = $this->mo_counter_display->listloket();
		$this->load->view('counter_display_add_main',$vData);
		
	}
	function fncounter_displayRow($pcounter_displayId) {
		$this->mo_counter_display->fncounter_displayRow($pcounter_displayId);
	}
	
	function fncounter_displayDelete() {
		$vDelcounter_displayId = intval($_POST['Id']);
		$this->mo_counter_display->fncounter_displayDelete($vDelcounter_displayId);
	}
	
	function fncounter_displayUpdate($pcounter_displayId) {
		$vData = array(
		
         		
			'vid_counter_display'=>$this->input->post('id_counter_display'),
       		
			'vaddress_cd'=>$this->input->post('address_cd'),
       		
			'vid_loket'=>$this->input->post('id_loket'),
       		

		);
		$this->mo_counter_display->fnUpdatecounter_display($pcounter_displayId,$vData);
	}
}
?>

	   