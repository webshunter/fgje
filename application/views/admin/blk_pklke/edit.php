<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah blk_pklke</h1>
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
                    <form action="<?= site_url('admin/blk_pklke/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_pklke",
                "value" => $form_data->id_pklke,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "id_personalblk",
                        "type" => "text",
                        "fc" => "id_personalblk",
                        "placeholder" => "tambahkan id_personalblk",
                        "value" => $form_data->id_personalblk,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nonext",
                        "type" => "text",
                        "fc" => "nonext",
                        "placeholder" => "tambahkan nonext",
                        "value" => $form_data->nonext,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_pklke'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

