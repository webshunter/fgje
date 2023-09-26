<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah demo_log</h1>
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
                    <form action="<?= site_url('admin/demo_log/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "log_time",
                "value" => $form_data->log_time,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "log_time",
                        "type" => "text",
                        "fc" => "log_time",
                        "placeholder" => "tambahkan log_time",
                        "value" => $form_data->log_time,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "user_name",
                        "type" => "text",
                        "fc" => "user_name",
                        "placeholder" => "tambahkan user_name",
                        "value" => $form_data->user_name,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "data",
                        "type" => "text",
                        "fc" => "data",
                        "placeholder" => "tambahkan data",
                        "value" => $form_data->data,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kelas",
                        "type" => "text",
                        "fc" => "kelas",
                        "placeholder" => "tambahkan kelas",
                        "value" => $form_data->kelas,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/demo_log'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

