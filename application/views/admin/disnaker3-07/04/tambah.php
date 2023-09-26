<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan disnaker3-07/04</h1>
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
                    <form action="<?= site_url('admin/disnaker3-07/04/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "id_biodata",
                        "type" => "text",
                        "fc" => "id_biodata",
                        "placeholder" => "tambahkan id_biodata",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nodisnaker",
                        "type" => "text",
                        "fc" => "nodisnaker",
                        "placeholder" => "tambahkan nodisnaker",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama",
                        "type" => "text",
                        "fc" => "nama",
                        "placeholder" => "tambahkan nama",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tempatlahir",
                        "type" => "text",
                        "fc" => "tempatlahir",
                        "placeholder" => "tambahkan tempatlahir",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tanggallahir",
                        "type" => "text",
                        "fc" => "tanggallahir",
                        "placeholder" => "tambahkan tanggallahir",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "noktp",
                        "type" => "text",
                        "fc" => "noktp",
                        "placeholder" => "tambahkan noktp",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jeniskelamin",
                        "type" => "text",
                        "fc" => "jeniskelamin",
                        "placeholder" => "tambahkan jeniskelamin",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "agama",
                        "type" => "text",
                        "fc" => "agama",
                        "placeholder" => "tambahkan agama",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "status",
                        "type" => "text",
                        "fc" => "status",
                        "placeholder" => "tambahkan status",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "pendidikan",
                        "type" => "text",
                        "fc" => "pendidikan",
                        "placeholder" => "tambahkan pendidikan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "alamat",
                        "type" => "text",
                        "fc" => "alamat",
                        "placeholder" => "tambahkan alamat",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "namaayah",
                        "type" => "text",
                        "fc" => "namaayah",
                        "placeholder" => "tambahkan namaayah",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "namaibu",
                        "type" => "text",
                        "fc" => "namaibu",
                        "placeholder" => "tambahkan namaibu",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "namaahli",
                        "type" => "text",
                        "fc" => "namaahli",
                        "placeholder" => "tambahkan namaahli",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "namakontak",
                        "type" => "text",
                        "fc" => "namakontak",
                        "placeholder" => "tambahkan namakontak",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "alamatkontak",
                        "type" => "text",
                        "fc" => "alamatkontak",
                        "placeholder" => "tambahkan alamatkontak",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "telpkontak",
                        "type" => "text",
                        "fc" => "telpkontak",
                        "placeholder" => "tambahkan telpkontak",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "hubkontak",
                        "type" => "text",
                        "fc" => "hubkontak",
                        "placeholder" => "tambahkan hubkontak",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "namapasangan",
                        "type" => "text",
                        "fc" => "namapasangan",
                        "placeholder" => "tambahkan namapasangan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "alamatpasangan",
                        "type" => "text",
                        "fc" => "alamatpasangan",
                        "placeholder" => "tambahkan alamatpasangan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglonline",
                        "type" => "text",
                        "fc" => "tglonline",
                        "placeholder" => "tambahkan tglonline",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "perkiraan",
                        "type" => "text",
                        "fc" => "perkiraan",
                        "placeholder" => "tambahkan perkiraan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "negara",
                        "type" => "text",
                        "fc" => "negara",
                        "placeholder" => "tambahkan negara",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jabatan",
                        "type" => "text",
                        "fc" => "jabatan",
                        "placeholder" => "tambahkan jabatan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ahliwaris",
                        "type" => "text",
                        "fc" => "ahliwaris",
                        "placeholder" => "tambahkan ahliwaris",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jmlanak",
                        "type" => "text",
                        "fc" => "jmlanak",
                        "placeholder" => "tambahkan jmlanak",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "agency",
                        "type" => "text",
                        "fc" => "agency",
                        "placeholder" => "tambahkan agency",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "matauang",
                        "type" => "text",
                        "fc" => "matauang",
                        "placeholder" => "tambahkan matauang",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "sektorusaha",
                        "type" => "text",
                        "fc" => "sektorusaha",
                        "placeholder" => "tambahkan sektorusaha",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "gaji",
                        "type" => "text",
                        "fc" => "gaji",
                        "placeholder" => "tambahkan gaji",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nopaspor",
                        "type" => "text",
                        "fc" => "nopaspor",
                        "placeholder" => "tambahkan nopaspor",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "masaberlaku",
                        "type" => "text",
                        "fc" => "masaberlaku",
                        "placeholder" => "tambahkan masaberlaku",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "masahabis",
                        "type" => "text",
                        "fc" => "masahabis",
                        "placeholder" => "tambahkan masahabis",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglberangkat",
                        "type" => "text",
                        "fc" => "tglberangkat",
                        "placeholder" => "tambahkan tglberangkat",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgltiba",
                        "type" => "text",
                        "fc" => "tgltiba",
                        "placeholder" => "tambahkan tgltiba",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ktp",
                        "type" => "text",
                        "fc" => "ktp",
                        "placeholder" => "tambahkan ktp",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_ktp",
                        "type" => "text",
                        "fc" => "terakhir_ktp",
                        "placeholder" => "tambahkan terakhir_ktp",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kuasa",
                        "type" => "text",
                        "fc" => "kuasa",
                        "placeholder" => "tambahkan kuasa",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_kuasa",
                        "type" => "text",
                        "fc" => "terakhir_kuasa",
                        "placeholder" => "tambahkan terakhir_kuasa",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nyata",
                        "type" => "text",
                        "fc" => "nyata",
                        "placeholder" => "tambahkan nyata",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_nyata",
                        "type" => "text",
                        "fc" => "terakhir_nyata",
                        "placeholder" => "tambahkan terakhir_nyata",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "legal",
                        "type" => "text",
                        "fc" => "legal",
                        "placeholder" => "tambahkan legal",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_legal",
                        "type" => "text",
                        "fc" => "terakhir_legal",
                        "placeholder" => "tambahkan terakhir_legal",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "keluarga",
                        "type" => "text",
                        "fc" => "keluarga",
                        "placeholder" => "tambahkan keluarga",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_keluarga",
                        "type" => "text",
                        "fc" => "terakhir_keluarga",
                        "placeholder" => "tambahkan terakhir_keluarga",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglbuat",
                        "type" => "text",
                        "fc" => "tglbuat",
                        "placeholder" => "tambahkan tglbuat",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglterima",
                        "type" => "text",
                        "fc" => "tglterima",
                        "placeholder" => "tambahkan tglterima",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "alamatortu",
                        "type" => "text",
                        "fc" => "alamatortu",
                        "placeholder" => "tambahkan alamatortu",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/disnaker3-07/04'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>