<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah demo_finger</h1>
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
                    <form action="<?= site_url('admin/demo_finger/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "user_id",
                "value" => $form_data->user_id,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "user_id",
                        "type" => "text",
                        "fc" => "user_id",
                        "placeholder" => "tambahkan user_id",
                        "value" => $form_data->user_id,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "finger_id",
                        "type" => "text",
                        "fc" => "finger_id",
                        "placeholder" => "tambahkan finger_id",
                        "value" => $form_data->finger_id,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "finger_data",
                        "type" => "text",
                        "fc" => "finger_data",
                        "placeholder" => "tambahkan finger_data",
                        "value" => $form_data->finger_data,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/demo_finger'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

