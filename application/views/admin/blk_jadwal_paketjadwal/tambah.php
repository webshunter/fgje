<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan blk_jadwal_paketjadwal</h1>
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
                    <form action="<?= site_url('admin/blk_jadwal_paketjadwal/simpan') ?>" method="post" enctype="multipart/form-data">
                        
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
                        "title" => "jam",
                        "type" => "text",
                        "fc" => "jam",
                        "placeholder" => "tambahkan jam",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "minggu",
                        "type" => "text",
                        "fc" => "minggu",
                        "placeholder" => "tambahkan minggu",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "materi",
                        "type" => "text",
                        "fc" => "materi",
                        "placeholder" => "tambahkan materi",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "paket_id",
                        "type" => "text",
                        "fc" => "paket_id",
                        "placeholder" => "tambahkan paket_id",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ip_modified",
                        "type" => "text",
                        "fc" => "ip_modified",
                        "placeholder" => "tambahkan ip_modified",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "date_modified",
                        "type" => "text",
                        "fc" => "date_modified",
                        "placeholder" => "tambahkan date_modified",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "time_modified",
                        "type" => "text",
                        "fc" => "time_modified",
                        "placeholder" => "tambahkan time_modified",
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