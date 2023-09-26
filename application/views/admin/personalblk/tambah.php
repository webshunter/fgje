<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan personalblk</h1>
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
                    <form action="<?= site_url('admin/personalblk/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "pemilik",
                        "type" => "text",
                        "fc" => "pemilik",
                        "placeholder" => "tambahkan pemilik",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nodaftar",
                        "type" => "text",
                        "fc" => "nodaftar",
                        "placeholder" => "tambahkan nodaftar",
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
                        "title" => "sponsor",
                        "type" => "text",
                        "fc" => "sponsor",
                        "placeholder" => "tambahkan sponsor",
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
                        "title" => "jeniskelamin",
                        "type" => "text",
                        "fc" => "jeniskelamin",
                        "placeholder" => "tambahkan jeniskelamin",
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
                        "title" => "notelp",
                        "type" => "text",
                        "fc" => "notelp",
                        "placeholder" => "tambahkan notelp",
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
                        "title" => "noktp",
                        "type" => "text",
                        "fc" => "noktp",
                        "placeholder" => "tambahkan noktp",
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
                        "title" => "bahasa",
                        "type" => "text",
                        "fc" => "bahasa",
                        "placeholder" => "tambahkan bahasa",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "eksnon",
                        "type" => "text",
                        "fc" => "eksnon",
                        "placeholder" => "tambahkan eksnon",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "cluster",
                        "type" => "text",
                        "fc" => "cluster",
                        "placeholder" => "tambahkan cluster",
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
                        "title" => "tglmedawal",
                        "type" => "text",
                        "fc" => "tglmedawal",
                        "placeholder" => "tambahkan tglmedawal",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglmedfull",
                        "type" => "text",
                        "fc" => "tglmedfull",
                        "placeholder" => "tambahkan tglmedfull",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglsidikjari",
                        "type" => "text",
                        "fc" => "tglsidikjari",
                        "placeholder" => "tambahkan tglsidikjari",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "adm_tglkor",
                        "type" => "text",
                        "fc" => "adm_tglkor",
                        "placeholder" => "tambahkan adm_tglkor",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "adm_tglreg",
                        "type" => "text",
                        "fc" => "adm_tglreg",
                        "placeholder" => "tambahkan adm_tglreg",
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
                        "title" => "cektgl",
                        "type" => "text",
                        "fc" => "cektgl",
                        "placeholder" => "tambahkan cektgl",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "cekins",
                        "type" => "text",
                        "fc" => "cekins",
                        "placeholder" => "tambahkan cekins",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "cekket",
                        "type" => "text",
                        "fc" => "cekket",
                        "placeholder" => "tambahkan cekket",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ranjangtgl",
                        "type" => "text",
                        "fc" => "ranjangtgl",
                        "placeholder" => "tambahkan ranjangtgl",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ranjangno",
                        "type" => "text",
                        "fc" => "ranjangno",
                        "placeholder" => "tambahkan ranjangno",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statujk",
                        "type" => "text",
                        "fc" => "statujk",
                        "placeholder" => "tambahkan statujk",
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
                        "title" => "sektor_tki",
                        "type" => "text",
                        "fc" => "sektor_tki",
                        "placeholder" => "tambahkan sektor_tki",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/personalblk'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>