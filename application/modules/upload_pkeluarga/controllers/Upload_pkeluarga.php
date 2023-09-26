<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_pkeluarga extends MY_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_pkeluarga');			
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
				$data['tampil_data_personal'] = $this->M_upload_pkeluarga->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_pkeluarga'] = $this->M_upload_pkeluarga->tampil_data_pkeluarga($detailidnya);
				$data['hitungan'] = $this->M_upload_pkeluarga->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_pkeluarga->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_pkeluarga";
				$data['namafileview'] = "pkeluargaadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_pkeluarga->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_pkeluarga'] = $this->M_upload_pkeluarga->tampil_data_pkeluarga($detailidnya);
				$data['namamodule'] = "upload_pkeluarga";
				$data['namafileview'] = "pkeluargaadmin";
				echo Modules::run('template/pkeluarga_template', $data);
			}
		}	 
	}

	function simpan_data_pkeluarga(){
		
		$this->M_upload_pkeluarga->simpan_data_pkeluarga();

		redirect('upload_pkeluarga');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_pkeluarga";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_pkeluarga->simpan_foto_pkeluarga($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_pkeluarga->hapus_foto_pkeluarga();
	}


	function update_data_pkeluarga() {
			$this->M_upload_pkeluarga->update_data_pkeluarga();
			redirect('upload_pkeluarga');
	}

	function hapus_data_pkeluarga() {
		$this->M_upload_pkeluarga->hapus_data_pkeluarga();
		redirect('upload_pkeluarga');
	}
}