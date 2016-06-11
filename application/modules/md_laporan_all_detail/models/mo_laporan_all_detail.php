<?php
class mo_laporan_all_detail extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fntransaksiCount($vStartKeyword,$vFinishKeyword,$vLayananKeyword,$vLoketKeyword,$vUserKeyword) {
		if(!empty($vStartKeyword)) {
			$start=str_replace('-','',$vStartKeyword);
			$this->db->where('tanggal_transaksi >=', $start );	
		}

		if(!empty($vFinishKeyword)) {
			$finish=str_replace('-','',$vFinishKeyword);
			$this->db->where('tanggal_transaksi <=', $finish );	
		}

		if((empty($vStartKeyword) AND empty($vFinishKeyword)) OR ($vStartKeyword == 'all' AND $vFinishKeyword == 'all')) {
			$now = date('Ymd');
			$this->db->where('tanggal_transaksi >=', $now );
			$this->db->where('tanggal_transaksi <=', $now );
			$tgl_periode = date('d-m-Y') . ' s/d ' . date('d-m-Y');
		}

		if(!empty($vLayananKeyword)) {
			$this->db->where('a.id_layanan =', $vLayananKeyword );	
		}

		if(!empty($vLoketKeyword)) {
			$this->db->where('a.id_loket =', $vLoketKeyword );	
		}

		if(!empty($vUserKeyword)) {
			$this->db->where('a.id_user =', $vUserKeyword );	
		}
		
		$this->db->select("count(*) as selectCount");

		$this->db->join("layanan AS b","a.id_layanan=b.id_layanan","Left");
		$this->db->join("group_layanan AS c","a.id_group_layanan=c.id_group_layanan","Left");
		$this->db->join("t_user AS d","a.id_user=d.f_user_id","Left");
		$this->db->join("loket AS e","a.id_loket=e.id_loket","Left");

		$this->db->from("transaksi as a");
		
