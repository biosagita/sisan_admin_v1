<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class md_home extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('mo_home');
	}
	function index() {
		$vLoginStatus=$this->session->userdata('sStatus');
		if($vLoginStatus==FALSE) {
			// Kondisi Belum Login
			$this->BelumLogin();
		} else {
			// Kondisi Telah Login
			$this->TelahLogin();
		}
	}
	function BelumLogin() {
		$this->load->view('vw_home_log');
	}
	
	function TelahLogin() {
		$vLogin['cLoginId']=$this->session->userdata('sId');
		$vLogin['cLoginName']=$this->session->userdata('sName');
		$vLogin['cLoginPassword']=$this->session->userdata('sPassword');
		$vLogin['cLoginSegment']=$this->session->userdata('sSegments');
		$vLogin['cLoginRoles']=$this->session->userdata('sRoles');
		$vLogin['cLoginStatus']=$this->session->userdata('sStatus');
		$vLoginRole=$this->session->userdata('sRoles');
		$vData['cHasil']=$this->mo_home->getModules($vLoginRole);
		$vData['layanan']=$this->mo_home->getlayanan();
		$vData['defaultforward']=$this->mo_home->getdefaultforward();
		$this->load->view('vw_home_1');
		$this->load->view('vw_home_2');
		// Choose one of 2 item below this, the old one's or the new one's?
		// $this->load->view('oldwestview');
		if ($this->session->userdata('sRoleCode')=='Counter'){ 
		$this->load->view('vw_counter');		
		$this->load->view('vw_home_3_menu_counter',$vData);		
		
		}
		else{
		$this->load->view('vw_home_4',$vLogin);		
		$this->load->view('vw_home_3',$vData);		
		}
		
		$this->load->view('vw_home_5');
	}

	function ProsesLogin() {
		// Proses Login
		$vPostLoginName=$this->input->post('txtUsername');
		$vPostLoginPass=$this->input->post('txtPassword');
		$vAuth1=$this->mo_home->Auth1($vPostLoginName,$vPostLoginPass);
		if($vAuth1) {
			$vSessId = $vAuth1->logId;
			$vSessName = $vAuth1->logName;
			$vSessPass = $vAuth1->logPass;
			$vSessEmpId = $vAuth1->EmpId;			
			$vSessEmpName = $vAuth1->EmpName;
			$vSessBranchId = $vAuth1->BranchId;			
			$vBranchStatus = $vAuth1->BranchStatus;
			$vRoleDataLimit = $vAuth1->RoleDatalimit;
			$vRoleCategory = $vAuth1->RoleCategory;
			$vSessBranchCode = $vAuth1->BranchCode;			
			$vIdGroupLayanan = $vAuth1->id_group_layanan;			
			$vLoket = $this->input->post('id_loket');			
			$vRoleCode = $vAuth1->f_role_code;			
			$vStatusRegVisitor = 	$vAuth1->status_reg;		
			$vAuth2 = $this->mo_home->Auth2($vSessId);
			$vSessSegments = implode(",",$vAuth2);
			
			$vAuth3 = $this->mo_home->Auth3($vSessId);
			$vSessRoles = implode(",",$vAuth3);
			$vSessStatus = TRUE;
			$vLoginArray=array('sId'=>$vSessId,'sName'=>$vSessName,'sPassword'=>$vSessPass,'sEmpId'=>$vSessEmpId,'sEmpName'=>$vSessEmpName,'sBranchId'=>$vSessBranchId,'sBranchCode'=>$vSessBranchCode,'sSegments'=>$vSessSegments,'sRoles'=>$vSessRoles,'sStatus'=>$vSessStatus,'sBranchStatus'=>$vBranchStatus,'sRoleDataLimit'=>$vRoleDataLimit,'sRoleCategory'=>$vRoleCategory,'sIdGroupLayanan'=>$vIdGroupLayanan,'sIdLoket'=>$vLoket,'sRoleCode'=>$vRoleCode,'sRegVisitor'=>$vStatusRegVisitor);
			$this->session->set_userdata($vLoginArray);
			redirect(base_url(),'refresh');
		} else {
			$this->ProsesLogout();
		}
	}

	function ProsesLogout() {

		$this->mo_home->log_logout($this->session->userdata('sId'));

		// Proses Logout
		$this->session->unset_userdata();
		$this->session->sess_destroy();
		redirect(base_url(),'refresh');
	}
}