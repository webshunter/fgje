<?php


class Database {

        private $namaApss = "FGJ";
        private $hostname = '103.152.118.236';
        private $username = 'gugus';
        private $password = 'gugus$111$g';
        public $database = 'fgj';

    private $encryp = "awesomeframeworkwithgugus";
    private $type_data = "utf8";
    private $collate = "utf8_unicode_ci";

    public function cekDatbase(){
        $conn = mysqli_connect($this->hostname, $this->username, $this->password);
        if ($conn) {
            $cekDb = mysqli_select_db($conn, $this->database);
            if ($cekDb) {
                return "tersedia";
            }else{
                $queryCreateDb = mysqli_query($conn, "CREATE DATABASE ".$this->database." CHARACTER SET ".$this->type_data." COLLATE ".$this->collate);
                if ($queryCreateDb) {
                    return "dibuat";
                }
            }
        }else{
            return "this not connect";
        }
    }

    public function getDepartment(){
        return mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
    }

    public function dbquery($qr, $type=""){
        $getConnection = $this->getDepartment();
        $query = mysqli_query($getConnection, $qr);
        $box = [];
        while ($data = mysqli_fetch_object($query) ) {
            $box[] = $data;
        }
        if ($type == "count") {
            return count($box);
        }else{
            return $box;
        }
    }