		$vResult = $this->db->get()->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fntransaksiData($vStartKeyword,$vFinishKeyword,$vLayananKeyword,$vLoketKeyword,$vUserKeyword,$vOffset,$vRows,$vSort,$vOrder) {
		if(!empty($vStartKeyword)) {
			$start=str_replace('-','',$vStartKeyword);
			$this->db->where('tanggal_transaksi >=', $start );	
		}

		if(!empty($vFinishKeyword)) {
			$finish=str_replace('-','',$vFinishKeyword);
			$this->db->where('tanggal_transaksi <=', $finish );	
		}

		if((empty($vStartKeyword) AND empty($vFinishKeyword)) OR ($vStartKeyword == 'all' AND $vFinishKeyword == 'all')) {
			$now = date('Ymd');
			$this->db->where('tanggal_transaksi >=', $now );
			$this->db->where('tanggal_transaksi <=', $now );
			$tgl_periode = date('d-m-Y') . ' s/d ' . date('d-m-Y');
		}

		if(!empty($vLayananKeyword)) {
			$this->db->where('a.id_layanan =', $vLayananKeyword );	
		}

		if(!empty($vLoketKeyword)) {
			$this->db->where('a.id_loket =', $vLoketKeyword );	
		}

		if(!empty($vUserKeyword)) {
			$this->db->where('a.id_user =', $vUserKeyword );	
		}

		$this->db->select("*, DATE_FORMAT(a.tanggal_transaksi, '%d-%m-%Y') as tgl_transaksi", FALSE);

		$this->db->join("layanan AS b","a.id_layanan=b.id_layanan","Left");
		$this->db->join("group_layanan AS c","a.id_group_layanan=c.id_group_layanan","Left");
		$this->db->join("t_user AS d","a.id_user=d.f_user_id","Left");
		$this->db->join("loket AS e","a.id_loket=e.id_loket","Left");

		$this->db->order_by($vSort,$vOrder);
		$this->db->limit($vRows,$vOffset);
		$this->db->from("transaksi as a");
		
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();

		foreach($vResult as $vRow):	
			$waktu_tunggu = '-';
			$waktu_layanan = '-';

			if(!empty($vRow->waktu_panggil) AND $vRow->waktu_panggil != '00:00:00') {
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

			$vArrayTemp['tanggal_transaksi'] = $vRow->tgl_transaksi;		

			$vArrayTemp['waktu_ambil'] = $vRow->waktu_ambil;		

			$vArrayTemp['waktu_panggil'] = $vRow->waktu_panggil;

			$vArrayTemp['waktu_tunggu'] = $waktu_tunggu;

			$vArrayTemp['waktu_selesai'] = $vRow->waktu_finish;	

			$vArrayTemp['waktu_layanan'] = $waktu_layanan;	
			
			$vArrayTemp['no_ticket'] = $vRow->no_ticket_awal.$vRow->no_ticket;		

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

	function fntransaksiDataPrint($vStartKeyword,$vFinishKeyword,$vLayananKeyword,$vLoketKeyword,$vUserKeyword) {
		if($vStartKeyword != 'all') {
			$start=str_replace('-','',$vStartKeyword);
			$this->db->where('tanggal_transaksi >=', $start );	
		}

		if($vFinishKeyword != 'all') {
			$finish=str_replace('-','',$vFinishKeyword);
			$this->db->where('tanggal_transaksi <=', $finish );	
		}

		if((empty($vStartKeyword) AND empty($vFinishKeyword)) OR ($vStartKeyword == 'all' AND $vFinishKeyword == 'all')) {
			$now = date('Ymd');
			$this->db->where('tanggal_transaksi >=', $now );
			$this->db->where('tanggal_transaksi <=', $now );
			$tgl_periode = date('d-m-Y') . ' s/d ' . date('d-m-Y');
		}

		if($vLayananKeyword != 'all') {
			$this->db->where('a.id_layanan =', $vLayananKeyword );	
		}

		if($vLoketKeyword != 'all') {
			$this->db->where('a.id_loket =', $vLoketKeyword );	
		}

		if($vUserKeyword != 'all') {
			$this->db->where('a.id_user =', $vUserKeyword );	
		}

		$this->db->select("*, DATE_FORMAT(a.tanggal_transaksi, '%d-%m-%Y') as tgl_transaksi", FALSE);

		$this->db->join("layanan AS b","a.id_layanan=b.id_layanan","Left");
		$this->db->join("group_layanan AS c","a.id_group_layanan=c.id_group_layanan","Left");
		$this->db->join("t_user AS d","a.id_user=d.f_user_id","Left");
		$this->db->join("loket AS e","a.id_loket=e.id_loket","Left");

		$this->db->order_by('a.id_transaksi','DESC');

		$this->db->from("transaksi as a");
		
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();

		foreach($vResult as $vRow):	
			$waktu_tunggu = '-';
			$waktu_layanan = '-';

			if(!empty($vRow->waktu_panggil) AND $vRow->waktu_panggil != '00:00:00') {
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

			$vArrayTemp['tanggal_transaksi'] = $vRow->tgl_transaksi;		

			$vArrayTemp['waktu_ambil'] = $vRow->waktu_ambil;		

			$vArrayTemp['waktu_panggil'] = $vRow->waktu_panggil;

			$vArrayTemp['waktu_tunggu'] = $waktu_tunggu;

			$vArrayTemp['waktu_selesai'] = $vRow->waktu_finish;	

			$vArrayTemp['waktu_layanan'] = $waktu_layanan;	
			
			$vArrayTemp['no_ticket'] = $vRow->no_ticket_awal.$vRow->no_ticket;		

			$vArrayTemp['id_layanan'] = $vRow->nama_layanan;		
           
			$vArrayTemp['id_user'] = $vRow->f_user_name;		
                      
			$vArrayTemp['id_loket'] = $vRow->nama_loket;		
           
		  //$data_master[] = $vRow;           	
			
		array_push($vItems,$vArrayTemp);
		endforeach;
		//return $data_master;                      		
		return $vItems;
	}

	function getPilihLayanan() {
		$vResult = $this->db->get(layanan)->result();
		$vItems = array();
		foreach($vResult as $vRow) {
			$vItems[$vRow->id_layanan] = $vRow->nama_layanan;
		}
		return $vItems;
	}

	function getPilihLoket() {
		$vResult = $this->db->get(loket)->result();
		$vItems = array();
		foreach($vResult as $vRow) {
			$vItems[$vRow->id_loket] = $vRow->nama_loket;
		}
		return $vItems;
	}

	function getPilihUser() {
		$vResult = $this->db->get(t_user)->result();
		$vItems = array();
		foreach($vResult as $vRow) {
			$vItems[$vRow->f_user_id] = $vRow->f_user_name;
		}
		return $vItems;
	}

	function getDataCompany() {
		$this->db->limit(1);
		$vResult = $this->db->get(t_comp_profile)->result();
		$vItems = array();
		foreach($vResult as $vRow) {
			$vItems = (array) $vRow;
		}
		return $vItems;
	}
	
}
?>

