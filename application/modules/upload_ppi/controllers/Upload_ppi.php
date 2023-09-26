<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_ppi extends MY_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_ppi');			
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
				$data['tampil_data_personal'] = $this->M_upload_ppi->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_ppi'] = $this->M_upload_ppi->tampil_data_ppi($detailidnya);
				$data['hitungan'] = $this->M_upload_ppi->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_ppi->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_ppi";
				$data['namafileview'] = "ppiadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_ppi->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_ppi'] = $this->M_upload_ppi->tampil_data_ppi($detailidnya);
				$data['namamodule'] = "upload_ppi";
				$data['namafileview'] = "ppiadmin";
				echo Modules::run('template/ppi_template', $data);
			}
		}	 
	}

	function simpan_data_ppi(){
		
		$this->M_upload_ppi->simpan_data_ppi();

		redirect('upload_ppi');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_ppi";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_ppi->simpan_foto_ppi($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_ppi->hapus_foto_ppi();
	}


	function update_data_ppi() {
			$this->M_upload_ppi->update_data_ppi();
			redirect('upload_ppi');
	}

	function hapus_data_ppi() {
		$this->M_upload_ppi->hapus_data_ppi();
		redirect('upload_ppi');
	}
}