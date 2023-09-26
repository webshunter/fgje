<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah _records</h1>
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
                    <form action="<?= site_url('admin/_records/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id",
                "value" => $form_data->id,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "tipe",
                        "type" => "text",
                        "fc" => "tipe",
                        "placeholder" => "tambahkan tipe",
                        "value" => $form_data->tipe,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "date",
                        "type" => "text",
                        "fc" => "date",
                        "placeholder" => "tambahkan date",
                        "value" => $form_data->date,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "table_name",
                        "type" => "text",
                        "fc" => "table_name",
                        "placeholder" => "tambahkan table_name",
                        "value" => $form_data->table_name,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "table_id",
                        "type" => "text",
                        "fc" => "table_id",
                        "placeholder" => "tambahkan table_id",
                        "value" => $form_data->table_id,
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
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/_records'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

