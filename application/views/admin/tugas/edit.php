<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah tugas</h1>
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
                    <form action="<?= site_url('admin/tugas/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_tugas",
                "value" => $form_data->id_tugas,
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
                        "title" => "pekerjaan_rt",
                        "type" => "text",
                        "fc" => "pekerjaan_rt",
                        "placeholder" => "tambahkan pekerjaan_rt",
                        "value" => $form_data->pekerjaan_rt,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "merawat_bayi",
                        "type" => "text",
                        "fc" => "merawat_bayi",
                        "placeholder" => "tambahkan merawat_bayi",
                        "value" => $form_data->merawat_bayi,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "cacat",
                        "type" => "text",
                        "fc" => "cacat",
                        "placeholder" => "tambahkan cacat",
                        "value" => $form_data->cacat,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "anak_kecil",
                        "type" => "text",
                        "fc" => "anak_kecil",
                        "placeholder" => "tambahkan anak_kecil",
                        "value" => $form_data->anak_kecil,
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
                        "title" => "jompo",
                        "type" => "text",
                        "fc" => "jompo",
                        "placeholder" => "tambahkan jompo",
                        "value" => $form_data->jompo,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/tugas'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

