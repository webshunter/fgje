<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah brifing</h1>
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
                    <form action="<?= site_url('admin/brifing/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id",
                "value" => $form_data->id,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "tgl_start",
                        "type" => "text",
                        "fc" => "tgl_start",
                        "placeholder" => "tambahkan tgl_start",
                        "value" => $form_data->tgl_start,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_ending",
                        "type" => "text",
                        "fc" => "tgl_ending",
                        "placeholder" => "tambahkan tgl_ending",
                        "value" => $form_data->tgl_ending,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_brifing",
                        "type" => "text",
                        "fc" => "tgl_brifing",
                        "placeholder" => "tambahkan tgl_brifing",
                        "value" => $form_data->tgl_brifing,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jam_brifing",
                        "type" => "text",
                        "fc" => "jam_brifing",
                        "placeholder" => "tambahkan jam_brifing",
                        "value" => $form_data->jam_brifing,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tempat_brifing",
                        "type" => "text",
                        "fc" => "tempat_brifing",
                        "placeholder" => "tambahkan tempat_brifing",
                        "value" => $form_data->tempat_brifing,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/brifing'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

