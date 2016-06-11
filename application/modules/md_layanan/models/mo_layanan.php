<?php
class mo_layanan extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fnlayananCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(layanan)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fnlayananData($playananKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		
		$this->db->like(array("a.id_layanan"=>$playananKeyword));
		$this->db->Select("d.waktu_awal_1, d.waktu_akhir_1, d.waktu_awal_2, d.waktu_akhir_2, d.waktu_awal_3, d.waktu_akhir_3, a.id_layanan,a.nama_layanan,b.nama_group_layanan,c.nama_layanan as forward,a.layanan_status,a.keterangan,a.stok,a.status_popup,a.estimasi");
		
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
		$this->db->join('group_layanan as b','a.id_group_layanan=b.id_group_layanan','Left');
		$this->db->join('layanan as c','a.id_layanan_forward=c.id_layanan','Left');
		$this->db->join('waktu_layanan as d','a.id_waktu_layanan=d.id_waktu_layanan','Left');
		
		$this->db->from('layanan as a');
	
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['id_layanan'] = $vRow->id_layanan;		
           
			$vArrayTemp['nama_layanan'] = $vRow->nama_layanan;		
           
			$vArrayTemp['id_group_layanan'] = $vRow->nama_group_layanan;		
			if ($vRow->layanan_status == 1){
			$sts='Aktif';
			}
			Else{
			$sts='Tidak Aktif';
			}
			$vArrayTemp['layanan_status'] = $sts;		
           
			$vArrayTemp['keterangan'] = $vRow->keterangan;		
           
			$vArrayTemp['id_layanan_forward'] = $vRow->forward;		
           
			$vArrayTemp['stok'] = $vRow->stok;		
			if($vRow->status_popup ==1){
			$status='Aktif';
			}
			else{
			$status='Tidak Aktif';
			}
			$vArrayTemp['status_popup'] = $status;	

			$waktu_layanan = '-';
			if(!empty($vRow->waktu_awal_1)) $waktu_layanan = $vRow->waktu_awal_1 . ' s/d ' . $vRow->waktu_akhir_1 . ' # ' . $vRow->waktu_awal_2 . ' s/d ' . $vRow->waktu_akhir_2 . ' # ' . $vRow->waktu_awal_3 . ' s/d ' . $vRow->waktu_akhir_3;	

			$vArrayTemp['id_waktu_layanan'] = $waktu_layanan;

			$vArrayTemp['estimasi'] = $vRow->estimasi;		
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	
	
	function fnCreatelayanan($pData) {
		$vData = array(
	
			'nama_layanan'=>$pData['vnama_layanan'],					
           
			'id_group_layanan'=>$pData['vid_group_layanan'],					
           
			'layanan_status'=>$pData['vlayanan_status'],					
           
			'keterangan'=>$pData['vketerangan'],					
           
			'id_layanan_forward'=>$pData['vid_layanan_forward'],					
           
			'stok'=>$pData['vstock'],					

			'status_popup'=>$pData['vstatus_popup'],

			'id_waktu_layanan'=>$pData['vid_waktu_layanan'],					

			'estimasi'=>$pData['vestimasi'],					
           
		);
		$vResult = $this->db->insert('layanan',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnlayananDelete($pDellayananId) {
		
		$vResult = $this->db->where('id_layanan',$pDellayananId)->delete('layanan');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnlayananRow($playananId) {
	
		$this->db->where('id_layanan',$playananId);
		
		$vResult = $this->db->get(layanan)->result();
		$vRow = $vResult[0];
           
			$vArrayTemp['id_layanan'] = $vRow->id_layanan;
           
			$vArrayTemp['nama_layanan'] = $vRow->nama_layanan;
           
			$vArrayTemp['id_group_layanan'] = $vRow->id_group_layanan;
           
			$vArrayTemp['layanan_status'] = $vRow->layanan_status;
           
			$vArrayTemp['keterangan'] = $vRow->keterangan;
           
			$vArrayTemp['id_layanan_forward'] = $vRow->id_layanan_forward;
           
			$vArrayTemp['stok'] = $vRow->stok;		

			$vArrayTemp['status_popup'] = $vRow->status_popup;

			$vArrayTemp['id_waktu_layanan'] = $vRow->id_waktu_layanan;		

			$vArrayTemp['estimasi'] = $vRow->estimasi;		

           		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdatelayanan($playananId,$pData) {
		$vData = array(
		
		              
			'nama_layanan'=>$pData['vnama_layanan'],					
           
			'id_group_layanan'=>$pData['vid_group_layanan'],					
           
			'layanan_status'=>$pData['vlayanan_status'],					
           
			'keterangan'=>$pData['vketerangan'],					
           
			'id_layanan_forward'=>$pData['vid_layanan_forward'],					
           
			'stok'=>$pData['vstock'],					

			'status_popup'=>$pData['vstatus_popup'],

			'id_waktu_layanan'=>$pData['vid_waktu_layanan'],					

			'estimasi'=>$pData['vestimasi'],					
			
		);
	
		$vResult = $this->db->where('id_layanan',$playananId)->update('layanan',$vData);
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}

	function getPilihanWaktuLayanan() {
		$arrData = array();
		$this->db->select("*");
		$vResult = $this->db->get(waktu_layanan)->result();
		if($vResult) {
			foreach ($vResult as $key => $value) {
				$arrData[$value->id_waktu_layanan] = $value->waktu_awal_1 . ' s/d ' . $value->waktu_akhir_1 . ' # ' . $value->waktu_awal_2 . ' s/d ' . $value->waktu_akhir_2 . ' # ' . $value->waktu_awal_3 . ' s/d ' . $value->waktu_akhir_3;
			}
		}
		return $arrData;
	}

	function fnlayananComboData($pVarQuery) {
		$this->db->select('id_layanan,nama_layanan');
		$vResult = $this->db->get('layanan')->result();
		$vgroup_layananDataJson = array();
		foreach($vResult as $vRow):
			array_push($vgroup_layananDataJson,$vRow);
		endforeach;
		echo json_encode($vgroup_layananDataJson);
	}
	
}
?>

