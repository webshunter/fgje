<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah datavisapermit</h1>
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
                    <form action="<?= site_url('admin/datavisapermit/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_visapermit",
                "value" => $form_data->id_visapermit,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "id_group",
                        "type" => "text",
                        "fc" => "id_group",
                        "placeholder" => "tambahkan id_group",
                        "value" => $form_data->id_group,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_agen",
                        "type" => "text",
                        "fc" => "id_agen",
                        "placeholder" => "tambahkan id_agen",
                        "value" => $form_data->id_agen,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_majikan",
                        "type" => "text",
                        "fc" => "id_majikan",
                        "placeholder" => "tambahkan id_majikan",
                        "value" => $form_data->id_majikan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_suhan",
                        "type" => "text",
                        "fc" => "id_suhan",
                        "placeholder" => "tambahkan id_suhan",
                        "value" => $form_data->id_suhan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "no_visapermit",
                        "type" => "text",
                        "fc" => "no_visapermit",
                        "placeholder" => "tambahkan no_visapermit",
                        "value" => $form_data->no_visapermit,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglterbitvs",
                        "type" => "text",
                        "fc" => "tglterbitvs",
                        "placeholder" => "tambahkan tglterbitvs",
                        "value" => $form_data->tglterbitvs,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglexpvs",
                        "type" => "text",
                        "fc" => "tglexpvs",
                        "placeholder" => "tambahkan tglexpvs",
                        "value" => $form_data->tglexpvs,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglterimavs",
                        "type" => "text",
                        "fc" => "tglterimavs",
                        "placeholder" => "tambahkan tglterimavs",
                        "value" => $form_data->tglterimavs,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglsimpanvs",
                        "type" => "text",
                        "fc" => "tglsimpanvs",
                        "placeholder" => "tambahkan tglsimpanvs",
                        "value" => $form_data->tglsimpanvs,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglbawavs",
                        "type" => "text",
                        "fc" => "tglbawavs",
                        "placeholder" => "tambahkan tglbawavs",
                        "value" => $form_data->tglbawavs,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglmintavs",
                        "type" => "text",
                        "fc" => "tglmintavs",
                        "placeholder" => "tambahkan tglmintavs",
                        "value" => $form_data->tglmintavs,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "quotavs",
                        "type" => "text",
                        "fc" => "quotavs",
                        "placeholder" => "tambahkan quotavs",
                        "value" => $form_data->quotavs,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "filevisapermit",
                        "type" => "text",
                        "fc" => "filevisapermit",
                        "placeholder" => "tambahkan filevisapermit",
                        "value" => $form_data->filevisapermit,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglexpext",
                        "type" => "text",
                        "fc" => "tglexpext",
                        "placeholder" => "tambahkan tglexpext",
                        "value" => $form_data->tglexpext,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/datavisapermit'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

