<?php
class md_laporan_performance_user extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_laporan_performance_user');

	
		
	}
	function index() {
		$this->fnlaporan();
	}

	function fnlaporan_chart_ajax() {
		$vStartKeyword=$this->input->post('startKeyword');
		$vFinishKeyword=$this->input->post('finishKeyword');
		$vUserKeyword=$this->input->post('UserKeyword');
		
		$temp_result = $this->mo_laporan_performance_user->fntransaksiDataPrintChart($vStartKeyword,$vFinishKeyword,$vUserKeyword);
		$temp_result_layanan = $this->mo_laporan_performance_user->fntransaksiDataPrintChart_waktu_layanan($vStartKeyword,$vFinishKeyword,$vUserKeyword);
		$vData['result_performance'] = $this->mo_laporan_performance_user->fntransaksiDataPrintChart_performance($vStartKeyword,$vFinishKeyword,$vUserKeyword);

		$vData['result'] = array(
			'data' => $temp_result['list_x_2'],
			'datasets' => array(
				'fillColor' 		=> $temp_result['listwarna'][0][0],
				'strokeColor' 		=> $temp_result['listwarna'][0][1],
				'highlightFill' 	=> $temp_result['listwarna'][0][2],
				'highlightStroke' 	=> $temp_result['listwarna'][0][3],
				'data' 				=> $temp_result['list_y'],
				'label' 			=> $temp_result['legend'][0],
			)
		);
		
		$vData['result_layanan'] = array(
			'data' => $temp_result_layanan['list_x_2'],
			'datasets' => array(
				'fillColor' 		=> $temp_result_layanan['listwarna'][0][0],
				'strokeColor' 		=> $temp_result_layanan['listwarna'][0][1],
				'highlightFill' 	=> $temp_result_layanan['listwarna'][0][2],
				'highlightStroke' 	=> $temp_result_layanan['listwarna'][0][3],
				'data' 				=> $temp_result_layanan['list_y'],
				'label' 			=> $temp_result_layanan['legend'][0],
			)
		);

		echo json_encode($vData);
	}

	function fnlaporan($vStartKeyword='all',$vFinishKeyword='all',$vUserKeyword='all')	{
		$vData['result'] = $this->mo_laporan_performance_user->fntransaksiDataPrintChart($vStartKeyword,$vFinishKeyword,$vUserKeyword);
		$vData['result_layanan'] = $this->mo_laporan_performance_user->fntransaksiDataPrintChart_waktu_layanan($vStartKeyword,$vFinishKeyword,$vUserKeyword);
		$vData['result_performance'] = $this->mo_laporan_performance_user->fntransaksiDataPrintChart_performance($vStartKeyword,$vFinishKeyword,$vUserKeyword);
		//print_r($vData['result']);
		$vData["pilihUser"]=$this->mo_laporan_performance_user->getPilihUser();
		$this->load->view('vw_laporan_performance_user', $vData);
	}
	// ======================================== 'Datagrid User Section'
	function fntransaksiData() {
	
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');		
		//$vemployeeKeyword=$this->input->post('#search')	;	
		$vStartKeyword=$this->input->post('StartKeyword');
		$vFinishKeyword=$this->input->post('FinishKeyword');
		$vUserKeyword=$this->input->post('UserKeyword');
		$vSort=$this->input->post('sort');
		$vOrder=$this->input->post('order');
		if(!$vPage) {
			$vPage=1;
		}
		if(!$vRows) {
			$vRows=20;
		}
		if(!$vSort) {
		
		$vSort='id_transaksi';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_laporan_performance_user->fntransaksiCount($vStartKeyword,$vFinishKeyword,$vUserKeyword);
		$vResult["total"]=$vRs;
		$vResult["rows"]=$this->mo_laporan_performance_user->fntransaksiData($vStartKeyword,$vFinishKeyword,$vUserKeyword,$vOffset,$vRows,$vSort,$vOrder);		
		echo json_encode($vResult);
	}

	function fntransaksiData_waktu_layanan() {
	
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');		
		//$vemployeeKeyword=$this->input->post('#search')	;	
		$vStartKeyword=$this->input->post('StartKeyword');
		$vFinishKeyword=$this->input->post('FinishKeyword');
		$vUserKeyword=$this->input->post('UserKeyword');
		$vSort=$this->input->post('sort');
		$vOrder=$this->input->post('order');
		if(!$vPage) {
			$vPage=1;
		}
		if(!$vRows) {
			$vRows=20;
		}
		if(!$vSort) {
		
		$vSort='id_transaksi';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_laporan_performance_user->fntransaksiCount_waktu_layanan($vStartKeyword,$vFinishKeyword,$vUserKeyword);
		$vResult["total"]=$vRs;
		$vResult["rows"]=$this->mo_laporan_performance_user->fntransaksiData_waktu_layanan($vStartKeyword,$vFinishKeyword,$vUserKeyword,$vOffset,$vRows,$vSort,$vOrder);		
		echo json_encode($vResult);
	}	

	function fntransaksiData_performance() {
	
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');		
		//$vemployeeKeyword=$this->input->post('#search')	;	
		$vStartKeyword=$this->input->post('StartKeyword');
		$vFinishKeyword=$this->input->post('FinishKeyword');
		$vUserKeyword=$this->input->post('UserKeyword');
		$vSort=$this->input->post('sort');
		$vOrder=$this->input->post('order');
		if(!$vPage) {
			$vPage=1;
		}
		if(!$vRows) {
			$vRows=20;
		}
		if(!$vSort) {
		
		$vSort='a.f_log_id';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_laporan_performance_user->fntransaksiCount_performance($vStartKeyword,$vFinishKeyword,$vUserKeyword);
		$vResult["total"]=$vRs;
		$vResult["rows"]=$this->mo_laporan_performance_user->fntransaksiData_performance($vStartKeyword,$vFinishKeyword,$vUserKeyword,$vOffset,$vRows,$vSort,$vOrder);		
		echo json_encode($vResult);
	}

	
//===========Print Report================================================

	function fntransaksiDataPrint($vStartKeyword,$vFinishKeyword,$vUserKeyword,$excel=true){
		$data_master['result'] = $this->mo_laporan_performance_user->fntransaksiDataPrintChart($vStartKeyword,$vFinishKeyword,$vUserKeyword);
		$data_master['result_layanan'] = $this->mo_laporan_performance_user->fntransaksiDataPrintChart_waktu_layanan($vStartKeyword,$vFinishKeyword,$vUserKeyword);
		$data_master['result_performance'] = $this->mo_laporan_performance_user->fntransaksiDataPrintChart_performance($vStartKeyword,$vFinishKeyword,$vUserKeyword);

		if($vcityKeyword == 'all') $vcityKeyword = '';
		if($vkecKeyword == 'all') $vkecKeyword = '';
		if($vUserKeyword == 'all') $vUserKeyword = '';
		$data_master['grid_result'] = $this->mo_laporan_performance_user->fntransaksiData($vStartKeyword,$vFinishKeyword,$vUserKeyword,'','','id_transaksi','DESC',true);
		$data_master['grid_result_layanan'] = $this->mo_laporan_performance_user->fntransaksiData_waktu_layanan($vStartKeyword,$vFinishKeyword,$vUserKeyword,'','','id_transaksi','DESC',true);
		$data_master['grid_result_performance'] = $this->mo_laporan_performance_user->fntransaksiData_performance($vStartKeyword,$vFinishKeyword,$vUserKeyword,'','','a.f_log_id','DESC',true);

		$data_master['data_company'] = $this->mo_laporan_performance_user->getDataCompany();

		$output=$this->load->view('transaksi_report_text',$data_master,true);
        echo $output;	
   }	

   function fntransaksiDataPrintText($vcityKeyword,$vkecKeyword,$vUserKeyword){
		$this->fntransaksiDataPrint($vcityKeyword,$vkecKeyword,$vUserKeyword,false);
   }
      
}
?>

	   