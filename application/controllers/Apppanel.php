<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apppanel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        Cek_login::ceklogin();
        $this->load->model('Createtable');
        $this->load->model('Datatable_gugus');
    }
    
    public function index($nama = "")
    {
        $this->load->view('templateadmin/head');
        $this->load->view('daftar', [
            "nama" => $nama
        ]);
        $this->load->view('templateadmin/footer');
    }

}