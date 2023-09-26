<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah personalblk</h1>
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
                    <form action="<?= site_url('admin/personalblk/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_personalblk",
                "value" => $form_data->id_personalblk,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "pemilik",
                        "type" => "text",
                        "fc" => "pemilik",
                        "placeholder" => "tambahkan pemilik",
                        "value" => $form_data->pemilik,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nodaftar",
                        "type" => "text",
                        "fc" => "nodaftar",
                        "placeholder" => "tambahkan nodaftar",
                        "value" => $form_data->nodaftar,
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
                        "title" => "sponsor",
                        "type" => "text",
                        "fc" => "sponsor",
                        "placeholder" => "tambahkan sponsor",
                        "value" => $form_data->sponsor,
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
                        "title" => "jeniskelamin",
                        "type" => "text",
                        "fc" => "jeniskelamin",
                        "placeholder" => "tambahkan jeniskelamin",
                        "value" => $form_data->jeniskelamin,
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
                        "title" => "notelp",
                        "type" => "text",
                        "fc" => "notelp",
                        "placeholder" => "tambahkan notelp",
                        "value" => $form_data->notelp,
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
                        "title" => "noktp",
                        "type" => "text",
                        "fc" => "noktp",
                        "placeholder" => "tambahkan noktp",
                        "value" => $form_data->noktp,
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
                        "title" => "bahasa",
                        "type" => "text",
                        "fc" => "bahasa",
                        "placeholder" => "tambahkan bahasa",
                        "value" => $form_data->bahasa,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "eksnon",
                        "type" => "text",
                        "fc" => "eksnon",
                        "placeholder" => "tambahkan eksnon",
                        "value" => $form_data->eksnon,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "cluster",
                        "type" => "text",
                        "fc" => "cluster",
                        "placeholder" => "tambahkan cluster",
                        "value" => $form_data->cluster,
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
                        "title" => "tglmedawal",
                        "type" => "text",
                        "fc" => "tglmedawal",
                        "placeholder" => "tambahkan tglmedawal",
                        "value" => $form_data->tglmedawal,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglmedfull",
                        "type" => "text",
                        "fc" => "tglmedfull",
                        "placeholder" => "tambahkan tglmedfull",
                        "value" => $form_data->tglmedfull,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglsidikjari",
                        "type" => "text",
                        "fc" => "tglsidikjari",
                        "placeholder" => "tambahkan tglsidikjari",
                        "value" => $form_data->tglsidikjari,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "adm_tglkor",
                        "type" => "text",
                        "fc" => "adm_tglkor",
                        "placeholder" => "tambahkan adm_tglkor",
                        "value" => $form_data->adm_tglkor,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "adm_tglreg",
                        "type" => "text",
                        "fc" => "adm_tglreg",
                        "placeholder" => "tambahkan adm_tglreg",
                        "value" => $form_data->adm_tglreg,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "foto",
                        "type" => "text",
                        "fc" => "foto",
                        "placeholder" => "tambahkan foto",
                        "value" => $form_data->foto,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "cektgl",
                        "type" => "text",
                        "fc" => "cektgl",
                        "placeholder" => "tambahkan cektgl",
                        "value" => $form_data->cektgl,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "cekins",
                        "type" => "text",
                        "fc" => "cekins",
                        "placeholder" => "tambahkan cekins",
                        "value" => $form_data->cekins,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "cekket",
                        "type" => "text",
                        "fc" => "cekket",
                        "placeholder" => "tambahkan cekket",
                        "value" => $form_data->cekket,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ranjangtgl",
                        "type" => "text",
                        "fc" => "ranjangtgl",
                        "placeholder" => "tambahkan ranjangtgl",
                        "value" => $form_data->ranjangtgl,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ranjangno",
                        "type" => "text",
                        "fc" => "ranjangno",
                        "placeholder" => "tambahkan ranjangno",
                        "value" => $form_data->ranjangno,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statujk",
                        "type" => "text",
                        "fc" => "statujk",
                        "placeholder" => "tambahkan statujk",
                        "value" => $form_data->statujk,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statterbang",
                        "type" => "text",
                        "fc" => "statterbang",
                        "placeholder" => "tambahkan statterbang",
                        "value" => $form_data->statterbang,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "sektor_tki",
                        "type" => "text",
                        "fc" => "sektor_tki",
                        "placeholder" => "tambahkan sektor_tki",
                        "value" => $form_data->sektor_tki,
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

