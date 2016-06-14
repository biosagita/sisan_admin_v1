<?php
class mo_laporan_additional_type extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fnAdditionalTypeCount($vStartKeyword,$vFinishKeyword,$vAdditionalTypeKeyword) {
		if(!empty($vStartKeyword)) {
			$this->db->where('DATE_FORMAT(adty_entrydate, "%Y-%m-%d") >= "'.$vStartKeyword.'"' );	
		}

		if(!empty($vFinishKeyword)) {
			$this->db->where('DATE_FORMAT(adty_entrydate, "%Y-%m-%d") <= "'.$vFinishKeyword.'"');	
		}

		/*
		if((empty($vStartKeyword) AND empty($vFinishKeyword)) OR ($vStartKeyword == 'all' AND $vFinishKeyword == 'all')) {
			$now = date('Y-m-d');
			$this->db->where('DATE_FORMAT(adty_entrydate, "%Y-%m-%d") >= "'.$now.'"');
			$this->db->where('DATE_FORMAT(adty_entrydate, "%Y-%m-%d") <= "'.$now.'"');
			$tgl_periode = date('d-m-Y') . ' s/d ' . date('d-m-Y');
		}
		*/

		if(!empty($vAdditionalTypeKeyword)) {
			$this->db->where('adty_type_info LIKE "%'.$vAdditionalTypeKeyword.'%"');
		}
		
		$this->db->select("count(*) as selectCount", FALSE);

		$this->db->from("additional_type");
		
		$vResult = $this->db->get()->result();
		//echo $this->db->last_query();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fnAdditionalTypeData($vStartKeyword,$vFinishKeyword,$vAdditionalTypeKeyword,$vOffset,$vRows,$vSort,$vOrder) {
		if(!empty($vStartKeyword)) {
			$this->db->where('DATE_FORMAT(adty_entrydate, "%Y-%m-%d") >= "'.$vStartKeyword.'"' );
		}

		if(!empty($vFinishKeyword)) {
			$this->db->where('DATE_FORMAT(adty_entrydate, "%Y-%m-%d") <= "'.$vFinishKeyword.'"');	
		}

		/*
		if((empty($vStartKeyword) AND empty($vFinishKeyword)) OR ($vStartKeyword == 'all' AND $vFinishKeyword == 'all')) {
			$now = date('Y-m-d');
			$this->db->where('DATE_FORMAT(adty_entrydate, "%Y-%m-%d") >= "'.$now.'"');
			$this->db->where('DATE_FORMAT(adty_entrydate, "%Y-%m-%d") <= "'.$now.'"');
			$tgl_periode = date('d-m-Y') . ' s/d ' . date('d-m-Y');
		}
		*/

		if(!empty($vAdditionalTypeKeyword)) {
			$this->db->where('adty_type_info LIKE "%'.$vAdditionalTypeKeyword.'%"');
		}

		$this->db->select('*, DATE_FORMAT(adty_entrydate, "%d-%m-%Y") as tanggal', FALSE);

		$this->db->order_by($vSort,$vOrder);
		$this->db->limit($vRows,$vOffset);
		$this->db->from("additional_type");
		
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();

		foreach($vResult as $vRow):
             
			$vArrayTemp['adty_id'] = $vRow->adty_id;

			//$vArrayTemp['adty_trans_id'] = $vRow->adty_trans_id;		

			//$vArrayTemp['adty_type_id'] = $vRow->adty_type_id;

			$vArrayTemp['adty_type_info'] = $vRow->adty_type_info;

			$vArrayTemp['adty_note'] = $vRow->adty_note;	

			$vArrayTemp['adty_entrydate'] = $vRow->tanggal;
			
		array_push($vItems,$vArrayTemp);
		endforeach;
		//return $data_master;                      		
		return $vItems;
	}
//==========Print Report=======	

	function fnAdditionalTypeDataPrint($vStartKeyword,$vFinishKeyword,$vAdditionalTypeKeyword) {
		if($vStartKeyword != 'all') {
			$this->db->where('DATE_FORMAT(adty_entrydate, "%Y-%m-%d") >= "'.$vStartKeyword.'"' );
		}

		if($vFinishKeyword != 'all') {
			$this->db->where('DATE_FORMAT(adty_entrydate, "%Y-%m-%d") <= "'.$vFinishKeyword.'"');	
		}

		/*
		if((empty($vStartKeyword) AND empty($vFinishKeyword)) OR ($vStartKeyword == 'all' AND $vFinishKeyword == 'all')) {
			$now = date('Y-m-d');
			$this->db->where('DATE_FORMAT(adty_entrydate, "%Y-%m-%d") >= "'.$now.'"');
			$this->db->where('DATE_FORMAT(adty_entrydate, "%Y-%m-%d") <= "'.$now.'"');
			$tgl_periode = date('d-m-Y') . ' s/d ' . date('d-m-Y');
		}
		*/

		if(!empty($vAdditionalTypeKeyword)) {
			$this->db->where('adty_type_info LIKE "%'.$vAdditionalTypeKeyword.'%"');
		}

		$this->db->select('*, DATE_FORMAT(adty_entrydate, "%d-%m-%Y") as tanggal', FALSE);

		$this->db->order_by('adty_id','DESC');
		$this->db->from("additional_type");
		
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();

		foreach($vResult as $vRow):
             
			$vArrayTemp['adty_id'] = $vRow->adty_id;

			//$vArrayTemp['adty_trans_id'] = $vRow->adty_trans_id;		

			//$vArrayTemp['adty_type_id'] = $vRow->adty_type_id;

			$vArrayTemp['adty_type_info'] = $vRow->adty_type_info;

			$vArrayTemp['adty_note'] = $vRow->adty_note;	

			$vArrayTemp['adty_entrydate'] = $vRow->tanggal;
			
		array_push($vItems,$vArrayTemp);
		endforeach;
		//return $data_master;                      		
		return $vItems;
	}

	function getDataCompany() {
		$this->db->limit(1);
		$vResult = $this->db->get(t_comp_profile)->result();
		$vItems = array();
		foreach($vResult as $vRow) {
			$vItems = (array) $vRow;
		}
		return $vItems;
	}
	
}
?>

