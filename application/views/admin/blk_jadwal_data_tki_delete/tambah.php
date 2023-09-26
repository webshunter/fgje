<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan blk_jadwal_data_tki_delete</h1>
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
                    <form action="<?= site_url('admin/blk_jadwal_data_tki_delete/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "biodata_id",
                        "type" => "text",
                        "fc" => "biodata_id",
                        "placeholder" => "tambahkan biodata_id",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "angkatan",
                        "type" => "text",
                        "fc" => "angkatan",
                        "placeholder" => "tambahkan angkatan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "hari",
                        "type" => "text",
                        "fc" => "hari",
                        "placeholder" => "tambahkan hari",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tdk_hadir",
                        "type" => "text",
                        "fc" => "tdk_hadir",
                        "placeholder" => "tambahkan tdk_hadir",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jam",
                        "type" => "text",
                        "fc" => "jam",
                        "placeholder" => "tambahkan jam",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tipe_data",
                        "type" => "text",
                        "fc" => "tipe_data",
                        "placeholder" => "tambahkan tipe_data",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nonaktif_flag",
                        "type" => "text",
                        "fc" => "nonaktif_flag",
                        "placeholder" => "tambahkan nonaktif_flag",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jadwal_paketjadwal_id",
                        "type" => "text",
                        "fc" => "jadwal_paketjadwal_id",
                        "placeholder" => "tambahkan jadwal_paketjadwal_id",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jadwal_data_id",
                        "type" => "text",
                        "fc" => "jadwal_data_id",
                        "placeholder" => "tambahkan jadwal_data_id",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jadwal_data_tki_id",
                        "type" => "text",
                        "fc" => "jadwal_data_tki_id",
                        "placeholder" => "tambahkan jadwal_data_tki_id",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_jadwal_data_tki_delete'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>