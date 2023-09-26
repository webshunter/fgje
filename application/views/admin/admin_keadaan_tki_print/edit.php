<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah admin_keadaan_tki_print</h1>
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
                    <form action="<?= site_url('admin/admin_keadaan_tki_print/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id",
                "value" => $form_data->id,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "tanggal",
                        "type" => "text",
                        "fc" => "tanggal",
                        "placeholder" => "tambahkan tanggal",
                        "value" => $form_data->tanggal,
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
                        "title" => "pmi",
                        "type" => "text",
                        "fc" => "pmi",
                        "placeholder" => "tambahkan pmi",
                        "value" => $form_data->pmi,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "br",
                        "type" => "text",
                        "fc" => "br",
                        "placeholder" => "tambahkan br",
                        "value" => $form_data->br,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "date_created",
                        "type" => "text",
                        "fc" => "date_created",
                        "placeholder" => "tambahkan date_created",
                        "value" => $form_data->date_created,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "deleted_at",
                        "type" => "text",
                        "fc" => "deleted_at",
                        "placeholder" => "tambahkan deleted_at",
                        "value" => $form_data->deleted_at,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/admin_keadaan_tki_print'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

