<?php
class md_generator extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('parser');
		$this->load->helper('file');
		$this->load->model('mo_generator');
	}
	function index() {
		$this->fnSetting();
	}
	
	function fnSetting() {
		$this->load->view('vw_setting');
	}
	
	function fnGenerate() {
		//$data['field_tabel'] = $this->db->field_data($tabel);
		//$tbl=str_replace("md_","t_",$this->input->post('10_fldCode'));
		$tbl=str_replace("md_","",$this->input->post('10_fldCode'));
		$this->db->order_by('f_field_id','ASC');
		$this->db->where('table_name',$tbl);		
		$this->db->from("config_grid");
		$data= $this->db->get()->result();
		$field_crud = array();
		$name_field = array();
		//generate field name table non primary key
		foreach ($data  as $field_tabel) {
				$field_crud[] = array('name_field_table' => $field_tabel->f_field_name,
										'text_field_table' => $field_tabel->f_field_text,
										'visible_field_table' => $field_tabel->f_field_visible,
										'align_field_table' => $field_tabel->f_field_align,
										'width_field_table' => $field_tabel->f_field_width,
										'sort_field_table' => $field_tabel->f_field_sort,
										'type_field_table' => $field_tabel->f_field_type										
				);

		}
		
		$fields = $this->db->field_data($tbl);
		$data_primary = array();		
		foreach ($fields as $field)
		{
			if ($field->primary_key == '1') {
				$data_primary[] = array('name_primary' => $field->name);
				//$data['primary_key_tabel']=$field->f_field_name;
			}		 
		} 

        $data['primary_key_tabel'] = $data_primary;	
        $data['primary_key_tabel1'] = $data_primary;			
        $data['primary_key_tabel2'] = $data_primary;	
        $data['primary_key_tabel3'] = $data_primary;	
		
		$data['php_open_first'] = '<?php';
        $data['php_close_first'] = '?>';
		$data['php_open'] = '<?php';
		$data['php_close'] = '?>';
		$data['module_id'] = $this->input->post('10_fldId');
		$module=str_replace("t_","",$this->input->post('10_fldCode'));
		$data['table_name']=str_replace("md_","t_",$this->input->post('10_fldCode'));		
 		$data['table_name_labels']=str_replace("t_","",$data['table_name']);
		$data['table_name_label'] = $data['table_name_labels'];		
		$table_name_label=str_replace("t_","",$data['table_name']);
		$data['module_code'] = $module ;
		$data['module_name'] = $this->input->post('10_fldName');
		$data['module_desc'] = $this->input->post('10_fldDesc');
		$data['model_code'] = str_replace('md', 'mo', $this->input->post('10_fldCode'));
		$data['view_code'] = str_replace('md', 'vw', $this->input->post('10_fldCode'));       
		$tabel=str_replace("md_","",$this->input->post('10_fldCode'));
		$data['k_table_name'] = ucfirst($data['table_name_label']);
		$data['base_url']='<?php echo base_url(); ?>';

			
		mkdir(FCPATH .'generator/'.$module,'0777');
		chmod(FCPATH .'generator/'.$module,0777);
		
        $data['fields_tabel'] = $field_crud;
        $data['fields_tabel1'] = $field_crud;
        $data['fields_tabel2'] = $field_crud;
        $data['fields_tabel3'] = $field_crud;
        $data['fields_tabel4'] = $field_crud;
		
		//generate controller template
        $source_controller_template = $this->parser->parse('template_controller_true', $data, TRUE);
		mkdir(FCPATH.'generator/'.$module.'/controllers','0777');
		chmod(FCPATH.'generator/'.$module.'/controllers',0777);
		
        if (write_file(FCPATH.'generator/'.$module.'/controllers/'.$module.'.php', $source_controller_template)) {
            $success[] = 'Controller Created';
        }

        $source_model_template = $this->parser->parse('template_model_true', $data, TRUE);
		mkdir(FCPATH.'generator/'.$module.'/models','0777');
		chmod(FCPATH.'generator/'.$module.'/models',0777);
		
        if (write_file(FCPATH.'generator/'.$module.'/models/'.str_replace('md', 'mo', $module).'.php', $source_model_template)) {
            $success[] = 'Model Created';
        }
		
        $source_view_template = $this->parser->parse('template_vw_grid', $data, TRUE);
		mkdir(FCPATH.'generator/'.$module.'/views','0777');
		chmod(FCPATH.'generator/'.$module.'/views',0777);
		
        if (write_file(FCPATH.'generator/'.$module.'/views/'.str_replace('md', 'vw', $module).'.php', $source_view_template)) {
            $success[] = 'View Created';
        }
		
		
        $source_form_template = $this->parser->parse('template_form_add_main', $data, TRUE);
		mkdir(FCPATH.'generator/'.$module.'/views','0777');
		chmod(FCPATH.'generator/'.$module.'/views',0777);
		
        if (write_file(FCPATH.'generator/'.$module.'/views/'.str_replace('md_', '', $module).'_add_main.php', $source_form_template)) {
            $success[] = 'Form Created';
        }

	}
	
	function fnSave()
	{
		$data['10_fldId'] = $this->input->post('10_fldId');
		$data['10_fldCode'] = $this->input->post('10_fldCode');
		$data['10_fldName'] = $this->input->post('10_fldName');
		$data['10_fldDesc'] = $this->input->post('10_fldDesc');
		$data['10_fldDetName'] = $this->input->post('10_fldDetName');
		
		mkdir(FCPATH .'generator/'.$module,'0777');
		
		//generate json template
        $source_json_template = json_encode($data);
		mkdir(FCPATH.'generator/'.$module.'/jsons','0777');
        if (write_file(FCPATH.'generator/'.$module.'/jsons/module_desc.json', $source_json_template)) {
            $success[] = 'Json Created';
        }
	}
	
	function fnLoadForm($pModCode)
	{
		echo file_get_contents('generator/'.$pModCode.'/jsons/module_desc.json');
	}
	
	function fnViewModule() {
		$this->load->view('module_select');
	}
	
	function fnSelectModule() {
		$vResult["rows"]=$this->mo_generator->fnSelectModule();
		echo json_encode($vResult);
	}
	

	function fnModuleTableData() {
		$this->mo_generator->fnModuleTableData();
	}
	function fnFieldData($pModuleTableCode) {
		$vModuleTableCode=$pModuleTableCode;
		$vResult=array();
		$vResult["rows"]=$this->mo_generator->fnFieldData($vModuleTableCode);
		echo json_encode($vResult);
	}
	
	function fnComboData() {
		$this->mo_generator->fnComboData();
	}
	
	function fnSaveDetFields($pFieldName,$pFieldText,$pFieldVisible,$pFieldAlign,$pFieldWidth,$pFieldSort,$pFieldType,$pModuleTableCode)
	{
	    $vFieldName=$pFieldName;
	    $vFieldText=$pFieldText;
	    $vFieldVisible=$pFieldVisible;
	    $vFieldAlign=$pFieldAlign;
	    $vFieldWidth=$pFieldWidth;
	    $vFieldSort=$pFieldSort;
	    $vFieldType=$pFieldType;
		$vModuleTableCode=$pModuleTableCode;		
		$vFieldVisible = $pFieldVisible;		
        $table_name=str_replace("t_","",$vModuleTableCode);	
		
		$newdata['f_field_name'] = $vFieldName;
		$newdata['f_field_text'] = $vFieldText;
		$newdata['f_field_visible'] = $vFieldVisible;
		$newdata['f_field_align'] = $vFieldAlign;
		$newdata['f_field_width'] = $vFieldWidth;
		$newdata['f_field_sort'] = $vFieldSort;
		$newdata['f_field_type'] = $vFieldType;
		$newdata['table_name'] = $vModuleTableCode;		
		
		
		$file='generator/jsons/grid_conf_'.$table_name.'.json';
		$data = json_decode(file_get_contents($file));
		
		$number = (end($data)->number) + 1;		
        $newdata['number']= $number;	
		$data[] = $newdata;	
		
		mkdir(FCPATH .'generator/'.$table_name,'0777');
		//generate json template
        $source_json_template = json_encode($data);
		mkdir(FCPATH.'generator/jsons','0777');
        if (write_file(FCPATH.'generator/jsons/grid_conf_'.$table_name.'.json', $source_json_template)) {
            $success[] = 'Json Created';
        }
		
		$this->mo_generator->fnSaveFieldGrid($pFieldName,$pFieldText,$pFieldVisible,$pFieldAlign,$pFieldWidth,$pFieldSort,$pFieldType,$pModuleTableCode);
		
	}
	
}
?>