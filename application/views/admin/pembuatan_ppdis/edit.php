<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah pembuatan_ppdis</h1>
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
                    <form action="<?= site_url('admin/pembuatan_ppdis/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_pembuatan",
                "value" => $form_data->id_pembuatan,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "nomor",
                        "type" => "text",
                        "fc" => "nomor",
                        "placeholder" => "tambahkan nomor",
                        "value" => $form_data->nomor,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "lampiran",
                        "type" => "text",
                        "fc" => "lampiran",
                        "placeholder" => "tambahkan lampiran",
                        "value" => $form_data->lampiran,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "perihal",
                        "type" => "text",
                        "fc" => "perihal",
                        "placeholder" => "tambahkan perihal",
                        "value" => $form_data->perihal,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kepada",
                        "type" => "text",
                        "fc" => "kepada",
                        "placeholder" => "tambahkan kepada",
                        "value" => $form_data->kepada,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "malaysia",
                        "type" => "text",
                        "fc" => "malaysia",
                        "placeholder" => "tambahkan malaysia",
                        "value" => $form_data->malaysia,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "hongkong",
                        "type" => "text",
                        "fc" => "hongkong",
                        "placeholder" => "tambahkan hongkong",
                        "value" => $form_data->hongkong,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "singapura",
                        "type" => "text",
                        "fc" => "singapura",
                        "placeholder" => "tambahkan singapura",
                        "value" => $form_data->singapura,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "taiwan",
                        "type" => "text",
                        "fc" => "taiwan",
                        "placeholder" => "tambahkan taiwan",
                        "value" => $form_data->taiwan,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/pembuatan_ppdis'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

