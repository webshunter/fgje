<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah datanamadesa</h1>
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
                    <form action="<?= site_url('admin/datanamadesa/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_namadesa",
                "value" => $form_data->id_namadesa,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "namadesa",
                        "type" => "text",
                        "fc" => "namadesa",
                        "placeholder" => "tambahkan namadesa",
                        "value" => $form_data->namadesa,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "alamatdesa",
                        "type" => "text",
                        "fc" => "alamatdesa",
                        "placeholder" => "tambahkan alamatdesa",
                        "value" => $form_data->alamatdesa,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/datanamadesa'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

