<?php
class mo_kurs extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fnkursCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(kurs)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fnkursData($pkursKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		
		$this->db->like(array("id_kurs"=>$pkursKeyword));
		
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
	
		$vResult = $this->db->get(kurs)->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           	$vArrayTemp['id_kurs'] = $vRow->id_kurs;		
            $vArrayTemp['nama_kurs'] = $vRow->nama_kurs;		
            $vArrayTemp['simbol_kurs'] = $vRow->simbol_kurs;	
			$vArrayTemp['kurs_jual'] = $vRow->kurs_jual;		
           	$vArrayTemp['kurs_beli'] = $vRow->kurs_beli;	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	
	
	function fnCreatekurs($pData) {
		$vData = array(
			'id_kurs'=>$pData['vid_kurs'],					
           
			'nama_kurs'=>$pData['vnama_kurs'],					
           
			'simbol_kurs'=>$pData['vsimbol_kurs'],
		    
		    'kurs_jual'=>$pData['vkurs_jual'],					
           
			'kurs_beli'=>$pData['vkurs_beli']
		);
		$vResult = $this->db->insert('kurs',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnkursDelete($pDelkursId) {
		
		$vResult = $this->db->where('id_kurs',$pDelkursId)->delete('kurs');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnkursRow($pkursId) {
	
		$this->db->where('id_kurs',$pkursId);
		
		$vResult = $this->db->get(kurs)->result();
		$vRow = $vResult[0];
           	$vArrayTemp['id_kurs'] = $vRow->id_kurs;		
            $vArrayTemp['nama_kurs'] = $vRow->nama_kurs;		
            $vArrayTemp['simbol_kurs'] = $vRow->simbol_kurs;	
			$vArrayTemp['kurs_jual'] = $vRow->kurs_jual;		
           	$vArrayTemp['kurs_beli'] = $vRow->kurs_beli;	
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdatekurs($pkursId,$pData) {
		$vData = array(
						
           
			'nama_kurs'=>$pData['vnama_kurs'],					
           
			'simbol_kurs'=>$pData['vsimbol_kurs'],
		    
		    'kurs_jual'=>$pData['vkurs_jual'],					
           
			'kurs_beli'=>$pData['vkurs_beli']
		   			
		);
	
		$vResult = $this->db->where('id_kurs',$pkursId)->update('kurs',$vData);
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
}
?>

