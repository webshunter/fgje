<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah visapermithistory</h1>
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
                    <form action="<?= site_url('admin/visapermithistory/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_visapermithistory",
                "value" => $form_data->id_visapermithistory,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "tgl_terima",
                        "type" => "text",
                        "fc" => "tgl_terima",
                        "placeholder" => "tambahkan tgl_terima",
                        "value" => $form_data->tgl_terima,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_visapermit",
                        "type" => "text",
                        "fc" => "id_visapermit",
                        "placeholder" => "tambahkan id_visapermit",
                        "value" => $form_data->id_visapermit,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_kirim",
                        "type" => "text",
                        "fc" => "tgl_kirim",
                        "placeholder" => "tambahkan tgl_kirim",
                        "value" => $form_data->tgl_kirim,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ket",
                        "type" => "text",
                        "fc" => "ket",
                        "placeholder" => "tambahkan ket",
                        "value" => $form_data->ket,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/visapermithistory'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

