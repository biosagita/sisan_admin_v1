<?php
class mo_prioritas_layanan extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fnprioritas_layananCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(t_prioritas_layanan)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fnprioritas_layananData($pprioritas_layananKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		
		$this->db->like(array("id_prioritas"=>$pprioritas_layananKeyword));
		
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
	
		$vResult = $this->db->get(t_prioritas_layanan)->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['id_prioritas'] = $vRow->id_prioritas;		
           
			$vArrayTemp['id_group_loket'] = $vRow->id_group_loket;		
           
			$vArrayTemp['id_group_layanan'] = $vRow->id_group_layanan;		
           
			$vArrayTemp['Prioritas'] = $vRow->Prioritas;		
           
			$vArrayTemp['Kolom%205'] = $vRow->Kolom%205;		
           
			$vArrayTemp['id_prioritas'] = $vRow->id_prioritas;		
           
			$vArrayTemp['id_group_loket'] = $vRow->id_group_loket;		
           
			$vArrayTemp['id_group_layanan'] = $vRow->id_group_layanan;		
           
			$vArrayTemp['Prioritas'] = $vRow->Prioritas;		
           
			$vArrayTemp['Kolom%205'] = $vRow->Kolom%205;		
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	
	
	function fnCreateprioritas_layanan($pData) {
		$vData = array(
	
		   
			'id_prioritas'=>$pData['vid_prioritas'],					
           
			'id_group_loket'=>$pData['vid_group_loket'],					
           
			'id_group_layanan'=>$pData['vid_group_layanan'],					
           
			'Prioritas'=>$pData['vPrioritas'],					
           
			'Kolom%205'=>$pData['vKolom%205'],					
           
			'id_prioritas'=>$pData['vid_prioritas'],					
           
			'id_group_loket'=>$pData['vid_group_loket'],					
           
			'id_group_layanan'=>$pData['vid_group_layanan'],					
           
			'Prioritas'=>$pData['vPrioritas'],					
           
			'Kolom%205'=>$pData['vKolom%205'],					
           
		);
		$vResult = $this->db->insert('t_prioritas_layanan',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnprioritas_layananDelete($pDelprioritas_layananId) {
		
		$vResult = $this->db->where('id_prioritas',$pDelprioritas_layananId)->delete('t_prioritas_layanan');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnprioritas_layananRow($pprioritas_layananId) {
	
		$this->db->where('id_prioritas',$pprioritas_layananId);
		
		$vResult = $this->db->get(t_prioritas_layanan)->result();
		$vRow = $vResult[0];
           
			$vArrayTemp['id_prioritas'] = $vRow->id_prioritas;
           
			$vArrayTemp['id_group_loket'] = $vRow->id_group_loket;
           
			$vArrayTemp['id_group_layanan'] = $vRow->id_group_layanan;
           
			$vArrayTemp['Prioritas'] = $vRow->Prioritas;
           
			$vArrayTemp['Kolom%205'] = $vRow->Kolom%205;
           
			$vArrayTemp['id_prioritas'] = $vRow->id_prioritas;
           
			$vArrayTemp['id_group_loket'] = $vRow->id_group_loket;
           
			$vArrayTemp['id_group_layanan'] = $vRow->id_group_layanan;
           
			$vArrayTemp['Prioritas'] = $vRow->Prioritas;
           
			$vArrayTemp['Kolom%205'] = $vRow->Kolom%205;
           		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdateprioritas_layanan($pprioritas_layananId,$pData) {
		$vData = array(
		
		   
			'id_prioritas'=>$pData['vid_prioritas'],					
           
			'id_group_loket'=>$pData['vid_group_loket'],					
           
			'id_group_layanan'=>$pData['vid_group_layanan'],					
           
			'Prioritas'=>$pData['vPrioritas'],					
           
			'Kolom%205'=>$pData['vKolom%205'],					
           
			'id_prioritas'=>$pData['vid_prioritas'],					
           
			'id_group_loket'=>$pData['vid_group_loket'],					
           
			'id_group_layanan'=>$pData['vid_group_layanan'],					
           
			'Prioritas'=>$pData['vPrioritas'],					
           
			'Kolom%205'=>$pData['vKolom%205'],					
           			
		);
	
		$vResult = $this->db->where('id_prioritas',$pprioritas_layananId)->update('t_prioritas_layanan',$vData);
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
}
?>

