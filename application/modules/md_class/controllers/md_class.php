<?php
class md_class extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_class');
	}
	function index() {
		$this->fnclass();
	}
	function fnclass()	{
		$this->load->view('vw_class');
	}
	// ======================================== 'Datagrid User Section'
	function fnclassData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$vclassKeyword=$this->input->post('classKeyword');
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
		
		$vSort='f_class_id';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_class->fnclassCount($vclassKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_class->fnclassData($vclassKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}	
	function fnclassAdd() {
		$this->load->view('class_add_main');
	}
	
	function fnclassCreate() {
		$vData = array(
         		
			'vf_class_id'=>$this->input->post('f_class_id'),
       		
			'vf_class_name'=>$this->input->post('f_class_name'),
       		
			'vf_class_remark'=>$this->input->post('f_class_remark'),
       				
		);
		
		
	$this->mo_class->fnCreateclass($vData);
	}
	function fnclassEdit($pclassId) {
		$vData['vclassId'] = $pclassId;
		$this->load->view('class_add_main',$vData);
	}
	function fnclassRow($pclassId) {
		$this->mo_class->fnclassRow($pclassId);
	}
	
	function fnclassDelete() {
		$vDelclassId = intval($_POST['Id']);
		$this->mo_class->fnclassDelete($vDelclassId);
	}
	
	function fnclassUpdate($pclassId) {
		$vData = array(
		
         		
			'vf_class_id'=>$this->input->post('f_class_id'),
       		
			'vf_class_name'=>$this->input->post('f_class_name'),
       		
			'vf_class_remark'=>$this->input->post('f_class_remark'),
       		

		);
		$this->mo_class->fnUpdateclass($pclassId,$vData);
	}
	function fnclassComboData() {
		$vVarQuery = $this->input->post('q');
		if(!$vVarQuery) {
			$vVarQuery='';
		}
		$this->mo_class->fnclassComboData($vVarQuery);
	}
	
}
?>

	   