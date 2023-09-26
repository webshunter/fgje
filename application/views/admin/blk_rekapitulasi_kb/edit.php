<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah blk_rekapitulasi_kb</h1>
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
                    <form action="<?= site_url('admin/blk_rekapitulasi_kb/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id",
                "value" => $form_data->id,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "tanggal_start_kb",
                        "type" => "text",
                        "fc" => "tanggal_start_kb",
                        "placeholder" => "tambahkan tanggal_start_kb",
                        "value" => $form_data->tanggal_start_kb,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tanggal_ending_kb",
                        "type" => "text",
                        "fc" => "tanggal_ending_kb",
                        "placeholder" => "tambahkan tanggal_ending_kb",
                        "value" => $form_data->tanggal_ending_kb,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tanggal_input",
                        "type" => "text",
                        "fc" => "tanggal_input",
                        "placeholder" => "tambahkan tanggal_input",
                        "value" => $form_data->tanggal_input,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tanggal_update",
                        "type" => "text",
                        "fc" => "tanggal_update",
                        "placeholder" => "tambahkan tanggal_update",
                        "value" => $form_data->tanggal_update,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_rekapitulasi_kb'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

