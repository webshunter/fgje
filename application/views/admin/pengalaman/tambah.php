<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan pengalaman</h1>
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
                    <form action="<?= site_url('admin/pengalaman/simpan') ?>" method="post" enctype="multipart/form-data">
                        
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
                        "title" => "negara",
                        "type" => "text",
                        "fc" => "negara",
                        "placeholder" => "tambahkan negara",
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
                        "title" => "lamakerja",
                        "type" => "text",
                        "fc" => "lamakerja",
                        "placeholder" => "tambahkan lamakerja",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "periodekerja",
                        "type" => "text",
                        "fc" => "periodekerja",
                        "placeholder" => "tambahkan periodekerja",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jamkerja",
                        "type" => "text",
                        "fc" => "jamkerja",
                        "placeholder" => "tambahkan jamkerja",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "majikan",
                        "type" => "text",
                        "fc" => "majikan",
                        "placeholder" => "tambahkan majikan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "alasanberhenti",
                        "type" => "text",
                        "fc" => "alasanberhenti",
                        "placeholder" => "tambahkan alasanberhenti",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kerjaprt",
                        "type" => "text",
                        "fc" => "kerjaprt",
                        "placeholder" => "tambahkan kerjaprt",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "memasak",
                        "type" => "text",
                        "fc" => "memasak",
                        "placeholder" => "tambahkan memasak",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "mencucibaju",
                        "type" => "text",
                        "fc" => "mencucibaju",
                        "placeholder" => "tambahkan mencucibaju",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "setrikabaju",
                        "type" => "text",
                        "fc" => "setrikabaju",
                        "placeholder" => "tambahkan setrikabaju",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "mencucimobil",
                        "type" => "text",
                        "fc" => "mencucimobil",
                        "placeholder" => "tambahkan mencucimobil",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "rawatbinatang",
                        "type" => "text",
                        "fc" => "rawatbinatang",
                        "placeholder" => "tambahkan rawatbinatang",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "rawatbayi",
                        "type" => "text",
                        "fc" => "rawatbayi",
                        "placeholder" => "tambahkan rawatbayi",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "rawatanak",
                        "type" => "text",
                        "fc" => "rawatanak",
                        "placeholder" => "tambahkan rawatanak",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "umur",
                        "type" => "text",
                        "fc" => "umur",
                        "placeholder" => "tambahkan umur",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kondisi",
                        "type" => "text",
                        "fc" => "kondisi",
                        "placeholder" => "tambahkan kondisi",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jompokelamin",
                        "type" => "text",
                        "fc" => "jompokelamin",
                        "placeholder" => "tambahkan jompokelamin",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jompoumur",
                        "type" => "text",
                        "fc" => "jompoumur",
                        "placeholder" => "tambahkan jompoumur",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jompokondisi",
                        "type" => "text",
                        "fc" => "jompokondisi",
                        "placeholder" => "tambahkan jompokondisi",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jompokelamin2",
                        "type" => "text",
                        "fc" => "jompokelamin2",
                        "placeholder" => "tambahkan jompokelamin2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jompoumur2",
                        "type" => "text",
                        "fc" => "jompoumur2",
                        "placeholder" => "tambahkan jompoumur2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jompokondisi2",
                        "type" => "text",
                        "fc" => "jompokondisi2",
                        "placeholder" => "tambahkan jompokondisi2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "anggotarumah",
                        "type" => "text",
                        "fc" => "anggotarumah",
                        "placeholder" => "tambahkan anggotarumah",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tiperumah",
                        "type" => "text",
                        "fc" => "tiperumah",
                        "placeholder" => "tambahkan tiperumah",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jumlahlantai",
                        "type" => "text",
                        "fc" => "jumlahlantai",
                        "placeholder" => "tambahkan jumlahlantai",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jumlahkamar",
                        "type" => "text",
                        "fc" => "jumlahkamar",
                        "placeholder" => "tambahkan jumlahkamar",
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