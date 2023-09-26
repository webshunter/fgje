<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah blk_jadwalmateri</h1>
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
                    <form action="<?= site_url('admin/blk_jadwalmateri/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_blk_jadwalmateri",
                "value" => $form_data->id_blk_jadwalmateri,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "materi_id",
                        "type" => "text",
                        "fc" => "materi_id",
                        "placeholder" => "tambahkan materi_id",
                        "value" => $form_data->materi_id,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "instruktur_id",
                        "type" => "text",
                        "fc" => "instruktur_id",
                        "placeholder" => "tambahkan instruktur_id",
                        "value" => $form_data->instruktur_id,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jam_id",
                        "type" => "text",
                        "fc" => "jam_id",
                        "placeholder" => "tambahkan jam_id",
                        "value" => $form_data->jam_id,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kode_jadwal",
                        "type" => "text",
                        "fc" => "kode_jadwal",
                        "placeholder" => "tambahkan kode_jadwal",
                        "value" => $form_data->kode_jadwal,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kode_detail",
                        "type" => "text",
                        "fc" => "kode_detail",
                        "placeholder" => "tambahkan kode_detail",
                        "value" => $form_data->kode_detail,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_jadwalmateri'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

