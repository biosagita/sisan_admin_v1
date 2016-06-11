{php_open}
class md_{table_name_label} extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_{table_name_label}');
	}
	function index() {
		$this->fn{table_name_label}();
	}
	function fn{table_name_label}()	{
		$this->load->view('vw_{table_name_label}');
	}
	// ======================================== 'Datagrid User Section'
	function fn{table_name_label}Data() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$v{table_name_label}Keyword=$this->input->post('{table_name_label}Keyword');
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
	{primary_key_tabel2}	
		$vSort='{name_primary}';
	{/primary_key_tabel2}	
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_{table_name_label}->fn{table_name_label}Count($v{table_name_label}Keyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_{table_name_label}->fn{table_name_label}Data($v{table_name_label}Keyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}	
	function fn{table_name_label}Add() {
		$this->load->view('{table_name_label}_add_main');
	}
	
	function fn{table_name_label}Create() {
		$vData = array(
         {fields_tabel}		
			'v{name_field_table}'=>$this->input->post('{name_field_table}'),
       {/fields_tabel}				
		);
		
		
	$this->mo_{table_name_label}->fnCreate{table_name_label}($vData);
	}
	function fn{table_name_label}Edit($p{table_name_label}Id) {
		$vData['v{table_name_label}Id'] = $p{table_name_label}Id;
		$this->load->view('{table_name_label}_add_main',$vData);
	}
	function fn{table_name_label}Row($p{table_name_label}Id) {
		$this->mo_{table_name_label}->fn{table_name_label}Row($p{table_name_label}Id);
	}
	
	function fn{table_name_label}Delete() {
		$vDel{table_name_label}Id = intval($_POST['Id']);
		$this->mo_{table_name_label}->fn{table_name_label}Delete($vDel{table_name_label}Id);
	}
	
	function fn{table_name_label}Update($p{table_name_label}Id) {
		$vData = array(
		
         {fields_tabel}		
			'v{name_field_table}'=>$this->input->post('{name_field_table}'),
       {/fields_tabel}		

		);
		$this->mo_{table_name_label}->fnUpdate{table_name_label}($p{table_name_label}Id,$vData);
	}
}
{php_close}

	   