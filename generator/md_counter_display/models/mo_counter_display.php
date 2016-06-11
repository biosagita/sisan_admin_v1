<?php
class mo_counter_display extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fncounter_displayCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(t_counter_display)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fncounter_displayData($pcounter_displayKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		
		$this->db->like(array("id_counter_display"=>$pcounter_displayKeyword));
		
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
	
		$vResult = $this->db->get(t_counter_display)->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['id_counter_display'] = $vRow->id_counter_display;		
           
			$vArrayTemp['Address_cd'] = $vRow->Address_cd;		
           
			$vArrayTemp['id_loket'] = $vRow->id_loket;		
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	
	
	function fnCreatecounter_display($pData) {
		$vData = array(
	
		   
			'id_counter_display'=>$pData['vid_counter_display'],					
           
			'Address_cd'=>$pData['vAddress_cd'],					
           
			'id_loket'=>$pData['vid_loket'],					
           
		);
		$vResult = $this->db->insert('t_counter_display',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fncounter_displayDelete($pDelcounter_displayId) {
		
		$vResult = $this->db->where('id_counter_display',$pDelcounter_displayId)->delete('t_counter_display');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fncounter_displayRow($pcounter_displayId) {
	
		$this->db->where('id_counter_display',$pcounter_displayId);
		
		$vResult = $this->db->get(t_counter_display)->result();
		$vRow = $vResult[0];
           
			$vArrayTemp['id_counter_display'] = $vRow->id_counter_display;
           
			$vArrayTemp['Address_cd'] = $vRow->Address_cd;
           
			$vArrayTemp['id_loket'] = $vRow->id_loket;
           		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdatecounter_display($pcounter_displayId,$pData) {
		$vData = array(
		
		   
			'id_counter_display'=>$pData['vid_counter_display'],					
           
			'Address_cd'=>$pData['vAddress_cd'],					
           
			'id_loket'=>$pData['vid_loket'],					
           			
		);
	
		$vResult = $this->db->where('id_counter_display',$pcounter_displayId)->update('t_counter_display',$vData);
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
}
?>

