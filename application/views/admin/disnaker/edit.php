<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah disnaker</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('toko') }}">Home</a></li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?= site_url('admin/disnaker/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_disnaker",
                "value" => $form_data->id_disnaker,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "id_biodata",
                        "type" => "text",
                        "fc" => "id_biodata",
                        "placeholder" => "tambahkan id_biodata",
                        "value" => $form_data->id_biodata,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nodisnaker",
                        "type" => "text",
                        "fc" => "nodisnaker",
                        "placeholder" => "tambahkan nodisnaker",
                        "value" => $form_data->nodisnaker,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglonline",
                        "type" => "text",
                        "fc" => "tglonline",
                        "placeholder" => "tambahkan tglonline",
                        "value" => $form_data->tglonline,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "data_registrasi",
                        "type" => "text",
                        "fc" => "data_registrasi",
                        "placeholder" => "tambahkan data_registrasi",
                        "value" => $form_data->data_registrasi,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama",
                        "type" => "text",
                        "fc" => "nama",
                        "placeholder" => "tambahkan nama",
                        "value" => $form_data->nama,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tempatlahir",
                        "type" => "text",
                        "fc" => "tempatlahir",
                        "placeholder" => "tambahkan tempatlahir",
                        "value" => $form_data->tempatlahir,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tanggallahir",
                        "type" => "text",
                        "fc" => "tanggallahir",
                        "placeholder" => "tambahkan tanggallahir",
                        "value" => $form_data->tanggallahir,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "noktp",
                        "type" => "text",
                        "fc" => "noktp",
                        "placeholder" => "tambahkan noktp",
                        "value" => $form_data->noktp,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jeniskelamin",
                        "type" => "text",
                        "fc" => "jeniskelamin",
                        "placeholder" => "tambahkan jeniskelamin",
                        "value" => $form_data->jeniskelamin,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "agama",
                        "type" => "text",
                        "fc" => "agama",
                        "placeholder" => "tambahkan agama",
                        "value" => $form_data->agama,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "status",
                        "type" => "text",
                        "fc" => "status",
                        "placeholder" => "tambahkan status",
                        "value" => $form_data->status,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "pendidikan",
                        "type" => "text",
                        "fc" => "pendidikan",
                        "placeholder" => "tambahkan pendidikan",
                        "value" => $form_data->pendidikan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "alamat",
                        "type" => "text",
                        "fc" => "alamat",
                        "placeholder" => "tambahkan alamat",
                        "value" => $form_data->alamat,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "propinsi",
                        "type" => "text",
                        "fc" => "propinsi",
                        "placeholder" => "tambahkan propinsi",
                        "value" => $form_data->propinsi,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "namaayah",
                        "type" => "text",
                        "fc" => "namaayah",
                        "placeholder" => "tambahkan namaayah",
                        "value" => $form_data->namaayah,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "namaibu",
                        "type" => "text",
                        "fc" => "namaibu",
                        "placeholder" => "tambahkan namaibu",
                        "value" => $form_data->namaibu,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "namaahli",
                        "type" => "text",
                        "fc" => "namaahli",
                        "placeholder" => "tambahkan namaahli",
                        "value" => $form_data->namaahli,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "namakontak",
                        "type" => "text",
                        "fc" => "namakontak",
                        "placeholder" => "tambahkan namakontak",
                        "value" => $form_data->namakontak,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "alamatkontak",
                        "type" => "text",
                        "fc" => "alamatkontak",
                        "placeholder" => "tambahkan alamatkontak",
                        "value" => $form_data->alamatkontak,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "telpkontak",
                        "type" => "text",
                        "fc" => "telpkontak",
                        "placeholder" => "tambahkan telpkontak",
                        "value" => $form_data->telpkontak,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "hubkontak",
                        "type" => "text",
                        "fc" => "hubkontak",
                        "placeholder" => "tambahkan hubkontak",
                        "value" => $form_data->hubkontak,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "namapasangan",
                        "type" => "text",
                        "fc" => "namapasangan",
                        "placeholder" => "tambahkan namapasangan",
                        "value" => $form_data->namapasangan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "alamatpasangan",
                        "type" => "text",
                        "fc" => "alamatpasangan",
                        "placeholder" => "tambahkan alamatpasangan",
                        "value" => $form_data->alamatpasangan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "perkiraan",
                        "type" => "text",
                        "fc" => "perkiraan",
                        "placeholder" => "tambahkan perkiraan",
                        "value" => $form_data->perkiraan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "negara",
                        "type" => "text",
                        "fc" => "negara",
                        "placeholder" => "tambahkan negara",
                        "value" => $form_data->negara,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jabatan",
                        "type" => "text",
                        "fc" => "jabatan",
                        "placeholder" => "tambahkan jabatan",
                        "value" => $form_data->jabatan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ahliwaris",
                        "type" => "text",
                        "fc" => "ahliwaris",
                        "placeholder" => "tambahkan ahliwaris",
                        "value" => $form_data->ahliwaris,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jmlanak",
                        "type" => "text",
                        "fc" => "jmlanak",
                        "placeholder" => "tambahkan jmlanak",
                        "value" => $form_data->jmlanak,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "agency",
                        "type" => "text",
                        "fc" => "agency",
                        "placeholder" => "tambahkan agency",
                        "value" => $form_data->agency,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "matauang",
                        "type" => "text",
                        "fc" => "matauang",
                        "placeholder" => "tambahkan matauang",
                        "value" => $form_data->matauang,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "sektorusaha",
                        "type" => "text",
                        "fc" => "sektorusaha",
                        "placeholder" => "tambahkan sektorusaha",
                        "value" => $form_data->sektorusaha,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "gaji",
                        "type" => "text",
                        "fc" => "gaji",
                        "placeholder" => "tambahkan gaji",
                        "value" => $form_data->gaji,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nopaspor",
                        "type" => "text",
                        "fc" => "nopaspor",
                        "placeholder" => "tambahkan nopaspor",
                        "value" => $form_data->nopaspor,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "masaberlaku",
                        "type" => "text",
                        "fc" => "masaberlaku",
                        "placeholder" => "tambahkan masaberlaku",
                        "value" => $form_data->masaberlaku,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "masahabis",
                        "type" => "text",
                        "fc" => "masahabis",
                        "placeholder" => "tambahkan masahabis",
                        "value" => $form_data->masahabis,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglberangkat",
                        "type" => "text",
                        "fc" => "tglberangkat",
                        "placeholder" => "tambahkan tglberangkat",
                        "value" => $form_data->tglberangkat,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgltiba",
                        "type" => "text",
                        "fc" => "tgltiba",
                        "placeholder" => "tambahkan tgltiba",
                        "value" => $form_data->tgltiba,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ktp",
                        "type" => "text",
                        "fc" => "ktp",
                        "placeholder" => "tambahkan ktp",
                        "value" => $form_data->ktp,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_ktp",
                        "type" => "text",
                        "fc" => "terakhir_ktp",
                        "placeholder" => "tambahkan terakhir_ktp",
                        "value" => $form_data->terakhir_ktp,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kuasa",
                        "type" => "text",
                        "fc" => "kuasa",
                        "placeholder" => "tambahkan kuasa",
                        "value" => $form_data->kuasa,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_kuasa",
                        "type" => "text",
                        "fc" => "terakhir_kuasa",
                        "placeholder" => "tambahkan terakhir_kuasa",
                        "value" => $form_data->terakhir_kuasa,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nyata",
                        "type" => "text",
                        "fc" => "nyata",
                        "placeholder" => "tambahkan nyata",
                        "value" => $form_data->nyata,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_nyata",
                        "type" => "text",
                        "fc" => "terakhir_nyata",
                        "placeholder" => "tambahkan terakhir_nyata",
                        "value" => $form_data->terakhir_nyata,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "legal",
                        "type" => "text",
                        "fc" => "legal",
                        "placeholder" => "tambahkan legal",
                        "value" => $form_data->legal,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_legal",
                        "type" => "text",
                        "fc" => "terakhir_legal",
                        "placeholder" => "tambahkan terakhir_legal",
                        "value" => $form_data->terakhir_legal,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "keluarga",
                        "type" => "text",
                        "fc" => "keluarga",
                        "placeholder" => "tambahkan keluarga",
                        "value" => $form_data->keluarga,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_keluarga",
                        "type" => "text",
                        "fc" => "terakhir_keluarga",
                        "placeholder" => "tambahkan terakhir_keluarga",
                        "value" => $form_data->terakhir_keluarga,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglbuat",
                        "type" => "text",
                        "fc" => "tglbuat",
                        "placeholder" => "tambahkan tglbuat",
                        "value" => $form_data->tglbuat,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglterima",
                        "type" => "text",
                        "fc" => "tglterima",
                        "placeholder" => "tambahkan tglterima",
                        "value" => $form_data->tglterima,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "alamatortu",
                        "type" => "text",
                        "fc" => "alamatortu",
                        "placeholder" => "tambahkan alamatortu",
                        "value" => $form_data->alamatortu,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglnoktp",
                        "type" => "text",
                        "fc" => "tglnoktp",
                        "placeholder" => "tambahkan tglnoktp",
                        "value" => $form_data->tglnoktp,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tempatnoktp",
                        "type" => "text",
                        "fc" => "tempatnoktp",
                        "placeholder" => "tambahkan tempatnoktp",
                        "value" => $form_data->tempatnoktp,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "propinsi_tipe",
                        "type" => "text",
                        "fc" => "propinsi_tipe",
                        "placeholder" => "tambahkan propinsi_tipe",
                        "value" => $form_data->propinsi_tipe,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "namadisnaker_id",
                        "type" => "text",
                        "fc" => "namadisnaker_id",
                        "placeholder" => "tambahkan namadisnaker_id",
                        "value" => $form_data->namadisnaker_id,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "d_nosuratnikah",
                        "type" => "text",
                        "fc" => "d_nosuratnikah",
                        "placeholder" => "tambahkan d_nosuratnikah",
                        "value" => $form_data->d_nosuratnikah,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "d_nippencatat",
                        "type" => "text",
                        "fc" => "d_nippencatat",
                        "placeholder" => "tambahkan d_nippencatat",
                        "value" => $form_data->d_nippencatat,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "d_niksuamioristri",
                        "type" => "text",
                        "fc" => "d_niksuamioristri",
                        "placeholder" => "tambahkan d_niksuamioristri",
                        "value" => $form_data->d_niksuamioristri,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "d_noregistrasi",
                        "type" => "text",
                        "fc" => "d_noregistrasi",
                        "placeholder" => "tambahkan d_noregistrasi",
                        "value" => $form_data->d_noregistrasi,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "d_tglsurat",
                        "type" => "text",
                        "fc" => "d_tglsurat",
                        "placeholder" => "tambahkan d_tglsurat",
                        "value" => $form_data->d_tglsurat,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "d_namakepaladesa",
                        "type" => "text",
                        "fc" => "d_namakepaladesa",
                        "placeholder" => "tambahkan d_namakepaladesa",
                        "value" => $form_data->d_namakepaladesa,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "d_nonikwali",
                        "type" => "text",
                        "fc" => "d_nonikwali",
                        "placeholder" => "tambahkan d_nonikwali",
                        "value" => $form_data->d_nonikwali,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "d_nokk",
                        "type" => "text",
                        "fc" => "d_nokk",
                        "placeholder" => "tambahkan d_nokk",
                        "value" => $form_data->d_nokk,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "d_nikkepala",
                        "type" => "text",
                        "fc" => "d_nikkepala",
                        "placeholder" => "tambahkan d_nikkepala",
                        "value" => $form_data->d_nikkepala,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "d_nipdidukcapil",
                        "type" => "text",
                        "fc" => "d_nipdidukcapil",
                        "placeholder" => "tambahkan d_nipdidukcapil",
                        "value" => $form_data->d_nipdidukcapil,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "d_tglterbitkk",
                        "type" => "text",
                        "fc" => "d_tglterbitkk",
                        "placeholder" => "tambahkan d_tglterbitkk",
                        "value" => $form_data->d_tglterbitkk,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "email",
                        "type" => "text",
                        "fc" => "email",
                        "placeholder" => "tambahkan email",
                        "value" => $form_data->email,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/disnaker'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

