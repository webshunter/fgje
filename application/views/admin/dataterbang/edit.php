<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah dataterbang</h1>
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
                    <form action="<?= site_url('admin/dataterbang/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_terbang",
                "value" => $form_data->id_terbang,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "namamaskapai",
                        "type" => "text",
                        "fc" => "namamaskapai",
                        "placeholder" => "tambahkan namamaskapai",
                        "value" => $form_data->namamaskapai,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jamtiba",
                        "type" => "text",
                        "fc" => "jamtiba",
                        "placeholder" => "tambahkan jamtiba",
                        "value" => $form_data->jamtiba,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "detailberangkat1",
                        "type" => "text",
                        "fc" => "detailberangkat1",
                        "placeholder" => "tambahkan detailberangkat1",
                        "value" => $form_data->detailberangkat1,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "detailtiba1",
                        "type" => "text",
                        "fc" => "detailtiba1",
                        "placeholder" => "tambahkan detailtiba1",
                        "value" => $form_data->detailtiba1,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "detailberangkat2",
                        "type" => "text",
                        "fc" => "detailberangkat2",
                        "placeholder" => "tambahkan detailberangkat2",
                        "value" => $form_data->detailberangkat2,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "detailtiba2",
                        "type" => "text",
                        "fc" => "detailtiba2",
                        "placeholder" => "tambahkan detailtiba2",
                        "value" => $form_data->detailtiba2,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/dataterbang'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

