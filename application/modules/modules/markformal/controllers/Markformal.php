<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class markformal extends MY_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_Markformal');			
	}
	
	function index(){
	$session = $this->M_session->get_session();
		if (!$session['session_userid'] && !$session['session_status']){
			//user belum login
			$data['namamodule'] = "login";
			$data['namafileview'] = "login";
			echo Modules::run('template/login_template', $data);
		}
		else{
		$id_user = $session['session_userid'];
		$status = $session['session_status'];
			//user sudah login
			if ($id_user && $status==1){
			$data['tampil_data_personal'] = $this->M_Markformal->tampil_data_personal();

		

			//user sudah login
				$data['namamodule'] = "markformal";
				$data['namafileview'] = "markformal";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "markformal";
				$data['namafileview'] = "markformalagen";
				echo Modules::run('template/agen_template', $data); 
			}
		}	 
	}



}