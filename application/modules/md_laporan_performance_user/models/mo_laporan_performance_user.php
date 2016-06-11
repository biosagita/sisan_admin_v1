<?php
class mo_laporan_performance_user extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fntransaksiCount($vStartKeyword,$vFinishKeyword,$vUserKeyword) {
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

		if(!empty($vUserKeyword)) {
			$this->db->where('a.id_user =', $vUserKeyword );	
		}

		//hanya user yang dilayani
		$this->db->where('a.waktu_ambil !=', '00:00:00' );
		$this->db->where('a.id_loket !=', '' );
		//$this->db->where('a.id_user !=', '' );
		
		$this->db->select("a.tanggal_transaksi");

		$this->db->join("layanan AS b","a.id_layanan=b.id_layanan","Left");
		$this->db->join("group_layanan AS c","a.id_group_layanan=c.id_group_layanan","Left");
		$this->db->join("t_user AS d","a.id_user=d.f_user_id","Left");
		$this->db->join("loket AS e","a.id_loket=e.id_loket","Left");

		$this->db->from("transaksi as a");

		if(!empty($vUserKeyword)) {
			$this->db->group_by(array("d.f_user_name", "a.tanggal_transaksi"));
		} else {
			$this->db->group_by(array("d.f_user_name"));
		}
		
