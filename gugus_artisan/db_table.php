<?php

require_once 'fontawesome/fontFunc.php';
require_once 'table_opsi_set.php';


function crdb()
{

    // login sistem
    // --------------------------------------
        // coming soon

        // login sistem cant return data 
        /*
            [
                ......
                    "datalogin" => [
                        "id" => "value",
                        "username" => "value",
                        "position" => "",
                        "allconf can build from this" => "",
                    ]
                ......
            ]
        */

    // landing setting up
    // --------------------------------------

        // coming soon
    
    // -----------------------------------------------------------------------------------------------------------------------------------//

    // datatable setting up

    // #1. set all data on crude here 
    // create database name ------------------------- // 
    /*
        [
            ....
                "table" => "table name"
            ....
        ]
    */
    
    // #2. create table row
    /*
        [
            ....
                "data" => [
                    "row_name" => char(255)
                ]
            ....
        ]
        row setting data
        ai() -----> autoincrement row
        char(255) ------> VARCHAR 255 //number can custome 1 - 255
        textlong() ------> set for text long
        no(11) ------> integer data 
        timestamp() ------> set timestamp value for auto date
        timestampupdate() ------> timestamp auto update on update data
        relation(table, table_row, table_relation, table_relation_row) ----> relationship database setting
    */

    // dalam penggunaan metode ini user harus paham karakteristk dari array.
    // #4. form setting

        // comming soon

        /*
            -> no condition form tidak akan di tampilkan dalam kata lain form tidak akan dibuat untuk row table tersebut
            [
                ....
                    "form" => [
                        "id" => "no"
                    ],
                ....
            ]

            -> text condition digunakan untuk membuat text form format
            [
                ....
                    "form" => [
                        "username" => "text"
                    ],
                ....
            ]

            -> number condition digunakan untuk membuat number form format
            [
                ....
                    "form" => [
                        "total" => "number"
                    ],
                ....
            ]

            -> username condition digunakan untuk membuat username form format
            [
                ....
                    "form" => [
                        "total" => "username"
                    ],
                ....
            ]

            -> password condition digunakan untuk membuat password form format
            [
                ....
                    "form" => [
                        "total" => "password"
                    ],
                ....
            ]

            -> editor condition digunakan untuk membuat edito form format dalam hal ini summernote editor
            [
                ....
                    "form" => [
                        "total" => "number"
                    ],
                ....
            ] 

            -> select condition digunakan untuk membuat selection dalam hal ini selection membutuhkan database untuk menopangnya
            -> multiple condition yang digunakan untuk membuat multipple selection
            [
                ....
                    "category_id" => [ 
                        "type" => "select / multiple",  // type digunakan untuk menentukan tipe form
                        "data" => [                     // data merupakan setting dari selection 
                            "db" => "category",         // db disini anda akan memilih data dari table mana yang ingin anda ambil
                            "data" => "id",             // data merupakan setting untuk value yang akan digunakan pada option
                            "name" => "nama_kategori"   // name digunakan untuk tampilan dari option
                        ]
                    ],
                ....
            ] 

            -> login condition yang digunakan untuk membuat dengan nilai default id user yang aktif/ dan hidden form
            [
                ....
                    "user" => "login"
                ....
            ] 

        */ 


    // #4. array condition for join table for view
        // coming soon

    /*
        [
            ....
                "data" => [
                    "row_name" => char(255)
                ]
            ....
        ]
    */

    // #4. array condition for join table for view
        // coming soon


    // #5. set default nilai table
        
        // coming soon

    // #6 title page of admin crud sistem setting
    /*
        [
            ....
                "title" => [
                    "view" => "Customer", -> set for view page
                    "edit" => "Ubah Customer", -> set for edit page
                    "new" => "Tambahkan Customer" -> set for page create new data
                ],
            ....
        ]
    */
    
    // #6 commandAll digunakan untuk membuat command process for create all system
                // coming soon data setting like below
    /*
        [
            ....
               'command' => command("link_name", "table_name"),
               'commandAll' => true,
            ....
        ]
    */
    
    // #7 email setting confige page
        
        // coming soon
    
    

    // #8 table design automaticaly
        // coming soon


    // #9 selection icon with modal for font awesome

    // builder with database
    
$arr = []; 
$arr[] = [ 
  'table' => 'dataagen_penerima_nama', 
  'data' => [ 
      'id' => ai(), 
      'nama' => char(255), 
      'namamandarin' => char(255), 
      'branch' => char(255), 
      'bank_code' => char(255), 
      'bank_no' => char(255), 
      'bank_tel' => char(255), 
      'deleted_at' => char(255), 
  ], 
  'form' => [ 
      'id' => 'no', 
      'nama' => 'text', 
      'namamandarin' => 'text', 
      'branch' => 'text', 
      'bank_code' => 'text', 
      'bank_no' => 'text', 
      'bank_tel' => 'text', 
      'deleted_at' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'nama', 
      'namamandarin', 
      'branch', 
      'bank_code', 
      'bank_no', 
      'bank_tel', 
      'deleted_at', 
  ], 
  "title" => [
            "view" => "dataagen_penerima_nama",
            "edit" => "Ubah dataagen_penerima_nama",
            "new" => "Tambahkan dataagen_penerima_nama"
        ],
  'command' => 'php gugus template dataagen_penerima_nama --crud dataagen_penerima_nama' 
]; 
 
$arr[] = [ 
  'table' => 'data_alergi', 
  'data' => [ 
      'id_alergi' => ai(), 
      'id_biodata' => char(255), 
      'data_alergi' => char(255), 
  ], 
  'form' => [ 
      'id_alergi' => 'no', 
      'id_biodata' => 'text', 
      'data_alergi' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'id_biodata', 
      'data_alergi', 
  ], 
  "title" => [
            "view" => "data_alergi",
            "edit" => "Ubah data_alergi",
            "new" => "Tambahkan data_alergi"
        ],
  'command' => 'php gugus template data_alergi --crud data_alergi' 
]; 
 
$arr[] = [ 
  'table' => 'dataalasan', 
  'data' => [ 
      'id_alasan' => ai(), 
      'isi' => char(255), 
      'mandarin' => char(255), 
      'keterangan' => char(255), 
  ], 
  'form' => [ 
      'id_alasan' => 'no', 
      'isi' => 'text', 
      'mandarin' => 'text', 
      'keterangan' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'isi', 
      'mandarin', 
      'keterangan', 
  ], 
  "title" => [
            "view" => "dataalasan",
            "edit" => "Ubah dataalasan",
            "new" => "Tambahkan dataalasan"
        ],
  'command' => 'php gugus template dataalasan --crud dataalasan' 
]; 
 
$arr[] = [ 
  'table' => 'dataujian', 
  'data' => [ 
      'id_jenis' => ai(), 
      'nama' => char(255), 
      'tanggal' => char(255), 
      'status' => char(255), 
  ], 
  'form' => [ 
      'id_jenis' => 'no', 
      'nama' => 'text', 
      'tanggal' => 'text', 
      'status' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'nama', 
      'tanggal', 
      'status', 
  ], 
  "title" => [
            "view" => "dataujian",
            "edit" => "Ubah dataujian",
            "new" => "Tambahkan dataujian"
        ],
  'command' => 'php gugus template dataujian --crud dataujian' 
]; 
 
$arr[] = [ 
  'table' => 'datajabatan', 
  'data' => [ 
      'id_jabatan' => ai(), 
      'isi' => char(255), 
      'mandarin' => char(255), 
  ], 
  'form' => [ 
      'id_jabatan' => 'no', 
      'isi' => 'text', 
      'mandarin' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'isi', 
      'mandarin', 
  ], 
  "title" => [
            "view" => "datajabatan",
            "edit" => "Ubah datajabatan",
            "new" => "Tambahkan datajabatan"
        ],
  'command' => 'php gugus template datajabatan --crud datajabatan' 
]; 
 
$arr[] = [ 
  'table' => 'datakelas', 
  'data' => [ 
      'id_kelas' => ai(), 
      'namakelas' => char(255), 
      'jammasuk' => char(255), 
      'jamkeluar' => char(255), 
      'jumlahjam' => char(255), 
  ], 
  'form' => [ 
      'id_kelas' => 'no', 
      'namakelas' => 'text', 
      'jammasuk' => 'text', 
      'jamkeluar' => 'text', 
      'jumlahjam' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'namakelas', 
      'jammasuk', 
      'jamkeluar', 
      'jumlahjam', 
  ], 
  "title" => [
            "view" => "datakelas",
            "edit" => "Ubah datakelas",
            "new" => "Tambahkan datakelas"
        ],
  'command' => 'php gugus template datakelas --crud datakelas' 
]; 
 
$arr[] = [ 
  'table' => 'blk_data_pemasukan_edit_history', 
  'data' => [ 
      'id_edit_pemasukan' => char(255), 
      'tipe_pemasukan' => char(255), 
      'nominal_pemasukan' => char(255), 
      'tanggal_pemasukan' => char(255), 
      'pemilik_pemasukan' => char(255), 
      'tanggal_input' => char(255), 
      'jam_input' => char(255), 
      'user_input' => char(255), 
      'ip_input' => char(255), 
      'tanggal_edit' => char(255), 
      'jam_edit' => char(255), 
      'user_edit' => char(255), 
      'ip_edit' => char(255), 
      'pemasukan_id' => char(255), 
      'keterangan' => char(255), 
  ], 
  'form' => [ 
      'id_edit_pemasukan' => 'text', 
      'tipe_pemasukan' => 'text', 
      'nominal_pemasukan' => 'text', 
      'tanggal_pemasukan' => 'text', 
      'pemilik_pemasukan' => 'text', 
      'tanggal_input' => 'text', 
      'jam_input' => 'text', 
      'user_input' => 'text', 
      'ip_input' => 'text', 
      'tanggal_edit' => 'text', 
      'jam_edit' => 'text', 
      'user_edit' => 'text', 
      'ip_edit' => 'text', 
      'pemasukan_id' => 'text', 
      'keterangan' => 'text', 
  ], 
  'name' => [ 
      'id_edit_pemasukan', 
      'tipe_pemasukan', 
      'nominal_pemasukan', 
      'tanggal_pemasukan', 
      'pemilik_pemasukan', 
      'tanggal_input', 
      'jam_input', 
      'user_input', 
      'ip_input', 
      'tanggal_edit', 
      'jam_edit', 
      'user_edit', 
      'ip_edit', 
      'pemasukan_id', 
      'keterangan', 
  ], 
  "title" => [
            "view" => "blk_data_pemasukan_edit_history",
            "edit" => "Ubah blk_data_pemasukan_edit_history",
            "new" => "Tambahkan blk_data_pemasukan_edit_history"
        ],
  'command' => 'php gugus template blk_data_pemasukan_edit_history --crud blk_data_pemasukan_edit_history' 
]; 
 
$arr[] = [ 
  'table' => 'datamajikan', 
  'data' => [ 
      'id_majikan' => ai(), 
      'kode_majikan' => char(255), 
      'nama' => char(255), 
      'namamajikan' => char(255), 
      'hp' => char(255), 
      'email' => char(255), 
      'alamat' => char(255), 
      'alamat_mandarin' => char(255), 
      'status' => char(255), 
      'kode_agen' => char(255), 
      'kode_group' => char(255), 
      'file' => char(255), 
      'data_tki' => char(255), 
      'pimpinan_man' => char(255), 
      'pimpinan_indo' => char(255), 
      'jabatan_man' => char(255), 
      'jabatan_indo' => char(255), 
      'filetglinput' => char(255), 
  ], 
  'form' => [ 
      'id_majikan' => 'no', 
      'kode_majikan' => 'text', 
      'nama' => 'text', 
      'namamajikan' => 'text', 
      'hp' => 'text', 
      'email' => 'text', 
      'alamat' => 'text', 
      'alamat_mandarin' => 'text', 
      'status' => 'text', 
      'kode_agen' => 'text', 
      'kode_group' => 'text', 
      'file' => 'text', 
      'data_tki' => 'text', 
      'pimpinan_man' => 'text', 
      'pimpinan_indo' => 'text', 
      'jabatan_man' => 'text', 
      'jabatan_indo' => 'text', 
      'filetglinput' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'kode_majikan', 
      'nama', 
      'namamajikan', 
      'hp', 
      'email', 
      'alamat', 
      'alamat_mandarin', 
      'status', 
      'kode_agen', 
      'kode_group', 
      'file', 
      'data_tki', 
      'pimpinan_man', 
      'pimpinan_indo', 
      'jabatan_man', 
      'jabatan_indo', 
      'filetglinput', 
  ], 
  "title" => [
            "view" => "datamajikan",
            "edit" => "Ubah datamajikan",
            "new" => "Tambahkan datamajikan"
        ],
  'command' => 'php gugus template datamajikan --crud datamajikan' 
]; 
 
$arr[] = [ 
  'table' => 'blk_jadwal3_datapembelajaran', 
  'data' => [ 
      'id' => ai(), 
      'paket_id' => char(255), 
      'instruktur_id' => char(255), 
      'tanggal' => char(255), 
      'created_at' => char(255), 
      'updated_at' => char(255), 
      'deleted_at' => char(255), 
  ], 
  'form' => [ 
      'id' => 'no', 
      'paket_id' => 'text', 
      'instruktur_id' => 'text', 
      'tanggal' => 'text', 
      'created_at' => 'text', 
      'updated_at' => 'text', 
      'deleted_at' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'paket_id', 
      'instruktur_id', 
      'tanggal', 
      'created_at', 
      'updated_at', 
      'deleted_at', 
  ], 
  "title" => [
            "view" => "blk_jadwal3_datapembelajaran",
            "edit" => "Ubah blk_jadwal3_datapembelajaran",
            "new" => "Tambahkan blk_jadwal3_datapembelajaran"
        ],
  'command' => 'php gugus template blk_jadwal3_datapembelajaran --crud blk_jadwal3_datapembelajaran' 
]; 
 
$arr[] = [ 
  'table' => 'data_pemasukan_pajak', 
  'data' => [ 
      'id_data_pemasukan' => char(255), 
      'tipe_pemasukan' => char(255), 
      'nominal_pemasukan' => char(255), 
      'tanggal_pemasukan' => char(255), 
      'pemilik_pemasukan' => char(255), 
      'tanggal_input' => char(255), 
      'jam_input' => char(255), 
      'user_input' => char(255), 
      'ip_input' => char(255), 
      'tanggal_edit' => char(255), 
      'jam_edit' => char(255), 
      'user_edit' => char(255), 
      'ip_edit' => char(255), 
      'keterangan' => char(255), 
  ], 
  'form' => [ 
      'id_data_pemasukan' => 'text', 
      'tipe_pemasukan' => 'text', 
      'nominal_pemasukan' => 'text', 
      'tanggal_pemasukan' => 'text', 
      'pemilik_pemasukan' => 'text', 
      'tanggal_input' => 'text', 
      'jam_input' => 'text', 
      'user_input' => 'text', 
      'ip_input' => 'text', 
      'tanggal_edit' => 'text', 
      'jam_edit' => 'text', 
      'user_edit' => 'text', 
      'ip_edit' => 'text', 
      'keterangan' => 'text', 
  ], 
  'name' => [ 
      'id_data_pemasukan', 
      'tipe_pemasukan', 
      'nominal_pemasukan', 
      'tanggal_pemasukan', 
      'pemilik_pemasukan', 
      'tanggal_input', 
      'jam_input', 
      'user_input', 
      'ip_input', 
      'tanggal_edit', 
      'jam_edit', 
      'user_edit', 
      'ip_edit', 
      'keterangan', 
  ], 
  "title" => [
            "view" => "data_pemasukan_pajak",
            "edit" => "Ubah data_pemasukan_pajak",
            "new" => "Tambahkan data_pemasukan_pajak"
        ],
  'command' => 'php gugus template data_pemasukan_pajak --crud data_pemasukan_pajak' 
]; 
 
$arr[] = [ 
  'table' => 'blk_jadwal_data_tki_delete', 
  'data' => [ 
      'id_jadwal_data_tki_delete' => ai(), 
      'biodata_id' => char(255), 
      'angkatan' => char(255), 
      'hari' => char(255), 
      'tdk_hadir' => char(255), 
      'jam' => char(255), 
      'tipe_data' => char(255), 
      'nonaktif_flag' => char(255), 
      'jadwal_paketjadwal_id' => char(255), 
      'jadwal_data_id' => char(255), 
      'jadwal_data_tki_id' => char(255), 
  ], 
  'form' => [ 
      'id_jadwal_data_tki_delete' => 'no', 
      'biodata_id' => 'text', 
      'angkatan' => 'text', 
      'hari' => 'text', 
      'tdk_hadir' => 'text', 
      'jam' => 'text', 
      'tipe_data' => 'text', 
      'nonaktif_flag' => 'text', 
      'jadwal_paketjadwal_id' => 'text', 
      'jadwal_data_id' => 'text', 
      'jadwal_data_tki_id' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'biodata_id', 
      'angkatan', 
      'hari', 
      'tdk_hadir', 
      'jam', 
      'tipe_data', 
      'nonaktif_flag', 
      'jadwal_paketjadwal_id', 
      'jadwal_data_id', 
      'jadwal_data_tki_id', 
  ], 
  "title" => [
            "view" => "blk_jadwal_data_tki_delete",
            "edit" => "Ubah blk_jadwal_data_tki_delete",
            "new" => "Tambahkan blk_jadwal_data_tki_delete"
        ],
  'command' => 'php gugus template blk_jadwal_data_tki_delete --crud blk_jadwal_data_tki_delete' 
]; 
 
$arr[] = [ 
  'table' => 'blk_data_pengeluaran', 
  'data' => [ 
      'id_data_pengeluaran' => char(255), 
      'tipe_pengeluaran' => char(255), 
      'nominal_pengeluaran' => char(255), 
      'tanggal_pengeluaran' => char(255), 
      'tanggal_input' => char(255), 
      'jam_input' => char(255), 
      'user_input' => char(255), 
      'ip_input' => char(255), 
      'tanggal_edit' => char(255), 
      'jam_edit' => char(255), 
      'user_edit' => char(255), 
      'ip_edit' => char(255), 
      'keterangan' => char(255), 
  ], 
  'form' => [ 
      'id_data_pengeluaran' => 'text', 
      'tipe_pengeluaran' => 'text', 
      'nominal_pengeluaran' => 'text', 
      'tanggal_pengeluaran' => 'text', 
      'tanggal_input' => 'text', 
      'jam_input' => 'text', 
      'user_input' => 'text', 
      'ip_input' => 'text', 
      'tanggal_edit' => 'text', 
      'jam_edit' => 'text', 
      'user_edit' => 'text', 
      'ip_edit' => 'text', 
      'keterangan' => 'text', 
  ], 
  'name' => [ 
      'id_data_pengeluaran', 
      'tipe_pengeluaran', 
      'nominal_pengeluaran', 
      'tanggal_pengeluaran', 
      'tanggal_input', 
      'jam_input', 
      'user_input', 
      'ip_input', 
      'tanggal_edit', 
      'jam_edit', 
      'user_edit', 
      'ip_edit', 
      'keterangan', 
  ], 
  "title" => [
            "view" => "blk_data_pengeluaran",
            "edit" => "Ubah blk_data_pengeluaran",
            "new" => "Tambahkan blk_data_pengeluaran"
        ],
  'command' => 'php gugus template blk_data_pengeluaran --crud blk_data_pengeluaran' 
]; 
 
$arr[] = [ 
  'table' => 'datajobs', 
  'data' => [ 
      'id_jobs' => ai(), 
      'isi' => char(255), 
      'mandarin' => char(255), 
  ], 
  'form' => [ 
      'id_jobs' => 'no', 
      'isi' => 'text', 
      'mandarin' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'isi', 
      'mandarin', 
  ], 
  "title" => [
            "view" => "datajobs",
            "edit" => "Ubah datajobs",
            "new" => "Tambahkan datajobs"
        ],
  'command' => 'php gugus template datajobs --crud datajobs' 
]; 
 
$arr[] = [ 
  'table' => 'blk_data_pengeluaran_edit_history', 
  'data' => [ 
      'id_data_pengeluaran' => char(255), 
      'tipe_pengeluaran' => char(255), 
      'nominal_pengeluaran' => char(255), 
      'tanggal_pengeluaran' => char(255), 
      'tanggal_input' => char(255), 
      'jam_input' => char(255), 
      'user_input' => char(255), 
      'ip_input' => char(255), 
      'tanggal_edit' => char(255), 
      'jam_edit' => char(255), 
      'user_edit' => char(255), 
      'ip_edit' => char(255), 
      'pengeluaran_id' => char(255), 
      'keterangan' => char(255), 
  ], 
  'form' => [ 
      'id_data_pengeluaran' => 'text', 
      'tipe_pengeluaran' => 'text', 
      'nominal_pengeluaran' => 'text', 
      'tanggal_pengeluaran' => 'text', 
      'tanggal_input' => 'text', 
      'jam_input' => 'text', 
      'user_input' => 'text', 
      'ip_input' => 'text', 
      'tanggal_edit' => 'text', 
      'jam_edit' => 'text', 
      'user_edit' => 'text', 
      'ip_edit' => 'text', 
      'pengeluaran_id' => 'text', 
      'keterangan' => 'text', 
  ], 
  'name' => [ 
      'id_data_pengeluaran', 
      'tipe_pengeluaran', 
      'nominal_pengeluaran', 
      'tanggal_pengeluaran', 
      'tanggal_input', 
      'jam_input', 
      'user_input', 
      'ip_input', 
      'tanggal_edit', 
      'jam_edit', 
      'user_edit', 
      'ip_edit', 
      'pengeluaran_id', 
      'keterangan', 
  ], 
  "title" => [
            "view" => "blk_data_pengeluaran_edit_history",
            "edit" => "Ubah blk_data_pengeluaran_edit_history",
            "new" => "Tambahkan blk_data_pengeluaran_edit_history"
        ],
  'command' => 'php gugus template blk_data_pengeluaran_edit_history --crud blk_data_pengeluaran_edit_history' 
]; 
 
$arr[] = [ 
  'table' => 'data_pengeluaran_delete_history', 
  'data' => [ 
      'id_data_pengeluaran' => char(255), 
      'tipe_pengeluaran' => char(255), 
      'nominal_pengeluaran' => char(255), 
      'tanggal_pengeluaran' => char(255), 
      'tanggal_input' => char(255), 
      'jam_input' => char(255), 
      'user_input' => char(255), 
      'ip_input' => char(255), 
      'tanggal_edit' => char(255), 
      'jam_edit' => char(255), 
      'user_edit' => char(255), 
      'ip_edit' => char(255), 
      'tanggal_delete' => char(255), 
      'jam_delete' => char(255), 
      'user_delete' => char(255), 
      'ip_delete' => char(255), 
      'pengeluaran_id' => char(255), 
      'keterangan' => char(255), 
  ], 
  'form' => [ 
      'id_data_pengeluaran' => 'text', 
      'tipe_pengeluaran' => 'text', 
      'nominal_pengeluaran' => 'text', 
      'tanggal_pengeluaran' => 'text', 
      'tanggal_input' => 'text', 
      'jam_input' => 'text', 
      'user_input' => 'text', 
      'ip_input' => 'text', 
      'tanggal_edit' => 'text', 
      'jam_edit' => 'text', 
      'user_edit' => 'text', 
      'ip_edit' => 'text', 
      'tanggal_delete' => 'text', 
      'jam_delete' => 'text', 
      'user_delete' => 'text', 
      'ip_delete' => 'text', 
      'pengeluaran_id' => 'text', 
      'keterangan' => 'text', 
  ], 
  'name' => [ 
      'id_data_pengeluaran', 
      'tipe_pengeluaran', 
      'nominal_pengeluaran', 
      'tanggal_pengeluaran', 
      'tanggal_input', 
      'jam_input', 
      'user_input', 
      'ip_input', 
      'tanggal_edit', 
      'jam_edit', 
      'user_edit', 
      'ip_edit', 
      'tanggal_delete', 
      'jam_delete', 
      'user_delete', 
      'ip_delete', 
      'pengeluaran_id', 
      'keterangan', 
  ], 
  "title" => [
            "view" => "data_pengeluaran_delete_history",
            "edit" => "Ubah data_pengeluaran_delete_history",
            "new" => "Tambahkan data_pengeluaran_delete_history"
        ],
  'command' => 'php gugus template data_pengeluaran_delete_history --crud data_pengeluaran_delete_history' 
]; 
 
$arr[] = [ 
  'table' => 'datanamapolda', 
  'data' => [ 
      'id_namapolda' => ai(), 
      'namapolda' => char(255), 
      'alamat' => char(255), 
  ], 
  'form' => [ 
      'id_namapolda' => 'no', 
      'namapolda' => 'text', 
      'alamat' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'namapolda', 
      'alamat', 
  ], 
  "title" => [
            "view" => "datanamapolda",
            "edit" => "Ubah datanamapolda",
            "new" => "Tambahkan datanamapolda"
        ],
  'command' => 'php gugus template datanamapolda --crud datanamapolda' 
]; 
 
$arr[] = [ 
  'table' => 'dataprovinsi', 
  'data' => [ 
      'id_provinsi' => ai(), 
      'isi' => char(255), 
      'mandarin' => char(255), 
      'keterangan' => char(255), 
  ], 
  'form' => [ 
      'id_provinsi' => 'no', 
      'isi' => 'text', 
      'mandarin' => 'text', 
      'keterangan' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'isi', 
      'mandarin', 
      'keterangan', 
  ], 
  "title" => [
            "view" => "dataprovinsi",
            "edit" => "Ubah dataprovinsi",
            "new" => "Tambahkan dataprovinsi"
        ],
  'command' => 'php gugus template dataprovinsi --crud dataprovinsi' 
]; 
 
$arr[] = [ 
  'table' => 'blk_data_pemasukan_copy', 
  'data' => [ 
      'id_data_pemasukan' => char(255), 
      'tipe_pemasukan' => char(255), 
      'nominal_pemasukan' => char(255), 
      'tanggal_pemasukan' => char(255), 
      'pemilik_pemasukan' => char(255), 
      'tanggal_input' => char(255), 
      'jam_input' => char(255), 
      'user_input' => char(255), 
      'ip_input' => char(255), 
      'tanggal_edit' => char(255), 
      'jam_edit' => char(255), 
      'user_edit' => char(255), 
      'ip_edit' => char(255), 
      'keterangan' => char(255), 
  ], 
  'form' => [ 
      'id_data_pemasukan' => 'text', 
      'tipe_pemasukan' => 'text', 
      'nominal_pemasukan' => 'text', 
      'tanggal_pemasukan' => 'text', 
      'pemilik_pemasukan' => 'text', 
      'tanggal_input' => 'text', 
      'jam_input' => 'text', 
      'user_input' => 'text', 
      'ip_input' => 'text', 
      'tanggal_edit' => 'text', 
      'jam_edit' => 'text', 
      'user_edit' => 'text', 
      'ip_edit' => 'text', 
      'keterangan' => 'text', 
  ], 
  'name' => [ 
      'id_data_pemasukan', 
      'tipe_pemasukan', 
      'nominal_pemasukan', 
      'tanggal_pemasukan', 
      'pemilik_pemasukan', 
      'tanggal_input', 
      'jam_input', 
      'user_input', 
      'ip_input', 
      'tanggal_edit', 
      'jam_edit', 
      'user_edit', 
      'ip_edit', 
      'keterangan', 
  ], 
  "title" => [
            "view" => "blk_data_pemasukan_copy",
            "edit" => "Ubah blk_data_pemasukan_copy",
            "new" => "Tambahkan blk_data_pemasukan_copy"
        ],
  'command' => 'php gugus template blk_data_pemasukan_copy --crud blk_data_pemasukan_copy' 
]; 
 
$arr[] = [ 
  'table' => 'dataagen_promosi', 
  'data' => [ 
      'id' => ai(), 
      'tgl_transfer_doku' => char(255), 
      'agen_id' => char(255), 
      'bank_id' => char(255), 
      'data' => char(255), 
      'date_created' => char(255), 
      'softDelete' => char(255), 
  ], 
  'form' => [ 
      'id' => 'no', 
      'tgl_transfer_doku' => 'text', 
      'agen_id' => 'text', 
      'bank_id' => 'text', 
      'data' => 'text', 
      'date_created' => 'text', 
      'softDelete' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'tgl_transfer_doku', 
      'agen_id', 
      'bank_id', 
      'data', 
      'date_created', 
      'softDelete', 
  ], 
  "title" => [
            "view" => "dataagen_promosi",
            "edit" => "Ubah dataagen_promosi",
            "new" => "Tambahkan dataagen_promosi"
        ],
  'command' => 'php gugus template dataagen_promosi --crud dataagen_promosi' 
]; 
 
$arr[] = [ 
  'table' => 'databarangdiproduksi', 
  'data' => [ 
      'id' => ai(), 
      'isi' => char(255), 
  ], 
  'form' => [ 
      'id' => 'no', 
      'isi' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'isi', 
  ], 
  "title" => [
            "view" => "databarangdiproduksi",
            "edit" => "Ubah databarangdiproduksi",
            "new" => "Tambahkan databarangdiproduksi"
        ],
  'command' => 'php gugus template databarangdiproduksi --crud databarangdiproduksi' 
]; 
 
$arr[] = [ 
  'table' => 'datagroup', 
  'data' => [ 
      'id_group' => ai(), 
      'kode_group' => char(255), 
      'nama' => char(255), 
      'hp' => char(255), 
      'email' => char(255), 
      'alamat' => char(255), 
      'status' => char(255), 
      'username' => char(255), 
      'password' => char(255), 
      'namamandarin' => char(255), 
      'alamatmandarin' => char(255), 
      'direktur' => char(255), 
      'notelp' => char(255), 
      'nofax' => char(255), 
      'tanggungnama' => char(255), 
      'tanggungline' => char(255), 
      'komnama' => char(255), 
      'komline' => char(255), 
      'komskype' => char(255), 
      'komhp' => char(255), 
      'agenbergabung' => char(255), 
      'keterangan' => char(255), 
  ], 
  'form' => [ 
      'id_group' => 'no', 
      'kode_group' => 'text', 
      'nama' => 'text', 
      'hp' => 'text', 
      'email' => 'text', 
      'alamat' => 'text', 
      'status' => 'text', 
      'username' => 'text', 
      'password' => 'text', 
      'namamandarin' => 'text', 
      'alamatmandarin' => 'text', 
      'direktur' => 'text', 
      'notelp' => 'text', 
      'nofax' => 'text', 
      'tanggungnama' => 'text', 
      'tanggungline' => 'text', 
      'komnama' => 'text', 
      'komline' => 'text', 
      'komskype' => 'text', 
      'komhp' => 'text', 
      'agenbergabung' => 'text', 
      'keterangan' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'kode_group', 
      'nama', 
      'hp', 
      'email', 
      'alamat', 
      'status', 
      'username', 
      'password', 
      'namamandarin', 
      'alamatmandarin', 
      'direktur', 
      'notelp', 
      'nofax', 
      'tanggungnama', 
      'tanggungline', 
      'komnama', 
      'komline', 
      'komskype', 
      'komhp', 
      'agenbergabung', 
      'keterangan', 
  ], 
  "title" => [
            "view" => "datagroup",
            "edit" => "Ubah datagroup",
            "new" => "Tambahkan datagroup"
        ],
  'command' => 'php gugus template datagroup --crud datagroup' 
]; 
 
$arr[] = [ 
  'table' => 'data_pengeluaran', 
  'data' => [ 
      'id_data_pengeluaran' => char(255), 
      'tipe_pengeluaran' => char(255), 
      'nominal_pengeluaran' => char(255), 
      'tanggal_pengeluaran' => char(255), 
      'tanggal_input' => char(255), 
      'jam_input' => char(255), 
      'user_input' => char(255), 
      'ip_input' => char(255), 
      'tanggal_edit' => char(255), 
      'jam_edit' => char(255), 
      'user_edit' => char(255), 
      'ip_edit' => char(255), 
      'keterangan' => char(255), 
  ], 
  'form' => [ 
      'id_data_pengeluaran' => 'text', 
      'tipe_pengeluaran' => 'text', 
      'nominal_pengeluaran' => 'text', 
      'tanggal_pengeluaran' => 'text', 
      'tanggal_input' => 'text', 
      'jam_input' => 'text', 
      'user_input' => 'text', 
      'ip_input' => 'text', 
      'tanggal_edit' => 'text', 
      'jam_edit' => 'text', 
      'user_edit' => 'text', 
      'ip_edit' => 'text', 
      'keterangan' => 'text', 
  ], 
  'name' => [ 
      'id_data_pengeluaran', 
      'tipe_pengeluaran', 
      'nominal_pengeluaran', 
      'tanggal_pengeluaran', 
      'tanggal_input', 
      'jam_input', 
      'user_input', 
      'ip_input', 
      'tanggal_edit', 
      'jam_edit', 
      'user_edit', 
      'ip_edit', 
      'keterangan', 
  ], 
  "title" => [
            "view" => "data_pengeluaran",
            "edit" => "Ubah data_pengeluaran",
            "new" => "Tambahkan data_pengeluaran"
        ],
  'command' => 'php gugus template data_pengeluaran --crud data_pengeluaran' 
]; 
 
$arr[] = [ 
  'table' => 'datamajikan_dokumen', 
  'data' => [ 
      'id' => ai(), 
      'filetglinput' => char(255), 
      'file' => char(255), 
      'majikan_id' => char(255), 
  ], 
  'form' => [ 
      'id' => 'no', 
      'filetglinput' => 'text', 
      'file' => 'text', 
      'majikan_id' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'filetglinput', 
      'file', 
      'majikan_id', 
  ], 
  "title" => [
            "view" => "datamajikan_dokumen",
            "edit" => "Ubah datamajikan_dokumen",
            "new" => "Tambahkan datamajikan_dokumen"
        ],
  'command' => 'php gugus template datamajikan_dokumen --crud datamajikan_dokumen' 
]; 
 
$arr[] = [ 
  'table' => 'datanamapolsek', 
  'data' => [ 
      'id_namapolsek' => ai(), 
      'namapolsek' => char(255), 
      'alamat' => char(255), 
  ], 
  'form' => [ 
      'id_namapolsek' => 'no', 
      'namapolsek' => 'text', 
      'alamat' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'namapolsek', 
      'alamat', 
  ], 
  "title" => [
            "view" => "datanamapolsek",
            "edit" => "Ubah datanamapolsek",
            "new" => "Tambahkan datanamapolsek"
        ],
  'command' => 'php gugus template datanamapolsek --crud datanamapolsek' 
]; 
 
$arr[] = [ 
  'table' => 'dataskill', 
  'data' => [ 
      'id_skill' => ai(), 
      'id_kategori' => char(255), 
      'isi' => char(255), 
      'mandarin' => char(255), 
      'keterangan' => char(255), 
  ], 
  'form' => [ 
      'id_skill' => 'no', 
      'id_kategori' => 'text', 
      'isi' => 'text', 
      'mandarin' => 'text', 
      'keterangan' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'id_kategori', 
      'isi', 
      'mandarin', 
      'keterangan', 
  ], 
  "title" => [
            "view" => "dataskill",
            "edit" => "Ubah dataskill",
            "new" => "Tambahkan dataskill"
        ],
  'command' => 'php gugus template dataskill --crud dataskill' 
]; 
 
$arr[] = [ 
  'table' => 'datanamaasuransi', 
  'data' => [ 
      'id_namaasuransi' => ai(), 
      'isi' => char(255), 
      'mandarin' => char(255), 
  ], 
  'form' => [ 
      'id_namaasuransi' => 'no', 
      'isi' => 'text', 
      'mandarin' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'isi', 
      'mandarin', 
  ], 
  "title" => [
            "view" => "datanamaasuransi",
            "edit" => "Ubah datanamaasuransi",
            "new" => "Tambahkan datanamaasuransi"
        ],
  'command' => 'php gugus template datanamaasuransi --crud datanamaasuransi' 
]; 
 
$arr[] = [ 
  'table' => 'blk_data_pemasukan', 
  'data' => [ 
      'id_data_pemasukan' => char(255), 
      'tipe_pemasukan' => char(255), 
      'nominal_pemasukan' => char(255), 
      'tanggal_pemasukan' => char(255), 
      'pemilik_pemasukan' => char(255), 
      'tanggal_input' => char(255), 
      'jam_input' => char(255), 
      'user_input' => char(255), 
      'ip_input' => char(255), 
      'tanggal_edit' => char(255), 
      'jam_edit' => char(255), 
      'user_edit' => char(255), 
      'ip_edit' => char(255), 
      'keterangan' => char(255), 
  ], 
  'form' => [ 
      'id_data_pemasukan' => 'text', 
      'tipe_pemasukan' => 'text', 
      'nominal_pemasukan' => 'text', 
      'tanggal_pemasukan' => 'text', 
      'pemilik_pemasukan' => 'text', 
      'tanggal_input' => 'text', 
      'jam_input' => 'text', 
      'user_input' => 'text', 
      'ip_input' => 'text', 
      'tanggal_edit' => 'text', 
      'jam_edit' => 'text', 
      'user_edit' => 'text', 
      'ip_edit' => 'text', 
      'keterangan' => 'text', 
  ], 
  'name' => [ 
      'id_data_pemasukan', 
      'tipe_pemasukan', 
      'nominal_pemasukan', 
      'tanggal_pemasukan', 
      'pemilik_pemasukan', 
      'tanggal_input', 
      'jam_input', 
      'user_input', 
      'ip_input', 
      'tanggal_edit', 
      'jam_edit', 
      'user_edit', 
      'ip_edit', 
      'keterangan', 
  ], 
  "title" => [
            "view" => "blk_data_pemasukan",
            "edit" => "Ubah blk_data_pemasukan",
            "new" => "Tambahkan blk_data_pemasukan"
        ],
  'command' => 'php gugus template blk_data_pemasukan --crud blk_data_pemasukan' 
]; 
 
$arr[] = [ 
  'table' => 'dataagen_pass_history', 
  'data' => [ 
      'id_agen_pass' => ai(), 
      'first_pass' => char(255), 
      'second_pass' => char(255), 
      'h_tgl' => char(255), 
      'h_jam' => char(255), 
      'h_ip' => char(255), 
      'h_user' => char(255), 
  ], 
  'form' => [ 
      'id_agen_pass' => 'no', 
      'first_pass' => 'text', 
      'second_pass' => 'text', 
      'h_tgl' => 'text', 
      'h_jam' => 'text', 
      'h_ip' => 'text', 
      'h_user' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'first_pass', 
      'second_pass', 
      'h_tgl', 
      'h_jam', 
      'h_ip', 
      'h_user', 
  ], 
  "title" => [
            "view" => "dataagen_pass_history",
            "edit" => "Ubah dataagen_pass_history",
            "new" => "Tambahkan dataagen_pass_history"
        ],
  'command' => 'php gugus template dataagen_pass_history --crud dataagen_pass_history' 
]; 
 
$arr[] = [ 
  'table' => 'data_pemasukan_pajak_edit_history', 
  'data' => [ 
      'id_edit_pemasukan' => char(255), 
      'tipe_pemasukan' => char(255), 
      'nominal_pemasukan' => char(255), 
      'tanggal_pemasukan' => char(255), 
      'pemilik_pemasukan' => char(255), 
      'tanggal_input' => char(255), 
      'jam_input' => char(255), 
      'user_input' => char(255), 
      'ip_input' => char(255), 
      'tanggal_edit' => char(255), 
      'jam_edit' => char(255), 
      'user_edit' => char(255), 
      'ip_edit' => char(255), 
      'pemasukan_id' => char(255), 
      'keterangan' => char(255), 
  ], 
  'form' => [ 
      'id_edit_pemasukan' => 'text', 
      'tipe_pemasukan' => 'text', 
      'nominal_pemasukan' => 'text', 
      'tanggal_pemasukan' => 'text', 
      'pemilik_pemasukan' => 'text', 
      'tanggal_input' => 'text', 
      'jam_input' => 'text', 
      'user_input' => 'text', 
      'ip_input' => 'text', 
      'tanggal_edit' => 'text', 
      'jam_edit' => 'text', 
      'user_edit' => 'text', 
      'ip_edit' => 'text', 
      'pemasukan_id' => 'text', 
      'keterangan' => 'text', 
  ], 
  'name' => [ 
      'id_edit_pemasukan', 
      'tipe_pemasukan', 
      'nominal_pemasukan', 
      'tanggal_pemasukan', 
      'pemilik_pemasukan', 
      'tanggal_input', 
      'jam_input', 
      'user_input', 
      'ip_input', 
      'tanggal_edit', 
      'jam_edit', 
      'user_edit', 
      'ip_edit', 
      'pemasukan_id', 
      'keterangan', 
  ], 
  "title" => [
            "view" => "data_pemasukan_pajak_edit_history",
            "edit" => "Ubah data_pemasukan_pajak_edit_history",
            "new" => "Tambahkan data_pemasukan_pajak_edit_history"
        ],
  'command' => 'php gugus template data_pemasukan_pajak_edit_history --crud data_pemasukan_pajak_edit_history' 
]; 
 
$arr[] = [ 
  'table' => 'datanamadisnaker', 
  'data' => [ 
      'id_namadisnaker' => ai(), 
      'namadisnaker' => char(255), 
      'alamatdisnaker' => char(255), 
      'wilayah' => char(255), 
  ], 
  'form' => [ 
      'id_namadisnaker' => 'no', 
      'namadisnaker' => 'text', 
      'alamatdisnaker' => 'text', 
      'wilayah' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'namadisnaker', 
      'alamatdisnaker', 
      'wilayah', 
  ], 
  "title" => [
            "view" => "datanamadisnaker",
            "edit" => "Ubah datanamadisnaker",
            "new" => "Tambahkan datanamadisnaker"
        ],
  'command' => 'php gugus template datanamadisnaker --crud datanamadisnaker' 
]; 
 
$arr[] = [ 
  'table' => 'data_pemasukan_edit_history', 
  'data' => [ 
      'id_edit_pemasukan' => char(255), 
      'tipe_pemasukan' => char(255), 
      'nominal_pemasukan' => char(255), 
      'tanggal_pemasukan' => char(255), 
      'pemilik_pemasukan' => char(255), 
      'tanggal_input' => char(255), 
      'jam_input' => char(255), 
      'user_input' => char(255), 
      'ip_input' => char(255), 
      'tanggal_edit' => char(255), 
      'jam_edit' => char(255), 
      'user_edit' => char(255), 
      'ip_edit' => char(255), 
      'pemasukan_id' => char(255), 
      'keterangan' => char(255), 
  ], 
  'form' => [ 
      'id_edit_pemasukan' => 'text', 
      'tipe_pemasukan' => 'text', 
      'nominal_pemasukan' => 'text', 
      'tanggal_pemasukan' => 'text', 
      'pemilik_pemasukan' => 'text', 
      'tanggal_input' => 'text', 
      'jam_input' => 'text', 
      'user_input' => 'text', 
      'ip_input' => 'text', 
      'tanggal_edit' => 'text', 
      'jam_edit' => 'text', 
      'user_edit' => 'text', 
      'ip_edit' => 'text', 
      'pemasukan_id' => 'text', 
      'keterangan' => 'text', 
  ], 
  'name' => [ 
      'id_edit_pemasukan', 
      'tipe_pemasukan', 
      'nominal_pemasukan', 
      'tanggal_pemasukan', 
      'pemilik_pemasukan', 
      'tanggal_input', 
      'jam_input', 
      'user_input', 
      'ip_input', 
      'tanggal_edit', 
      'jam_edit', 
      'user_edit', 
      'ip_edit', 
      'pemasukan_id', 
      'keterangan', 
  ], 
  "title" => [
            "view" => "data_pemasukan_edit_history",
            "edit" => "Ubah data_pemasukan_edit_history",
            "new" => "Tambahkan data_pemasukan_edit_history"
        ],
  'command' => 'php gugus template data_pemasukan_edit_history --crud data_pemasukan_edit_history' 
]; 
 
$arr[] = [ 
  'table' => 'datasetketerangan', 
  'data' => [ 
      'id_setketerangan' => ai(), 
      'isi' => char(255), 
      'mandarin' => char(255), 
  ], 
  'form' => [ 
      'id_setketerangan' => 'no', 
      'isi' => 'text', 
      'mandarin' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'isi', 
      'mandarin', 
  ], 
  "title" => [
            "view" => "datasetketerangan",
            "edit" => "Ubah datasetketerangan",
            "new" => "Tambahkan datasetketerangan"
        ],
  'command' => 'php gugus template datasetketerangan --crud datasetketerangan' 
]; 
 
$arr[] = [ 
  'table' => 'dataagen_jenis_tki', 
  'data' => [ 
      'id' => ai(), 
      'kode' => char(255), 
      'nama' => char(255), 
      'nama2' => char(255), 
  ], 
  'form' => [ 
      'id' => 'no', 
      'kode' => 'text', 
      'nama' => 'text', 
      'nama2' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'kode', 
      'nama', 
      'nama2', 
  ], 
  "title" => [
            "view" => "dataagen_jenis_tki",
            "edit" => "Ubah dataagen_jenis_tki",
            "new" => "Tambahkan dataagen_jenis_tki"
        ],
  'command' => 'php gugus template dataagen_jenis_tki --crud dataagen_jenis_tki' 
]; 
 
$arr[] = [ 
  'table' => 'datamata', 
  'data' => [ 
      'id_mata' => ai(), 
      'isi' => char(255), 
      'mandarin' => char(255), 
  ], 
  'form' => [ 
      'id_mata' => 'no', 
      'isi' => 'text', 
      'mandarin' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'isi', 
      'mandarin', 
  ], 
  "title" => [
            "view" => "datamata",
            "edit" => "Ubah datamata",
            "new" => "Tambahkan datamata"
        ],
  'command' => 'php gugus template datamata --crud datamata' 
]; 
 
$arr[] = [ 
  'table' => 'datacalling', 
  'data' => [ 
      'id_calling' => ai(), 
      'isi' => char(255), 
      'mandarin' => char(255), 
      'kode_calling' => char(255), 
  ], 
  'form' => [ 
      'id_calling' => 'no', 
      'isi' => 'text', 
      'mandarin' => 'text', 
      'kode_calling' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'isi', 
      'mandarin', 
      'kode_calling', 
  ], 
  "title" => [
            "view" => "datacalling",
            "edit" => "Ubah datacalling",
            "new" => "Tambahkan datacalling"
        ],
  'command' => 'php gugus template datacalling --crud datacalling' 
]; 
 
$arr[] = [ 
  'table' => 'datanamadesa', 
  'data' => [ 
      'id_namadesa' => ai(), 
      'namadesa' => char(255), 
      'alamatdesa' => char(255), 
  ], 
  'form' => [ 
      'id_namadesa' => 'no', 
      'namadesa' => 'text', 
      'alamatdesa' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'namadesa', 
      'alamatdesa', 
  ], 
  "title" => [
            "view" => "datanamadesa",
            "edit" => "Ubah datanamadesa",
            "new" => "Tambahkan datanamadesa"
        ],
  'command' => 'php gugus template datanamadesa --crud datanamadesa' 
]; 
 
$arr[] = [ 
  'table' => 'datakondisijompo', 
  'data' => [ 
      'id_kondisijompo' => ai(), 
      'isi' => char(255), 
      'mandarin' => char(255), 
  ], 
  'form' => [ 
      'id_kondisijompo' => 'no', 
      'isi' => 'text', 
      'mandarin' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'isi', 
      'mandarin', 
  ], 
  "title" => [
            "view" => "datakondisijompo",
            "edit" => "Ubah datakondisijompo",
            "new" => "Tambahkan datakondisijompo"
        ],
  'command' => 'php gugus template datakondisijompo --crud datakondisijompo' 
]; 
 
$arr[] = [ 
  'table' => 'datapendidikan', 
  'data' => [ 
      'id_pedidikan' => ai(), 
      'isi' => char(255), 
      'mandarin' => char(255), 
  ], 
  'form' => [ 
      'id_pedidikan' => 'no', 
      'isi' => 'text', 
      'mandarin' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'isi', 
      'mandarin', 
  ], 
  "title" => [
            "view" => "datapendidikan",
            "edit" => "Ubah datapendidikan",
            "new" => "Tambahkan datapendidikan"
        ],
  'command' => 'php gugus template datapendidikan --crud datapendidikan' 
]; 
 
$arr[] = [ 
  'table' => 'datamedical', 
  'data' => [ 
      'id_medical' => ai(), 
      'isi' => char(255), 
      'mandarin' => char(255), 
  ], 
  'form' => [ 
      'id_medical' => 'no', 
      'isi' => 'text', 
      'mandarin' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'isi', 
      'mandarin', 
  ], 
  "title" => [
            "view" => "datamedical",
            "edit" => "Ubah datamedical",
            "new" => "Tambahkan datamedical"
        ],
  'command' => 'php gugus template datamedical --crud datamedical' 
]; 
 
$arr[] = [ 
  'table' => 'dataagen', 
  'data' => [ 
      'id_agen' => ai(), 
      'kode_agen' => char(255), 
      'kode_group' => char(255), 
      'nama' => char(255), 
      'hp' => char(255), 
      'email' => char(255), 
      'alamat' => char(255), 
      'status' => char(255), 
      'username' => char(255), 
      'password' => char(255), 
      'namamandarin' => char(255), 
      'alamatmandarin' => char(255), 
      'notel' => char(255), 
      'nofax' => char(255), 
      'direktur' => char(255), 
      'direktur2' => char(255), 
      'nosiup' => char(255), 
      'berlaku' => char(255), 
      'selesai' => char(255), 
      'jenisagre' => char(255), 
      'jenisagre2' => char(255), 
      'berlaku2' => char(255), 
      'selesai2' => char(255), 
      'jenisagre3' => char(255), 
      'berlaku3' => char(255), 
      'selesai3' => char(255), 
      'noagree' => char(255), 
      'noagree2' => char(255), 
      'noagree3' => char(255), 
      'tgl_terimaagree' => char(255), 
      'tgl_terimaagree2' => char(255), 
      'tgl_terimaagree3' => char(255), 
      'keterangan' => char(255), 
      'komnama' => char(255), 
      'komline' => char(255), 
      'komskype' => char(255), 
      'komhp' => char(255), 
      'jabatan_man' => char(255), 
      'jabatan_indo' => char(255), 
      'statusnonaktif' => char(255), 
  ], 
  'form' => [ 
      'id_agen' => 'no', 
      'kode_agen' => 'text', 
      'kode_group' => 'text', 
      'nama' => 'text', 
      'hp' => 'text', 
      'email' => 'text', 
      'alamat' => 'text', 
      'status' => 'text', 
      'username' => 'text', 
      'password' => 'text', 
      'namamandarin' => 'text', 
      'alamatmandarin' => 'text', 
      'notel' => 'text', 
      'nofax' => 'text', 
      'direktur' => 'text', 
      'direktur2' => 'text', 
      'nosiup' => 'text', 
      'berlaku' => 'text', 
      'selesai' => 'text', 
      'jenisagre' => 'text', 
      'jenisagre2' => 'text', 
      'berlaku2' => 'text', 
      'selesai2' => 'text', 
      'jenisagre3' => 'text', 
      'berlaku3' => 'text', 
      'selesai3' => 'text', 
      'noagree' => 'text', 
      'noagree2' => 'text', 
      'noagree3' => 'text', 
      'tgl_terimaagree' => 'text', 
      'tgl_terimaagree2' => 'text', 
      'tgl_terimaagree3' => 'text', 
      'keterangan' => 'text', 
      'komnama' => 'text', 
      'komline' => 'text', 
      'komskype' => 'text', 
      'komhp' => 'text', 
      'jabatan_man' => 'text', 
      'jabatan_indo' => 'text', 
      'statusnonaktif' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'kode_agen', 
      'kode_group', 
      'nama', 
      'hp', 
      'email', 
      'alamat', 
      'status', 
      'username', 
      'password', 
      'namamandarin', 
      'alamatmandarin', 
      'notel', 
      'nofax', 
      'direktur', 
      'direktur2', 
      'nosiup', 
      'berlaku', 
      'selesai', 
      'jenisagre', 
      'jenisagre2', 
      'berlaku2', 
      'selesai2', 
      'jenisagre3', 
      'berlaku3', 
      'selesai3', 
      'noagree', 
      'noagree2', 
      'noagree3', 
      'tgl_terimaagree', 
      'tgl_terimaagree2', 
      'tgl_terimaagree3', 
      'keterangan', 
      'komnama', 
      'komline', 
      'komskype', 
      'komhp', 
      'jabatan_man', 
      'jabatan_indo', 
      'statusnonaktif', 
  ], 
  "title" => [
            "view" => "dataagen",
            "edit" => "Ubah dataagen",
            "new" => "Tambahkan dataagen"
        ],
  'command' => 'php gugus template dataagen --crud dataagen' 
]; 
 
$arr[] = [ 
  'table' => 'dataagama', 
  'data' => [ 
      'id_agama' => ai(), 
      'isi' => char(255), 
      'mandarin' => char(255), 
  ], 
  'form' => [ 
      'id_agama' => 'no', 
      'isi' => 'text', 
      'mandarin' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'isi', 
      'mandarin', 
  ], 
  "title" => [
            "view" => "dataagama",
            "edit" => "Ubah dataagama",
            "new" => "Tambahkan dataagama"
        ],
  'command' => 'php gugus template dataagama --crud dataagama' 
]; 
 
$arr[] = [ 
  'table' => 'datanamapap', 
  'data' => [ 
      'id_namapap' => ai(), 
      'isi' => char(255), 
      'mandarin' => char(255), 
  ], 
  'form' => [ 
      'id_namapap' => 'no', 
      'isi' => 'text', 
      'mandarin' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'isi', 
      'mandarin', 
  ], 
  "title" => [
            "view" => "datanamapap",
            "edit" => "Ubah datanamapap",
            "new" => "Tambahkan datanamapap"
        ],
  'command' => 'php gugus template datanamapap --crud datanamapap' 
]; 
 
$arr[] = [ 
  'table' => 'dataterbang', 
  'data' => [ 
      'id_terbang' => ai(), 
      'namamaskapai' => char(255), 
      'jamtiba' => char(255), 
      'detailberangkat1' => char(255), 
      'detailtiba1' => char(255), 
      'detailberangkat2' => char(255), 
      'detailtiba2' => char(255), 
  ], 
  'form' => [ 
      'id_terbang' => 'no', 
      'namamaskapai' => 'text', 
      'jamtiba' => 'text', 
      'detailberangkat1' => 'text', 
      'detailtiba1' => 'text', 
      'detailberangkat2' => 'text', 
      'detailtiba2' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'namamaskapai', 
      'jamtiba', 
      'detailberangkat1', 
      'detailtiba1', 
      'detailberangkat2', 
      'detailtiba2', 
  ], 
  "title" => [
            "view" => "dataterbang",
            "edit" => "Ubah dataterbang",
            "new" => "Tambahkan dataterbang"
        ],
  'command' => 'php gugus template dataterbang --crud dataterbang' 
]; 
 
$arr[] = [ 
  'table' => 'dataairport', 
  'data' => [ 
      'id_airport' => ai(), 
      'isi' => char(255), 
  ], 
  'form' => [ 
      'id_airport' => 'no', 
      'isi' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'isi', 
  ], 
  "title" => [
            "view" => "dataairport",
            "edit" => "Ubah dataairport",
            "new" => "Tambahkan dataairport"
        ],
  'command' => 'php gugus template dataairport --crud dataairport' 
]; 
 
$arr[] = [ 
  'table' => 'datapemilik', 
  'data' => [ 
      'id_pemilik' => ai(), 
      'nama_pemilik' => char(255), 
      'negara' => char(255), 
  ], 
  'form' => [ 
      'id_pemilik' => 'no', 
      'nama_pemilik' => 'text', 
      'negara' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'nama_pemilik', 
      'negara', 
  ], 
  "title" => [
            "view" => "datapemilik",
            "edit" => "Ubah datapemilik",
            "new" => "Tambahkan datapemilik"
        ],
  'command' => 'php gugus template datapemilik --crud datapemilik' 
]; 
 
$arr[] = [ 
  'table' => 'blk_data_pemasukan_delete_history', 
  'data' => [ 
      'id_delete_pemasukan' => char(255), 
      'tipe_pemasukan' => char(255), 
      'nominal_pemasukan' => char(255), 
      'tanggal_pemasukan' => char(255), 
      'pemilik_pemasukan' => char(255), 
      'tanggal_input' => char(255), 
      'jam_input' => char(255), 
      'user_input' => char(255), 
      'ip_input' => char(255), 
      'tanggal_edit' => char(255), 
      'jam_edit' => char(255), 
      'user_edit' => char(255), 
      'ip_edit' => char(255), 
      'tanggal_delete' => char(255), 
      'jam_delete' => char(255), 
      'user_delete' => char(255), 
      'ip_delete' => char(255), 
      'pemasukan_id' => char(255), 
      'keterangan' => char(255), 
  ], 
  'form' => [ 
      'id_delete_pemasukan' => 'text', 
      'tipe_pemasukan' => 'text', 
      'nominal_pemasukan' => 'text', 
      'tanggal_pemasukan' => 'text', 
      'pemilik_pemasukan' => 'text', 
      'tanggal_input' => 'text', 
      'jam_input' => 'text', 
      'user_input' => 'text', 
      'ip_input' => 'text', 
      'tanggal_edit' => 'text', 
      'jam_edit' => 'text', 
      'user_edit' => 'text', 
      'ip_edit' => 'text', 
      'tanggal_delete' => 'text', 
      'jam_delete' => 'text', 
      'user_delete' => 'text', 
      'ip_delete' => 'text', 
      'pemasukan_id' => 'text', 
      'keterangan' => 'text', 
  ], 
  'name' => [ 
      'id_delete_pemasukan', 
      'tipe_pemasukan', 
      'nominal_pemasukan', 
      'tanggal_pemasukan', 
      'pemilik_pemasukan', 
      'tanggal_input', 
      'jam_input', 
      'user_input', 
      'ip_input', 
      'tanggal_edit', 
      'jam_edit', 
      'user_edit', 
      'ip_edit', 
      'tanggal_delete', 
      'jam_delete', 
      'user_delete', 
      'ip_delete', 
      'pemasukan_id', 
      'keterangan', 
  ], 
  "title" => [
            "view" => "blk_data_pemasukan_delete_history",
            "edit" => "Ubah blk_data_pemasukan_delete_history",
            "new" => "Tambahkan blk_data_pemasukan_delete_history"
        ],
  'command' => 'php gugus template blk_data_pemasukan_delete_history --crud blk_data_pemasukan_delete_history' 
]; 
 
$arr[] = [ 
  'table' => 'dataagen_penerima_dana', 
  'data' => [ 
      'id' => ai(), 
      'agen_id' => char(255), 
      'penerima_nama_id' => char(255), 
      'date_created' => char(255), 
      'softDelete' => char(255), 
  ], 
  'form' => [ 
      'id' => 'no', 
      'agen_id' => 'text', 
      'penerima_nama_id' => 'text', 
      'date_created' => 'text', 
      'softDelete' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'agen_id', 
      'penerima_nama_id', 
      'date_created', 
      'softDelete', 
  ], 
  "title" => [
            "view" => "dataagen_penerima_dana",
            "edit" => "Ubah dataagen_penerima_dana",
            "new" => "Tambahkan dataagen_penerima_dana"
        ],
  'command' => 'php gugus template dataagen_penerima_dana --crud dataagen_penerima_dana' 
]; 
 
$arr[] = [ 
  'table' => 'data_operasi', 
  'data' => [ 
      'id_operasi' => ai(), 
      'id_biodata' => char(255), 
      'tahun' => char(255), 
      'keterangan' => char(255), 
      'dihapus' => char(255), 
  ], 
  'form' => [ 
      'id_operasi' => 'no', 
      'id_biodata' => 'text', 
      'tahun' => 'text', 
      'keterangan' => 'text', 
      'dihapus' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'id_biodata', 
      'tahun', 
      'keterangan', 
      'dihapus', 
  ], 
  "title" => [
            "view" => "data_operasi",
            "edit" => "Ubah data_operasi",
            "new" => "Tambahkan data_operasi"
        ],
  'command' => 'php gugus template data_operasi --crud data_operasi' 
]; 
 
$arr[] = [ 
  'table' => 'datanegara', 
  'data' => [ 
      'id_negara' => ai(), 
      'isi' => char(255), 
      'mandarin' => char(255), 
      'kode_negara' => char(255), 
  ], 
  'form' => [ 
      'id_negara' => 'no', 
      'isi' => 'text', 
      'mandarin' => 'text', 
      'kode_negara' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'isi', 
      'mandarin', 
      'kode_negara', 
  ], 
  "title" => [
            "view" => "datanegara",
            "edit" => "Ubah datanegara",
            "new" => "Tambahkan datanegara"
        ],
  'command' => 'php gugus template datanegara --crud datanegara' 
]; 
 
$arr[] = [ 
  'table' => 'blk_data_pengeluaran_delete_history', 
  'data' => [ 
      'id_data_pengeluaran' => char(255), 
      'tipe_pengeluaran' => char(255), 
      'nominal_pengeluaran' => char(255), 
      'tanggal_pengeluaran' => char(255), 
      'tanggal_input' => char(255), 
      'jam_input' => char(255), 
      'user_input' => char(255), 
      'ip_input' => char(255), 
      'tanggal_edit' => char(255), 
      'jam_edit' => char(255), 
      'user_edit' => char(255), 
      'ip_edit' => char(255), 
      'tanggal_delete' => char(255), 
      'jam_delete' => char(255), 
      'user_delete' => char(255), 
      'ip_delete' => char(255), 
      'pengeluaran_id' => char(255), 
      'keterangan' => char(255), 
  ], 
  'form' => [ 
      'id_data_pengeluaran' => 'text', 
      'tipe_pengeluaran' => 'text', 
      'nominal_pengeluaran' => 'text', 
      'tanggal_pengeluaran' => 'text', 
      'tanggal_input' => 'text', 
      'jam_input' => 'text', 
      'user_input' => 'text', 
      'ip_input' => 'text', 
      'tanggal_edit' => 'text', 
      'jam_edit' => 'text', 
      'user_edit' => 'text', 
      'ip_edit' => 'text', 
      'tanggal_delete' => 'text', 
      'jam_delete' => 'text', 
      'user_delete' => 'text', 
      'ip_delete' => 'text', 
      'pengeluaran_id' => 'text', 
      'keterangan' => 'text', 
  ], 
  'name' => [ 
      'id_data_pengeluaran', 
      'tipe_pengeluaran', 
      'nominal_pengeluaran', 
      'tanggal_pengeluaran', 
      'tanggal_input', 
      'jam_input', 
      'user_input', 
      'ip_input', 
      'tanggal_edit', 
      'jam_edit', 
      'user_edit', 
      'ip_edit', 
      'tanggal_delete', 
      'jam_delete', 
      'user_delete', 
      'ip_delete', 
      'pengeluaran_id', 
      'keterangan', 
  ], 
  "title" => [
            "view" => "blk_data_pengeluaran_delete_history",
            "edit" => "Ubah blk_data_pengeluaran_delete_history",
            "new" => "Tambahkan blk_data_pengeluaran_delete_history"
        ],
  'command' => 'php gugus template blk_data_pengeluaran_delete_history --crud blk_data_pengeluaran_delete_history' 
]; 
 
$arr[] = [ 
  'table' => 'datadokdibawa', 
  'data' => [ 
      'id_dokdibawa' => ai(), 
      'isi' => char(255), 
      'mandarin' => char(255), 
  ], 
  'form' => [ 
      'id_dokdibawa' => 'no', 
      'isi' => 'text', 
      'mandarin' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'isi', 
      'mandarin', 
  ], 
  "title" => [
            "view" => "datadokdibawa",
            "edit" => "Ubah datadokdibawa",
            "new" => "Tambahkan datadokdibawa"
        ],
  'command' => 'php gugus template datadokdibawa --crud datadokdibawa' 
]; 
 
$arr[] = [ 
  'table' => 'surat_pengajuan_data', 
  'data' => [ 
      'id_surat_pengajuan_data' => ai(), 
      'id_biodata' => char(255), 
      'jumlah_pinjaman' => char(255), 
      'loan' => char(255), 
      'aju_id' => char(255), 
  ], 
  'form' => [ 
      'id_surat_pengajuan_data' => 'no', 
      'id_biodata' => 'text', 
      'jumlah_pinjaman' => 'text', 
      'loan' => 'text', 
      'aju_id' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'id_biodata', 
      'jumlah_pinjaman', 
      'loan', 
      'aju_id', 
  ], 
  "title" => [
            "view" => "surat_pengajuan_data",
            "edit" => "Ubah surat_pengajuan_data",
            "new" => "Tambahkan surat_pengajuan_data"
        ],
  'command' => 'php gugus template surat_pengajuan_data --crud surat_pengajuan_data' 
]; 
 
$arr[] = [ 
  'table' => 'dataskillnya', 
  'data' => [ 
      'id_skillnya' => ai(), 
      'isi' => char(255), 
      'mandarin' => char(255), 
      'kode_skillnya' => char(255), 
  ], 
  'form' => [ 
      'id_skillnya' => 'no', 
      'isi' => 'text', 
      'mandarin' => 'text', 
      'kode_skillnya' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'isi', 
      'mandarin', 
      'kode_skillnya', 
  ], 
  "title" => [
            "view" => "dataskillnya",
            "edit" => "Ubah dataskillnya",
            "new" => "Tambahkan dataskillnya"
        ],
  'command' => 'php gugus template dataskillnya --crud dataskillnya' 
]; 
 
$arr[] = [ 
  'table' => 'datanamapilstat', 
  'data' => [ 
      'id_namapilstat' => ai(), 
      'namapilstat' => char(255), 
  ], 
  'form' => [ 
      'id_namapilstat' => 'no', 
      'namapilstat' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'namapilstat', 
  ], 
  "title" => [
            "view" => "datanamapilstat",
            "edit" => "Ubah datanamapilstat",
            "new" => "Tambahkan datanamapilstat"
        ],
  'command' => 'php gugus template datanamapilstat --crud datanamapilstat' 
]; 
 
$arr[] = [ 
  'table' => 'datadokisi', 
  'data' => [ 
      'id_datadokisi' => ai(), 
      'id_datadok' => char(255), 
      'keterangan' => char(255), 
  ], 
  'form' => [ 
      'id_datadokisi' => 'no', 
      'id_datadok' => 'text', 
      'keterangan' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'id_datadok', 
      'keterangan', 
  ], 
  "title" => [
            "view" => "datadokisi",
            "edit" => "Ubah datadokisi",
            "new" => "Tambahkan datadokisi"
        ],
  'command' => 'php gugus template datadokisi --crud datadokisi' 
]; 
 
$arr[] = [ 
  'table' => 'blk_jadwal3_datapembelajaran_detail', 
  'data' => [ 
      'id' => ai(), 
      'id_biodata' => char(255), 
      'datapembelajaran_id' => char(255), 
      'detail' => char(255), 
      'deleted_at' => char(255), 
  ], 
  'form' => [ 
      'id' => 'no', 
      'id_biodata' => 'text', 
      'datapembelajaran_id' => 'text', 
      'detail' => 'text', 
      'deleted_at' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'id_biodata', 
      'datapembelajaran_id', 
      'detail', 
      'deleted_at', 
  ], 
  "title" => [
            "view" => "blk_jadwal3_datapembelajaran_detail",
            "edit" => "Ubah blk_jadwal3_datapembelajaran_detail",
            "new" => "Tambahkan blk_jadwal3_datapembelajaran_detail"
        ],
  'command' => 'php gugus template blk_jadwal3_datapembelajaran_detail --crud blk_jadwal3_datapembelajaran_detail' 
]; 
 
$arr[] = [ 
  'table' => 'datasektor_nt', 
  'data' => [ 
      'id_sektor' => ai(), 
      'kode_sektor' => char(255), 
      'sektor' => char(255), 
      'no_urut' => char(255), 
      'ket' => char(255), 
  ], 
  'form' => [ 
      'id_sektor' => 'no', 
      'kode_sektor' => 'text', 
      'sektor' => 'text', 
      'no_urut' => 'text', 
      'ket' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'kode_sektor', 
      'sektor', 
      'no_urut', 
      'ket', 
  ], 
  "title" => [
            "view" => "datasektor_nt",
            "edit" => "Ubah datasektor_nt",
            "new" => "Tambahkan datasektor_nt"
        ],
  'command' => 'php gugus template datasektor_nt --crud datasektor_nt' 
]; 
 
$arr[] = [ 
  'table' => 'datafinger', 
  'data' => [ 
      'id_finger' => ai(), 
      'idblk' => char(255), 
      'data' => char(255), 
      'jari' => char(255), 
      'timenya' => char(255), 
  ], 
  'form' => [ 
      'id_finger' => 'no', 
      'idblk' => 'text', 
      'data' => 'text', 
      'jari' => 'text', 
      'timenya' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'idblk', 
      'data', 
      'jari', 
      'timenya', 
  ], 
  "title" => [
            "view" => "datafinger",
            "edit" => "Ubah datafinger",
            "new" => "Tambahkan datafinger"
        ],
  'command' => 'php gugus template datafinger --crud datafinger' 
]; 
 
$arr[] = [ 
  'table' => 'datasuhan', 
  'data' => [ 
      'id_suhan' => ai(), 
      'id_group' => char(255), 
      'id_agen' => char(255), 
      'id_majikan' => char(255), 
      'no_suhan' => char(255), 
      'tglterbit' => char(255), 
      'tglexp' => char(255), 
      'tglterima' => char(255), 
      'tglsimpan' => char(255), 
      'tglbawa' => char(255), 
      'tglminta' => char(255), 
      'quotasuhan' => char(255), 
      'filesuhan' => char(255), 
  ], 
  'form' => [ 
      'id_suhan' => 'no', 
      'id_group' => 'text', 
      'id_agen' => 'text', 
      'id_majikan' => 'text', 
      'no_suhan' => 'text', 
      'tglterbit' => 'text', 
      'tglexp' => 'text', 
      'tglterima' => 'text', 
      'tglsimpan' => 'text', 
      'tglbawa' => 'text', 
      'tglminta' => 'text', 
      'quotasuhan' => 'text', 
      'filesuhan' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'id_group', 
      'id_agen', 
      'id_majikan', 
      'no_suhan', 
      'tglterbit', 
      'tglexp', 
      'tglterima', 
      'tglsimpan', 
      'tglbawa', 
      'tglminta', 
      'quotasuhan', 
      'filesuhan', 
  ], 
  "title" => [
            "view" => "datasuhan",
            "edit" => "Ubah datasuhan",
            "new" => "Tambahkan datasuhan"
        ],
  'command' => 'php gugus template datasuhan --crud datasuhan' 
]; 
 
$arr[] = [ 
  'table' => 'data_pemasukan_delete_history', 
  'data' => [ 
      'id_delete_pemasukan' => char(255), 
      'tipe_pemasukan' => char(255), 
      'nominal_pemasukan' => char(255), 
      'tanggal_pemasukan' => char(255), 
      'pemilik_pemasukan' => char(255), 
      'tanggal_input' => char(255), 
      'jam_input' => char(255), 
      'user_input' => char(255), 
      'ip_input' => char(255), 
      'tanggal_edit' => char(255), 
      'jam_edit' => char(255), 
      'user_edit' => char(255), 
      'ip_edit' => char(255), 
      'tanggal_delete' => char(255), 
      'jam_delete' => char(255), 
      'user_delete' => char(255), 
      'ip_delete' => char(255), 
      'pemasukan_id' => char(255), 
      'keterangan' => char(255), 
  ], 
  'form' => [ 
      'id_delete_pemasukan' => 'text', 
      'tipe_pemasukan' => 'text', 
      'nominal_pemasukan' => 'text', 
      'tanggal_pemasukan' => 'text', 
      'pemilik_pemasukan' => 'text', 
      'tanggal_input' => 'text', 
      'jam_input' => 'text', 
      'user_input' => 'text', 
      'ip_input' => 'text', 
      'tanggal_edit' => 'text', 
      'jam_edit' => 'text', 
      'user_edit' => 'text', 
      'ip_edit' => 'text', 
      'tanggal_delete' => 'text', 
      'jam_delete' => 'text', 
      'user_delete' => 'text', 
      'ip_delete' => 'text', 
      'pemasukan_id' => 'text', 
      'keterangan' => 'text', 
  ], 
  'name' => [ 
      'id_delete_pemasukan', 
      'tipe_pemasukan', 
      'nominal_pemasukan', 
      'tanggal_pemasukan', 
      'pemilik_pemasukan', 
      'tanggal_input', 
      'jam_input', 
      'user_input', 
      'ip_input', 
      'tanggal_edit', 
      'jam_edit', 
      'user_edit', 
      'ip_edit', 
      'tanggal_delete', 
      'jam_delete', 
      'user_delete', 
      'ip_delete', 
      'pemasukan_id', 
      'keterangan', 
  ], 
  "title" => [
            "view" => "data_pemasukan_delete_history",
            "edit" => "Ubah data_pemasukan_delete_history",
            "new" => "Tambahkan data_pemasukan_delete_history"
        ],
  'command' => 'php gugus template data_pemasukan_delete_history --crud data_pemasukan_delete_history' 
]; 
 
$arr[] = [ 
  'table' => 'data_pemasukan_pajak_delete_history', 
  'data' => [ 
      'id_delete_pemasukan' => char(255), 
      'tipe_pemasukan' => char(255), 
      'nominal_pemasukan' => char(255), 
      'tanggal_pemasukan' => char(255), 
      'pemilik_pemasukan' => char(255), 
      'tanggal_input' => char(255), 
      'jam_input' => char(255), 
      'user_input' => char(255), 
      'ip_input' => char(255), 
      'tanggal_edit' => char(255), 
      'jam_edit' => char(255), 
      'user_edit' => char(255), 
      'ip_edit' => char(255), 
      'tanggal_delete' => char(255), 
      'jam_delete' => char(255), 
      'user_delete' => char(255), 
      'ip_delete' => char(255), 
      'pemasukan_id' => char(255), 
      'keterangan' => char(255), 
  ], 
  'form' => [ 
      'id_delete_pemasukan' => 'text', 
      'tipe_pemasukan' => 'text', 
      'nominal_pemasukan' => 'text', 
      'tanggal_pemasukan' => 'text', 
      'pemilik_pemasukan' => 'text', 
      'tanggal_input' => 'text', 
      'jam_input' => 'text', 
      'user_input' => 'text', 
      'ip_input' => 'text', 
      'tanggal_edit' => 'text', 
      'jam_edit' => 'text', 
      'user_edit' => 'text', 
      'ip_edit' => 'text', 
      'tanggal_delete' => 'text', 
      'jam_delete' => 'text', 
      'user_delete' => 'text', 
      'ip_delete' => 'text', 
      'pemasukan_id' => 'text', 
      'keterangan' => 'text', 
  ], 
  'name' => [ 
      'id_delete_pemasukan', 
      'tipe_pemasukan', 
      'nominal_pemasukan', 
      'tanggal_pemasukan', 
      'pemilik_pemasukan', 
      'tanggal_input', 
      'jam_input', 
      'user_input', 
      'ip_input', 
      'tanggal_edit', 
      'jam_edit', 
      'user_edit', 
      'ip_edit', 
      'tanggal_delete', 
      'jam_delete', 
      'user_delete', 
      'ip_delete', 
      'pemasukan_id', 
      'keterangan', 
  ], 
  "title" => [
            "view" => "data_pemasukan_pajak_delete_history",
            "edit" => "Ubah data_pemasukan_pajak_delete_history",
            "new" => "Tambahkan data_pemasukan_pajak_delete_history"
        ],
  'command' => 'php gugus template data_pemasukan_pajak_delete_history --crud data_pemasukan_pajak_delete_history' 
]; 
 
$arr[] = [ 
  'table' => 'data_aktiva', 
  'data' => [ 
      'id_aktiva' => char(255), 
      'nama' => char(255), 
      'nominal' => char(255), 
      'tanggal' => char(255), 
  ], 
  'form' => [ 
      'id_aktiva' => 'text', 
      'nama' => 'text', 
      'nominal' => 'text', 
      'tanggal' => 'text', 
  ], 
  'name' => [ 
      'id_aktiva', 
      'nama', 
      'nominal', 
      'tanggal', 
  ], 
  "title" => [
            "view" => "data_aktiva",
            "edit" => "Ubah data_aktiva",
            "new" => "Tambahkan data_aktiva"
        ],
  'command' => 'php gugus template data_aktiva --crud data_aktiva' 
]; 
 
$arr[] = [ 
  'table' => 'datasponsor', 
  'data' => [ 
      'id_sponsor' => ai(), 
      'kode_sponsor' => char(255), 
      'nama' => char(255), 
      'hp' => char(255), 
      'email' => char(255), 
      'alamat' => char(255), 
      'status' => char(255), 
  ], 
  'form' => [ 
      'id_sponsor' => 'no', 
      'kode_sponsor' => 'text', 
      'nama' => 'text', 
      'hp' => 'text', 
      'email' => 'text', 
      'alamat' => 'text', 
      'status' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'kode_sponsor', 
      'nama', 
      'hp', 
      'email', 
      'alamat', 
      'status', 
  ], 
  "title" => [
            "view" => "datasponsor",
            "edit" => "Ubah datasponsor",
            "new" => "Tambahkan datasponsor"
        ],
  'command' => 'php gugus template datasponsor --crud datasponsor' 
]; 
 
$arr[] = [ 
  'table' => 'datalokasikerja', 
  'data' => [ 
      'id_lokasikerja' => ai(), 
      'isi' => char(255), 
      'mandarin' => char(255), 
  ], 
  'form' => [ 
      'id_lokasikerja' => 'no', 
      'isi' => 'text', 
      'mandarin' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'isi', 
      'mandarin', 
  ], 
  "title" => [
            "view" => "datalokasikerja",
            "edit" => "Ubah datalokasikerja",
            "new" => "Tambahkan datalokasikerja"
        ],
  'command' => 'php gugus template datalokasikerja --crud datalokasikerja' 
]; 
 
$arr[] = [ 
  'table' => 'databank', 
  'data' => [ 
      'id_bank' => ai(), 
      'isi' => char(255), 
      'mandarin' => char(255), 
  ], 
  'form' => [ 
      'id_bank' => 'no', 
      'isi' => 'text', 
      'mandarin' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'isi', 
      'mandarin', 
  ], 
  "title" => [
            "view" => "databank",
            "edit" => "Ubah databank",
            "new" => "Tambahkan databank"
        ],
  'command' => 'php gugus template databank --crud databank' 
]; 
 
$arr[] = [ 
  'table' => 'blk_jadwal_data', 
  'data' => [ 
      'id_jadwal_data' => ai(), 
      'paket_id' => char(255), 
      'tanggal' => char(255), 
      'instruktur_kode' => char(255), 
  ], 
  'form' => [ 
      'id_jadwal_data' => 'no', 
      'paket_id' => 'text', 
      'tanggal' => 'text', 
      'instruktur_kode' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'paket_id', 
      'tanggal', 
      'instruktur_kode', 
  ], 
  "title" => [
            "view" => "blk_jadwal_data",
            "edit" => "Ubah blk_jadwal_data",
            "new" => "Tambahkan blk_jadwal_data"
        ],
  'command' => 'php gugus template blk_jadwal_data --crud blk_jadwal_data' 
]; 
 
$arr[] = [ 
  'table' => 'datahobi', 
  'data' => [ 
      'id_hobi' => ai(), 
      'isi' => char(255), 
      'mandarin' => char(255), 
  ], 
  'form' => [ 
      'id_hobi' => 'no', 
      'isi' => 'text', 
      'mandarin' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'isi', 
      'mandarin', 
  ], 
  "title" => [
            "view" => "datahobi",
            "edit" => "Ubah datahobi",
            "new" => "Tambahkan datahobi"
        ],
  'command' => 'php gugus template datahobi --crud datahobi' 
]; 
 
$arr[] = [ 
  'table' => 'datanamaskck', 
  'data' => [ 
      'id_namaskck' => ai(), 
      'namaskck' => char(255), 
      'alamat' => char(255), 
  ], 
  'form' => [ 
      'id_namaskck' => 'no', 
      'namaskck' => 'text', 
      'alamat' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'namaskck', 
      'alamat', 
  ], 
  "title" => [
            "view" => "datanamaskck",
            "edit" => "Ubah datanamaskck",
            "new" => "Tambahkan datanamaskck"
        ],
  'command' => 'php gugus template datanamaskck --crud datanamaskck' 
]; 
 
$arr[] = [ 
  'table' => 'datanamagaji', 
  'data' => [ 
      'id_namagaji' => ai(), 
      'namagaji' => char(255), 
  ], 
  'form' => [ 
      'id_namagaji' => 'no', 
      'namagaji' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'namagaji', 
  ], 
  "title" => [
            "view" => "datanamagaji",
            "edit" => "Ubah datanamagaji",
            "new" => "Tambahkan datanamagaji"
        ],
  'command' => 'php gugus template datanamagaji --crud datanamagaji' 
]; 
 
$arr[] = [ 
  'table' => 'dataposisi', 
  'data' => [ 
      'id_posisi' => ai(), 
      'isi' => char(255), 
      'mandarin' => char(255), 
      'keterangan' => char(255), 
  ], 
  'form' => [ 
      'id_posisi' => 'no', 
      'isi' => 'text', 
      'mandarin' => 'text', 
      'keterangan' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'isi', 
      'mandarin', 
      'keterangan', 
  ], 
  "title" => [
            "view" => "dataposisi",
            "edit" => "Ubah dataposisi",
            "new" => "Tambahkan dataposisi"
        ],
  'command' => 'php gugus template dataposisi --crud dataposisi' 
]; 
 
$arr[] = [ 
  'table' => 'datavisapermit', 
  'data' => [ 
      'id_visapermit' => ai(), 
      'id_group' => char(255), 
      'id_agen' => char(255), 
      'id_majikan' => char(255), 
      'id_suhan' => char(255), 
      'no_visapermit' => char(255), 
      'tglterbitvs' => char(255), 
      'tglexpvs' => char(255), 
      'tglterimavs' => char(255), 
      'tglsimpanvs' => char(255), 
      'tglbawavs' => char(255), 
      'tglmintavs' => char(255), 
      'quotavs' => char(255), 
      'filevisapermit' => char(255), 
      'tglexpext' => char(255), 
  ], 
  'form' => [ 
      'id_visapermit' => 'no', 
      'id_group' => 'text', 
      'id_agen' => 'text', 
      'id_majikan' => 'text', 
      'id_suhan' => 'text', 
      'no_visapermit' => 'text', 
      'tglterbitvs' => 'text', 
      'tglexpvs' => 'text', 
      'tglterimavs' => 'text', 
      'tglsimpanvs' => 'text', 
      'tglbawavs' => 'text', 
      'tglmintavs' => 'text', 
      'quotavs' => 'text', 
      'filevisapermit' => 'text', 
      'tglexpext' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'id_group', 
      'id_agen', 
      'id_majikan', 
      'id_suhan', 
      'no_visapermit', 
      'tglterbitvs', 
      'tglexpvs', 
      'tglterimavs', 
      'tglsimpanvs', 
      'tglbawavs', 
      'tglmintavs', 
      'quotavs', 
      'filevisapermit', 
      'tglexpext', 
  ], 
  "title" => [
            "view" => "datavisapermit",
            "edit" => "Ubah datavisapermit",
            "new" => "Tambahkan datavisapermit"
        ],
  'command' => 'php gugus template datavisapermit --crud datavisapermit' 
]; 
 
$arr[] = [ 
  'table' => 'datadok', 
  'data' => [ 
      'id_datadok' => ai(), 
      'id_agen' => char(255), 
      'id_majikan' => char(255), 
  ], 
  'form' => [ 
      'id_datadok' => 'no', 
      'id_agen' => 'text', 
      'id_majikan' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'id_agen', 
      'id_majikan', 
  ], 
  "title" => [
            "view" => "datadok",
            "edit" => "Ubah datadok",
            "new" => "Tambahkan datadok"
        ],
  'command' => 'php gugus template datadok --crud datadok' 
]; 
 
$arr[] = [ 
  'table' => 'dataagen_fee_tki_terbang_copy', 
  'data' => [ 
      'id' => ai(), 
      'tgl1' => char(255), 
      'tgl2' => char(255), 
      'catatan' => char(255), 
      'tgl_transfer' => char(255), 
      'pilihan' => char(255), 
      'group' => char(255), 
      'agen' => char(255), 
      'jenis_tki' => char(255), 
      'data' => char(255), 
      'agen_list' => char(255), 
      'date_created' => char(255), 
      'deleted_at' => char(255), 
  ], 
  'form' => [ 
      'id' => 'no', 
      'tgl1' => 'text', 
      'tgl2' => 'text', 
      'catatan' => 'text', 
      'tgl_transfer' => 'text', 
      'pilihan' => 'text', 
      'group' => 'text', 
      'agen' => 'text', 
      'jenis_tki' => 'text', 
      'data' => 'text', 
      'agen_list' => 'text', 
      'date_created' => 'text', 
      'deleted_at' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'tgl1', 
      'tgl2', 
      'catatan', 
      'tgl_transfer', 
      'pilihan', 
      'group', 
      'agen', 
      'jenis_tki', 
      'data', 
      'agen_list', 
      'date_created', 
      'deleted_at', 
  ], 
  "title" => [
            "view" => "dataagen_fee_tki_terbang_copy",
            "edit" => "Ubah dataagen_fee_tki_terbang_copy",
            "new" => "Tambahkan dataagen_fee_tki_terbang_copy"
        ],
  'command' => 'php gugus template dataagen_fee_tki_terbang_copy --crud dataagen_fee_tki_terbang_copy' 
]; 
 
$arr[] = [ 
  'table' => 'datanamapolres', 
  'data' => [ 
      'id_namapolres' => ai(), 
      'namapolres' => char(255), 
      'alamat' => char(255), 
  ], 
  'form' => [ 
      'id_namapolres' => 'no', 
      'namapolres' => 'text', 
      'alamat' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'namapolres', 
      'alamat', 
  ], 
  "title" => [
            "view" => "datanamapolres",
            "edit" => "Ubah datanamapolres",
            "new" => "Tambahkan datanamapolres"
        ],
  'command' => 'php gugus template datanamapolres --crud datanamapolres' 
]; 
 
$arr[] = [ 
  'table' => 'dataregdisnaker', 
  'data' => [ 
      'id' => ai(), 
      'nama' => char(255), 
      'ket' => char(255), 
  ], 
  'form' => [ 
      'id' => 'no', 
      'nama' => 'text', 
      'ket' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'nama', 
      'ket', 
  ], 
  "title" => [
            "view" => "dataregdisnaker",
            "edit" => "Ubah dataregdisnaker",
            "new" => "Tambahkan dataregdisnaker"
        ],
  'command' => 'php gugus template dataregdisnaker --crud dataregdisnaker' 
]; 
 
$arr[] = [ 
  'table' => 'blk_data_pengeluaran_copy', 
  'data' => [ 
      'id_data_pengeluaran' => char(255), 
      'tipe_pengeluaran' => char(255), 
      'nominal_pengeluaran' => char(255), 
      'tanggal_pengeluaran' => char(255), 
      'tanggal_input' => char(255), 
      'jam_input' => char(255), 
      'user_input' => char(255), 
      'ip_input' => char(255), 
      'tanggal_edit' => char(255), 
      'jam_edit' => char(255), 
      'user_edit' => char(255), 
      'ip_edit' => char(255), 
      'keterangan' => char(255), 
  ], 
  'form' => [ 
      'id_data_pengeluaran' => 'text', 
      'tipe_pengeluaran' => 'text', 
      'nominal_pengeluaran' => 'text', 
      'tanggal_pengeluaran' => 'text', 
      'tanggal_input' => 'text', 
      'jam_input' => 'text', 
      'user_input' => 'text', 
      'ip_input' => 'text', 
      'tanggal_edit' => 'text', 
      'jam_edit' => 'text', 
      'user_edit' => 'text', 
      'ip_edit' => 'text', 
      'keterangan' => 'text', 
  ], 
  'name' => [ 
      'id_data_pengeluaran', 
      'tipe_pengeluaran', 
      'nominal_pengeluaran', 
      'tanggal_pengeluaran', 
      'tanggal_input', 
      'jam_input', 
      'user_input', 
      'ip_input', 
      'tanggal_edit', 
      'jam_edit', 
      'user_edit', 
      'ip_edit', 
      'keterangan', 
  ], 
  "title" => [
            "view" => "blk_data_pengeluaran_copy",
            "edit" => "Ubah blk_data_pengeluaran_copy",
            "new" => "Tambahkan blk_data_pengeluaran_copy"
        ],
  'command' => 'php gugus template blk_data_pengeluaran_copy --crud blk_data_pengeluaran_copy' 
]; 
 
$arr[] = [ 
  'table' => 'data_pengeluaran_edit_history', 
  'data' => [ 
      'id_data_pengeluaran' => char(255), 
      'tipe_pengeluaran' => char(255), 
      'nominal_pengeluaran' => char(255), 
      'tanggal_pengeluaran' => char(255), 
      'tanggal_input' => char(255), 
      'jam_input' => char(255), 
      'user_input' => char(255), 
      'ip_input' => char(255), 
      'tanggal_edit' => char(255), 
      'jam_edit' => char(255), 
      'user_edit' => char(255), 
      'ip_edit' => char(255), 
      'pengeluaran_id' => char(255), 
      'keterangan' => char(255), 
  ], 
  'form' => [ 
      'id_data_pengeluaran' => 'text', 
      'tipe_pengeluaran' => 'text', 
      'nominal_pengeluaran' => 'text', 
      'tanggal_pengeluaran' => 'text', 
      'tanggal_input' => 'text', 
      'jam_input' => 'text', 
      'user_input' => 'text', 
      'ip_input' => 'text', 
      'tanggal_edit' => 'text', 
      'jam_edit' => 'text', 
      'user_edit' => 'text', 
      'ip_edit' => 'text', 
      'pengeluaran_id' => 'text', 
      'keterangan' => 'text', 
  ], 
  'name' => [ 
      'id_data_pengeluaran', 
      'tipe_pengeluaran', 
      'nominal_pengeluaran', 
      'tanggal_pengeluaran', 
      'tanggal_input', 
      'jam_input', 
      'user_input', 
      'ip_input', 
      'tanggal_edit', 
      'jam_edit', 
      'user_edit', 
      'ip_edit', 
      'pengeluaran_id', 
      'keterangan', 
  ], 
  "title" => [
            "view" => "data_pengeluaran_edit_history",
            "edit" => "Ubah data_pengeluaran_edit_history",
            "new" => "Tambahkan data_pengeluaran_edit_history"
        ],
  'command' => 'php gugus template data_pengeluaran_edit_history --crud data_pengeluaran_edit_history' 
]; 
 
$arr[] = [ 
  'table' => 'datajagaanak', 
  'data' => [ 
      'id_jagaanak' => ai(), 
      'isi' => char(255), 
      'mandarin' => char(255), 
  ], 
  'form' => [ 
      'id_jagaanak' => 'no', 
      'isi' => 'text', 
      'mandarin' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'isi', 
      'mandarin', 
  ], 
  "title" => [
            "view" => "datajagaanak",
            "edit" => "Ubah datajagaanak",
            "new" => "Tambahkan datajagaanak"
        ],
  'command' => 'php gugus template datajagaanak --crud datajagaanak' 
]; 
 
$arr[] = [ 
  'table' => 'data_pemasukan', 
  'data' => [ 
      'id_data_pemasukan' => char(255), 
      'tipe_pemasukan' => char(255), 
      'nominal_pemasukan' => char(255), 
      'tanggal_pemasukan' => char(255), 
      'pemilik_pemasukan' => char(255), 
      'tanggal_input' => char(255), 
      'jam_input' => char(255), 
      'user_input' => char(255), 
      'ip_input' => char(255), 
      'tanggal_edit' => char(255), 
      'jam_edit' => char(255), 
      'user_edit' => char(255), 
      'ip_edit' => char(255), 
      'keterangan' => char(255), 
  ], 
  'form' => [ 
      'id_data_pemasukan' => 'text', 
      'tipe_pemasukan' => 'text', 
      'nominal_pemasukan' => 'text', 
      'tanggal_pemasukan' => 'text', 
      'pemilik_pemasukan' => 'text', 
      'tanggal_input' => 'text', 
      'jam_input' => 'text', 
      'user_input' => 'text', 
      'ip_input' => 'text', 
      'tanggal_edit' => 'text', 
      'jam_edit' => 'text', 
      'user_edit' => 'text', 
      'ip_edit' => 'text', 
      'keterangan' => 'text', 
  ], 
  'name' => [ 
      'id_data_pemasukan', 
      'tipe_pemasukan', 
      'nominal_pemasukan', 
      'tanggal_pemasukan', 
      'pemilik_pemasukan', 
      'tanggal_input', 
      'jam_input', 
      'user_input', 
      'ip_input', 
      'tanggal_edit', 
      'jam_edit', 
      'user_edit', 
      'ip_edit', 
      'keterangan', 
  ], 
  "title" => [
            "view" => "data_pemasukan",
            "edit" => "Ubah data_pemasukan",
            "new" => "Tambahkan data_pemasukan"
        ],
  'command' => 'php gugus template data_pemasukan --crud data_pemasukan' 
]; 
 
$arr[] = [ 
  'table' => 'blk_jadwal_data_tki', 
  'data' => [ 
      'id_jadwal_data_tki' => ai(), 
      'biodata_id' => char(255), 
      'angkatan' => char(255), 
      'hari' => char(255), 
      'tdk_hadir' => char(255), 
      'alasan' => char(255), 
      'jam' => char(255), 
      'tipe_data' => char(255), 
      'nonaktif_flag' => char(255), 
      'jadwal_paketjadwal_id' => char(255), 
      'jadwal_data_id' => char(255), 
  ], 
  'form' => [ 
      'id_jadwal_data_tki' => 'no', 
      'biodata_id' => 'text', 
      'angkatan' => 'text', 
      'hari' => 'text', 
      'tdk_hadir' => 'text', 
      'alasan' => 'text', 
      'jam' => 'text', 
      'tipe_data' => 'text', 
      'nonaktif_flag' => 'text', 
      'jadwal_paketjadwal_id' => 'text', 
      'jadwal_data_id' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'biodata_id', 
      'angkatan', 
      'hari', 
      'tdk_hadir', 
      'alasan', 
      'jam', 
      'tipe_data', 
      'nonaktif_flag', 
      'jadwal_paketjadwal_id', 
      'jadwal_data_id', 
  ], 
  "title" => [
            "view" => "blk_jadwal_data_tki",
            "edit" => "Ubah blk_jadwal_data_tki",
            "new" => "Tambahkan blk_jadwal_data_tki"
        ],
  'command' => 'php gugus template blk_jadwal_data_tki --crud blk_jadwal_data_tki' 
]; 
 
$arr[] = [ 
  'table' => 'datasetmajikan', 
  'data' => [ 
      'id_setmajikan' => ai(), 
      'isi' => char(255), 
      'mandarin' => char(255), 
  ], 
  'form' => [ 
      'id_setmajikan' => 'no', 
      'isi' => 'text', 
      'mandarin' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'isi', 
      'mandarin', 
  ], 
  "title" => [
            "view" => "datasetmajikan",
            "edit" => "Ubah datasetmajikan",
            "new" => "Tambahkan datasetmajikan"
        ],
  'command' => 'php gugus template datasetmajikan --crud datasetmajikan' 
]; 
 
$arr[] = [ 
  'table' => 'dataasuransi', 
  'data' => [ 
      'id_asuransi' => ai(), 
      'isi' => char(255), 
  ], 
  'form' => [ 
      'id_asuransi' => 'no', 
      'isi' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'isi', 
  ], 
  "title" => [
            "view" => "dataasuransi",
            "edit" => "Ubah dataasuransi",
            "new" => "Tambahkan dataasuransi"
        ],
  'command' => 'php gugus template dataasuransi --crud dataasuransi' 
]; 
 
$arr[] = [ 
  'table' => 'dataagen_fee_tki_terbang', 
  'data' => [ 
      'id' => ai(), 
      'tgl1' => char(255), 
      'tgl2' => char(255), 
      'catatan' => char(255), 
      'tgl_transfer' => char(255), 
      'pilihan' => char(255), 
      'group' => char(255), 
      'agen' => char(255), 
      'jenis_tki' => char(255), 
      'data' => char(255), 
      'agen_list' => char(255), 
      'date_created' => char(255), 
      'deleted_at' => char(255), 
  ], 
  'form' => [ 
      'id' => 'no', 
      'tgl1' => 'text', 
      'tgl2' => 'text', 
      'catatan' => 'text', 
      'tgl_transfer' => 'text', 
      'pilihan' => 'text', 
      'group' => 'text', 
      'agen' => 'text', 
      'jenis_tki' => 'text', 
      'data' => 'text', 
      'agen_list' => 'text', 
      'date_created' => 'text', 
      'deleted_at' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'tgl1', 
      'tgl2', 
      'catatan', 
      'tgl_transfer', 
      'pilihan', 
      'group', 
      'agen', 
      'jenis_tki', 
      'data', 
      'agen_list', 
      'date_created', 
      'deleted_at', 
  ], 
  "title" => [
            "view" => "dataagen_fee_tki_terbang",
            "edit" => "Ubah dataagen_fee_tki_terbang",
            "new" => "Tambahkan dataagen_fee_tki_terbang"
        ],
  'command' => 'php gugus template dataagen_fee_tki_terbang --crud dataagen_fee_tki_terbang' 
]; 
 
$arr[] = [ 
  'table' => 'datakreditbank', 
  'data' => [ 
      'id_kreditbank' => ai(), 
      'kode_sektor' => char(255), 
      'namakredit' => char(255), 
      'isikredit' => char(255), 
      'nilaikredit' => char(255), 
      'mandarinnya' => char(255), 
      'statuskredit' => char(255), 
      'mandarinnya2' => char(255), 
      'statuskredit2' => char(255), 
  ], 
  'form' => [ 
      'id_kreditbank' => 'no', 
      'kode_sektor' => 'text', 
      'namakredit' => 'text', 
      'isikredit' => 'text', 
      'nilaikredit' => 'text', 
      'mandarinnya' => 'text', 
      'statuskredit' => 'text', 
      'mandarinnya2' => 'text', 
      'statuskredit2' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'kode_sektor', 
      'namakredit', 
      'isikredit', 
      'nilaikredit', 
      'mandarinnya', 
      'statuskredit', 
      'mandarinnya2', 
      'statuskredit2', 
  ], 
  "title" => [
            "view" => "datakreditbank",
            "edit" => "Ubah datakreditbank",
            "new" => "Tambahkan datakreditbank"
        ],
  'command' => 'php gugus template datakreditbank --crud datakreditbank' 
]; 
 
$arr[] = [ 
  'table' => 'datapekerjaan', 
  'data' => [ 
      'id_pekerjaan' => ai(), 
      'id_kategori' => char(255), 
      'isi' => char(255), 
      'mandarin' => char(255), 
      'keterangan' => char(255), 
  ], 
  'form' => [ 
      'id_pekerjaan' => 'no', 
      'id_kategori' => 'text', 
      'isi' => 'text', 
      'mandarin' => 'text', 
      'keterangan' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'id_kategori', 
      'isi', 
      'mandarin', 
      'keterangan', 
  ], 
  "title" => [
            "view" => "datapekerjaan",
            "edit" => "Ubah datapekerjaan",
            "new" => "Tambahkan datapekerjaan"
        ],
  'command' => 'php gugus template datapekerjaan --crud datapekerjaan' 
]; 
 
$arr[] = [ 
  'table' => 'dataimigrasi', 
  'data' => [ 
      'id_imigrasi' => ai(), 
      'isi' => char(255), 
  ], 
  'form' => [ 
      'id_imigrasi' => 'no', 
      'isi' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'isi', 
  ], 
  "title" => [
            "view" => "dataimigrasi",
            "edit" => "Ubah dataimigrasi",
            "new" => "Tambahkan dataimigrasi"
        ],
  'command' => 'php gugus template dataimigrasi --crud dataimigrasi' 
]; 
 
$arr[] = [ 
  'table' => 'datahubungan', 
  'data' => [ 
      'id_hubungan' => ai(), 
      'isi' => char(255), 
      'mandarin' => char(255), 
  ], 
  'form' => [ 
      'id_hubungan' => 'no', 
      'isi' => 'text', 
      'mandarin' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'isi', 
      'mandarin', 
  ], 
  "title" => [
            "view" => "datahubungan",
            "edit" => "Ubah datahubungan",
            "new" => "Tambahkan datahubungan"
        ],
  'command' => 'php gugus template datahubungan --crud datahubungan' 
]; 
 
$arr[] = [ 
  'table' => 'datasektor', 
  'data' => [ 
      'id_jenis' => ai(), 
      'kode_jenis' => char(255), 
      'isi' => char(255), 
      'isi_taiwan' => char(255), 
      'no_urut' => char(255), 
      'jeniskelamin' => char(255), 
  ], 
  'form' => [ 
      'id_jenis' => 'no', 
      'kode_jenis' => 'text', 
      'isi' => 'text', 
      'isi_taiwan' => 'text', 
      'no_urut' => 'text', 
      'jeniskelamin' => 'text', 
  ], 
  'name' => [ 
      'no', 
      'kode_jenis', 
      'isi', 
      'isi_taiwan', 
      'no_urut', 
      'jeniskelamin', 
  ], 
  "title" => [
            "view" => "datasektor",
            "edit" => "Ubah datasektor",
            "new" => "Tambahkan datasektor"
        ],
  'command' => 'php gugus template datasektor --crud datasektor' 
]; 
 

    return $arr;
}
