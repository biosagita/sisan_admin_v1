<?php
class mo_laporan_all_summary extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fntransaksiCount($vStartKeyword) {

		$vStartKeyword = empty($vStartKeyword) ? 'tanggal' : $vStartKeyword;

		$this->db->join("layanan AS b","a.id_layanan=b.id_layanan","Left");
		$this->db->join("group_layanan AS c","a.id_group_layanan=c.id_group_layanan","Left");
		$this->db->join("t_user AS d","a.id_user=d.f_user_id","Left");
		$this->db->join("loket AS e","a.id_loket=e.id_loket","Left");

		$this->db->from("transaksi as a");

		if($vStartKeyword == 'tanggal'){
			$this->db->select("a.tanggal_transaksi");
			$this->db->group_by(array("a.tanggal_transaksi"));	
		}

		if($vStartKeyword == 'layanan'){
			$this->db->select("a.id_layanan");
			$this->db->group_by(array("a.id_layanan"));	
		}

		if($vStartKeyword == 'loket'){
			$this->db->select("a.id_loket");
			$this->db->group_by(array("a.id_loket"));	
		}
		
		$vResult = $this->db->get()->result();
		if($vResult) {
			return count($vResult);
		} else {
			return 0;
		}
	}
	
	function fntransaksiData($vStartKeyword,$vOffset,$vRows,$vSort,$vOrder) {

		$vStartKeyword = empty($vStartKeyword) ? 'tanggal' : $vStartKeyword;

		$this->db->join("layanan AS b","a.id_layanan=b.id_layanan","Left");
		$this->db->join("group_layanan AS c","a.id_group_layanan=c.id_group_layanan","Left");
		$this->db->join("t_user AS d","a.id_user=d.f_user_id","Left");
		$this->db->join("loket AS e","a.id_loket=e.id_loket","Left");

		$this->db->order_by($vSort,$vOrder);
		$this->db->limit($vRows,$vOffset);
		$this->db->from("transaksi as a");

		if($vStartKeyword == 'tanggal'){
			$this->db->Select("a.tanggal_transaksi as namax,COUNT(a.tanggal_transaksi) as jumlah_customer", FALSE);
			$this->db->group_by(array("a.tanggal_transaksi"));	
		}

		if($vStartKeyword == 'layanan'){
			$this->db->Select("b.nama_layanan as namax,COUNT(a.id_layanan) as jumlah_customer", FALSE);
			$this->db->group_by(array("a.id_layanan"));	
		}

		if($vStartKeyword == 'loket'){
			$this->db->Select("e.nama_loket as namax,COUNT(a.id_loket) as jumlah_customer", FALSE);
			$this->db->group_by(array("a.id_loket"));	
		}
		
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();

		foreach($vResult as $vRow):	

			$vArrayTemp['namax'] = empty($vRow->namax) ? '-' : $vRow->namax;

			if($vStartKeyword == 'loket') $vArrayTemp['namax'] = 'Loket ' . $vArrayTemp['namax'];
           
			$vArrayTemp['jumlah_customer'] = $vRow->jumlah_customer;		
           
		  //$data_master[] = $vRow;           	
			
		array_push($vItems,$vArrayTemp);
		endforeach;
		//return $data_master;                      		
		return $vItems;
	}
//==========Print Report=======	

	function fntransaksiDataPrint($vStartKeyword) {

		$vStartKeyword = empty($vStartKeyword) ? 'tanggal' : $vStartKeyword;

		$this->db->join("layanan AS b","a.id_layanan=b.id_layanan","Left");
		$this->db->join("group_layanan AS c","a.id_group_layanan=c.id_group_layanan","Left");
		$this->db->join("t_user AS d","a.id_user=d.f_user_id","Left");
		$this->db->join("loket AS e","a.id_loket=e.id_loket","Left");

		$this->db->order_by('a.id_transaksi','DESC');
		
		$this->db->from("transaksi as a");

		if($vStartKeyword == 'tanggal'){
			$this->db->Select("a.tanggal_transaksi as namax,COUNT(a.tanggal_transaksi) as jumlah_customer", FALSE);
			$this->db->group_by(array("a.tanggal_transaksi"));	
		}

		if($vStartKeyword == 'layanan'){
			$this->db->Select("b.nama_layanan as namax,COUNT(a.id_layanan) as jumlah_customer", FALSE);
			$this->db->group_by(array("a.id_layanan"));	
		}

		if($vStartKeyword == 'loket'){
			$this->db->Select("e.nama_loket as namax,COUNT(a.id_loket) as jumlah_customer", FALSE);
			$this->db->group_by(array("a.id_loket"));	
		}
		
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();

		foreach($vResult as $vRow):	

			$vArrayTemp['namax'] = empty($vRow->namax) ? '-' : $vRow->namax;

			if($vStartKeyword == 'loket') $vArrayTemp['namax'] = 'Loket ' . $vArrayTemp['namax'];
           
			$vArrayTemp['jumlah_customer'] = $vRow->jumlah_customer;		
           
		  //$data_master[] = $vRow;           	
			
		array_push($vItems,$vArrayTemp);
		endforeach;
		//return $data_master;                      		
		return $vItems;                      		

	}
	
}
?>

