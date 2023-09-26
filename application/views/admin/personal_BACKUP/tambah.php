<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan personal_BACKUP</h1>
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
                    <form action="<?= site_url('admin/personal_BACKUP/simpan') ?>" method="post" enctype="multipart/form-data">
                        
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
                        "title" => "negara1",
                        "type" => "text",
                        "fc" => "negara1",
                        "placeholder" => "tambahkan negara1",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "negara2",
                        "type" => "text",
                        "fc" => "negara2",
                        "placeholder" => "tambahkan negara2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "calling",
                        "type" => "text",
                        "fc" => "calling",
                        "placeholder" => "tambahkan calling",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "skill1",
                        "type" => "text",
                        "fc" => "skill1",
                        "placeholder" => "tambahkan skill1",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "skill2",
                        "type" => "text",
                        "fc" => "skill2",
                        "placeholder" => "tambahkan skill2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "skill3",
                        "type" => "text",
                        "fc" => "skill3",
                        "placeholder" => "tambahkan skill3",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kode_proses",
                        "type" => "text",
                        "fc" => "kode_proses",
                        "placeholder" => "tambahkan kode_proses",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kode_sponsor",
                        "type" => "text",
                        "fc" => "kode_sponsor",
                        "placeholder" => "tambahkan kode_sponsor",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kode_agen",
                        "type" => "text",
                        "fc" => "kode_agen",
                        "placeholder" => "tambahkan kode_agen",
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
                        "title" => "nama_mandarin",
                        "type" => "text",
                        "fc" => "nama_mandarin",
                        "placeholder" => "tambahkan nama_mandarin",
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
                        "title" => "notelp",
                        "type" => "text",
                        "fc" => "notelp",
                        "placeholder" => "tambahkan notelp",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "notelpkel",
                        "type" => "text",
                        "fc" => "notelpkel",
                        "placeholder" => "tambahkan notelpkel",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tanggaldaftar",
                        "type" => "text",
                        "fc" => "tanggaldaftar",
                        "placeholder" => "tambahkan tanggaldaftar",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tinggi",
                        "type" => "text",
                        "fc" => "tinggi",
                        "placeholder" => "tambahkan tinggi",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "berat",
                        "type" => "text",
                        "fc" => "berat",
                        "placeholder" => "tambahkan berat",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "hp",
                        "type" => "text",
                        "fc" => "hp",
                        "placeholder" => "tambahkan hp",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "hpkel",
                        "type" => "text",
                        "fc" => "hpkel",
                        "placeholder" => "tambahkan hpkel",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "warganegara",
                        "type" => "text",
                        "fc" => "warganegara",
                        "placeholder" => "tambahkan warganegara",
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
                        "title" => "tgllahir",
                        "type" => "text",
                        "fc" => "tgllahir",
                        "placeholder" => "tambahkan tgllahir",
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
                        "title" => "tglmenikah",
                        "type" => "text",
                        "fc" => "tglmenikah",
                        "placeholder" => "tambahkan tglmenikah",
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
                        "title" => "alamatlengkap",
                        "type" => "text",
                        "fc" => "alamatlengkap",
                        "placeholder" => "tambahkan alamatlengkap",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "provinsi",
                        "type" => "text",
                        "fc" => "provinsi",
                        "placeholder" => "tambahkan provinsi",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "mandarin",
                        "type" => "text",
                        "fc" => "mandarin",
                        "placeholder" => "tambahkan mandarin",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "taiyu",
                        "type" => "text",
                        "fc" => "taiyu",
                        "placeholder" => "tambahkan taiyu",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "inggris",
                        "type" => "text",
                        "fc" => "inggris",
                        "placeholder" => "tambahkan inggris",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "cantonese",
                        "type" => "text",
                        "fc" => "cantonese",
                        "placeholder" => "tambahkan cantonese",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "hakka",
                        "type" => "text",
                        "fc" => "hakka",
                        "placeholder" => "tambahkan hakka",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "foto",
                        "type" => "text",
                        "fc" => "foto",
                        "placeholder" => "tambahkan foto",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statusaktif",
                        "type" => "text",
                        "fc" => "statusaktif",
                        "placeholder" => "tambahkan statusaktif",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "indukagen",
                        "type" => "text",
                        "fc" => "indukagen",
                        "placeholder" => "tambahkan indukagen",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kirimbio",
                        "type" => "text",
                        "fc" => "kirimbio",
                        "placeholder" => "tambahkan kirimbio",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "pk",
                        "type" => "text",
                        "fc" => "pk",
                        "placeholder" => "tambahkan pk",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "pap",
                        "type" => "text",
                        "fc" => "pap",
                        "placeholder" => "tambahkan pap",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "remark",
                        "type" => "text",
                        "fc" => "remark",
                        "placeholder" => "tambahkan remark",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "datafoto",
                        "type" => "text",
                        "fc" => "datafoto",
                        "placeholder" => "tambahkan datafoto",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "keterangan",
                        "type" => "text",
                        "fc" => "keterangan",
                        "placeholder" => "tambahkan keterangan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "lokasikerja",
                        "type" => "text",
                        "fc" => "lokasikerja",
                        "placeholder" => "tambahkan lokasikerja",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "idpemilik",
                        "type" => "text",
                        "fc" => "idpemilik",
                        "placeholder" => "tambahkan idpemilik",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statterbang",
                        "type" => "text",
                        "fc" => "statterbang",
                        "placeholder" => "tambahkan statterbang",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ketdok",
                        "type" => "text",
                        "fc" => "ketdok",
                        "placeholder" => "tambahkan ketdok",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ketadm",
                        "type" => "text",
                        "fc" => "ketadm",
                        "placeholder" => "tambahkan ketadm",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/personal_BACKUP'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>