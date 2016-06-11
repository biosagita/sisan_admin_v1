<?php
class mo_laporan_jumlah_customer_perlayanan extends CI_Model {
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
		$this->db->where('a.waktu_panggil !=', '00:00:00' );

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
			return 0;
		}
	}
	
	function fntransaksiData($vStartKeyword,$vFinishKeyword,$vLayananKeyword,$vLoketKeyword,$vUserKeyword,$vPilihanKeyword,$vOffset,$vRows,$vSort,$vOrder) {
		if(!empty($vStartKeyword)) {
			$start=str_replace('-','',$vStartKeyword);
			$this->db->where('tanggal_transaksi >=', $start );	
		}

		if(!empty($vFinishKeyword)) {
			$finish=str_replace('-','',$vFinishKeyword);
			$this->db->where('tanggal_transaksi <=', $finish );	
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
		$this->db->where('a.waktu_panggil !=', '00:00:00' );

		$grp = !empty($vPilihanKeyword) ? ('a.'.$vPilihanKeyword) : 'a.all';

		if($grp == 'a.id_layanan') $grpx = 'b.nama_layanan as info,';
		if($grp == 'a.id_loket') $grpx = 'e.nama_loket as info,';
		if($grp == 'a.id_user') $grpx = 'd.f_user_name as info,';
		if($grp == 'a.all') $grpx = '"All" as info,';

		$this->db->Select($grpx . ",a.tanggal_transaksi,COUNT(a.id_layanan) as jumlah_customer, DATE_FORMAT(a.tanggal_transaksi, '%d-%m-%Y') as tgl_transaksi", FALSE);

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
            $vArrayTemp['info'] = $vRow->info;

			$vArrayTemp['tanggal_transaksi'] = $vRow->tgl_transaksi;
           
			$vArrayTemp['jumlah_customer'] = $vRow->jumlah_customer;		
           
		  //$data_master[] = $vRow;           	
			
		array_push($vItems,$vArrayTemp);
		endforeach;
		//return $data_master;                      		
		return $vItems;
	}
//==========Print Report=======	

	function fntransaksiDataPrint($vStartKeyword,$vFinishKeyword,$vLayananKeyword,$vLoketKeyword,$vUserKeyword,$vPilihanKeyword) {
		if($vStartKeyword != 'all') {
			$start=str_replace('-','',$vStartKeyword);
			$this->db->where('tanggal_transaksi >=', $start );	
		}

		if($vFinishKeyword != 'all') {
			$finish=str_replace('-','',$vFinishKeyword);
			$this->db->where('tanggal_transaksi <=', $finish );	
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

		$this->db->Select("a.id_transaksi,b.nama_layanan,COUNT(a.id_layanan) as jumlah_customer", FALSE);

		$this->db->join("layanan AS b","a.id_layanan=b.id_layanan","Left");
		$this->db->join("group_layanan AS c","a.id_group_layanan=c.id_group_layanan","Left");
		$this->db->join("t_user AS d","a.id_user=d.f_user_id","Left");
		$this->db->join("loket AS e","a.id_loket=e.id_loket","Left");

		$this->db->order_by('a.id_transaksi','DESC');
		
		$this->db->from("transaksi as a");

		$this->db->group_by(array("a.id_layanan"));
		
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();

		foreach($vResult as $vRow):	
             
			$vArrayTemp['id_transaksi'] = $vRow->id_transaksi;

			$vArrayTemp['id_layanan'] = $vRow->nama_layanan;		
           
			$vArrayTemp['jumlah_customer'] = $vRow->jumlah_customer;		
           
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
	
}
?>

