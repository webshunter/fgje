<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan pembuatan_laporan</h1>
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
                    <form action="<?= site_url('admin/pembuatan_laporan/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "nomor",
                        "type" => "text",
                        "fc" => "nomor",
                        "placeholder" => "tambahkan nomor",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tanggal",
                        "type" => "text",
                        "fc" => "tanggal",
                        "placeholder" => "tambahkan tanggal",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglmulai",
                        "type" => "text",
                        "fc" => "tglmulai",
                        "placeholder" => "tambahkan tglmulai",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglakhir",
                        "type" => "text",
                        "fc" => "tglakhir",
                        "placeholder" => "tambahkan tglakhir",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "date",
                        "type" => "text",
                        "fc" => "date",
                        "placeholder" => "tambahkan date",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/pembuatan_laporan'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>