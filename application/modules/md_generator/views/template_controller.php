{php_open_first}
class {module_code} extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('{model_code}');
		$this->load->model('md_get_action/mo_get_action');
	}
	function index() {
		$this->fnOpen();
	}
	function fnOpen()	{
		$vResult = $this->mo_get_action->fnGetAction('{module_code}');
		foreach($vResult as $vRow):
			$vData[$vRow->f_action_code]=1;
		endforeach;
		$this->load->view('{view_code}',$vData);
	}
	function fnGetData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$vInsuredKeyword=$this->input->post('InsuredKeyword');
		$vSort=$this->input->post('sort');
		$vOrder=$this->input->post('order');
		if(!$vPage) {
			$vPage=1;
		}
		if(!$vRows) {
			$vRows=20;
		}
		if(!$vInsuredKeyword) {
			$vInsuredKeyword='';
		}
		if(!$vSort) {
			$vSort='regslip_id';
		} else {
			if($vSort=='closing_regslip_id') {
				$vSort='regslip_id';
			} else if($vSort=='closing_regslip_date') {
				$vSort='regslip_id';
			} else if($vSort=='closing_regslip_insured') {
				$vSort='regslip_insured';
			} else if($vSort=='closing_segment') {
				$vSort='segment';
			}
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->{model_name}->fnCount($vInsuredKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_reg_close->fnRegCloseData($vInsuredKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}
	function fnAdd() {
		$this->load->view('_add_main');
	}
	function fnEdit($pId) {
		$vData['vId'] = $pId;
		$this->load->view('_add_main', $vData);
	}
}
{php_close_first}
