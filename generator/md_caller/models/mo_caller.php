<?php
class mo_caller extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fncallerCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(t_caller)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fncallerData($pcallerKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		
		$this->db->like(array("id_caller"=>$pcallerKeyword));
		
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
	
		$vResult = $this->db->get(t_caller)->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['id_caller'] = $vRow->id_caller;		
           
			$vArrayTemp['address_caller'] = $vRow->address_caller;		
           
			$vArrayTemp['id_loket'] = $vRow->id_loket;		
           
			$vArrayTemp['status_off'] = $vRow->status_off;		
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	
	
	function fnCreatecaller($pData) {
		$vData = array(
	
		   
			'id_caller'=>$pData['vid_caller'],					
           
			'address_caller'=>$pData['vaddress_caller'],					
           
			'id_loket'=>$pData['vid_loket'],					
           
			'status_off'=>$pData['vstatus_off'],					
           
		);
		$vResult = $this->db->insert('t_caller',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fncallerDelete($pDelcallerId) {
		
		$vResult = $this->db->where('id_caller',$pDelcallerId)->delete('t_caller');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fncallerRow($pcallerId) {
	
		$this->db->where('id_caller',$pcallerId);
		
		$vResult = $this->db->get(t_caller)->result();
		$vRow = $vResult[0];
           
			$vArrayTemp['id_caller'] = $vRow->id_caller;
           
			$vArrayTemp['address_caller'] = $vRow->address_caller;
           
			$vArrayTemp['id_loket'] = $vRow->id_loket;
           
			$vArrayTemp['status_off'] = $vRow->status_off;
           		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdatecaller($pcallerId,$pData) {
		$vData = array(
		
		   
			'id_caller'=>$pData['vid_caller'],					
           
			'address_caller'=>$pData['vaddress_caller'],					
           
			'id_loket'=>$pData['vid_loket'],					
           
			'status_off'=>$pData['vstatus_off'],					
           			
		);
	
		$vResult = $this->db->where('id_caller',$pcallerId)->update('t_caller',$vData);
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
}
?>

