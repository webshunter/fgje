<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah blk_kejadian</h1>
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
                    <form action="<?= site_url('admin/blk_kejadian/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id",
                "value" => $form_data->id,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "idbio",
                        "type" => "text",
                        "fc" => "idbio",
                        "placeholder" => "tambahkan idbio",
                        "value" => $form_data->idbio,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tanggal",
                        "type" => "text",
                        "fc" => "tanggal",
                        "placeholder" => "tambahkan tanggal",
                        "value" => $form_data->tanggal,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kejadian",
                        "type" => "text",
                        "fc" => "kejadian",
                        "placeholder" => "tambahkan kejadian",
                        "value" => $form_data->kejadian,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "adm",
                        "type" => "text",
                        "fc" => "adm",
                        "placeholder" => "tambahkan adm",
                        "value" => $form_data->adm,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "mark",
                        "type" => "text",
                        "fc" => "mark",
                        "placeholder" => "tambahkan mark",
                        "value" => $form_data->mark,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "blk",
                        "type" => "text",
                        "fc" => "blk",
                        "placeholder" => "tambahkan blk",
                        "value" => $form_data->blk,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_kejadian'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

