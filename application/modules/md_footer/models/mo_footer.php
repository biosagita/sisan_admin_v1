<?php
class mo_footer extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fnfooterCount($pfooterKeyword) {
		if(!empty($pfooterKeyword)) {
			$this->db->like(array("text_footer"=>$pfooterKeyword));
		}
		
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(footer)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fnfooterData($pfooterKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		
		if(!empty($pfooterKeyword)) {
			$this->db->like(array("text_footer"=>$pfooterKeyword));
		}
		
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
	
		$vResult = $this->db->get(footer)->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['id_footer'] = $vRow->id_footer;		
           
			$vArrayTemp['text_footer'] = $vRow->text_footer;		
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	
	
	function fnCreatefooter($pData) {
		$vData = array(
	
		   
			'id_footer'=>$pData['vid_footer'],					
           
			'text_footer'=>$pData['vtext_footer'],					
           
		);
		$vResult = $this->db->insert('footer',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnfooterDelete($pDelfooterId) {
		
		$vResult = $this->db->where('id_footer',$pDelfooterId)->delete('footer');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnfooterRow($pfooterId) {
	
		$this->db->where('id_footer',$pfooterId);
		
		$vResult = $this->db->get(footer)->result();
		$vRow = $vResult[0];
           
			$vArrayTemp['id_footer'] = $vRow->id_footer;
           
			$vArrayTemp['text_footer'] = $vRow->text_footer;
           		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdatefooter($pfooterId,$pData) {
		$vData = array(
		
		   
			'id_footer'=>$pData['vid_footer'],					
           
			'text_footer'=>$pData['vtext_footer'],					
           			
		);
	
		$vResult = $this->db->where('id_footer',$pfooterId)->update('footer',$vData);
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
}
?>

