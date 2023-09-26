<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah blk_jadwal3_paket_detail</h1>
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
                    <form action="<?= site_url('admin/blk_jadwal3_paket_detail/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id",
                "value" => $form_data->id,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "hari",
                        "type" => "text",
                        "fc" => "hari",
                        "placeholder" => "tambahkan hari",
                        "value" => $form_data->hari,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jam",
                        "type" => "text",
                        "fc" => "jam",
                        "placeholder" => "tambahkan jam",
                        "value" => $form_data->jam,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "angkatan",
                        "type" => "text",
                        "fc" => "angkatan",
                        "placeholder" => "tambahkan angkatan",
                        "value" => $form_data->angkatan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "materi",
                        "type" => "text",
                        "fc" => "materi",
                        "placeholder" => "tambahkan materi",
                        "value" => $form_data->materi,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "paket_id",
                        "type" => "text",
                        "fc" => "paket_id",
                        "placeholder" => "tambahkan paket_id",
                        "value" => $form_data->paket_id,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "minggu_id",
                        "type" => "text",
                        "fc" => "minggu_id",
                        "placeholder" => "tambahkan minggu_id",
                        "value" => $form_data->minggu_id,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "created_at",
                        "type" => "text",
                        "fc" => "created_at",
                        "placeholder" => "tambahkan created_at",
                        "value" => $form_data->created_at,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "updated_at",
                        "type" => "text",
                        "fc" => "updated_at",
                        "placeholder" => "tambahkan updated_at",
                        "value" => $form_data->updated_at,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "deleted_at",
                        "type" => "text",
                        "fc" => "deleted_at",
                        "placeholder" => "tambahkan deleted_at",
                        "value" => $form_data->deleted_at,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_jadwal3_paket_detail'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

