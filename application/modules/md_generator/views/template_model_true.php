{php_open}
class mo_{table_name_label} extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fn{table_name_label}Count() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get({table_name})->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fn{table_name_label}Data($p{table_name_label}Keyword,$pOffset,$pRows,$pSort,$pOrder) {
	{primary_key_tabel}	
		$this->db->like(array("{name_primary}"=>$p{table_name_label}Keyword));
	{/primary_key_tabel}	
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
	
		$vResult = $this->db->get({table_name})->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           {fields_tabel}
			$vArrayTemp['{name_field_table}'] = $vRow->{name_field_table};		
           {/fields_tabel}	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	
	
	function fnCreate{table_name_label}($pData) {
		$vData = array(
	
		   {fields_tabel1}
			'{name_field_table}'=>$pData['v{name_field_table}'],					
           {/fields_tabel1}
		);
		$vResult = $this->db->insert('{table_name}',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fn{table_name_label}Delete($pDel{table_name_label}Id) {
	{primary_key_tabel1}	
		$vResult = $this->db->where('{name_primary}',$pDel{table_name_label}Id)->delete('{table_name}');
	{/primary_key_tabel1}
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fn{table_name_label}Row($p{table_name_label}Id) {
	{primary_key_tabel2}
		$this->db->where('{name_primary}',$p{table_name_label}Id);
	{/primary_key_tabel2}	
		$vResult = $this->db->get({table_name})->result();
		$vRow = $vResult[0];
           {fields_tabel2}
			$vArrayTemp['{name_field_table}'] = $vRow->{name_field_table};
           {/fields_tabel2}		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdate{table_name_label}($p{table_name_label}Id,$pData) {
		$vData = array(
		
		   {fields_tabel3}
			'{name_field_table}'=>$pData['v{name_field_table}'],					
           {/fields_tabel3}			
		);
	{primary_key_tabel3}
		$vResult = $this->db->where('{name_primary}',$p{table_name_label}Id)->update('{table_name}',$vData);
	{/primary_key_tabel3}
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
}
{php_close}

