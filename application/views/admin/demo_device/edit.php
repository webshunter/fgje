<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah demo_device</h1>
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
                    <form action="<?= site_url('admin/demo_device/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "device_name",
                "value" => $form_data->device_name,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "device_name",
                        "type" => "text",
                        "fc" => "device_name",
                        "placeholder" => "tambahkan device_name",
                        "value" => $form_data->device_name,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "sn",
                        "type" => "text",
                        "fc" => "sn",
                        "placeholder" => "tambahkan sn",
                        "value" => $form_data->sn,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "vc",
                        "type" => "text",
                        "fc" => "vc",
                        "placeholder" => "tambahkan vc",
                        "value" => $form_data->vc,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ac",
                        "type" => "text",
                        "fc" => "ac",
                        "placeholder" => "tambahkan ac",
                        "value" => $form_data->ac,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "vkey",
                        "type" => "text",
                        "fc" => "vkey",
                        "placeholder" => "tambahkan vkey",
                        "value" => $form_data->vkey,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/demo_device'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>
