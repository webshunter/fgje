<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah dataagen_penerima_dana</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
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
                    <form action="<?= site_url('admin/dataagen_penerima_dana/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id",
                "value" => $form_data->id,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "agen_id",
                        "type" => "text",
                        "fc" => "agen_id",
                        "placeholder" => "tambahkan agen_id",
                        "value" => $form_data->agen_id,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "penerima_nama_id",
                        "type" => "text",
                        "fc" => "penerima_nama_id",
                        "placeholder" => "tambahkan penerima_nama_id",
                        "value" => $form_data->penerima_nama_id,
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
                        "title" => "softDelete",
                        "type" => "text",
                        "fc" => "softDelete",
                        "placeholder" => "tambahkan softDelete",
                        "value" => $form_data->softDelete,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/dataagen_penerima_dana'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

