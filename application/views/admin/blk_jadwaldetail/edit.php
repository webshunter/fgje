<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah blk_jadwaldetail</h1>
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
                    <form action="<?= site_url('admin/blk_jadwaldetail/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_blk_detailjadwal",
                "value" => $form_data->id_blk_detailjadwal,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "hari_id",
                        "type" => "text",
                        "fc" => "hari_id",
                        "placeholder" => "tambahkan hari_id",
                        "value" => $form_data->hari_id,
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
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_jadwaldetail'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

