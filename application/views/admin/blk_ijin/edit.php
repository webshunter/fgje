<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah blk_ijin</h1>
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
                    <form action="<?= site_url('admin/blk_ijin/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_blk_ijin",
                "value" => $form_data->id_blk_ijin,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "id_biodata",
                        "type" => "text",
                        "fc" => "id_biodata",
                        "placeholder" => "tambahkan id_biodata",
                        "value" => $form_data->id_biodata,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_suntik_kb",
                        "type" => "text",
                        "fc" => "tgl_suntik_kb",
                        "placeholder" => "tambahkan tgl_suntik_kb",
                        "value" => $form_data->tgl_suntik_kb,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "masa_kb",
                        "type" => "text",
                        "fc" => "masa_kb",
                        "placeholder" => "tambahkan masa_kb",
                        "value" => $form_data->masa_kb,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "berakhir_kb",
                        "type" => "text",
                        "fc" => "berakhir_kb",
                        "placeholder" => "tambahkan berakhir_kb",
                        "value" => $form_data->berakhir_kb,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ket_kb",
                        "type" => "text",
                        "fc" => "ket_kb",
                        "placeholder" => "tambahkan ket_kb",
                        "value" => $form_data->ket_kb,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "status",
                        "type" => "text",
                        "fc" => "status",
                        "placeholder" => "tambahkan status",
                        "value" => $form_data->status,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_ijin'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

