<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan blk_no_ranjang_history_copy</h1>
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
                    <form action="<?= site_url('admin/blk_no_ranjang_history_copy/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "nodaftar",
                        "type" => "text",
                        "fc" => "nodaftar",
                        "placeholder" => "tambahkan nodaftar",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ranjangno",
                        "type" => "text",
                        "fc" => "ranjangno",
                        "placeholder" => "tambahkan ranjangno",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tanggal_mulai",
                        "type" => "text",
                        "fc" => "tanggal_mulai",
                        "placeholder" => "tambahkan tanggal_mulai",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tanggal_selesai",
                        "type" => "text",
                        "fc" => "tanggal_selesai",
                        "placeholder" => "tambahkan tanggal_selesai",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_no_ranjang_history_copy'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>