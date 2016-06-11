<?php
class mo_generator extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	function fnSelectModule() {
		$res = mysql_query("SELECT CONCAT('G', a.f_grpmod_id) AS ModId, a.f_grpmod_id AS GroupMod, 0 AS ModSort, a.f_grpmod_name AS ModName, 1 AS IsParent, '' AS f_mod_code, '' AS f_mod_desc
		FROM t_group_module AS a
		INNER JOIN t_module AS b ON b.f_grpmod_id=a.f_grpmod_id
		WHERE a.f_app_id = 1
		UNION
		SELECT a.f_mod_id AS ModId, a.f_grpmod_id AS GroupMod, a.f_mod_sort AS ModSort, a.f_mod_name AS ModName, 0 AS IsParent, a.f_mod_code, a.f_mod_desc
		FROM t_module AS a
		WHERE a.f_app_id = 1
		ORDER BY GroupMod ASC, ModSort ASC");
		$vArrayTemp = array();
		$vItems = array();
		while($vRow = mysql_fetch_array($res)) {
			$vArrayTemp['f_mod_id'] = $vRow['ModId'];
			$vArrayTemp['f_mod_name'] = $vRow['ModName'];
			$vArrayTemp['f_mod_parent'] = $vRow['IsParent'];
			$vArrayTemp['f_mod_code'] = $vRow['f_mod_code'];
			$vArrayTemp['f_mod_desc'] = $vRow['f_mod_desc'];
			if($vRow['IsParent']!='1') {
				$vArrayTemp['f_groupmod'] = $vRow['GroupMod'];
				$vArrayTemp['f_modSort'] = $vRow['ModSort'];
				$vArrayTemp['_parentId'] = 'G'.$vRow['GroupMod'];
			}
			array_push($vItems,$vArrayTemp);
			unset($vArrayTemp);
		}
		return $vItems;
	}
	
   function fnSaveFieldGrid($pFieldName,$pFieldText,$pFieldVisible,$pFieldAlign,$pFieldWidth,$pFieldSort,$pFieldType,$pModuleTableCode){
   	    $vFieldName=$pFieldName;
	    $vFieldText=$pFieldText;
	    $vFieldVisible=$pFieldVisible;
	    $vFieldAlign=$pFieldAlign;
	    $vFieldWidth=$pFieldWidth;
	    $vFieldSort=$pFieldSort;
	    $vFieldType=$pFieldType;
		$vModuleTableCode=$pModuleTableCode;		
		$vFieldVisible = $pFieldVisible;		
        $table_name=$vModuleTableCode;	
		
   		$vData = array(				
		'f_field_name' => $vFieldName,
		'f_field_text' => $vFieldText,
		'f_field_visible' => $vFieldVisible,
		'f_field_align' => $vFieldAlign,
		'f_field_width' => $vFieldWidth,
		'f_field_sort' => $vFieldSort,
		'f_field_type' => $vFieldType,
		'table_name' => $table_name
		);
		$vResult = $this->db->insert('config_grid',$vData);
		

   }

	function fnModuleTableData() {
        $vResult = $this->db->list_tables();
		$vFieldDataJson = array();
		foreach($vResult as $vRow):
			$vArray = array(
				'table_val' => $vRow,
				'table_text' => $vRow
			);
			array_push($vFieldDataJson,$vArray);
		endforeach;
		echo json_encode($vFieldDataJson);
	}
	function fnFieldCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(tes)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
		
	function fnFieldData($pModuleTableCode) {
	$vModuleTableCode=$pModuleTableCode;
	
		$vResult = $this->db->list_fields($vModuleTableCode);
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):            
			$vArray = array(
				'f_field_name' => $vRow
			);          
			array_push($vItems,$vArray);
		endforeach;
		return $vItems;
	}
	

	function fnComboData() {
	   $file='visible.json';
		$data = json_decode(file_get_contents($file));
	}

	
}
?>