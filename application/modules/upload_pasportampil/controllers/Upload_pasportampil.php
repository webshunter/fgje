<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_pasportampil extends MY_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_pasportampil');			
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
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_pasportampil->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_pasportampil'] = $this->M_upload_pasportampil->tampil_data_pasportampil($detailidnya);
				$data['hitungan'] = $this->M_upload_pasportampil->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_pasportampil->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_pasportampil";
				$data['namafileview'] = "pasportampiladmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_pasportampil->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_pasportampil'] = $this->M_upload_pasportampil->tampil_data_pasportampil($detailidnya);
				$data['namamodule'] = "upload_pasportampil";
				$data['namafileview'] = "pasportampiladmin";
				echo Modules::run('template/agen_template', $data);
			}
		}	 
	}

	function simpan_data_pasportampil(){
		
		$this->M_upload_pasportampil->simpan_data_pasportampil();

		redirect('upload_pasportampil');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_pasportampil";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_pasportampil->simpan_foto_pasportampil($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_pasportampil->hapus_foto_pasportampil();
	}


	function update_data_pasportampil() {
			$this->M_upload_pasportampil->update_data_pasportampil();
			redirect('upload_pasportampil');
	}

	function hapus_data_pasportampil() {
		$this->M_upload_pasportampil->hapus_data_pasportampil();
		redirect('upload_pasportampil');
	}
}