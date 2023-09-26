<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_skuasa extends MY_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_skuasa');			
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
				$data['tampil_data_personal'] = $this->M_upload_skuasa->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_skuasa'] = $this->M_upload_skuasa->tampil_data_skuasa($detailidnya);
				$data['hitungan'] = $this->M_upload_skuasa->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_skuasa->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_skuasa";
				$data['namafileview'] = "skuasaadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_skuasa->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_skuasa'] = $this->M_upload_skuasa->tampil_data_skuasa($detailidnya);
				$data['namamodule'] = "upload_skuasa";
				$data['namafileview'] = "skuasaadmin";
				echo Modules::run('template/skuasa_template', $data);
			}
		}	 
	}

	function simpan_data_skuasa(){
		
		$this->M_upload_skuasa->simpan_data_skuasa();

		redirect('upload_skuasa');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_skuasa";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_skuasa->simpan_foto_skuasa($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_skuasa->hapus_foto_skuasa();
	}


	function update_data_skuasa() {
			$this->M_upload_skuasa->update_data_skuasa();
			redirect('upload_skuasa');
	}

	function hapus_data_skuasa() {
		$this->M_upload_skuasa->hapus_data_skuasa();
		redirect('upload_skuasa');
	}
}