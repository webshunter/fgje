<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah pengalaman</h1>
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
                    <form action="<?= site_url('admin/pengalaman/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_pengalaman",
                "value" => $form_data->id_pengalaman,
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
                        "title" => "negara",
                        "type" => "text",
                        "fc" => "negara",
                        "placeholder" => "tambahkan negara",
                        "value" => $form_data->negara,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "lokasikerja",
                        "type" => "text",
                        "fc" => "lokasikerja",
                        "placeholder" => "tambahkan lokasikerja",
                        "value" => $form_data->lokasikerja,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "lamakerja",
                        "type" => "text",
                        "fc" => "lamakerja",
                        "placeholder" => "tambahkan lamakerja",
                        "value" => $form_data->lamakerja,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "periodekerja",
                        "type" => "text",
                        "fc" => "periodekerja",
                        "placeholder" => "tambahkan periodekerja",
                        "value" => $form_data->periodekerja,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jamkerja",
                        "type" => "text",
                        "fc" => "jamkerja",
                        "placeholder" => "tambahkan jamkerja",
                        "value" => $form_data->jamkerja,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "majikan",
                        "type" => "text",
                        "fc" => "majikan",
                        "placeholder" => "tambahkan majikan",
                        "value" => $form_data->majikan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "alasanberhenti",
                        "type" => "text",
                        "fc" => "alasanberhenti",
                        "placeholder" => "tambahkan alasanberhenti",
                        "value" => $form_data->alasanberhenti,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kerjaprt",
                        "type" => "text",
                        "fc" => "kerjaprt",
                        "placeholder" => "tambahkan kerjaprt",
                        "value" => $form_data->kerjaprt,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "memasak",
                        "type" => "text",
                        "fc" => "memasak",
                        "placeholder" => "tambahkan memasak",
                        "value" => $form_data->memasak,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "mencucibaju",
                        "type" => "text",
                        "fc" => "mencucibaju",
                        "placeholder" => "tambahkan mencucibaju",
                        "value" => $form_data->mencucibaju,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "setrikabaju",
                        "type" => "text",
                        "fc" => "setrikabaju",
                        "placeholder" => "tambahkan setrikabaju",
                        "value" => $form_data->setrikabaju,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "mencucimobil",
                        "type" => "text",
                        "fc" => "mencucimobil",
                        "placeholder" => "tambahkan mencucimobil",
                        "value" => $form_data->mencucimobil,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "rawatbinatang",
                        "type" => "text",
                        "fc" => "rawatbinatang",
                        "placeholder" => "tambahkan rawatbinatang",
                        "value" => $form_data->rawatbinatang,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "rawatbayi",
                        "type" => "text",
                        "fc" => "rawatbayi",
                        "placeholder" => "tambahkan rawatbayi",
                        "value" => $form_data->rawatbayi,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "rawatanak",
                        "type" => "text",
                        "fc" => "rawatanak",
                        "placeholder" => "tambahkan rawatanak",
                        "value" => $form_data->rawatanak,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "umur",
                        "type" => "text",
                        "fc" => "umur",
                        "placeholder" => "tambahkan umur",
                        "value" => $form_data->umur,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kondisi",
                        "type" => "text",
                        "fc" => "kondisi",
                        "placeholder" => "tambahkan kondisi",
                        "value" => $form_data->kondisi,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jompokelamin",
                        "type" => "text",
                        "fc" => "jompokelamin",
                        "placeholder" => "tambahkan jompokelamin",
                        "value" => $form_data->jompokelamin,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jompoumur",
                        "type" => "text",
                        "fc" => "jompoumur",
                        "placeholder" => "tambahkan jompoumur",
                        "value" => $form_data->jompoumur,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jompokondisi",
                        "type" => "text",
                        "fc" => "jompokondisi",
                        "placeholder" => "tambahkan jompokondisi",
                        "value" => $form_data->jompokondisi,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jompokelamin2",
                        "type" => "text",
                        "fc" => "jompokelamin2",
                        "placeholder" => "tambahkan jompokelamin2",
                        "value" => $form_data->jompokelamin2,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jompoumur2",
                        "type" => "text",
                        "fc" => "jompoumur2",
                        "placeholder" => "tambahkan jompoumur2",
                        "value" => $form_data->jompoumur2,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jompokondisi2",
                        "type" => "text",
                        "fc" => "jompokondisi2",
                        "placeholder" => "tambahkan jompokondisi2",
                        "value" => $form_data->jompokondisi2,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "anggotarumah",
                        "type" => "text",
                        "fc" => "anggotarumah",
                        "placeholder" => "tambahkan anggotarumah",
                        "value" => $form_data->anggotarumah,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tiperumah",
                        "type" => "text",
                        "fc" => "tiperumah",
                        "placeholder" => "tambahkan tiperumah",
                        "value" => $form_data->tiperumah,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jumlahlantai",
                        "type" => "text",
                        "fc" => "jumlahlantai",
                        "placeholder" => "tambahkan jumlahlantai",
                        "value" => $form_data->jumlahlantai,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jumlahkamar",
                        "type" => "text",
                        "fc" => "jumlahkamar",
                        "placeholder" => "tambahkan jumlahkamar",
                        "value" => $form_data->jumlahkamar,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "keterangan",
                        "type" => "text",
                        "fc" => "keterangan",
                        "placeholder" => "tambahkan keterangan",
                        "value" => $form_data->keterangan,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/pengalaman'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

