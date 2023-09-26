<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_skckpolres extends MY_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_skckpolres');			
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
				$data['tampil_data_personal'] = $this->M_upload_skckpolres->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_skck'] = $this->M_upload_skckpolres->tampil_data_skck($detailidnya);
				$data['hitungan'] = $this->M_upload_skckpolres->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_skckpolres->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_skckpolres";
				$data['namafileview'] = "skckadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_skckpolres->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_skck'] = $this->M_upload_skckpolres->tampil_data_skck($detailidnya);
				$data['namamodule'] = "upload_skckpolres";
				$data['namafileview'] = "skckadmin";
				echo Modules::run('template/skck_template', $data);
			}
		}	 
	}

	function simpan_data_skck(){
		
		$this->M_upload_skckpolres->simpan_data_skck();

		redirect('upload_skckpolres');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_skckpolres";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_skckpolres->simpan_foto_skck($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_skckpolres->hapus_foto_skck();
	}


	function update_data_skck() {
			$this->M_upload_skckpolres->update_data_skck();
			redirect('upload_skckpolres');
	}

	function hapus_data_skck() {
		$this->M_upload_skckpolres->hapus_data_skck();
		redirect('upload_skckpolres');
	}
}