<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah blk_jadwal_data_tki</h1>
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
                    <form action="<?= site_url('admin/blk_jadwal_data_tki/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_jadwal_data_tki",
                "value" => $form_data->id_jadwal_data_tki,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "biodata_id",
                        "type" => "text",
                        "fc" => "biodata_id",
                        "placeholder" => "tambahkan biodata_id",
                        "value" => $form_data->biodata_id,
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
                        "title" => "hari",
                        "type" => "text",
                        "fc" => "hari",
                        "placeholder" => "tambahkan hari",
                        "value" => $form_data->hari,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tdk_hadir",
                        "type" => "text",
                        "fc" => "tdk_hadir",
                        "placeholder" => "tambahkan tdk_hadir",
                        "value" => $form_data->tdk_hadir,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "alasan",
                        "type" => "text",
                        "fc" => "alasan",
                        "placeholder" => "tambahkan alasan",
                        "value" => $form_data->alasan,
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
                        "title" => "tipe_data",
                        "type" => "text",
                        "fc" => "tipe_data",
                        "placeholder" => "tambahkan tipe_data",
                        "value" => $form_data->tipe_data,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nonaktif_flag",
                        "type" => "text",
                        "fc" => "nonaktif_flag",
                        "placeholder" => "tambahkan nonaktif_flag",
                        "value" => $form_data->nonaktif_flag,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jadwal_paketjadwal_id",
                        "type" => "text",
                        "fc" => "jadwal_paketjadwal_id",
                        "placeholder" => "tambahkan jadwal_paketjadwal_id",
                        "value" => $form_data->jadwal_paketjadwal_id,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jadwal_data_id",
                        "type" => "text",
                        "fc" => "jadwal_data_id",
                        "placeholder" => "tambahkan jadwal_data_id",
                        "value" => $form_data->jadwal_data_id,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_jadwal_data_tki'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

