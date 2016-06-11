<?php
class md_caller extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_caller');
	}
	function index() {
		$this->fncaller();
	}
	function fncaller()	{
		$this->load->view('vw_caller');
	}
	// ======================================== 'Datagrid User Section'
	function fncallerData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$vcallerKeyword=$this->input->post('callerKeyword');
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
		
		$vSort='id_caller';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_caller->fncallerCount($vcallerKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_caller->fncallerData($vcallerKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}	
	function fncallerAdd() {
		$vData['listloket'] = $this->mo_caller->listloket();
		$this->load->view('caller_add_main', $vData);
	}
	
	function fncallerCreate() {
		$vData = array(
         		
			'vid_caller'=>$this->input->post('id_caller'),
       		
			'vaddress_caller'=>$this->input->post('address_caller'),
       		
			'vid_loket'=>$this->input->post('id_loket'),
       		
			'vstatus_off'=>$this->input->post('status_off'),
       				
		);
		
		
	$this->mo_caller->fnCreatecaller($vData);
	}
	function fncallerEdit($pcallerId) {
		$vData['vcallerId'] = $pcallerId;
		$vData['listloket'] = $this->mo_caller->listloket();
		$this->load->view('caller_add_main',$vData);
	}
	function fncallerRow($pcallerId) {
		$this->mo_caller->fncallerRow($pcallerId);
	}
	
	function fncallerDelete() {
		$vDelcallerId = intval($_POST['Id']);
		$this->mo_caller->fncallerDelete($vDelcallerId);
	}
	
	function fncallerUpdate($pcallerId) {
		$vData = array(
		
         		
			'vid_caller'=>$this->input->post('id_caller'),
       		
			'vaddress_caller'=>$this->input->post('address_caller'),
       		
			'vid_loket'=>$this->input->post('id_loket'),
       		
			'vstatus_off'=>$this->input->post('status_off'),
       		

		);
		$this->mo_caller->fnUpdatecaller($pcallerId,$vData);
	}
}
?>

	   