<?php
class mo_laporan_counter extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fntransaksiCount($vStartKeyword,$vFinishKeyword) {
		$start=str_replace('-','',$vStartKeyword);
		$finish=str_replace('-','',$vFinishKeyword);

		$this->db->select("count(*) as selectCount");

		$this->db->join("layanan AS b","a.id_layanan=b.id_layanan","Left");
		$this->db->join("group_layanan AS c","a.id_group_layanan=c.id_group_layanan","Left");
		$this->db->join("t_user AS d","a.id_user=d.f_user_id","Left");
		$this->db->join("loket AS e","a.id_loket=e.id_loket","Left");
				
		$this->db->where('tanggal_transaksi >=', $start );
		$this->db->where('tanggal_transaksi <=', $finish);

		$this->db->from("transaksi as a");
		
		$vResult = $this->db->get()->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fntransaksiData($vStartKeyword,$vFinishKeyword,$vOffset,$vRows,$vSort,$vOrder) {
		//echo date_default_timezone_get();

		$start=str_replace('-','',$vStartKeyword);
		$finish=str_replace('-','',$vFinishKeyword);

		$this->db->join("layanan AS b","a.id_layanan=b.id_layanan","Left");
		$this->db->join("group_layanan AS c","a.id_group_layanan=c.id_group_layanan","Left");
		$this->db->join("t_user AS d","a.id_user=d.f_user_id","Left");
		$this->db->join("loket AS e","a.id_loket=e.id_loket","Left");
				
		$this->db->where('tanggal_transaksi >=', $start );
		$this->db->where('tanggal_transaksi <=', $finish);

		$this->db->order_by($vSort,$vOrder);
		$this->db->limit($vRows,$vOffset);
		$this->db->from("transaksi as a");
		
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();

		foreach($vResult as $vRow):	
			$waktu_tunggu = '-';
			$waktu_layanan = '-';

			if(!empty($vRow->waktu_panggil) AND $vRow->waktu_ambil != '00:00:00' AND $vRow->waktu_panggil != '00:00:00') {
				$time1 = strtotime($vRow->waktu_ambil);
				$time2 = strtotime($vRow->waktu_panggil);
				$diff = $time2 - $time1;
				$waktu_tunggu = date('H:i:s', $diff);
				$tmp = explode(':', $waktu_tunggu);
				$tmp2 = ((int) $tmp[0]) - 7;
				$tmp[0] = '0' . $tmp2;
				$waktu_tunggu = join(':', $tmp);
			}

			if(!empty($vRow->waktu_finish) AND $vRow->waktu_panggil != '00:00:00' AND $vRow->waktu_finish != '00:00:00') {
				$time1 = strtotime($vRow->waktu_panggil);
				$time2 = strtotime($vRow->waktu_finish);
				$diff = $time2 - $time1;
				$waktu_layanan = date('H:i:s', $diff);
				$tmp = explode(':', $waktu_layanan);
				$tmp2 = ((int) $tmp[0]) - 7;
				$tmp[0] = '0' . $tmp2;
				$waktu_layanan = join(':', $tmp);
			}
             
			$vArrayTemp['id_transaksi'] = $vRow->id_transaksi;

			$vArrayTemp['tanggal_transaksi'] = $vRow->tanggal_transaksi;		

			$vArrayTemp['waktu_ambil'] = $vRow->waktu_ambil;		

			$vArrayTemp['waktu_panggil'] = $vRow->waktu_panggil;

			$vArrayTemp['waktu_tunggu'] = $waktu_tunggu;

			$vArrayTemp['waktu_selesai'] = $vRow->waktu_finish;

			$vArrayTemp['waktu_layanan'] = $waktu_layanan;		
			
			$vArrayTemp['no_ticket'] = $vRow->no_ticket_awal.'.'.$vRow->no_ticket;		

			$vArrayTemp['id_layanan'] = $vRow->nama_layanan;		
           
			$vArrayTemp['id_user'] = $vRow->f_user_name;		
                      
			$vArrayTemp['id_loket'] = $vRow->nama_loket;		
           
		  //$data_master[] = $vRow;           	
			
		array_push($vItems,$vArrayTemp);
		endforeach;
		//return $data_master;                      		
		return $vItems;
	}
//==========Print Report=======	

	function fntransaksiDataPrint($vStartKeyword,$vFinishKeyword) {

		$start=str_replace('-','',$vStartKeyword);
		$finish=str_replace('-','',$vFinishKeyword);

		$this->db->join("layanan AS b","a.id_layanan=b.id_layanan","Left");
		$this->db->join("group_layanan AS c","a.id_group_layanan=c.id_group_layanan","Left");
		$this->db->join("t_user AS d","a.id_user=d.f_user_id","Left");
		$this->db->join("loket AS e","a.id_loket=e.id_loket","Left");
				
		$this->db->where('tanggal_transaksi >=', $start );
		$this->db->where('tanggal_transaksi <=', $finish);

		$this->db->order_by('a.id_transaksi','DESC');
		
		$this->db->from("transaksi as a");
		
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();

		foreach($vResult as $vRow):	
			$waktu_tunggu = '-';
			$waktu_layanan = '-';

			if(!empty($vRow->waktu_panggil) AND $vRow->waktu_ambil != '00:00:00' AND $vRow->waktu_panggil != '00:00:00') {
				$time1 = strtotime($vRow->waktu_ambil);
				$time2 = strtotime($vRow->waktu_panggil);
				$diff = $time2 - $time1;
				$waktu_tunggu = date('H:i:s', $diff);
				$tmp = explode(':', $waktu_tunggu);
				$tmp2 = ((int) $tmp[0]) - 7;
				$tmp[0] = '0' . $tmp2;
				$waktu_tunggu = join(':', $tmp);
			}

			if(!empty($vRow->waktu_finish) AND $vRow->waktu_panggil != '00:00:00' AND $vRow->waktu_finish != '00:00:00') {
				$time1 = strtotime($vRow->waktu_panggil);
				$time2 = strtotime($vRow->waktu_finish);
				$diff = $time2 - $time1;
				$waktu_layanan = date('H:i:s', $diff);
				$tmp = explode(':', $waktu_layanan);
				$tmp2 = ((int) $tmp[0]) - 7;
				$tmp[0] = '0' . $tmp2;
				$waktu_layanan = join(':', $tmp);
			}
             
			$vArrayTemp['id_transaksi'] = $vRow->id_transaksi;

			$vArrayTemp['tanggal_transaksi'] = $vRow->tanggal_transaksi;		

			$vArrayTemp['waktu_ambil'] = $vRow->waktu_ambil;		

			$vArrayTemp['waktu_panggil'] = $vRow->waktu_panggil;

			$vArrayTemp['waktu_tunggu'] = $waktu_tunggu;

			$vArrayTemp['waktu_selesai'] = $vRow->waktu_finish;

			$vArrayTemp['waktu_layanan'] = $waktu_layanan;		
			
			$vArrayTemp['no_ticket'] = $vRow->no_ticket_awal.'.'.$vRow->no_ticket;		

			$vArrayTemp['id_layanan'] = $vRow->nama_layanan;		
           
			$vArrayTemp['id_user'] = $vRow->f_user_name;		
                      
			$vArrayTemp['id_loket'] = $vRow->nama_loket;		
           
		  //$data_master[] = $vRow;           	
			
		array_push($vItems,$vArrayTemp);
		endforeach;
		//return $data_master;                      		
		return $vItems;                      		

	}
	
}
?>

