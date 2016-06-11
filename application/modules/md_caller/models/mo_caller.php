<?php
class mo_caller extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fncallerCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(caller)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fncallerData($pcallerKeyword,$pOffset,$pRows,$pSort,$pOrder) {

		$this->db->Select("ca.id_caller as id_callerx,ca.address_caller as address_callerx, ca.status_off as status_offx, lo.nama_loket as nama_loketx", FALSE);
		
		$this->db->like(array("ca.id_caller"=>$pcallerKeyword));

		$this->db->join("loket AS lo","ca.id_loket=lo.id_loket","Left");
		$this->db->from("caller as ca");
		
		$pSort = !empty($pSort) ? ('ca.'.$pSort) : 'ca.id_caller';

		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
	
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['id_caller'] = $vRow->id_callerx;		
           
			$vArrayTemp['address_caller'] = $vRow->address_callerx;		
           
			$vArrayTemp['id_loket'] = $vRow->nama_loketx;		
           
			$vArrayTemp['status_off'] = !empty($vRow->status_offx) ? '<div style="width:10px;height:10px;background:green;">&nbsp;<div>' : '<div style="width:10px;height:10px;background:red;">&nbsp;<div>';		
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	
	
	function fnCreatecaller($pData) {
		$vData = array(					
           
			'address_caller'=>$pData['vaddress_caller'],					
           
			'id_loket'=>$pData['vid_loket'],					
           
			'status_off'=>$pData['vstatus_off'],					
           
		);
		$vResult = $this->db->insert('caller',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fncallerDelete($pDelcallerId) {
		
		$vResult = $this->db->where('id_caller',$pDelcallerId)->delete('caller');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fncallerRow($pcallerId) {
	
		$this->db->where('id_caller',$pcallerId);
		
		$vResult = $this->db->get(caller)->result();
		$vRow = $vResult[0];
           
			$vArrayTemp['id_caller'] = $vRow->id_caller;
           
			$vArrayTemp['address_caller'] = $vRow->address_caller;
           
			$vArrayTemp['id_loket'] = $vRow->id_loket;
           
			$vArrayTemp['status_off'] = $vRow->status_off;
           		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdatecaller($pcallerId,$pData) {
		$vData = array(					
           
			'address_caller'=>$pData['vaddress_caller'],					
           
			'id_loket'=>$pData['vid_loket'],					
           
			'status_off'=>$pData['vstatus_off'],					
           			
		);
	
		$vResult = $this->db->where('id_caller',$pcallerId)->update('caller',$vData);
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}

	function listloket($id_loket = '') {
		$txt = '';
		$this->db->select("*");
		$vResult = $this->db->get(loket)->result();
		if($vResult) {
			foreach ($vResult as $key => $value) {
				$selected = ($value->id_loket == $id_loket) ? 'selected' : '';
				$txt .= '<option value="'.$value->id_loket.'" '.$selected.'>'.$value->nama_loket.'</option>';
			}
		}
		return $txt;
	}
	
}
?>

