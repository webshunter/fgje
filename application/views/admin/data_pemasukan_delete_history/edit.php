<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah data_pemasukan_delete_history</h1>
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
                    <form action="<?= site_url('admin/data_pemasukan_delete_history/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_delete_pemasukan",
                "value" => $form_data->id_delete_pemasukan,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "id_delete_pemasukan",
                        "type" => "text",
                        "fc" => "id_delete_pemasukan",
                        "placeholder" => "tambahkan id_delete_pemasukan",
                        "value" => $form_data->id_delete_pemasukan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tipe_pemasukan",
                        "type" => "text",
                        "fc" => "tipe_pemasukan",
                        "placeholder" => "tambahkan tipe_pemasukan",
                        "value" => $form_data->tipe_pemasukan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nominal_pemasukan",
                        "type" => "text",
                        "fc" => "nominal_pemasukan",
                        "placeholder" => "tambahkan nominal_pemasukan",
                        "value" => $form_data->nominal_pemasukan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tanggal_pemasukan",
                        "type" => "text",
                        "fc" => "tanggal_pemasukan",
                        "placeholder" => "tambahkan tanggal_pemasukan",
                        "value" => $form_data->tanggal_pemasukan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "pemilik_pemasukan",
                        "type" => "text",
                        "fc" => "pemilik_pemasukan",
                        "placeholder" => "tambahkan pemilik_pemasukan",
                        "value" => $form_data->pemilik_pemasukan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tanggal_input",
                        "type" => "text",
                        "fc" => "tanggal_input",
                        "placeholder" => "tambahkan tanggal_input",
                        "value" => $form_data->tanggal_input,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jam_input",
                        "type" => "text",
                        "fc" => "jam_input",
                        "placeholder" => "tambahkan jam_input",
                        "value" => $form_data->jam_input,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "user_input",
                        "type" => "text",
                        "fc" => "user_input",
                        "placeholder" => "tambahkan user_input",
                        "value" => $form_data->user_input,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ip_input",
                        "type" => "text",
                        "fc" => "ip_input",
                        "placeholder" => "tambahkan ip_input",
                        "value" => $form_data->ip_input,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tanggal_edit",
                        "type" => "text",
                        "fc" => "tanggal_edit",
                        "placeholder" => "tambahkan tanggal_edit",
                        "value" => $form_data->tanggal_edit,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jam_edit",
                        "type" => "text",
                        "fc" => "jam_edit",
                        "placeholder" => "tambahkan jam_edit",
                        "value" => $form_data->jam_edit,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "user_edit",
                        "type" => "text",
                        "fc" => "user_edit",
                        "placeholder" => "tambahkan user_edit",
                        "value" => $form_data->user_edit,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ip_edit",
                        "type" => "text",
                        "fc" => "ip_edit",
                        "placeholder" => "tambahkan ip_edit",
                        "value" => $form_data->ip_edit,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tanggal_delete",
                        "type" => "text",
                        "fc" => "tanggal_delete",
                        "placeholder" => "tambahkan tanggal_delete",
                        "value" => $form_data->tanggal_delete,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jam_delete",
                        "type" => "text",
                        "fc" => "jam_delete",
                        "placeholder" => "tambahkan jam_delete",
                        "value" => $form_data->jam_delete,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "user_delete",
                        "type" => "text",
                        "fc" => "user_delete",
                        "placeholder" => "tambahkan user_delete",
                        "value" => $form_data->user_delete,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ip_delete",
                        "type" => "text",
                        "fc" => "ip_delete",
                        "placeholder" => "tambahkan ip_delete",
                        "value" => $form_data->ip_delete,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "pemasukan_id",
                        "type" => "text",
                        "fc" => "pemasukan_id",
                        "placeholder" => "tambahkan pemasukan_id",
                        "value" => $form_data->pemasukan_id,
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
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/data_pemasukan_delete_history'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

