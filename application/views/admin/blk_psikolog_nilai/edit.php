<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah blk_psikolog_nilai</h1>
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
                    <form action="<?= site_url('admin/blk_psikolog_nilai/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id",
                "value" => $form_data->id,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "psikolog_id",
                        "type" => "text",
                        "fc" => "psikolog_id",
                        "placeholder" => "tambahkan psikolog_id",
                        "value" => $form_data->psikolog_id,
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
                        "title" => "nilai",
                        "type" => "text",
                        "fc" => "nilai",
                        "placeholder" => "tambahkan nilai",
                        "value" => $form_data->nilai,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_psikolog_nilai'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