		$vResult = $this->db->get()->result();
		if($vResult) {
			return count($vResult);
		} else {
			return false;
		}
	}
	
	function fntransaksiData($vStartKeyword,$vFinishKeyword,$vUserKeyword,$vOffset,$vRows,$vSort,$vOrder, $showall=false) {
		$tgl_periode = '';

		if(!empty($vStartKeyword)) {
			$start=str_replace('-','',$vStartKeyword);
			$this->db->where('tanggal_transaksi >=', $start );	
			$tgl_periode .= $vStartKeyword . ' s/d ';
		} else {
			$tgl_periode .= 'all s/d ';
		}

		if(!empty($vFinishKeyword)) {
			$finish=str_replace('-','',$vFinishKeyword);
			$this->db->where('tanggal_transaksi <=', $finish );	
			$tgl_periode .= $vFinishKeyword;
		} else {
			$tgl_periode .= 'all';
		}

		if((empty($vStartKeyword) AND empty($vFinishKeyword)) OR ($vStartKeyword == 'all' AND $vFinishKeyword == 'all')) {
			$now = date('Ymd');
			$this->db->where('tanggal_transaksi >=', $now );
			$this->db->where('tanggal_transaksi <=', $now );
			$tgl_periode = date('d-m-Y') . ' s/d ' . date('d-m-Y');
		}

		if(!empty($vUserKeyword)) {
			$this->db->where('a.id_user =', $vUserKeyword );	
		}

		//hanya user yang dilayani
		$this->db->where('a.waktu_ambil !=', '00:00:00' );
		$this->db->where('a.id_loket !=', '' );
		//$this->db->where('a.id_user !=', '' );
		
		$grpx = 'd.f_user_name as info,';

		$this->db->Select($grpx . ",a.tanggal_transaksi,COUNT(a.id_layanan) as jumlah_customer, SEC_TO_TIME(AVG(TIME_TO_SEC(TIMEDIFF(  a.waktu_panggil,  a.waktu_ambil )))) as rata_rata, DATE_FORMAT(a.tanggal_transaksi, '%d-%m-%Y') as tgl_transaksi", FALSE);

		$this->db->join("layanan AS b","a.id_layanan=b.id_layanan","Left");
		$this->db->join("group_layanan AS c","a.id_group_layanan=c.id_group_layanan","Left");
		$this->db->join("t_user AS d","a.id_user=d.f_user_id","Left");
		$this->db->join("loket AS e","a.id_loket=e.id_loket","Left");

		$this->db->order_by($vSort,$vOrder);
		if(!$showall) $this->db->limit($vRows,$vOffset);
		$this->db->from("transaksi as a");

		if(!empty($vUserKeyword)) {
			$this->db->group_by(array("d.f_user_name", "a.tanggal_transaksi"));
		} else {
			$this->db->group_by(array("d.f_user_name"));
		}
		
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();

		foreach($vResult as $vRow):
             
			$vArrayTemp['info'] = $vRow->info;

			$vArrayTemp['tanggal_transaksi'] = (!empty($vUserKeyword)) ? $vRow->tgl_transaksi : $tgl_periode;

			$vArrayTemp['rata_rata'] = $vRow->rata_rata;
           
		  //$data_master[] = $vRow;           	
			
		array_push($vItems,$vArrayTemp);
		endforeach;
		//return $data_master;                      		
		return $vItems;
	}

	//waktu tunggu layanan
	function fntransaksiCount_waktu_layanan($vStartKeyword,$vFinishKeyword,$vUserKeyword) {
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

		if(!empty($vUserKeyword)) {
			$this->db->where('a.id_user =', $vUserKeyword );	
		}

		//hanya user yang dilayani
		$this->db->where('a.waktu_finish !=', '00:00:00' );
		$this->db->where('a.id_loket !=', '' );
		//$this->db->where('a.id_user !=', '' );
		
		$this->db->select("a.tanggal_transaksi");

		$this->db->join("layanan AS b","a.id_layanan=b.id_layanan","Left");
		$this->db->join("group_layanan AS c","a.id_group_layanan=c.id_group_layanan","Left");
		$this->db->join("t_user AS d","a.id_user=d.f_user_id","Left");
		$this->db->join("loket AS e","a.id_loket=e.id_loket","Left");

		$this->db->from("transaksi as a");

		if(!empty($vUserKeyword)) {
			$this->db->group_by(array("d.f_user_name", "a.tanggal_transaksi"));
		} else {
			$this->db->group_by(array("d.f_user_name"));
		}
		
		$vResult = $this->db->get()->result();
		if($vResult) {
			return count($vResult);
		} else {
			return false;
		}
	}
	
	function fntransaksiData_waktu_layanan($vStartKeyword,$vFinishKeyword,$vUserKeyword,$vOffset,$vRows,$vSort,$vOrder, $showall=false) {
		$tgl_periode = '';

		if(!empty($vStartKeyword)) {
			$start=str_replace('-','',$vStartKeyword);
			$this->db->where('tanggal_transaksi >=', $start );	
			$tgl_periode .= $vStartKeyword . ' s/d ';
		} else {
			$tgl_periode .= 'all s/d ';
		}

		if(!empty($vFinishKeyword)) {
			$finish=str_replace('-','',$vFinishKeyword);
			$this->db->where('tanggal_transaksi <=', $finish );	
			$tgl_periode .= $vFinishKeyword;
		} else {
			$tgl_periode .= 'all';
		}

		if((empty($vStartKeyword) AND empty($vFinishKeyword)) OR ($vStartKeyword == 'all' AND $vFinishKeyword == 'all')) {
			$now = date('Ymd');
			$this->db->where('tanggal_transaksi >=', $now );
			$this->db->where('tanggal_transaksi <=', $now );
			$tgl_periode = date('d-m-Y') . ' s/d ' . date('d-m-Y');
		}

		if(!empty($vUserKeyword)) {
			$this->db->where('a.id_user =', $vUserKeyword );	
		}

		//hanya user yang dilayani
		$this->db->where('a.waktu_finish !=', '00:00:00' );
		$this->db->where('a.id_loket !=', '' );
		//$this->db->where('a.id_user !=', '' );
		
		$grpx = 'd.f_user_name as info,';

		$this->db->Select($grpx . ",a.tanggal_transaksi,COUNT(a.id_layanan) as jumlah_customer, SEC_TO_TIME(AVG(TIME_TO_SEC(TIMEDIFF(  a.waktu_finish,  a.waktu_panggil )))) as rata_rata, DATE_FORMAT(a.tanggal_transaksi, '%d-%m-%Y') as tgl_transaksi", FALSE);

		$this->db->join("layanan AS b","a.id_layanan=b.id_layanan","Left");
		$this->db->join("group_layanan AS c","a.id_group_layanan=c.id_group_layanan","Left");
		$this->db->join("t_user AS d","a.id_user=d.f_user_id","Left");
		$this->db->join("loket AS e","a.id_loket=e.id_loket","Left");

		$this->db->order_by($vSort,$vOrder);
		if(!$showall) $this->db->limit($vRows,$vOffset);
		$this->db->from("transaksi as a");

		if(!empty($vUserKeyword)) {
			$this->db->group_by(array("d.f_user_name", "a.tanggal_transaksi"));
		} else {
			$this->db->group_by(array("d.f_user_name"));
		}
		
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();

		foreach($vResult as $vRow):
             
			$vArrayTemp['info'] = $vRow->info;

			$vArrayTemp['tanggal_transaksi'] = (!empty($vUserKeyword)) ? $vRow->tgl_transaksi : $tgl_periode;

			$vArrayTemp['rata_rata'] = $vRow->rata_rata;
           
		  //$data_master[] = $vRow;           	
			
		array_push($vItems,$vArrayTemp);
		endforeach;
		//return $data_master;                      		
		return $vItems;
	}

	//waktu tunggu layanan
	function fntransaksiCount_performance($vStartKeyword,$vFinishKeyword,$vUserKeyword) {
		if(!empty($vStartKeyword)) {
			$this->db->where('DATE_FORMAT( a.f_login_date,  "%Y-%m-%d" ) >=', $vStartKeyword );	
		}

		if(!empty($vFinishKeyword)) {
			$this->db->where('DATE_FORMAT( a.f_login_date,  "%Y-%m-%d" ) <=', $vFinishKeyword );	
		}

		if((empty($vStartKeyword) AND empty($vFinishKeyword)) OR ($vStartKeyword == 'all' AND $vFinishKeyword == 'all')) {
			$now = date('Y-m-d');
			$this->db->where('DATE_FORMAT( a.f_login_date,  "%Y-%m-%d" ) >=', $now );
			$this->db->where('DATE_FORMAT( a.f_login_date,  "%Y-%m-%d" ) <=', $now );
			$tgl_periode = date('d-m-Y') . ' s/d ' . date('d-m-Y');
		}

		if(!empty($vUserKeyword)) {
			$this->db->where('a.f_user_id =', $vUserKeyword );	
		}
		$this->db->where('e.f_role_code !=', 'admin' );	
		$this->db->where('e.f_role_code !=', 'superadmin' );
		$this->db->select("a.f_login_date");

		$this->db->join("t_user_employee AS b","a.f_user_id=b.f_user_id","Left");
		$this->db->join("t_user AS c","b.f_user_id=c.f_user_id","Left");
		$this->db->join("t_user_role AS d","b.f_user_id=d.f_user_id","Left");
		$this->db->join("t_role AS e","e.f_role_id=d.f_role_id","Left");
		$this->db->from("t_user_log as a");

		if(!empty($vUserKeyword)) {
			$this->db->group_by(array("a.f_user_id", "a.f_login_date"));
		} else {
			$this->db->group_by(array("a.f_user_id"));
		}
		
		$vResult = $this->db->get()->result();
		if($vResult) {
			return count($vResult);
		} else {
			return false;
		}
	}
	
	function fntransaksiData_performance($vStartKeyword,$vFinishKeyword,$vUserKeyword,$vOffset,$vRows,$vSort,$vOrder, $showall=false) {
		$tgl_periode = '';

		if(!empty($vStartKeyword)) {
			$this->db->where('DATE_FORMAT( a.f_login_date,  "%Y-%m-%d" ) >=', $vStartKeyword );	
			$tgl_periode .= $vStartKeyword . ' s/d ';
		} else {
			$tgl_periode .= 'all s/d ';
		}

		if(!empty($vFinishKeyword)) {
			$this->db->where('DATE_FORMAT( a.f_login_date,  "%Y-%m-%d" ) <=', $vFinishKeyword );	
			$tgl_periode .= $vFinishKeyword;
		} else {
			$tgl_periode .= 'all';
		}

		if((empty($vStartKeyword) AND empty($vFinishKeyword)) OR ($vStartKeyword == 'all' AND $vFinishKeyword == 'all')) {
			$now = date('Y-m-d');
			$this->db->where('DATE_FORMAT( a.f_login_date,  "%Y-%m-%d" ) >=', $now );
			$this->db->where('DATE_FORMAT( a.f_login_date,  "%Y-%m-%d" ) <=', $now );
			$tgl_periode = date('d-m-Y') . ' s/d ' . date('d-m-Y');
		}

		if(!empty($vUserKeyword)) {
			$this->db->where('a.f_user_id =', $vUserKeyword );	
		}

		if(!empty($vUserKeyword)) {		
			$this->db->Select("a.f_user_id, a.f_login_date, a.f_logout_date, c.f_user_name as info, TIMEDIFF(  a.f_logout_date,  a.f_login_date ) as lama_waktu", FALSE);
		} else {
			$this->db->Select("a.f_user_id, 'all' as f_login_date, 'all' as f_logout_date, c.f_user_name as info, SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(  a.f_logout_date,  a.f_login_date )))) as lama_waktu", FALSE);
		}
		$this->db->where('e.f_role_code !=', 'admin' );	
		$this->db->where('e.f_role_code !=', 'superadmin' );
		$this->db->join("t_user_employee AS b","a.f_user_id=b.f_user_id","Left");
		$this->db->join("t_user AS c","b.f_user_id=c.f_user_id","Left");
		$this->db->join("t_user_role AS d","b.f_user_id=d.f_user_id","Left");
		$this->db->join("t_role AS e","e.f_role_id=d.f_role_id","Left");
		//$this->db->order_by($vSort,$vOrder);
		$this->db->order_by("a.f_log_id", "asc");
		$this->db->order_by("a.f_login_date", "asc"); 

		if(!$showall) $this->db->limit($vRows,$vOffset);
		$this->db->from("t_user_log as a");

		if(!empty($vUserKeyword)) {
			$this->db->group_by(array("a.f_user_id", "a.f_login_date"));
		} else {
			$this->db->group_by(array("a.f_user_id"));
		}
		
		$vResult = $this->db->get()->result();
		//echo $this->db->last_query(); exit();
		$vArrayTemp = array();
		$vItems = array();

		foreach($vResult as $vRow):
             
			$vArrayTemp['info'] = $vRow->info;

			$vArrayTemp['tgl_info'] = (!empty($vUserKeyword)) ? $vRow->f_login_date : $tgl_periode;

			$vArrayTemp['f_login_date'] = $vRow->f_login_date;

			$vArrayTemp['f_logout_date'] = $vRow->f_logout_date;

			$vArrayTemp['lama_waktu'] = $vRow->lama_waktu;

			if(!empty($vUserKeyword)) {
				$vArrayTemp['lama_waktu_layanan'] = $this->get_lama_waktu_layanan($vRow->f_login_date, $vRow->f_logout_date, $vRow->f_user_id, 1);
			} else {
				$vArrayTemp['lama_waktu_layanan'] = $this->get_lama_waktu_layanan($vStartKeyword, $vFinishKeyword, $vRow->f_user_id);
			}		
			
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	function get_lama_waktu_layanan($vStartKeyword,$vFinishKeyword,$vUserKeyword, $type) {
		if(!empty($type)) {
			$tmp = explode(' ', $vStartKeyword);
			$tmp[0]=str_replace('-','',$tmp[0]);
			$this->db->where('tanggal_transaksi >=', $tmp[0] );
			$this->db->where('waktu_panggil >=', $tmp[1] );

			$tmp_2 = explode(' ', $vFinishKeyword);
			$tmp_2[0]=str_replace('-','',$tmp_2[0]);
			$this->db->where('tanggal_transaksi <=', $tmp_2[0] );
			$this->db->where('waktu_panggil <=', $tmp_2[1] );
		} else {
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
		}

		if(!empty($vUserKeyword)) {
			$this->db->where('a.id_user =', $vUserKeyword );	
		}

		//hanya user yang dilayani
		$this->db->where('a.waktu_finish !=', '00:00:00' );
		$this->db->where('a.id_loket !=', '' );

		$this->db->Select("SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(  a.waktu_finish,  a.waktu_panggil )))) as total_waktu_layanan", FALSE);

		$this->db->join("layanan AS b","a.id_layanan=b.id_layanan","Left");
		$this->db->join("group_layanan AS c","a.id_group_layanan=c.id_group_layanan","Left");
		$this->db->join("t_user AS d","a.id_user=d.f_user_id","Left");
		$this->db->join("loket AS e","a.id_loket=e.id_loket","Left");

		$this->db->from("transaksi as a");

		$this->db->group_by(array("d.f_user_name"));
		
		$vResult = $this->db->get()->result();
		//echo $this->db->last_query(); exit();

		$total_waktu_layanan = '00:00:00';

		foreach($vResult as $vRow):
			$total_waktu_layanan = $vRow->total_waktu_layanan;
		endforeach;

		return $total_waktu_layanan;
	}

//==========Print Report=======	

	function fntransaksiDataPrint($vStartKeyword,$vFinishKeyword,$vUserKeyword) {
		$tgl_periode = '';

		if($vStartKeyword != 'all') {
			$start=str_replace('-','',$vStartKeyword);
			$this->db->where('tanggal_transaksi >=', $start );	
			$tgl_periode .= $vStartKeyword . ' s/d ';
		} else {
			$tgl_periode .= 'all s/d ';
		}

		if($vFinishKeyword != 'all') {
			$finish=str_replace('-','',$vFinishKeyword);
			$this->db->where('tanggal_transaksi <=', $finish );	
			$tgl_periode .= $vFinishKeyword;
		} else {
			$tgl_periode .= 'all';
		}

		if((empty($vStartKeyword) AND empty($vFinishKeyword)) OR ($vStartKeyword == 'all' AND $vFinishKeyword == 'all')) {
			$now = date('Ymd');
			$this->db->where('tanggal_transaksi >=', $now );
			$this->db->where('tanggal_transaksi <=', $now );
			$tgl_periode = date('d-m-Y') . ' s/d ' . date('d-m-Y');
		}

		if($vUserKeyword != 'all') {
			$this->db->where('a.id_user =', $vUserKeyword );	
		}

		//hanya user yang dilayani
		$this->db->where('a.waktu_finish !=', '00:00:00' );
		$this->db->where('a.id_loket !=', '' );
		//$this->db->where('a.id_user !=', '' );

		$grpx = 'd.f_user_name as info,';

		$this->db->Select($grpx . ",a.tanggal_transaksi,COUNT(a.id_layanan) as jumlah_customer, SEC_TO_TIME(AVG(TIME_TO_SEC(TIMEDIFF(  a.waktu_finish,  a.waktu_panggil )))) as rata_rata, DATE_FORMAT(a.tanggal_transaksi, '%d-%m-%Y') as tgl_transaksi", FALSE);

		$this->db->join("layanan AS b","a.id_layanan=b.id_layanan","Left");
		$this->db->join("group_layanan AS c","a.id_group_layanan=c.id_group_layanan","Left");
		$this->db->join("t_user AS d","a.id_user=d.f_user_id","Left");
		$this->db->join("loket AS e","a.id_loket=e.id_loket","Left");

		$this->db->order_by('a.id_transaksi','DESC');
		
		$this->db->from("transaksi as a");

		if(!empty($vUserKeyword)) {
			$this->db->group_by(array("d.f_user_name", "a.tanggal_transaksi"));
		} else {
			$this->db->group_by(array("d.f_user_name"));
		}
		
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();

		foreach($vResult as $vRow):
             
			$vArrayTemp['info'] = $vRow->info;

			$vArrayTemp['tanggal_transaksi'] = (!empty($vUserKeyword)) ? $vRow->tgl_transaksi : $tgl_periode;

			$vArrayTemp['rata_rata'] = $vRow->rata_rata;
           
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
		
	
		$this->db->Select("c.f_user_id, c.f_user_name", FALSE);
		$this->db->where('e.f_role_code !=', 'admin' );	
		$this->db->where('e.f_role_code !=', 'superadmin' );
		$this->db->join("t_user_role AS d","c.f_user_id=d.f_user_id","Left");
		$this->db->join("t_role AS e","e.f_role_id=d.f_role_id","Left");

		$this->db->from("t_user as c");

		
		$vResult = $this->db->get()->result();
		//$vResult = $this->db->get(t_user)->result();
		$vItems = array();
		foreach($vResult as $vRow) {
			$vItems[$vRow->f_user_id] = $vRow->f_user_name;
		}
		return $vItems;
	}

	function fntransaksiDataPrintChart($vStartKeyword='all',$vFinishKeyword='all',$vUserKeyword='all') {
		$tgl_periode = '';

		if($vStartKeyword != 'all') {
			$start=str_replace('-','',$vStartKeyword);
			$this->db->where('tanggal_transaksi >=', $start );	
			$tgl_periode .= $vStartKeyword . ' s/d ';
		} else {
			$tgl_periode .= 'all s/d ';
		}

		if($vFinishKeyword != 'all') {
			$finish=str_replace('-','',$vFinishKeyword);
			$this->db->where('tanggal_transaksi <=', $finish );	
			$tgl_periode .= $vFinishKeyword;
		} else {
			$tgl_periode .= 'all';
		}

		if((empty($vStartKeyword) AND empty($vFinishKeyword)) OR ($vStartKeyword == 'all' AND $vFinishKeyword == 'all')) {
			$now = date('Ymd');
			$this->db->where('tanggal_transaksi >=', $now );
			$this->db->where('tanggal_transaksi <=', $now );
			$tgl_periode = date('d-m-Y') . ' s/d ' . date('d-m-Y');
		}

		if($vUserKeyword != 'all') {
			$this->db->where('a.id_user =', $vUserKeyword );	
		}

		$vItems = array(
			'list_x'		=> array(),
			'list_y'		=> array(),
			'list_x_2'		=> array(),
			'periode'		=> $tgl_periode,
			'keterangan'	=> array(),
		);

		$vItems['listwarna'] = array(
			array(
				'rgba(255,0,0, 0.9)',
				'rgba(255,0,0, 0.9)',
				'rgba(255,0,0, 0.9)',
				'rgba(255,0,0, 0.9)',
			),
			array(
				'rgba(255,255,0, 0.9)',
				'rgba(255,255,0, 0.9)',
				'rgba(255,255,0, 0.9)',
				'rgba(255,255,0, 0.9)',
			),
			array(
				'rgba(0,255,0, 0.9)',
				'rgba(0,255,0, 0.9)',
				'rgba(0,255,0, 0.9)',
				'rgba(0,255,0, 0.9)',
			),
			array(
				'rgba(0,0,255, 0.9)',
				'rgba(0,0,255, 0.9)',
				'rgba(0,0,255, 0.9)',
				'rgba(0,0,255, 0.9)',
			),
		);

		$vItems['listwarnahex'] = array(
			'#ff0000',
			'#ffff00',
			'#00ff00',
			'#0000ff',
		);

		//hanya user yang dilayani
		$this->db->where('a.waktu_ambil !=', '00:00:00' );
		$this->db->where('a.id_loket !=', '' );
		//$this->db->where('a.id_user !=', '' );

		$grpx = 'd.f_user_name as info,';

		$this->db->Select($grpx . ",a.tanggal_transaksi,COUNT(a.id_layanan) as jumlah_customer, SEC_TO_TIME(AVG(TIME_TO_SEC(TIMEDIFF(  a.waktu_panggil,  a.waktu_ambil )))) as rata_rata, DATE_FORMAT(a.tanggal_transaksi, '%d-%m-%Y') as tgl_transaksi", FALSE);

		$this->db->join("layanan AS b","a.id_layanan=b.id_layanan","Left");
		$this->db->join("group_layanan AS c","a.id_group_layanan=c.id_group_layanan","Left");
		$this->db->join("t_user AS d","a.id_user=d.f_user_id","Left");
		$this->db->join("loket AS e","a.id_loket=e.id_loket","Left");

		$this->db->order_by('a.id_transaksi','DESC');
		
		$this->db->from("transaksi as a");

		if($vUserKeyword != 'all') {
			$this->db->group_by(array("d.f_user_name", "a.tanggal_transaksi"));
		} else {
			$this->db->group_by(array("d.f_user_name"));
		}
		
		$vResult = $this->db->get()->result();
		//echo $this->db->last_query(); exit();

		foreach($vResult as $vRow):

			if($vUserKeyword != 'all') {
				$vItems['list_x'][] = "'$vRow->tgl_transaksi'";
				$vItems['list_x_2'][] = $vRow->tgl_transaksi;
				$vItems['keterangan'][] = $vRow->tgl_transaksi . ' (<span style="display: inline-block;width:10px;height:10px;line-height: 10px;background-color:'.$vItems['listwarnahex'][0].';">&nbsp;</span> '.$vRow->rata_rata.')';
			} else {
				$vItems['list_x'][] = "'$vRow->info'";
				$vItems['list_x_2'][] = $vRow->info;
				$vItems['keterangan'][] = $vRow->info . ' (<span style="display: inline-block;width:10px;height:10px;line-height: 10px;background-color:'.$vItems['listwarnahex'][0].';">&nbsp;</span> '.$vRow->rata_rata.')';
			}
			
			$vItems['list_y'][] 	= $this->convert_minute($vRow->rata_rata);
           
		endforeach;

		return $vItems;
	}

	function fntransaksiDataPrintChart_waktu_layanan($vStartKeyword='all',$vFinishKeyword='all',$vUserKeyword='all') {
		$tgl_periode = '';

		if($vStartKeyword != 'all') {
			$start=str_replace('-','',$vStartKeyword);
			$this->db->where('tanggal_transaksi >=', $start );	
			$tgl_periode .= $vStartKeyword . ' s/d ';
		} else {
			$tgl_periode .= 'all s/d ';
		}

		if($vFinishKeyword != 'all') {
			$finish=str_replace('-','',$vFinishKeyword);
			$this->db->where('tanggal_transaksi <=', $finish );	
			$tgl_periode .= $vFinishKeyword;
		} else {
			$tgl_periode .= 'all';
		}

		if((empty($vStartKeyword) AND empty($vFinishKeyword)) OR ($vStartKeyword == 'all' AND $vFinishKeyword == 'all')) {
			$now = date('Ymd');
			$this->db->where('tanggal_transaksi >=', $now );
			$this->db->where('tanggal_transaksi <=', $now );
			$tgl_periode = date('d-m-Y') . ' s/d ' . date('d-m-Y');
		}

		if($vUserKeyword != 'all') {
			$this->db->where('a.id_user =', $vUserKeyword );	
		}

		$vItems = array(
			'list_x'		=> array(),
			'list_y'		=> array(),
			'list_x_2'		=> array(),
			'periode'		=> $tgl_periode,
			'keterangan'	=> array(),
		);

		$vItems['listwarna'] = array(
			array(
				'rgba(255,0,0, 0.9)',
				'rgba(255,0,0, 0.9)',
				'rgba(255,0,0, 0.9)',
				'rgba(255,0,0, 0.9)',
			),
			array(
				'rgba(255,255,0, 0.9)',
				'rgba(255,255,0, 0.9)',
				'rgba(255,255,0, 0.9)',
				'rgba(255,255,0, 0.9)',
			),
			array(
				'rgba(0,255,0, 0.9)',
				'rgba(0,255,0, 0.9)',
				'rgba(0,255,0, 0.9)',
				'rgba(0,255,0, 0.9)',
			),
			array(
				'rgba(0,0,255, 0.9)',
				'rgba(0,0,255, 0.9)',
				'rgba(0,0,255, 0.9)',
				'rgba(0,0,255, 0.9)',
			),
		);

		$vItems['listwarnahex'] = array(
			'#ff0000',
			'#ffff00',
			'#00ff00',
			'#0000ff',
		);

		//hanya user yang dilayani
		$this->db->where('a.waktu_finish !=', '00:00:00' );
		$this->db->where('a.id_loket !=', '' );
		//$this->db->where('a.id_user !=', '' );

		$grpx = 'd.f_user_name as info,';

		$this->db->Select($grpx . ",a.tanggal_transaksi,COUNT(a.id_layanan) as jumlah_customer, SEC_TO_TIME(AVG(TIME_TO_SEC(TIMEDIFF(  a.waktu_finish,  a.waktu_panggil )))) as rata_rata, DATE_FORMAT(a.tanggal_transaksi, '%d-%m-%Y') as tgl_transaksi", FALSE);

		$this->db->join("layanan AS b","a.id_layanan=b.id_layanan","Left");
		$this->db->join("group_layanan AS c","a.id_group_layanan=c.id_group_layanan","Left");
		$this->db->join("t_user AS d","a.id_user=d.f_user_id","Left");
		$this->db->join("loket AS e","a.id_loket=e.id_loket","Left");

		$this->db->order_by('a.id_transaksi','DESC');
		
		$this->db->from("transaksi as a");

		if($vUserKeyword != 'all') {
			$this->db->group_by(array("d.f_user_name", "a.tanggal_transaksi"));
		} else {
			$this->db->group_by(array("d.f_user_name"));
		}
		
		$vResult = $this->db->get()->result();
		//echo $this->db->last_query(); exit();

		foreach($vResult as $vRow):

			if($vUserKeyword != 'all') {
				$vItems['list_x'][] = "'$vRow->tgl_transaksi'";
				$vItems['list_x_2'][] = $vRow->tgl_transaksi;
				$vItems['keterangan'][] = $vRow->tgl_transaksi . ' (<span style="display: inline-block;width:10px;height:10px;line-height: 10px;background-color:'.$vItems['listwarnahex'][0].';">&nbsp;</span> '.$vRow->rata_rata.')';
			} else {
				$vItems['list_x'][] = "'$vRow->info'";
				$vItems['list_x_2'][] = $vRow->info;
				$vItems['keterangan'][] = $vRow->info . ' (<span style="display: inline-block;width:10px;height:10px;line-height: 10px;background-color:'.$vItems['listwarnahex'][0].';">&nbsp;</span> '.$vRow->rata_rata.')';
			}
			
			$vItems['list_y'][] 	= $this->convert_minute($vRow->rata_rata);
           
		endforeach;

		return $vItems;
	}

	function fntransaksiDataPrintChart_performance($vStartKeyword='all',$vFinishKeyword='all',$vUserKeyword='all') {
		$tgl_periode = '';

		if($vStartKeyword != 'all') {
			$this->db->where('DATE_FORMAT( a.f_login_date,  "%Y-%m-%d" ) >=', $vStartKeyword );	
			$tgl_periode .= $vStartKeyword . ' s/d ';
		} else {
			$vStartKeyword = '';
			$tgl_periode .= 'all s/d ';
		}

		if($vFinishKeyword != 'all') {
			$this->db->where('DATE_FORMAT( a.f_login_date,  "%Y-%m-%d" ) <=', $vFinishKeyword );	
			$tgl_periode .= $vFinishKeyword;
		} else {
			$vFinishKeyword = '';
			$tgl_periode .= 'all';
		}

		if((empty($vStartKeyword) AND empty($vFinishKeyword)) OR ($vStartKeyword == 'all' AND $vFinishKeyword == 'all')) {
			$now = date('Y-m-d');
			$this->db->where('DATE_FORMAT( a.f_login_date,  "%Y-%m-%d" ) >=', $now );
			$this->db->where('DATE_FORMAT( a.f_login_date,  "%Y-%m-%d" ) <=', $now );
			$tgl_periode = date('d-m-Y') . ' s/d ' . date('d-m-Y');
		}

		if($vUserKeyword != 'all') {
			$this->db->where('a.f_user_id =', $vUserKeyword );	
		}
		$this->db->where('e.f_role_code !=', 'admin' );	
		$this->db->where('e.f_role_code !=', 'superadmin' );	
		$vItems = array(
			'total_waktu'			=> array(),
			'total_waktu_layanan'	=> array(),
		);

		$this->db->Select("a.f_user_id, 'all' as f_login_date, 'all' as f_logout_date, c.f_user_name as info, SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(  a.f_logout_date,  a.f_login_date )))) as lama_waktu", FALSE);

		$this->db->join("t_user_employee AS b","a.f_user_id=b.f_user_id","Left");
		$this->db->join("t_user AS c","b.f_user_id=c.f_user_id","Left");
		$this->db->join("t_user_role AS d","b.f_user_id=d.f_user_id","Left");
		$this->db->join("t_role AS e","e.f_role_id=d.f_role_id","Left");

		$this->db->order_by("a.f_log_id", "asc");
		$this->db->order_by("a.f_login_date", "asc");

		$this->db->from("t_user_log as a");

		$this->db->group_by(array("a.f_user_id"));
		
		$vResult = $this->db->get()->result();
		//echo $this->db->last_query(); exit();

		$total_waktu = 0;
		$total_waktu_layanan = 0;
		foreach($vResult as $vRow):
			$total_waktu 			+= $this->convert_minute($vRow->lama_waktu);
			$total_waktu_layanan 	+= $this->convert_minute($this->get_lama_waktu_layanan($vStartKeyword, $vFinishKeyword, $vRow->f_user_id));
		endforeach;

		$persentase_1 = round(($total_waktu_layanan / $total_waktu) * 100); //waktu layanan
		$persentase_2 = 100 - $persentase_1; //waktu idle

		$vItems['total_waktu']['value'] 	= $persentase_1;
		$vItems['total_waktu']['color'] 	= '#FDB45C';
		$vItems['total_waktu']['highlight'] = '#FFC870';
		$vItems['total_waktu']['label'] 	= 'Service';

		$vItems['total_waktu_layanan']['value'] 	= $persentase_2;
		$vItems['total_waktu_layanan']['color'] 	= '#949FB1';
		$vItems['total_waktu_layanan']['highlight'] = '#A8B3C5';
		$vItems['total_waktu_layanan']['label'] 	= 'Idle';

		return $vItems;
	}

	function convert_second($time) {
		$tmp = explode(':', $time);
		$total = 0;
		$total += ((int) $tmp[0]) * 3600;
		$total += ((int) $tmp[1]) * 60;
		$total += (int) $tmp[2];
		return $total;
	}

	function convert_minute($time) {
		$tmp = explode(':', $time);
		$total = 0;
		$total += ((int) $tmp[0]) * 60;
		$total += (int) $tmp[1];
		$total += round((((int) $tmp[2]) / 60), 1);
		return $total;
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

