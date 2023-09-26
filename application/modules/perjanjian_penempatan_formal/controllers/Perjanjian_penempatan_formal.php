<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Perjanjian_penempatan_formal extends MY_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_perjanjian_penempatan_formal');			
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
			//user sudah login

			$data['tampil_data_personal'] = $this->M_perjanjian_penempatan_formal->tampil_data_personal();
			$data['tampil_data_tki'] = $this->M_perjanjian_penempatan_formal->tampil_data_tki();
			$data['tampil_data_agen'] = $this->M_perjanjian_penempatan_formal->tampil_data_agen();
			$data['tampil_data_family'] = $this->M_perjanjian_penempatan_formal->tampil_data_family();
			$data['tampil_data_jabatan'] = $this->M_perjanjian_penempatan_formal->tampil_data_jabatan();



				$data['namamodule'] = "perjanjian_penempatan_formal";
				$data['namafileview'] = "perjanjian_penempatan_formal";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "perjanjian_penempatan_formal";
				$data['namafileview'] = "perjanjian_penempatan_formal";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}
	
	function simpan_data_surat(){
		$this->M_perjanjian_penempatan_formal->simpan_data_surat();

		redirect('perjanjian_penempatan_formal');
	}
	
	
	function edit_data_surat(){
		$this->M_perjanjian_penempatan_formal->edit_data_surat();

		redirect('perjanjian_penempatan_formal');
	}
	
 function hapus_data_surat() {
		$this->M_perjanjian_penempatan_formal->hapus_data_surat();
		redirect('perjanjian_penempatan_formal');
	}

	
	
}