<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_desuhan extends MY_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_desuhan');			
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
				$data['tampil_data_personal'] = $this->M_upload_desuhan->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_desuhan'] = $this->M_upload_desuhan->tampil_data_desuhan($detailidnya);
				$data['hitungan'] = $this->M_upload_desuhan->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_desuhan->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_desuhan";
				$data['namafileview'] = "desuhanadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_desuhan->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_desuhan'] = $this->M_upload_desuhan->tampil_data_desuhan($detailidnya);
				$data['namamodule'] = "upload_desuhan";
				$data['namafileview'] = "desuhanadmin";
				echo Modules::run('template/desuhan_template', $data);
			}
		}	 
	}

	function simpan_data_desuhan(){
		
		$this->M_upload_desuhan->simpan_data_desuhan();

		redirect('upload_desuhan');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_desuhan";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_desuhan->simpan_foto_desuhan($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_desuhan->hapus_foto_desuhan();
	}


	function update_data_desuhan() {
			$this->M_upload_desuhan->update_data_desuhan();
			redirect('upload_desuhan');
	}

	function hapus_data_desuhan() {
		$this->M_upload_desuhan->hapus_data_desuhan();
		redirect('upload_desuhan');
	}
}