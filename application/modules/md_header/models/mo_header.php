<?php
class mo_header extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fnheaderCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(header)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fnheaderData($pheaderKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		
		$this->db->like(array("id_header"=>$pheaderKeyword));
		
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
	
		$vResult = $this->db->get(header)->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['id_header'] = $vRow->id_header;		
           
			$vArrayTemp['text_header'] = $vRow->text_header;		
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	
	
	function fnCreateheader($pData) {
		$vData = array(
	
		   
			'id_header'=>$pData['vid_header'],					
           
			'text_header'=>$pData['vtext_header'],					
           
		);
		$vResult = $this->db->insert('header',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnheaderDelete($pDelheaderId) {
		
		$vResult = $this->db->where('id_header',$pDelheaderId)->delete('header');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnheaderRow($pheaderId) {
	
		$this->db->where('id_header',$pheaderId);
		
		$vResult = $this->db->get(header)->result();
		$vRow = $vResult[0];
           
			$vArrayTemp['id_header'] = $vRow->id_header;
           
			$vArrayTemp['text_header'] = $vRow->text_header;
           		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdateheader($pheaderId,$pData) {
		$vData = array(
		
		   
			'id_header'=>$pData['vid_header'],					
           
			'text_header'=>$pData['vtext_header'],					
           			
		);
	
		$vResult = $this->db->where('id_header',$pheaderId)->update('header',$vData);
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
}
?>

