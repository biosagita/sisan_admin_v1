<?php
class mo_prioritas_layanan extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fnprioritas_layananCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(prioritas_layanan)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fnprioritas_layananData($pprioritas_layananKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		$listgrouploket = $this->listgrouploket(true);
		$listgrouplayanan = $this->listgrouplayanan(true);
		
		$this->db->like(array("id_prioritas"=>$pprioritas_layananKeyword));
		
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
	
		$vResult = $this->db->get(prioritas_layanan)->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):		
           
			$vArrayTemp['id_prioritas'] = $vRow->id_prioritas;		
           
			$vArrayTemp['id_group_loket'] = (!empty($listgrouploket[$vRow->id_group_loket]) ? $listgrouploket[$vRow->id_group_loket]['nama_group_loket'] : '');		
           
			$vArrayTemp['id_group_layanan'] = (!empty($listgrouplayanan[$vRow->id_group_layanan]) ? $listgrouplayanan[$vRow->id_group_layanan]['nama_group_layanan'] : '');		
           
			$vArrayTemp['Prioritas'] = $vRow->Prioritas;		
           
			$vArrayTemp['keterangan'] = $vRow->keterangan;		
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	
	
	function fnCreateprioritas_layanan($pData) {
		$vData = array(					
           
			'id_group_loket'=>$pData['vid_group_loket'],					
           
			'id_group_layanan'=>$pData['vid_group_layanan'],					
           
			'Prioritas'=>$pData['vPrioritas'],					
           
			'keterangan'=>$pData['vketerangan'],					
           
		);
		$vResult = $this->db->insert('prioritas_layanan',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnprioritas_layananDelete($pDelprioritas_layananId) {
		
		$vResult = $this->db->where('id_prioritas',$pDelprioritas_layananId)->delete('prioritas_layanan');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnprioritas_layananRow($pprioritas_layananId) {
		$listgrouploket = $this->listgrouploket(true);
		$listgrouplayanan = $this->listgrouplayanan(true);
	
		$this->db->where('id_prioritas',$pprioritas_layananId);
		
		$vResult = $this->db->get(prioritas_layanan)->result();
		$vRow = $vResult[0];
           
			$vArrayTemp['id_prioritas'] = $vRow->id_prioritas;
           
			$vArrayTemp['id_group_loket'] = $vRow->id_group_loket;
           
			$vArrayTemp['id_group_layanan'] = $vRow->id_group_layanan;
           
			$vArrayTemp['Prioritas'] = $vRow->Prioritas;
           
			$vArrayTemp['keterangan'] = $vRow->keterangan;
           		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdateprioritas_layanan($pprioritas_layananId,$pData) {
		$vData = array(					
           
			'id_group_loket'=>$pData['vid_group_loket'],					
           
			'id_group_layanan'=>$pData['vid_group_layanan'],					
           
			'Prioritas'=>$pData['vPrioritas'],					
           
			'keterangan'=>$pData['vketerangan'],					
           			
		);
	
		$vResult = $this->db->where('id_prioritas',$pprioritas_layananId)->update('prioritas_layanan',$vData);
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}

	function listgrouploket($status = false, $id_group_loket = '') {
		$this->db->select("*");
		$vResult = $this->db->get(group_loket)->result();

		if($status) {
			$txt = array();
			if($vResult) {
				foreach ($vResult as $key => $value) {
					$txt[$value->id_group_loket] = (array) $value;
				}
			}
		} else {
			$txt = '';
			if($vResult) {
				foreach ($vResult as $key => $value) {
					$selected = ($value->id_group_loket == $id_group_loket) ? 'selected' : '';
					$txt .= '<option value="'.$value->id_group_loket.'" '.$selected.'>'.$value->nama_group_loket.'</option>';
				}
			}
		}
		
		return $txt;
	}

	function listgrouplayanan($status = false, $id_group_layanan = '') {
		$this->db->select("*");
		$vResult = $this->db->get(group_layanan)->result();

		if($status) {
			$txt = array();
			if($vResult) {
				foreach ($vResult as $key => $value) {
					$txt[$value->id_group_layanan] = (array) $value;
				}
			}
		} else {
			$txt = '';
			if($vResult) {
				foreach ($vResult as $key => $value) {
					$selected = ($value->id_group_layanan == $id_group_layanan) ? 'selected' : '';
					$txt .= '<option value="'.$value->id_group_layanan.'" '.$selected.'>'.$value->nama_group_layanan.'</option>';
				}
			}
		}

		return $txt;
	}
	
}
?>