    public function create_form_default($nama_table)
    {
        $data = $this->dbquery("SELECT
            TABLE_NAME as nama_table
            ,COLUMN_NAME as nama_kolom
        FROM
            information_schema. COLUMNS
        WHERE
            TABLE_NAME = '$nama_table'
            AND
            TABLE_SCHEMA = '".$this->database."'
        ");

        $html = '';

        foreach($data as $key => $value){

            if($value->nama_kolom == $this->get_primary_key($nama_table)){
            }else{
                $html .= '
                <?=
                  form::input([
                    "title" => "'.str_replace("_", " ", $value->nama_kolom).'",
                    "type" => "text",
                    "fc" => "'.$value->nama_kolom.'",
                    "placeholder" => "tambahkan '.$value->nama_kolom.'",
                  ])
                ?>
                ';
            }
        }

        return $html;
    }
    public function create_form_edit($nama_table)
    {
        $data = $this->dbquery("SELECT
            TABLE_NAME as nama_table
            ,COLUMN_NAME as nama_kolom
        FROM
            information_schema. COLUMNS
        WHERE
            TABLE_NAME = '$nama_table'
            AND
            TABLE_SCHEMA = '".$this->database."'
        ");

        $html = '';

        foreach($data as $key => $value){

            if($value->nama_kolom == $this->get_primary_key($nama_table)){
                $html .= '
                    <input type="hidden" name="'.$value->nama_kolom.'" value="<?= $form_data->'.$value->nama_kolom.' ?>" />
                ';
            }else{
                $html .= '
                <?=
                  form::input([
                    "title" => "'.str_replace("_", " ", $value->nama_kolom).'",
                    "type" => "text",
                    "fc" => "'.$value->nama_kolom.'",
                    "placeholder" => "tambahkan '.$value->nama_kolom.'",
                    "value" => $form_data->'.$value->nama_kolom.',
                  ])
                ?>
                ';
            }
        }

        return $html;
    }

    public function create_form_save($nama_table)
    {
        $data = $this->dbquery("SELECT
            TABLE_NAME as nama_table
            ,COLUMN_NAME as nama_kolom
        FROM
            information_schema. COLUMNS
        WHERE
            TABLE_NAME = '$nama_table'
            AND
            TABLE_SCHEMA = '".$this->database."'
        ");

        $html = '';

        foreach($data as $key => $value){

            if($value->nama_kolom == $this->get_primary_key($nama_table)){
            }else{
                $html .= '
                $'.$value->nama_kolom.' = post("'.$value->nama_kolom.'");';
            }
        }

        $html .= '
        $simpan = $this->db->query('."'".'
            INSERT INTO '.$nama_table.'
            ';

        $html .= '(';
            foreach($data as $key => $value){

                if($value->nama_kolom == $this->get_primary_key($nama_table)){
                }else{
                    $html .= ','.$value->nama_kolom;
                }
            }
            $html .= ')';
            $html .= 'VALUES';
            $html .= '(';
                foreach($data as $key => $value){

                    if($value->nama_kolom == $this->get_primary_key($nama_table)){
                    }else{
                        $html .= ',"'."'.$".$value->nama_kolom.".'".'"';
                    }
                }
        $html .= ')';

        $html .= "'".'
        );';

        return str_replace('(,','(',$html);
    }

    public function create_form_update($nama_table, $key_action)
    {
        $data = $this->dbquery("SELECT
            TABLE_NAME as nama_table
            ,COLUMN_NAME as nama_kolom
        FROM
            information_schema. COLUMNS
        WHERE
            TABLE_NAME = '$nama_table'
            AND
            TABLE_SCHEMA = '".$this->database."'
        ");

        $html = '';

        foreach($data as $key => $value){

            if($value->nama_kolom == $this->get_primary_key($nama_table)){
            }else{
                $html .= '
                $'.$value->nama_kolom.' = post("'.$value->nama_kolom.'");';
            }
        }

        $html .= '
        $simpan = $this->db->query('."'".'
            UPDATE '.$nama_table.' SET
            ';

                $html .= 'edit';
                foreach($data as $key => $value){

                    if($value->nama_kolom == $this->get_primary_key($nama_table)){
                    }else{
                        $html .= ', '.$value->nama_kolom.' = "'."'.$".$value->nama_kolom.".'".'"';
                    }
                }

        $html .= ' WHERE '.$key_action.' = '."'.post(".'"'.$key_action.'"'.").'".'';

        $html .= "'".'
        );';

        return str_replace('edit,','',$html);
    }

    public function total_row_table($nama_table)
    {
        $data = $this->dbquery("SELECT
            TABLE_NAME as nama_table
            ,COLUMN_NAME as nama_kolom
        FROM
            information_schema. COLUMNS
        WHERE
            TABLE_NAME = '$nama_table'
            AND
            TABLE_SCHEMA = '".$this->database."'
        ");

        return count($data);
    }

     public function list_columns($nama_table = "")
    {
        $data = $this->dbquery("SELECT
            TABLE_NAME as nama_table
            ,COLUMN_NAME as nama_kolom
        FROM
            information_schema. COLUMNS
        WHERE
            TABLE_NAME = '$nama_table'
            AND
            TABLE_SCHEMA = '".$this->database."'
        ");

        $new = [];
        foreach ($data as $key => $value) {
            $new[] = $value->nama_kolom;
        }

        return $new;
    }

    public function dapatkan_nama_column($nama_table = "", $data_arr = "", $data_tambahan = "", $template = "")
    {
        $data = $this->dbquery("SELECT
            TABLE_NAME as nama_table
            ,COLUMN_NAME as nama_kolom
        FROM
            information_schema. COLUMNS
        WHERE
            TABLE_NAME = '$nama_table'
            AND
            TABLE_SCHEMA = '".$this->database."'
        ");

        if($template == "show" || $template == "order" ){
            unset($data[0]);
        }

        $custome = "[";
        $custome_order = "[";

        foreach ($data as $key => $value) {
            if($key == 0){
                if($data_arr != ""){
                    foreach($data_arr as $mykey => $nilai){
                        if($mykey == $key){
                            $custome .= '"'.$nilai.'"';
                        }else{
                            $custome .= '"'.$value->nama_kolom.'"';
                            $custome_order .= '"'.$key.'"=>"'.$value->nama_kolom.'"';
                        }
                    }
                }else{
                    $custome .= '"'.$value->nama_kolom.'"';
                    $custome_order .= '"'.$key.'"=>"'.$value->nama_kolom.'"';
                }

                if($data_tambahan != ""){
                    foreach($data_tambahan as $mykey2 => $nilai2){
                        if($mykey2 == $key){
                            foreach($nilai2 as $mykey3 => $nilai3){
                                $custome .= ',"'.$nilai3.'"';
                            }
                        }
                    }
                }
            }else{
                if($data_arr != ""){
                    foreach($data_arr as $mykey => $nilai){
                        if($mykey == $key){
                            $custome .= ',"'.$nilai.'"';
                        }else{
                            $custome .= ',"'.$value->nama_kolom.'"';
                            $custome_order .= ', "'.$key.'"=>"'.$value->nama_kolom.'"';
                        }
                    }
                }else{
                    $custome .= ',"'.$value->nama_kolom.'"';
                    $custome_order .= ', "'.$key.'"=>"'.$value->nama_kolom.'"';
                }


                if($data_tambahan != ""){
                    foreach($data_tambahan as $mykey2 => $nilai2){
                        if($mykey2 == $key){
                            foreach($nilai2 as $mykey3 => $nilai3){
                                $custome .= ',"'.$nilai3.'"';
                            }
                        }
                    }
                }
            }
        }

        $custome .= "]";
        $custome_order .= "]";

        if($template != 'order'){
            return str_replace("[,", "[", $custome);
        }else{
            return str_replace("[,", "[", $custome_order);
        }
    }

    public function getColumnName($table, $row){
        $data = $this->dbquery("
            SELECT
                COLUMN_NAME as nama_kolom
            FROM
                information_schema. COLUMNS
            WHERE
                TABLE_SCHEMA = '".$this->database."'
            AND TABLE_NAME = '".$table."'
            AND ORDINAL_POSITION = ".$row."
        ");
        $nama = "";
        foreach ($data as $key => $value) {
            $nama .= $value->nama_kolom;
        }

        return $nama;
    }

    public function ArrColumnName($table){
        $data = $this->dbquery("
            SELECT
                COLUMN_NAME as nama_kolom
            FROM
                information_schema. COLUMNS
            WHERE
                TABLE_SCHEMA = '".$this->database."'
                AND TABLE_NAME = '".$table."'
        ");
        $nama = array();
        foreach ($data as $key => $value) {
            $nama[] = $value->nama_kolom;
        }

        return $nama;
    }

    public function cekColumn($table, $row){
        return $this->dbquery("
            SELECT
                COLUMN_NAME as nama_kolom
            FROM
                information_schema. COLUMNS
            WHERE
                TABLE_SCHEMA = '".$this->database."'
            AND TABLE_NAME = '".$table."'
            AND ORDINAL_POSITION = ".$row."
        ", "count");
    }

    public function cekTable($table, $tablestruktur){
        $getConnection = $this->getDepartment();
        $query = mysqli_query($getConnection, "DESCRIBE $table ");
        if ($query) {

            $aa = $this->ArrColumnName($table);
            $bb = array_keys($tablestruktur);

            if (count($aa) > count($bb)) {
                foreach ($aa as $ay => $ax) {
                    if (in_array($ax, $bb)) {
                    }else{
                        $this->query("
                            ALTER TABLE ".$table."
                            DROP COLUMN ".$ax.";
                        ");
                    }
                }
            }else{
                $no = 1;
                foreach ($tablestruktur as $key => $value) {
                    if ($this->cekColumn($table, $no) == 0) {
                        $this->query("

                            ALTER TABLE ".$table."
                            ADD ".$key." ".$value.";

                        ");
                    }else{
                        if ($this->getColumnName($table, $no) != $key) {
                            $this->query("

                                ALTER TABLE ".$table."
                                CHANGE COLUMN ".$this->getColumnName($table, $no)." ".$key." ".$value.";

                            ");
                        }
                    }
                    $no++;
                }
            }

            return 'tersedia';
        }else{

            $mystructure = "";

            $no = 0;
            foreach ($tablestruktur as $key => $value) {
                if ($no == 0) {
                    $mystructure .= $key.' '.$value;
                }else{
                    $mystructure .= ','.$key.' '.$value;
                }
                $no++;
            }
            $createtable = mysqli_query($getConnection, 'CREATE TABLE '.$table.' ('.$mystructure.') ');
            if ($createtable) {
                return 'dibuat';
            }else{
                return 'gagal';
            }
        }
    }

    public function drop_table($table){
        $getConnection = $this->getDepartment();
        $createtable = mysqli_query($getConnection, 'DROP TABLE '.$table.' ');
        if ($createtable) {
            return 'dihapus';
        }else{
            return 'gagal';
        }
    }

    // query data ke database
    public function query($e)
    {
        $conn = $this->getDepartment();
        $query = mysqli_query($conn, $e);
        return $query;
    }

    // ambuil data secara objek
    public function query_result_object($e)
    {
        $conn = $this->getDepartment();
        $query = mysqli_query($conn, $e);
        $box = [];
        while ($data = mysqli_fetch_object($query) ) {
            $box[] = $data;
        }
        return $box;
    }

    public function query_result_object_row($e)
    {
        $conn = $this->getDepartment();
        $query = mysqli_query($conn, $e);
        $box = [];
        while ($data = mysqli_fetch_object($query) ) {
            $box[] = $data;
        }
        if(count($box) > 0){
            return $box[0];
        }
        return "kosong";
    }


    public function get_primary_key($table, $datar = ""){
        $data = $this->query_result_object_row("

        SELECT
            COLUMN_NAME
        FROM
            information_schema.KEY_COLUMN_USAGE
        WHERE
            TABLE_SCHEMA = '".$this->database."'
            AND TABLE_NAME = '".$table."'
            AND CONSTRAINT_NAME = 'PRIMARY'

        ");

        if($data != "kosong"){
            return $data->COLUMN_NAME;
        }else{
            if($datar != ""){
                return $datar[0];
            }else{
                return $datar;
            }
        }
    }


    // ambil data secara arrray
    public function query_result_assoc($e)
    {
        $conn = $this->getDepartment();
        $query = mysqli_query($conn, $e);
        $box = [];
        while ($data = mysqli_fetch_assoc($query) ) {
            $box[] = $data;
        }
        return $box;
    }
    // hitung total query data
    public function count_query($e)
    {
        $conn = $this->getDepartment();
        $query = mysqli_query($conn, $e);
        $box = [];
        while ($data = mysqli_fetch_object($query) ) {
            $box[] = $data;
        }
        return count($box);
    }
    // nah ini rumusnya tadi
    public function sql_like_table($arr, $search){
        $table_row_data = "";
        $table_row_data .= "(";
        foreach ($arr as $key => $value) {
            if ($key == 0) {
                $table_row_data .= $value." LIKE '%".$search."%' ";
            }else{
                $table_row_data .= ' OR '.$value." LIKE '%".$search."%' ";
            }
        }
        $table_row_data .= ")";
        return $table_row_data;
    }

    public function sql_order_table($arr, $order){
        if ($order != "") {
            $columnName = "";
            foreach ($arr as $key => $nilaicolumn) {
                if ($key == $order[0]["column"]) {
                    $columnName = $nilaicolumn;
                }
            }
            $columnOrder = $_POST["order"][0]["dir"];
            $order = 'ORDER BY '.$columnName.' '.$columnOrder.' ';
        }else{
            $order = ' ORDER BY id DESC ';
        }

        return $order;
    }

    public function sql_save_query($table, $data_arr){
        $conn = $this->getDepartment();

        $data = "data saya ok";
        $keys = array_keys($data_arr);
        $name_of_query = "INSERT INTO ";
        $namaTable = $table;
        $data_keys = " (";
        foreach ($keys as $key => $nilai_key) {
            if ($key == 0) {
                $data_keys .= $nilai_key;
            }else{
                $data_keys .= ','.$nilai_key;
            }
        }
        $data_keys .= ")";
        $data_keys .= " VALUES ";
        $nilai_data = "(";
        for ($i=0; $i < count($data_arr); $i++) {
            if ($i == 0) {
                $nilai_data .= '"'.$data_arr[$keys[$i]].'"';
            }else{
                $nilai_data .= ',"'.$data_arr[$keys[$i]].'"';
            }
        }
        $nilai_data .= ")";
        $nilai_query = $name_of_query.$namaTable.$data_keys.$nilai_data;
        $query = mysqli_query($conn, $nilai_query);
        return $query;
    }

    public function sql_update_query($table, $data_arr, $where){
        $conn = $this->getDepartment();

        $data = "data saya ok";
        $keys = array_keys($data_arr);
        $keys2 = array_keys($where);
        $name_of_query = "UPDATE ";
        $namaTable = $table;
        $nilai_data = " SET ";
        for ($i=0; $i < count($data_arr); $i++) {
            if ($i == 0) {
                $nilai_data .= $keys[$i].' = "'.$data_arr[$keys[$i]].'"';
            }else{
                $nilai_data .= ', '.$keys[$i].' = "'.$data_arr[$keys[$i]].'"';
            }
        }
        $argument = " WHERE ";
        for ($y=0; $y < count($where); $y++) {
            if ($y == 0) {
                $argument .= $keys2[$y]." = '".$where[$keys2[$y]]."' ";
            }else{
                $argument .= " AND ".$keys2[$y]." = '".$where[$keys2[$y]]."' ";
            }
        }
        $nilai_query = $name_of_query.$namaTable.$nilai_data.$argument;
        $query = mysqli_query($conn, $nilai_query);
        return $query;
    }

    public function sql_delete_query($table, $where){
        $conn = $this->getDepartment();
        $keys2 = array_keys($where);
        $argument = " WHERE ";
        for ($y=0; $y < count($where); $y++) {
            if ($y == 0) {
                $argument .= $keys2[$y]." = '".$where[$keys2[$y]]."' ";
            }else{
                $argument .= " AND ".$keys2[$y]." = '".$where[$keys2[$y]]."' ";
            }
        }
        $delete_query = "DELETE FROM ".$table.$argument;

        $query = mysqli_query($conn, $delete_query);
        return $query;

    }
}
