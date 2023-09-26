<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_asuransilama extends MY_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_asuransilama');			
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
				$data['tampil_data_personal'] = $this->M_upload_asuransilama->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_asuransilama'] = $this->M_upload_asuransilama->tampil_data_asuransilama($detailidnya);
				$data['hitungan'] = $this->M_upload_asuransilama->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_asuransilama->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_asuransilama";
				$data['namafileview'] = "asuransilamaadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_asuransilama->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_asuransilama'] = $this->M_upload_asuransilama->tampil_data_asuransilama($detailidnya);
				$data['namamodule'] = "upload_asuransilama";
				$data['namafileview'] = "asuransilamaadmin";
				echo Modules::run('template/asuransilama_template', $data);
			}
		}	 
	}

	function simpan_data_asuransilama(){
		
		$this->M_upload_asuransilama->simpan_data_asuransilama();

		redirect('upload_asuransilama');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_asuransilama";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_asuransilama->simpan_foto_asuransilama($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_asuransilama->hapus_foto_asuransilama();
	}


	function update_data_asuransilama() {
			$this->M_upload_asuransilama->update_data_asuransilama();
			redirect('upload_asuransilama');
	}

	function hapus_data_asuransilama() {
		$this->M_upload_asuransilama->hapus_data_asuransilama();
		redirect('upload_asuransilama');
	}
}