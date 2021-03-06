<?php
class md_setting extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_setting');
	}
	function index() {
		$this->fnsetting();
	}
	function fnsetting()	{
	
		$this->db->where('setting','Volume Video');		
		$vResult = $this->db->get(setting)->result();
		$vRow = $vResult[0];		
		$vData['volume_video'] = $vRow->nilai;
		
		$this->db->where('setting','text speed');		
		$vResult = $this->db->get(setting)->result();
		$vRow = $vResult[0];		
		$vData['text_speed'] = $vRow->nilai;
		
		$this->load->view('vw_setting',$vData);
	}
	// ======================================== 'Datagrid User Section'
	function fnsettingData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$vsettingKeyword=$this->input->post('settingKeyword');
		$vSort=$this->input->post('sort');
		$vOrder=$this->input->post('order');
		if(!$vPage) {
			$vPage=1;
		}
		if(!$vRows) {
			$vRows=20;
		}
		if(!$vcustomerKeyword) {
			$vcustomerKeyword='';
		}
		if(!$vSort) {
		
		$vSort='id_setting';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_setting->fnsettingCount($vsettingKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_setting->fnsettingData($vsettingKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}	
	function fnsettingAdd() {
		$this->load->view('setting_add_main');
	}
	
	function fnsettingCreate() {
		$vData = array(
         		
			'vid_setting'=>$this->input->post('id_setting'),
       		
			'vsetting'=>$this->input->post('setting'),
       		
			'vnilai'=>$this->input->post('nilai'),
       		
			'vketerangan'=>$this->input->post('keterangan'),
       				
		);
		
		
	$this->mo_setting->fnCreatesetting($vData);
	}
	function fnsettingEdit($psettingId) {
		$vData['vsettingId'] = $psettingId;
 		
		$this->load->view('setting_add_main',$vData);
	}
	function fnsettingRow_Port_Counter_Display() {
		$this->mo_setting->fnsettingRow_Port_Counter_Display();
	}
	function fnsettingRow_Baudrate_Counter_Display() {
		$this->mo_setting->fnsettingRow_Baudrate_Counter_Display();
	}
	function fnsettingRow_Touch_Screen() {
		$this->mo_setting->fnsettingRow_Touch_Screen();
	}
	function fnsettingRow_LCD_Display() {
		$this->mo_setting->fnsettingRow_LCD_Display();
	}
	function fnsettingRow_Form_2() {
		$this->mo_setting->fnsettingRow_Form_2();
	}
	function fnsettingRow_Port_Console() {
		$this->mo_setting->fnsettingRow_Port_Console();
	}
	function fnsettingRow_Port_Printer() {
		$this->mo_setting->fnsettingRow_Port_Printer();
	}
	function fnsettingRow_Baudrate_Printer() {
		$this->mo_setting->fnsettingRow_Baudrate_Printer();
	}
	function fnsettingRow_Volume_Video() {
		$this->mo_setting->fnsettingRow_Volume_Video();
	}
	function fnsettingRow_Text_Speed() {
		$this->mo_setting->fnsettingRow_Text_Speed();
	}
	function fnsettingRow_Shutdown() {
		$this->mo_setting->fnsettingRow_Shutdown();
	}
	
	function fnsettingDelete() {
		$vDelsettingId = intval($_POST['Id']);
		$this->mo_setting->fnsettingDelete($vDelsettingId);
	}
	
	function fnsettingUpdate_Port_Counter_Display() {
		$vData1 = array(		         		       		
			'vPort_Counter_Display'=>$this->input->post('Port_Counter_Display'),      		
		);
		$this->mo_setting->fnUpdatesetting_Port_Counter_Display($psettingId,$vData1);

		$vData2 = array(		         		       		
			'vBaudrate_Counter_Display'=>$this->input->post('Baudrate_Counter_Display'),      		
		);
		$this->mo_setting->fnUpdatesetting_Baudrate_Counter_Display($psettingId,$vData2);

		$vData3 = array(		         		       		
			'vTouch_Screen'=>$this->input->post('Touch_Screen'),      		
		);
		$this->mo_setting->fnUpdatesetting_Touch_Screen($psettingId,$vData3);
		
		$vData4 = array(		         		       		
			'vLCD_Display'=>$this->input->post('LCD_Display'),      		
		);
		$this->mo_setting->fnUpdatesetting_LCD_Display($psettingId,$vData4);

		$vData5 = array(		         		       		
			'vForm_2'=>$this->input->post('Form_2'),      		
		);
		$this->mo_setting->fnUpdatesetting_Form_2($psettingId,$vData5);

		$vData6 = array(		         		       		
			'vPort_Console'=>$this->input->post('Port_Console'),      		
		);
		$this->mo_setting->fnUpdatesetting_Port_Console($psettingId,$vData6);

		$vData7 = array(		         		       		
			'vPort_Printer'=>$this->input->post('Port_Printer'),      		
		);
		$this->mo_setting->fnUpdatesetting_Port_Printer($psettingId,$vData7);

		$vData8 = array(		         		       		
			'vBaudrate_Printer'=>$this->input->post('Baudrate_Printer'),      		
		);
		$this->mo_setting->fnUpdatesetting_Baudrate_Printer($psettingId,$vData8);

		$vData9 = array(		         		       		
			'vVolume_Video'=>$this->input->post('volume_video'),      		
		);
		$this->mo_setting->fnUpdatesetting_Volume_Video($psettingId,$vData9);
		
		$vData10 = array(		         		       		
			'vText_Speed'=>$this->input->post('text_speed'),      		
		);
		$vData11 = array(		         		       		
			'vShutdown'=>$this->input->post('Shutdown'),      		
		);
		
		$this->mo_setting->fnUpdatesetting_Shutdown($psettingId,$vData11);
		
	}
}
?>

	   