<?php
class mo_laporan_waktu_layanan_summary extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fntransaksiCount($vStartKeyword,$vFinishKeyword,$vPilihanKeyword,$vUnitTimeKeyword) {
		if(!empty($vStartKeyword)) {
			$start=str_replace('-','',$vStartKeyword);
			$this->db->where('tanggal_transaksi >=', $start );	
		}

		if(!empty($vFinishKeyword)) {
			$finish=str_replace('-','',$vFinishKeyword);
			$this->db->where('tanggal_transaksi <=', $finish );	
		}

		//hanya user yang dilayani
		$this->db->where('a.waktu_finish !=', '00:00:00' );
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
			$this->db->group_by(array($grp, "a.tanggal_transaksi"));	
		}
		
		$vResult = $this->db->get()->result();
		if($vResult) {
			return count($vResult);
		} else {
			return false;
		}
	}
	
	function fntransaksiData($vStartKeyword,$vFinishKeyword,$vPilihanKeyword,$vUnitTimeKeyword,$vOffset,$vRows,$vSort,$vOrder) {
		if(!empty($vStartKeyword)) {
			$start=str_replace('-','',$vStartKeyword);
			$this->db->where('tanggal_transaksi >=', $start );	
		}

		if(!empty($vFinishKeyword)) {
			$finish=str_replace('-','',$vFinishKeyword);
			$this->db->where('tanggal_transaksi <=', $finish );	
		}

		//hanya user yang dilayani
		$this->db->where('a.waktu_finish !=', '00:00:00' );
		$this->db->where('a.id_loket !=', '' );
		//$this->db->where('a.id_user !=', '' );

		$grp = !empty($vPilihanKeyword) ? ('a.'.$vPilihanKeyword) : 'a.all';

		if($grp == 'a.id_layanan') $grpx = 'b.nama_layanan as info,';
		if($grp == 'a.id_loket') $grpx = 'e.nama_loket as info,';
		if($grp == 'a.id_user') $grpx = 'd.f_user_name as info,';
		if($grp == 'a.all') $grpx = '"All" as info,';

		$this->db->Select($grpx . ",a.tanggal_transaksi,COUNT(a.id_layanan) as jumlah_customer, SEC_TO_TIME(AVG(TIME_TO_SEC(TIMEDIFF(  a.waktu_finish,  a.waktu_panggil )))) as rata_rata, DATE_FORMAT(a.tanggal_transaksi, '%d-%m-%Y') as tgl_transaksi", FALSE);

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
			$this->db->group_by(array($grp, "a.tanggal_transaksi"));	
		}
		
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();

		foreach($vResult as $vRow):
			$service_rate = '-';
			if(!empty($vUnitTimeKeyword)) {
				$str_time = $vRow->rata_rata;
				sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);
				$time_seconds = isset($seconds) ? $hours * 3600 + $minutes * 60 + $seconds : $hours * 60 + $minutes;
				$service_rate = round((($vUnitTimeKeyword * 60) / $time_seconds), 1);
			}
             
			$vArrayTemp['info'] = $vRow->info;

			$vArrayTemp['tanggal_transaksi'] = $vRow->tgl_transaksi;

			$vArrayTemp['rata_rata'] = $vRow->rata_rata;

			$vArrayTemp['service_rate'] = $service_rate;
           
		  //$data_master[] = $vRow;           	
			
		array_push($vItems,$vArrayTemp);
		endforeach;
		//return $data_master;                      		
		return $vItems;
	}
//==========Print Report=======	

	function fntransaksiDataPrint($vStartKeyword,$vFinishKeyword,$vPilihanKeyword,$vUnitTimeKeyword) {
		if($vStartKeyword != 'all') {
			$start=str_replace('-','',$vStartKeyword);
			$this->db->where('tanggal_transaksi >=', $start );	
		}

		if($vFinishKeyword != 'all') {
			$finish=str_replace('-','',$vFinishKeyword);
			$this->db->where('tanggal_transaksi <=', $finish );	
		}

		//hanya user yang dilayani
		$this->db->where('a.waktu_finish !=', '00:00:00' );
		$this->db->where('a.id_loket !=', '' );
		//$this->db->where('a.id_user !=', '' );

		$grp = !empty($vPilihanKeyword) ? ('a.'.$vPilihanKeyword) : 'a.all';

		if($grp == 'a.id_layanan') $grpx = 'b.nama_layanan as info,';
		if($grp == 'a.id_loket') $grpx = 'e.nama_loket as info,';
		if($grp == 'a.id_user') $grpx = 'd.f_user_name as info,';
		if($grp == 'a.all') $grpx = '"All" as info,';

		$this->db->Select($grpx . ",a.tanggal_transaksi,COUNT(a.id_layanan) as jumlah_customer, SEC_TO_TIME(AVG(TIME_TO_SEC(TIMEDIFF(  a.waktu_finish,  a.waktu_panggil )))) as rata_rata, DATE_FORMAT(a.tanggal_transaksi, '%d-%m-%Y') as tgl_transaksi", FALSE);

		$this->db->join("layanan AS b","a.id_layanan=b.id_layanan","Left");
		$this->db->join("group_layanan AS c","a.id_group_layanan=c.id_group_layanan","Left");
		$this->db->join("t_user AS d","a.id_user=d.f_user_id","Left");
		$this->db->join("loket AS e","a.id_loket=e.id_loket","Left");

		$this->db->order_by('a.id_transaksi','DESC');
		
		$this->db->from("transaksi as a");

		if($grp == 'a.all') {
			$this->db->group_by(array("a.tanggal_transaksi"));
		} else {
			$this->db->group_by(array($grp, "a.tanggal_transaksi"));	
		}
		
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();

		foreach($vResult as $vRow):
			$service_rate = '-';
			if($vUnitTimeKeyword != 'all') {
				$str_time = $vRow->rata_rata;
				sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);
				$time_seconds = isset($seconds) ? $hours * 3600 + $minutes * 60 + $seconds : $hours * 60 + $minutes;
				$service_rate = round((($vUnitTimeKeyword * 60) / $time_seconds), 1);
			}
             
			$vArrayTemp['info'] = $vRow->info;

			$vArrayTemp['tanggal_transaksi'] = $vRow->tgl_transaksi;

			$vArrayTemp['rata_rata'] = $vRow->rata_rata;

			$vArrayTemp['service_rate'] = $service_rate;
           
		  //$data_master[] = $vRow;           	
			
		array_push($vItems,$vArrayTemp);
		endforeach;
		//return $data_master;                      		
		return $vItems;

	}
	
}
?>

