<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah adm_saldo_awal_edit_history</h1>
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
                    <form action="<?= site_url('admin/adm_saldo_awal_edit_history/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_saldo_awal",
                "value" => $form_data->id_saldo_awal,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "id_saldo_awal",
                        "type" => "text",
                        "fc" => "id_saldo_awal",
                        "placeholder" => "tambahkan id_saldo_awal",
                        "value" => $form_data->id_saldo_awal,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nominal_saldo_awal",
                        "type" => "text",
                        "fc" => "nominal_saldo_awal",
                        "placeholder" => "tambahkan nominal_saldo_awal",
                        "value" => $form_data->nominal_saldo_awal,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tahun_saldo_awal",
                        "type" => "text",
                        "fc" => "tahun_saldo_awal",
                        "placeholder" => "tambahkan tahun_saldo_awal",
                        "value" => $form_data->tahun_saldo_awal,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "keterangan",
                        "type" => "text",
                        "fc" => "keterangan",
                        "placeholder" => "tambahkan keterangan",
                        "value" => $form_data->keterangan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "user_modified",
                        "type" => "text",
                        "fc" => "user_modified",
                        "placeholder" => "tambahkan user_modified",
                        "value" => $form_data->user_modified,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ip_modified",
                        "type" => "text",
                        "fc" => "ip_modified",
                        "placeholder" => "tambahkan ip_modified",
                        "value" => $form_data->ip_modified,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "date_modified",
                        "type" => "text",
                        "fc" => "date_modified",
                        "placeholder" => "tambahkan date_modified",
                        "value" => $form_data->date_modified,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "time_modified",
                        "type" => "text",
                        "fc" => "time_modified",
                        "placeholder" => "tambahkan time_modified",
                        "value" => $form_data->time_modified,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "adm_saldo_awal_id",
                        "type" => "text",
                        "fc" => "adm_saldo_awal_id",
                        "placeholder" => "tambahkan adm_saldo_awal_id",
                        "value" => $form_data->adm_saldo_awal_id,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/adm_saldo_awal_edit_history'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

