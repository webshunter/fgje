<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah blk_jadwal_paketjadwal</h1>
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
                    <form action="<?= site_url('admin/blk_jadwal_paketjadwal/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_jadwal_paket_jadwal",
                "value" => $form_data->id_jadwal_paket_jadwal,
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
                        "title" => "minggu",
                        "type" => "text",
                        "fc" => "minggu",
                        "placeholder" => "tambahkan minggu",
                        "value" => $form_data->minggu,
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
                        "title" => "ip_modified",
                        "type" => "text",
                        "fc" => "ip_modified",
                        "placeholder" => "tambahkan ip_modified",
                        "value" => $form_data->ip_modified,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "date_modified",
                        "type" => "text",
                        "fc" => "date_modified",
                        "placeholder" => "tambahkan date_modified",
                        "value" => $form_data->date_modified,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "time_modified",
                        "type" => "text",
                        "fc" => "time_modified",
                        "placeholder" => "tambahkan time_modified",
                        "value" => $form_data->time_modified,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_jadwal_paketjadwal'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

