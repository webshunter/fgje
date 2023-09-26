<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah datafinger</h1>
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
                    <form action="<?= site_url('admin/datafinger/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_finger",
                "value" => $form_data->id_finger,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "idblk",
                        "type" => "text",
                        "fc" => "idblk",
                        "placeholder" => "tambahkan idblk",
                        "value" => $form_data->idblk,
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
                        "title" => "jari",
                        "type" => "text",
                        "fc" => "jari",
                        "placeholder" => "tambahkan jari",
                        "value" => $form_data->jari,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "timenya",
                        "type" => "text",
                        "fc" => "timenya",
                        "placeholder" => "tambahkan timenya",
                        "value" => $form_data->timenya,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/datafinger'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

