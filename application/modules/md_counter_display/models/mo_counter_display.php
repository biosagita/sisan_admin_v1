<?php
class mo_counter_display extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fncounter_displayCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(address)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fncounter_displayData($pcounter_displayKeyword,$pOffset,$pRows,$pSort,$pOrder) {

		$this->db->Select("cd.id_address as id_counter_displayx,cd.Address_display as Address_cdx, lo.nama_loket as nama_loketx", FALSE);
		
		$this->db->like(array("cd.id_address"=>$pcounter_displayKeyword));

		$this->db->join("loket AS lo","cd.id_loket=lo.id_loket","Left");
		$this->db->from("address as cd");

		$pSort = !empty($pSort) ? ('cd.'.$pSort) : 'cd.id_address';
		
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
	
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['id_counter_display'] = $vRow->id_counter_displayx;		
           
			$vArrayTemp['Address_cd'] = $vRow->Address_cdx;		
           
			$vArrayTemp['id_loket'] = $vRow->nama_loketx;		
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	
	
	function fnCreatecounter_display($pData) {
		$vData = array(					
           
			'address_display'=>$pData['vaddress_cd'],					
           
			'id_loket'=>$pData['vid_loket'],					
           
		);
		$vResult = $this->db->insert('address',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fncounter_displayDelete($pDelcounter_displayId) {
		
		$vResult = $this->db->where('id_address',$pDelcounter_displayId)->delete('address');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fncounter_displayRow($pcounter_displayId) {
	
		$this->db->where('id_address',$pcounter_displayId);
		
		$vResult = $this->db->get(address)->result();
		$vRow = $vResult[0];
           
			$vArrayTemp['id_counter_display'] = $vRow->id_address;
           
			$vArrayTemp['address_cd'] = $vRow->address_display;
           
			$vArrayTemp['id_loket'] = $vRow->id_loket;
           		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdatecounter_display($pcounter_displayId,$pData) {
		$vData = array(					
           
			'address_display'=>$pData['vaddress_cd'],					
           
			'id_loket'=>$pData['vid_loket'],					
           			
		);
	
		$vResult = $this->db->where('id_address',$pcounter_displayId)->update('address',$vData);
	
		
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

