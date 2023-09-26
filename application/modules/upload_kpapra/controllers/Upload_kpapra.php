<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_kpapra extends MY_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_kpapra');			
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
				$data['tampil_data_personal'] = $this->M_upload_kpapra->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_kpapra'] = $this->M_upload_kpapra->tampil_data_kpapra($detailidnya);
				$data['hitungan'] = $this->M_upload_kpapra->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_kpapra->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_kpapra";
				$data['namafileview'] = "kpapraadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_kpapra->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_kpapra'] = $this->M_upload_kpapra->tampil_data_kpapra($detailidnya);
				$data['namamodule'] = "upload_kpapra";
				$data['namafileview'] = "kpapraadmin";
				echo Modules::run('template/kpapra_template', $data);
			}
		}	 
	}

	function simpan_data_kpapra(){
		
		$this->M_upload_kpapra->simpan_data_kpapra();

		redirect('upload_kpapra');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_kpapra";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_kpapra->simpan_foto_kpapra($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_kpapra->hapus_foto_kpapra();
	}


	function update_data_kpapra() {
			$this->M_upload_kpapra->update_data_kpapra();
			redirect('upload_kpapra');
	}

	function hapus_data_kpapra() {
		$this->M_upload_kpapra->hapus_data_kpapra();
		redirect('upload_kpapra');
	}
}