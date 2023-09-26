<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Master extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('M_session');			
	}
    function index(){
		$session = $this->M_session->get_session();
		if (!$session['session_userid'] && !$session['session_status']){
			//user belum login
			redirect('login');
		} else {
            $id_user = $session['session_userid'];
            $status = $session['session_status'];
            $menu = getjson('assets/menus.json');
            $data['datamenu'] = $menu['data'];
            $data['namamodule'] = "master";
            $data['namafileview'] = "index";
            echo Modules::run('template/admin_template', $data);
		}	 
	}

}