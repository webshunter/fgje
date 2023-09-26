<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class dokdibawa extends MY_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_dokdibawa');			
	}
	
	function index($datatrima = ""){
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
				$data['linkfeedback'] = $datatrima;
				$data['tampil_data_dokdibawa'] = $this->M_dokdibawa->tampil_data_dokdibawa();
				$data['namamodule'] = "dokdibawa";
				$data['namafileview'] = "dokdibawaadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['linkfeedback'] = $datatrima;
				$data['namamodule'] = "dokdibawa";
				$data['namafileview'] = "dokdibawaagen";
				echo Modules::run('template/agen_template', $data); 
			}
		}	 
	}

	function simpan_data_dokdibawa(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		$nama_dokdibawa	= $this->input->post('nama_dokdibawa');
		
		$this->M_dokdibawa->simpan_data_dokdibawa($nama_dokdibawa);

		redirect('dokdibawa');
	}

	function update_data_dokdibawa() {
			$this->M_dokdibawa->update_data_dokdibawa();
			redirect('dokdibawa');
	}

	function hapus_data_dokdibawa() {
		$this->M_dokdibawa->hapus_data_dokdibawa();
		redirect('dokdibawa');
	}
}