<?php
class md_footer extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_footer');
	}
	function index() {
		$this->fnfooter();
	}
	function fnfooter()	{
		$this->load->view('vw_footer');
	}
	// ======================================== 'Datagrid User Section'
	function fnfooterData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$vfooterKeyword=$this->input->post('footerKeyword');
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
		
		$vSort='id_footer';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_footer->fnfooterCount($vfooterKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_footer->fnfooterData($vfooterKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}	
	function fnfooterAdd() {
		$this->load->view('footer_add_main');
	}
	
	function fnfooterCreate() {
		$vData = array(
         		
			'vid_footer'=>$this->input->post('id_footer'),
       		
			'vtext_footer'=>$this->input->post('text_footer'),
       				
		);
		
		
	$this->mo_footer->fnCreatefooter($vData);
	}
	function fnfooterEdit($pfooterId) {
		$vData['vfooterId'] = $pfooterId;
		$this->load->view('footer_add_main',$vData);
	}
	function fnfooterRow($pfooterId) {
		$this->mo_footer->fnfooterRow($pfooterId);
	}
	
	function fnfooterDelete() {
		$vDelfooterId = intval($_POST['Id']);
		$this->mo_footer->fnfooterDelete($vDelfooterId);
	}
	
	function fnfooterUpdate($pfooterId) {
		$vData = array(
		
         		
			'vid_footer'=>$this->input->post('id_footer'),
       		
			'vtext_footer'=>$this->input->post('text_footer'),
       		

		);
		$this->mo_footer->fnUpdatefooter($pfooterId,$vData);
	}
}
?>

	   