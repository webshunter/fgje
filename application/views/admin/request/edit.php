<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah request</h1>
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
                    <form action="<?= site_url('admin/request/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_request",
                "value" => $form_data->id_request,
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
                        "title" => "usahamajikan",
                        "type" => "text",
                        "fc" => "usahamajikan",
                        "placeholder" => "tambahkan usahamajikan",
                        "value" => $form_data->usahamajikan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "waktukerja",
                        "type" => "text",
                        "fc" => "waktukerja",
                        "placeholder" => "tambahkan waktukerja",
                        "value" => $form_data->waktukerja,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kondisikerja",
                        "type" => "text",
                        "fc" => "kondisikerja",
                        "placeholder" => "tambahkan kondisikerja",
                        "value" => $form_data->kondisikerja,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jenispekerjaan",
                        "type" => "text",
                        "fc" => "jenispekerjaan",
                        "placeholder" => "tambahkan jenispekerjaan",
                        "value" => $form_data->jenispekerjaan,
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
                        "title" => "lembur",
                        "type" => "text",
                        "fc" => "lembur",
                        "placeholder" => "tambahkan lembur",
                        "value" => $form_data->lembur,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/request'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

