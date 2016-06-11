<?php
class mo_laporan_waktu_tunggu_customer_summary extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fntransaksiCount($vStartKeyword,$vFinishKeyword,$vLayananKeyword,$vLoketKeyword,$vUserKeyword,$vPilihanKeyword) {
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

		//hanya user yang dilayani
		$this->db->where('a.waktu_ambil !=', '00:00:00' );
		$this->db->where('a.id_loket !=', '' );
		//$this->db->where('a.id_user !=', '' );

		$grp = !empty($vPilihanKeyword) ? ('a.'.$vPilihanKeyword) : 'a.all';

		if($grp == 'a.id_layanan') $grpx = 'b.nama_layanan as info,';
		if($grp == 'a.id_loket') $grpx = 'e.nama_loket as info,';
		if($grp == 'a.id_user') $grpx = 'd.f_user_name as info,';
		if($grp == 'a.all') $grpx = '"All" as info,';
		
		$this->db->select("a.tanggal_transaksi");

		$this->db->join("layanan AS b","a.id_layanan=b.id_layanan","Left");
		$this->db->join("group_layanan AS c","a.id_group_layanan=c.id_group_layanan","Left");
		$this->db->join("t_user AS d","a.id_user=d.f_user_id","Left");
		$this->db->join("loket AS e","a.id_loket=e.id_loket","Left");

		$this->db->from("transaksi as a");

		if($grp == 'a.all') {
			$this->db->group_by(array("a.tanggal_transaksi"));
		} else {
			if(!empty($vLayananKeyword) OR !empty($vLoketKeyword) OR !empty($vUserKeyword)) {
				$this->db->group_by(array($grp, "a.tanggal_transaksi"));
			} else {
				$this->db->group_by(array($grp));
			}
				
		}
		
		$vResult = $this->db->get()->result();
		if($vResult) {
			return count($vResult);
		} else {
			return false;
		}
	}
	
	function fntransaksiData($vStartKeyword,$vFinishKeyword,$vLayananKeyword,$vLoketKeyword,$vUserKeyword,$vPilihanKeyword,$vOffset,$vRows,$vSort,$vOrder) {
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

		if(!empty($vLayananKeyword)) {
			$this->db->where('a.id_layanan =', $vLayananKeyword );	
		}

		if(!empty($vLoketKeyword)) {
			$this->db->where('a.id_loket =', $vLoketKeyword );	
		}

		if(!empty($vUserKeyword)) {
			$this->db->where('a.id_user =', $vUserKeyword );	
		}

		//hanya user yang dilayani
		$this->db->where('a.waktu_ambil !=', '00:00:00' );
		$this->db->where('a.id_loket !=', '' );
		//$this->db->where('a.id_user !=', '' );

		$grp = !empty($vPilihanKeyword) ? ('a.'.$vPilihanKeyword) : 'a.all';

		if($grp == 'a.id_layanan') $grpx = 'b.nama_layanan as info,';
		if($grp == 'a.id_loket') $grpx = 'e.nama_loket as info,';
		if($grp == 'a.id_user') $grpx = 'd.f_user_name as info,';
		if($grp == 'a.all') $grpx = '"All" as info,';

		$this->db->Select($grpx . ",a.tanggal_transaksi,COUNT(a.id_layanan) as jumlah_customer, SEC_TO_TIME(AVG(TIME_TO_SEC(TIMEDIFF(  a.waktu_panggil,  a.waktu_ambil )))) as rata_rata, DATE_FORMAT(a.tanggal_transaksi, '%d-%m-%Y') as tgl_transaksi", FALSE);

		$this->db->join("layanan AS b","a.id_layanan=b.id_layanan","Left");
		$this->db->join("group_layanan AS c","a.id_group_layanan=c.id_group_layanan","Left");
		$this->db->join("t_user AS d","a.id_user=d.f_user_id","Left");
		$this->db->join("loket AS e","a.id_loket=e.id_loket","Left");

		$this->db->order_by($vSort,$vOrder);
		$this->db->limit($vRows,$vOffset);
		$this->db->from("transaksi as a");

		if($grp == 'a.all') {
			$this->db->group_by(array("a.tanggal_transaksi"));
		} else {
			if(!empty($vLayananKeyword) OR !empty($vLoketKeyword) OR !empty($vUserKeyword)) {
				$this->db->group_by(array($grp, "a.tanggal_transaksi"));
			} else {
				$this->db->group_by(array($grp));
			}	
		}
		
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();

		foreach($vResult as $vRow):
             
			$vArrayTemp['info'] = $vRow->info;

			$vArrayTemp['tanggal_transaksi'] = (empty($vPilihanKeyword) OR $vPilihanKeyword == 'all' OR (!empty($vLayananKeyword) OR !empty($vLoketKeyword) OR !empty($vUserKeyword))) ? $vRow->tgl_transaksi : $tgl_periode;

			$vArrayTemp['rata_rata'] = $vRow->rata_rata;
           
		  //$data_master[] = $vRow;           	
			
		array_push($vItems,$vArrayTemp);
		endforeach;
		//return $data_master;                      		
		return $vItems;
	}
