<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_agen extends MY_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_agen');			
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
				$data['tampil_data_personal'] = $this->M_upload_agen->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_agen'] = $this->M_upload_agen->tampil_data_agen($detailidnya);
				$data['hitungan'] = $this->M_upload_agen->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_agen->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_agen";
				$data['namafileview'] = "agenadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_agen->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_agen'] = $this->M_upload_agen->tampil_data_agen($detailidnya);
				$data['namamodule'] = "upload_agen";
				$data['namafileview'] = "agenadmin";
				echo Modules::run('template/agen_template', $data);
			}
		}	 
	}

	function simpan_data_agen(){
		
		$this->M_upload_agen->simpan_data_agen();

		redirect('upload_agen');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_agen";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_agen->simpan_foto_agen($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_agen->hapus_foto_agen();
	}


	function update_data_agen() {
			$this->M_upload_agen->update_data_agen();
			redirect('upload_agen');
	}

	function hapus_data_agen() {
		$this->M_upload_agen->hapus_data_agen();
		redirect('upload_agen');
	}
}