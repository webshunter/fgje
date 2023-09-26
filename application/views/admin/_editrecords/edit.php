<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah _editrecords</h1>
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
                    <form action="<?= site_url('admin/_editrecords/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id",
                "value" => $form_data->id,
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
                        "title" => "table",
                        "type" => "text",
                        "fc" => "table",
                        "placeholder" => "tambahkan table",
                        "value" => $form_data->table,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "source_id",
                        "type" => "text",
                        "fc" => "source_id",
                        "placeholder" => "tambahkan source_id",
                        "value" => $form_data->source_id,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "datafield",
                        "type" => "text",
                        "fc" => "datafield",
                        "placeholder" => "tambahkan datafield",
                        "value" => $form_data->datafield,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "datavalue",
                        "type" => "text",
                        "fc" => "datavalue",
                        "placeholder" => "tambahkan datavalue",
                        "value" => $form_data->datavalue,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/_editrecords'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

