<?php
class md_prioritas_layanan extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_prioritas_layanan');
	}
	function index() {
		$this->fnprioritas_layanan();
	}
	function fnprioritas_layanan()	{
		$this->load->view('vw_prioritas_layanan');
	}
	// ======================================== 'Datagrid User Section'
	function fnprioritas_layananData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$vprioritas_layananKeyword=$this->input->post('prioritas_layananKeyword');
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
		
		$vSort='id_prioritas';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_prioritas_layanan->fnprioritas_layananCount($vprioritas_layananKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_prioritas_layanan->fnprioritas_layananData($vprioritas_layananKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}	
	function fnprioritas_layananAdd() {
		$this->load->view('prioritas_layanan_add_main');
	}
	
	function fnprioritas_layananCreate() {
		$vData = array(
         		
			'vid_prioritas'=>$this->input->post('id_prioritas'),
       		
			'vid_group_loket'=>$this->input->post('id_group_loket'),
       		
			'vid_group_layanan'=>$this->input->post('id_group_layanan'),
       		
			'vPrioritas'=>$this->input->post('Prioritas'),
       		
			'vKolom%205'=>$this->input->post('Kolom%205'),
       		
			'vid_prioritas'=>$this->input->post('id_prioritas'),
       		
			'vid_group_loket'=>$this->input->post('id_group_loket'),
       		
			'vid_group_layanan'=>$this->input->post('id_group_layanan'),
       		
			'vPrioritas'=>$this->input->post('Prioritas'),
       		
			'vKolom%205'=>$this->input->post('Kolom%205'),
       				
		);
		
		
	$this->mo_prioritas_layanan->fnCreateprioritas_layanan($vData);
	}
	function fnprioritas_layananEdit($pprioritas_layananId) {
		$vData['vprioritas_layananId'] = $pprioritas_layananId;
		$this->load->view('prioritas_layanan_add_main',$vData);
	}
	function fnprioritas_layananRow($pprioritas_layananId) {
		$this->mo_prioritas_layanan->fnprioritas_layananRow($pprioritas_layananId);
	}
	
	function fnprioritas_layananDelete() {
		$vDelprioritas_layananId = intval($_POST['Id']);
		$this->mo_prioritas_layanan->fnprioritas_layananDelete($vDelprioritas_layananId);
	}
	
	function fnprioritas_layananUpdate($pprioritas_layananId) {
		$vData = array(
		
         		
			'vid_prioritas'=>$this->input->post('id_prioritas'),
       		
			'vid_group_loket'=>$this->input->post('id_group_loket'),
       		
			'vid_group_layanan'=>$this->input->post('id_group_layanan'),
       		
			'vPrioritas'=>$this->input->post('Prioritas'),
       		
			'vKolom%205'=>$this->input->post('Kolom%205'),
       		
			'vid_prioritas'=>$this->input->post('id_prioritas'),
       		
			'vid_group_loket'=>$this->input->post('id_group_loket'),
       		
			'vid_group_layanan'=>$this->input->post('id_group_layanan'),
       		
			'vPrioritas'=>$this->input->post('Prioritas'),
       		
			'vKolom%205'=>$this->input->post('Kolom%205'),
       		

		);
		$this->mo_prioritas_layanan->fnUpdateprioritas_layanan($pprioritas_layananId,$vData);
	}
}
?>

	   