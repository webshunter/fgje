<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah setting_tipe_pemasukan</h1>
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
                    <form action="<?= site_url('admin/setting_tipe_pemasukan/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_tipe_pemasukan",
                "value" => $form_data->id_tipe_pemasukan,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "id_tipe_pemasukan",
                        "type" => "text",
                        "fc" => "id_tipe_pemasukan",
                        "placeholder" => "tambahkan id_tipe_pemasukan",
                        "value" => $form_data->id_tipe_pemasukan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama_tipe_pemasukan",
                        "type" => "text",
                        "fc" => "nama_tipe_pemasukan",
                        "placeholder" => "tambahkan nama_tipe_pemasukan",
                        "value" => $form_data->nama_tipe_pemasukan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "pemilik_option",
                        "type" => "text",
                        "fc" => "pemilik_option",
                        "placeholder" => "tambahkan pemilik_option",
                        "value" => $form_data->pemilik_option,
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
                          <a class="btn btn-default" href="<?= site_url('admin/setting_tipe_pemasukan'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

