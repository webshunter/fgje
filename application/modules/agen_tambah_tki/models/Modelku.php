<?php
class Modelku extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function query( $table = '', $data = '*', $where = ''){

        

        $data = $this->db->query("SELECT $data FROM $table $where ")->result();
        return $data;
    }


 function ambildatarow($kode ,$dari, $selector='', $key=''){
    if ($selector != '') {
        $where = "WHERE ".$selector." = '".$key."'";
    }else{
        $where = "";
    }

    $data = $this->db->query("SELECT $kode FROM $dari $where")->row();
    return $data;
}

function ambildataresult($kode ,$dari, $selector='', $key=''){
    if ($selector != '') {
        $where = "WHERE ".$selector." = '".$key."'";
    }else{
        $where = "";
    }

    $data = $this->db->query("SELECT $kode FROM $dari $where")->result();
    return $data;
}

function ambildatamod($key, $diminta, $dari, $selector, $kode){
    $data = $this->db->query("SELECT ".$kode." FROM ".$dari." WHERE ".$selector." = '".$key."'")->row();
    $dikirim = isset($data->$diminta);
    if ($dikirim == 1) {
        $paket = $data->$diminta;
    }else{
        $paket = "";
    }
    return $paket;
}

function buatarray($kode, $diminta, $dari, $key ,$selector='id_biodata'){
    $data = $this->db->query("SELECT ".$kode." FROM ".$dari." WHERE ".$selector." = '".$key."'")->result();
    $array = array();
    if (isset($data)) {
        foreach ($data as $key => $dataarr) {
            $array[] = strtoupper($dataarr->$diminta);        
        }
    }else{
        $array[] = "";
    }

    return $array;  
}






    
}