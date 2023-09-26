<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class surat_rekom_skck extends MY_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_surat_rekom_skck');			
	}
	
	function index($tampilid){
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

			$data['tampil_data_personal'] = $this->M_surat_rekom_skck->tampil_data_personal($tampilid);
			$data['tampil_data_tki'] = $this->M_surat_rekom_skck->tampil_data_tki();
			$data['tampil_data_namadisnaker'] = $this->M_surat_rekom_skck->tampil_data_namadisnaker();
			
			$data['tampil_data_polda'] = $this->M_surat_rekom_skck->tampil_data_polda();
			$data['tampil_data_polsek'] = $this->M_surat_rekom_skck->tampil_data_polsek();
			$data['tampil_data_polres'] = $this->M_surat_rekom_skck->tampil_data_polres();
			$data['tampil_data_namadesa'] = $this->M_surat_rekom_skck->tampil_data_namadesa();

			$data['id_bio'] =$tampilid;


				$data['namamodule'] = "surat_rekom_skck";
				$data['namafileview'] = "surat_rekom_skck";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "surat_rekom_skck";
				$data['namafileview'] = "surat_rekom_skck";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}
	
	function simpan_data_surat($id_bio){
		$this->M_surat_rekom_skck->simpan_data_surat($id_bio);

		redirect('surat_rekom_skck/index/'.$id_bio);
	}

	function edit_surat($id_bio) {
			$this->M_surat_rekom_skck->edit_surat($id_bio);
			redirect('surat_rekom_skck/index/'.$id_bio);
	}

	function hapus_data_surat($id_bio) {
		$this->M_surat_rekom_skck->hapus_data_surat();
		redirect('surat_rekom_skck/index/'.$id_bio);
	}
        
}