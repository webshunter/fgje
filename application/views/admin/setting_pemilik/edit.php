<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah setting_pemilik</h1>
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
                    <form action="<?= site_url('admin/setting_pemilik/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_pemilik",
                "value" => $form_data->id_pemilik,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "id_pemilik",
                        "type" => "text",
                        "fc" => "id_pemilik",
                        "placeholder" => "tambahkan id_pemilik",
                        "value" => $form_data->id_pemilik,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama_pemilik",
                        "type" => "text",
                        "fc" => "nama_pemilik",
                        "placeholder" => "tambahkan nama_pemilik",
                        "value" => $form_data->nama_pemilik,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "user_created_id",
                        "type" => "text",
                        "fc" => "user_created_id",
                        "placeholder" => "tambahkan user_created_id",
                        "value" => $form_data->user_created_id,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tanggal_created",
                        "type" => "text",
                        "fc" => "tanggal_created",
                        "placeholder" => "tambahkan tanggal_created",
                        "value" => $form_data->tanggal_created,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jam_created",
                        "type" => "text",
                        "fc" => "jam_created",
                        "placeholder" => "tambahkan jam_created",
                        "value" => $form_data->jam_created,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ip_created",
                        "type" => "text",
                        "fc" => "ip_created",
                        "placeholder" => "tambahkan ip_created",
                        "value" => $form_data->ip_created,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/setting_pemilik'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

