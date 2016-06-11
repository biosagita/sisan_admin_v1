<?php
class mo_waktu_layanan extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fnwaktu_layananCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(waktu_layanan)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fnwaktu_layananData($pwaktu_layananKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		
		$this->db->like(array("id_waktu_layanan"=>$pwaktu_layananKeyword));
		
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
	
		$vResult = $this->db->get(waktu_layanan)->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['id_waktu_layanan'] = $vRow->id_waktu_layanan;		
           
			$vArrayTemp['waktu_awal_1'] = $vRow->waktu_awal_1;		
           
			$vArrayTemp['waktu_akhir_1'] = $vRow->waktu_akhir_1;		
           
			$vArrayTemp['waktu_awal_2'] = $vRow->waktu_awal_2;		
           
			$vArrayTemp['waktu_akhir_2'] = $vRow->waktu_akhir_2;		
           
			$vArrayTemp['waktu_awal_3'] = $vRow->waktu_awal_3;		
           
			$vArrayTemp['waktu_akhir_3'] = $vRow->waktu_akhir_3;		
           
			$vArrayTemp['keterangan'] = $vRow->keterangan;		
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	
	
	function fnCreatewaktu_layanan($pData) {
		$vData = array(					
           
			'waktu_awal_1'=>$pData['vwaktu_awal_1'],					
           
			'waktu_akhir_1'=>$pData['vwaktu_akhir_1'],					
           
			'waktu_awal_2'=>$pData['vwaktu_awal_2'],					
           
			'waktu_akhir_2'=>$pData['vwaktu_akhir_2'],					
           
			'waktu_awal_3'=>$pData['vwaktu_awal_3'],					
           
			'waktu_akhir_3'=>$pData['vwaktu_akhir_3'],					
           
			'keterangan'=>$pData['vketerangan'],					
           
		);
		$vResult = $this->db->insert('waktu_layanan',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnwaktu_layananDelete($pDelwaktu_layananId) {
		
		$vResult = $this->db->where('id_waktu_layanan',$pDelwaktu_layananId)->delete('waktu_layanan');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnwaktu_layananRow($pwaktu_layananId) {
	
		$this->db->where('id_waktu_layanan',$pwaktu_layananId);
		
		$vResult = $this->db->get(waktu_layanan)->result();
		$vRow = $vResult[0];
           
			$vArrayTemp['id_waktu_layanan'] = $vRow->id_waktu_layanan;
           
			$vArrayTemp['waktu_awal_1'] = $vRow->waktu_awal_1;
           
			$vArrayTemp['waktu_akhir_1'] = $vRow->waktu_akhir_1;
           
			$vArrayTemp['waktu_awal_2'] = $vRow->waktu_awal_2;
           
			$vArrayTemp['waktu_akhir_2'] = $vRow->waktu_akhir_2;
           
			$vArrayTemp['waktu_awal_3'] = $vRow->waktu_awal_3;
           
			$vArrayTemp['waktu_akhir_3'] = $vRow->waktu_akhir_3;
           
			$vArrayTemp['keterangan'] = $vRow->keterangan;
           		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdatewaktu_layanan($pwaktu_layananId,$pData) {
		$vData = array(					
           
			'waktu_awal_1'=>$pData['vwaktu_awal_1'],					
           
			'waktu_akhir_1'=>$pData['vwaktu_akhir_1'],					
           
			'waktu_awal_2'=>$pData['vwaktu_awal_2'],					
           
			'waktu_akhir_2'=>$pData['vwaktu_akhir_2'],					
           
			'waktu_awal_3'=>$pData['vwaktu_awal_3'],					
           
			'waktu_akhir_3'=>$pData['vwaktu_akhir_3'],					
           
			'keterangan'=>$pData['vketerangan'],					
           			
		);
	
		$vResult = $this->db->where('id_waktu_layanan',$pwaktu_layananId)->update('waktu_layanan',$vData);
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
}
?>

