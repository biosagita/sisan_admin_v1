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
			return 0;
		}
	}
	
	function fntransaksiData($vStartKeyword,$vFinishKeyword,$vLayananKeyword,$vLoketKeyword,$vUserKeyword,$vPilihanKeyword,$vOffset,$vRows,$vSort,$vOrder) {
		$tgl_periode = '';

		if(!empty($vStartKeyword)) {
			$start=str_replace('-','',$vStartKeyword);
			$this->db->where('tanggal_transaksi >=', $start );	
		} else {
			$tgl_periode .= 'all s/d ';
		}

		if(!empty($vFinishKeyword)) {
			$finish=str_replace('-','',$vFinishKeyword);
			$this->db->where('tanggal_transaksi <=', $finish );	
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
			if(!empty($vLayananKeyword) OR !empty($vLoketKeyword) OR !empty($vUserKeyword)) {
				$this->db->group_by(array($grp, "a.tanggal_transaksi"));
			} else {
				$this->db->group_by(array($grp));
			}	
		}
		
		$vResult = $this->db->get()->result();

		//echo $this->db->last_query(); exit();
		$vArrayTemp = array();
		$vItems = array();

		$dataCustomerSkip 			= $this->getCustomerSkip($vStartKeyword,$vFinishKeyword,$vLayananKeyword,$vLoketKeyword,$vUserKeyword,$vPilihanKeyword,'grid',$vOffset,$vRows,$vSort,$vOrder);
		$dataCustomerTidakDilayani 	= $this->getCustomerTidakTerlayani($vStartKeyword,$vFinishKeyword,$vLayananKeyword,$vLoketKeyword,$vUserKeyword,$vPilihanKeyword,'grid',$vOffset,$vRows,$vSort,$vOrder);

		foreach($vResult as $vRow):	
            $vArrayTemp['info'] = $vRow->info;

			$vArrayTemp['tanggal_transaksi'] = (empty($vPilihanKeyword) OR $vPilihanKeyword == 'all' OR (!empty($vLayananKeyword) OR !empty($vLoketKeyword) OR !empty($vUserKeyword))) ? $vRow->tgl_transaksi : $tgl_periode;
           
			$vArrayTemp['jumlah_customer'] = $vRow->jumlah_customer;		

			$vArrayTemp['jumlah_customer_skip'] = !empty($dataCustomerSkip[$vRow->info][$vRow->tgl_transaksi]) ? $dataCustomerSkip[$vRow->info][$vRow->tgl_transaksi] : '-';

			$vArrayTemp['jumlah_customer_tidak_terlayani'] = !empty($dataCustomerTidakDilayani[$vRow->info][$vRow->tgl_transaksi]) ? $dataCustomerTidakDilayani[$vRow->info][$vRow->tgl_transaksi] : '-';			
           
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
		} else {
			$tgl_periode .= 'all s/d ';
		}

		if($vFinishKeyword != 'all') {
			$finish=str_replace('-','',$vFinishKeyword);
			$this->db->where('tanggal_transaksi <=', $finish );	
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

		$dataCustomerSkip 			= $this->getCustomerSkip($vStartKeyword,$vFinishKeyword,$vLayananKeyword,$vLoketKeyword,$vUserKeyword,$vPilihanKeyword,'report');
		$dataCustomerTidakDilayani 	= $this->getCustomerTidakTerlayani($vStartKeyword,$vFinishKeyword,$vLayananKeyword,$vLoketKeyword,$vUserKeyword,$vPilihanKeyword,'report');

		foreach($vResult as $vRow):	

			$vArrayTemp['info'] = $vRow->info;
             
			$vArrayTemp['tanggal_transaksi'] = (empty($vPilihanKeyword) OR $vPilihanKeyword == 'all' OR ($vLayananKeyword != 'all' OR $vLoketKeyword != 'all' OR $vUserKeyword != 'all')) ? $vRow->tgl_transaksi : $tgl_periode;
           
			$vArrayTemp['jumlah_customer'] = $vRow->jumlah_customer;		

			$vArrayTemp['jumlah_customer_skip'] = !empty($dataCustomerSkip[$vRow->info][$vRow->tgl_transaksi]) ? $dataCustomerSkip[$vRow->info][$vRow->tgl_transaksi] : '-';

			$vArrayTemp['jumlah_customer_tidak_terlayani'] = !empty($dataCustomerTidakDilayani[$vRow->info][$vRow->tgl_transaksi]) ? $dataCustomerTidakDilayani[$vRow->info][$vRow->tgl_transaksi] : '-';
           
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

	function getCustomerSkip($vStartKeyword,$vFinishKeyword,$vLayananKeyword,$vLoketKeyword,$vUserKeyword,$vPilihanKeyword,$own_type,$vOffset,$vRows,$vSort,$vOrder) {
		if($own_type == 'grid') {
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
		} else {
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
		}

		if((empty($vStartKeyword) AND empty($vFinishKeyword)) OR ($vStartKeyword == 'all' AND $vFinishKeyword == 'all')) {
			$now = date('Ymd');
			$this->db->where('tanggal_transaksi >=', $now );
			$this->db->where('tanggal_transaksi <=', $now );
			$tgl_periode = date('d-m-Y') . ' s/d ' . date('d-m-Y');
		}

		//hanya user yang skip
		$this->db->where('a.status_transaksi =', 3 );

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

		if($own_type == 'grid') {
			$this->db->order_by($vSort,$vOrder);
			$this->db->limit($vRows,$vOffset);
		} else {
			$this->db->order_by('a.id_transaksi','DESC');
		}
		
		$this->db->from("transaksi as a");

		if($grp == 'a.all') {
			$this->db->group_by(array("a.tanggal_transaksi"));
		} else {
			if(!empty($vLayananKeyword) OR !empty($vLoketKeyword) OR !empty($vUserKeyword) OR $vLayananKeyword != 'all' OR $vLoketKeyword != 'all' OR $vUserKeyword != 'all') {
				$this->db->group_by(array($grp, "a.tanggal_transaksi"));
			} else {
				$this->db->group_by(array($grp));
			}	
		}
		
		$vResult = $this->db->get()->result();

		$arrData = array();

		foreach($vResult as $vRow):	
            $arrData[$vRow->info][$vRow->tgl_transaksi] = $vRow->jumlah_customer;
		endforeach;

		return $arrData;
	}

	function getCustomerTidakTerlayani($vStartKeyword,$vFinishKeyword,$vLayananKeyword,$vLoketKeyword,$vUserKeyword,$vPilihanKeyword,$own_type,$vOffset,$vRows,$vSort,$vOrder) {
		if($own_type == 'grid') {
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
		} else {
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
		}

		if((empty($vStartKeyword) AND empty($vFinishKeyword)) OR ($vStartKeyword == 'all' AND $vFinishKeyword == 'all')) {
			$now = date('Ymd');
			$this->db->where('tanggal_transaksi >=', $now );
			$this->db->where('tanggal_transaksi <=', $now );
			$tgl_periode = date('d-m-Y') . ' s/d ' . date('d-m-Y');
		}

		//hanya user yang tidak dilayani
		$this->db->where('a.status_transaksi =', 0 );

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

		if($own_type == 'grid') {
			$this->db->order_by($vSort,$vOrder);
			$this->db->limit($vRows,$vOffset);
		} else {
			$this->db->order_by('a.id_transaksi','DESC');
		}
		
		$this->db->from("transaksi as a");

		if($grp == 'a.all') {
			$this->db->group_by(array("a.tanggal_transaksi"));
		} else {
			if(!empty($vLayananKeyword) OR !empty($vLoketKeyword) OR !empty($vUserKeyword) OR $vLayananKeyword != 'all' OR $vLoketKeyword != 'all' OR $vUserKeyword != 'all') {
				$this->db->group_by(array($grp, "a.tanggal_transaksi"));
			} else {
				$this->db->group_by(array($grp));
			}	
		}
		
		$vResult = $this->db->get()->result();

		$arrData = array();

		foreach($vResult as $vRow):	
            $arrData[$vRow->info][$vRow->tgl_transaksi] = $vRow->jumlah_customer;
		endforeach;

		return $arrData;
	}

	function fntransaksiDataPrintChart($vStartKeyword,$vFinishKeyword,$vLayananKeyword,$vLoketKeyword,$vUserKeyword,$vPilihanKeyword) {
		$tgl_periode = '';

		if($vStartKeyword != 'all') {
			$start=str_replace('-','',$vStartKeyword);
			$this->db->where('tanggal_transaksi >=', $start );	
		} else {
			$tgl_periode .= 'all s/d ';
		}

		if($vFinishKeyword != 'all') {
			$finish=str_replace('-','',$vFinishKeyword);
			$this->db->where('tanggal_transaksi <=', $finish );	
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
			'list_y2'		=> array(),
			'list_y3'		=> array(),
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

		$this->db->order_by('a.id_transaksi','DESC');
		
		$this->db->from("transaksi as a");

		if($grp == 'a.all') {
			$this->db->group_by(array("a.tanggal_transaksi"));
		} else {
			if(!empty($vLayananKeyword) OR !empty($vLoketKeyword) OR !empty($vUserKeyword) OR $vLayananKeyword != 'all' OR $vLoketKeyword != 'all' OR $vUserKeyword != 'all') {
				$this->db->group_by(array($grp, "a.tanggal_transaksi"));
			} else {
				$this->db->group_by(array($grp));
			}	
		}
		
		$vResult = $this->db->get()->result();

		$dataCustomerSkip 			= $this->getCustomerSkip($vStartKeyword,$vFinishKeyword,$vLayananKeyword,$vLoketKeyword,$vUserKeyword,$vPilihanKeyword,'report');
		$dataCustomerTidakDilayani 	= $this->getCustomerTidakTerlayani($vStartKeyword,$vFinishKeyword,$vLayananKeyword,$vLoketKeyword,$vUserKeyword,$vPilihanKeyword,'report');

		foreach($vResult as $vRow):

			if(empty($vPilihanKeyword) OR $vPilihanKeyword == 'all' OR ($vLayananKeyword != 'all' OR $vLoketKeyword != 'all' OR $vUserKeyword != 'all')) {
				$vItems['list_x'][] = "'$vRow->tgl_transaksi'";
				$vItems['keterangan'][] = $vRow->tgl_transaksi . ' (<span style="display: inline-block;width:10px;height:10px;line-height: 10px;background-color:'.$vItems['listwarnahex'][0].';">&nbsp;</span> -Jumlah Layanan-'.$vRow->jumlah_customer.', <span style="display: inline-block;width:10px;height:10px;line-height: 10px;background-color:'.$vItems['listwarnahex'][1].';">&nbsp;</span> -Jumlah Skip-'.(!empty($dataCustomerSkip[$vRow->info][$vRow->tgl_transaksi]) ? $dataCustomerSkip[$vRow->info][$vRow->tgl_transaksi] : 0).', <span style="display: inline-block;width:10px;height:10px;line-height: 10px;background-color:'.$vItems['listwarnahex'][2].';">&nbsp;</span> -Jumlah Tak Terlayani-'.(!empty($dataCustomerTidakDilayani[$vRow->info][$vRow->tgl_transaksi]) ? $dataCustomerTidakDilayani[$vRow->info][$vRow->tgl_transaksi] : 0).')';
			} else {
				$vItems['list_x'][] = "'$vRow->info'";
				$vItems['keterangan'][] = $vRow->info . ' (<span style="display: inline-block;width:10px;height:10px;line-height: 10px;background-color:'.$vItems['listwarnahex'][0].';">&nbsp;</span> -Jumlah Layanan-'.$vRow->jumlah_customer.', <span style="display: inline-block;width:10px;height:10px;line-height: 10px;background-color:'.$vItems['listwarnahex'][1].';">&nbsp;</span> -Jumlah Skip-'.(!empty($dataCustomerSkip[$vRow->info][$vRow->tgl_transaksi]) ? $dataCustomerSkip[$vRow->info][$vRow->tgl_transaksi] : 0).', <span style="display: inline-block;width:10px;height:10px;line-height: 10px;background-color:'.$vItems['listwarnahex'][2].';">&nbsp;</span> -Jumlah Tak Terlayani-'.(!empty($dataCustomerTidakDilayani[$vRow->info][$vRow->tgl_transaksi]) ? $dataCustomerTidakDilayani[$vRow->info][$vRow->tgl_transaksi] : 0).')';
			}

			$vItems['list_y'][] 	= $vRow->jumlah_customer;
			$vItems['list_y2'][] 	= !empty($dataCustomerSkip[$vRow->info][$vRow->tgl_transaksi]) ? $dataCustomerSkip[$vRow->info][$vRow->tgl_transaksi] : 0;
			$vItems['list_y3'][] 	= !empty($dataCustomerTidakDilayani[$vRow->info][$vRow->tgl_transaksi]) ? $dataCustomerTidakDilayani[$vRow->info][$vRow->tgl_transaksi] : 0;
		endforeach;

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

