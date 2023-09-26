<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah blk_setting_paket</h1>
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
                    <form action="<?= site_url('admin/blk_setting_paket/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_setting_paket",
                "value" => $form_data->id_setting_paket,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "nama_paket",
                        "type" => "text",
                        "fc" => "nama_paket",
                        "placeholder" => "tambahkan nama_paket",
                        "value" => $form_data->nama_paket,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "source",
                        "type" => "text",
                        "fc" => "source",
                        "placeholder" => "tambahkan source",
                        "value" => $form_data->source,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "source2",
                        "type" => "text",
                        "fc" => "source2",
                        "placeholder" => "tambahkan source2",
                        "value" => $form_data->source2,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_setting_paket'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