//==========Print Report=======	

	function fntransaksiDataPrint($vStartKeyword,$vFinishKeyword,$vLayananKeyword,$vLoketKeyword,$vUserKeyword,$vPilihanKeyword) {
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

		if($vLayananKeyword != 'all') {
			$this->db->where('a.id_layanan =', $vLayananKeyword );	
		}

		if($vLoketKeyword != 'all') {
			$this->db->where('a.id_loket =', $vLoketKeyword );	
		}

		if($vUserKeyword != 'all') {
			$this->db->where('a.id_user =', $vUserKeyword );	
		}

		//hanya user yang dilayani
		$this->db->where('a.waktu_ambil !=', '00:00:00' );
		$this->db->where('a.id_loket !=', '' );
		//$this->db->where('a.id_user !=', '' );

		$grp = !empty($vPilihanKeyword) ? ('a.'.$vPilihanKeyword) : 'a.all';

		if($grp == 'a.id_layanan') $grpx = 'b.nama_layanan as info,';
		if($grp == 'a.id_loket') $grpx = 'e.nama_loket as info,';
		if($grp == 'a.id_user') $grpx = 'd.f_user_name as info,';
		if($grp == 'a.all') $grpx = '"All" as info,';

		$this->db->Select($grpx . ",a.tanggal_transaksi,COUNT(a.id_layanan) as jumlah_customer, SEC_TO_TIME(AVG(TIME_TO_SEC(TIMEDIFF(  a.waktu_panggil,  a.waktu_ambil )))) as rata_rata, DATE_FORMAT(a.tanggal_transaksi, '%d-%m-%Y') as tgl_transaksi", FALSE);

		$this->db->join("layanan AS b","a.id_layanan=b.id_layanan","Left");
		$this->db->join("group_layanan AS c","a.id_group_layanan=c.id_group_layanan","Left");
		$this->db->join("t_user AS d","a.id_user=d.f_user_id","Left");
		$this->db->join("loket AS e","a.id_loket=e.id_loket","Left");

		$this->db->order_by('a.id_transaksi','DESC');
		
		$this->db->from("transaksi as a");

		if($grp == 'a.all') {
			$this->db->group_by(array("a.tanggal_transaksi"));
		} else {
			if($vLayananKeyword != 'all' OR $vLoketKeyword != 'all' OR $vUserKeyword != 'all') {
				$this->db->group_by(array($grp, "a.tanggal_transaksi"));
			} else {
				$this->db->group_by(array($grp));
			}	
		}
		
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();

		foreach($vResult as $vRow):
             
			$vArrayTemp['info'] = $vRow->info;

			$vArrayTemp['tanggal_transaksi'] = (empty($vPilihanKeyword) OR $vPilihanKeyword == 'all' OR ($vLayananKeyword != 'all' OR $vLoketKeyword != 'all' OR $vUserKeyword != 'all')) ? $vRow->tgl_transaksi : $tgl_periode;

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
		$vResult = $this->db->get(t_user)->result();
		$vItems = array();
		foreach($vResult as $vRow) {
			$vItems[$vRow->f_user_id] = $vRow->f_user_name;
		}
		return $vItems;
	}

	function fntransaksiDataPrintChart($vStartKeyword,$vFinishKeyword,$vLayananKeyword,$vLoketKeyword,$vUserKeyword,$vPilihanKeyword,$vUnitTimeKeyword) {
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

		if($vLayananKeyword != 'all') {
			$this->db->where('a.id_layanan =', $vLayananKeyword );	
		}

		if($vLoketKeyword != 'all') {
			$this->db->where('a.id_loket =', $vLoketKeyword );	
		}

		if($vUserKeyword != 'all') {
			$this->db->where('a.id_user =', $vUserKeyword );	
		}

		$vItems = array(
			'list_x'	=> array(),
			'list_y'		=> array(),
			'periode'	=> $tgl_periode,
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

		$grp = !empty($vPilihanKeyword) ? ('a.'.$vPilihanKeyword) : 'a.all';

		if($grp == 'a.id_layanan') $grpx = 'b.nama_layanan as info,';
		if($grp == 'a.id_loket') $grpx = 'e.nama_loket as info,';
		if($grp == 'a.id_user') $grpx = 'd.f_user_name as info,';
		if($grp == 'a.all') $grpx = '"All" as info,';

		$this->db->Select($grpx . ",a.tanggal_transaksi,COUNT(a.id_layanan) as jumlah_customer, SEC_TO_TIME(AVG(TIME_TO_SEC(TIMEDIFF(  a.waktu_panggil,  a.waktu_ambil )))) as rata_rata, DATE_FORMAT(a.tanggal_transaksi, '%d-%m-%Y') as tgl_transaksi", FALSE);

		$this->db->join("layanan AS b","a.id_layanan=b.id_layanan","Left");
		$this->db->join("group_layanan AS c","a.id_group_layanan=c.id_group_layanan","Left");
		$this->db->join("t_user AS d","a.id_user=d.f_user_id","Left");
		$this->db->join("loket AS e","a.id_loket=e.id_loket","Left");

		$this->db->order_by('a.id_transaksi','DESC');
		
		$this->db->from("transaksi as a");

		if($grp == 'a.all') {
			$this->db->group_by(array("a.tanggal_transaksi"));
		} else {
			if($vLayananKeyword != 'all' OR $vLoketKeyword != 'all' OR $vUserKeyword != 'all') {
				$this->db->group_by(array($grp, "a.tanggal_transaksi"));
			} else {
				$this->db->group_by(array($grp));
			}	
		}
		
		$vResult = $this->db->get()->result();

		foreach($vResult as $vRow):

			if(empty($vPilihanKeyword) OR $vPilihanKeyword == 'all' OR ($vLayananKeyword != 'all' OR $vLoketKeyword != 'all' OR $vUserKeyword != 'all')) {
				$vItems['list_x'][] = "'$vRow->tgl_transaksi'";
				$vItems['keterangan'][] = $vRow->tgl_transaksi . ' (<span style="display: inline-block;width:10px;height:10px;line-height: 10px;background-color:'.$vItems['listwarnahex'][0].';">&nbsp;</span> '.$vRow->rata_rata.')';
			} else {
				$vItems['list_x'][] = "'$vRow->info'";
				$vItems['keterangan'][] = $vRow->info . ' (<span style="display: inline-block;width:10px;height:10px;line-height: 10px;background-color:'.$vItems['listwarnahex'][0].';">&nbsp;</span> '.$vRow->rata_rata.')';
			}
			$vItems['list_y'][] = $this->convert_minute($vRow->rata_rata);
           
		endforeach;

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

