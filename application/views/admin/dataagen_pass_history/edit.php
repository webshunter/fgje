<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah dataagen_pass_history</h1>
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
                    <form action="<?= site_url('admin/dataagen_pass_history/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_agen_pass",
                "value" => $form_data->id_agen_pass,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "first_pass",
                        "type" => "text",
                        "fc" => "first_pass",
                        "placeholder" => "tambahkan first_pass",
                        "value" => $form_data->first_pass,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "second_pass",
                        "type" => "text",
                        "fc" => "second_pass",
                        "placeholder" => "tambahkan second_pass",
                        "value" => $form_data->second_pass,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "h_tgl",
                        "type" => "text",
                        "fc" => "h_tgl",
                        "placeholder" => "tambahkan h_tgl",
                        "value" => $form_data->h_tgl,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "h_jam",
                        "type" => "text",
                        "fc" => "h_jam",
                        "placeholder" => "tambahkan h_jam",
                        "value" => $form_data->h_jam,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "h_ip",
                        "type" => "text",
                        "fc" => "h_ip",
                        "placeholder" => "tambahkan h_ip",
                        "value" => $form_data->h_ip,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "h_user",
                        "type" => "text",
                        "fc" => "h_user",
                        "placeholder" => "tambahkan h_user",
                        "value" => $form_data->h_user,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/dataagen_pass_history'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

