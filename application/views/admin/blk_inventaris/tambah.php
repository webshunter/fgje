<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan blk_inventaris</h1>
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
                    <form action="<?= site_url('admin/blk_inventaris/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "tglmasuk",
                        "type" => "text",
                        "fc" => "tglmasuk",
                        "placeholder" => "tambahkan tglmasuk",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_barang",
                        "type" => "text",
                        "fc" => "id_barang",
                        "placeholder" => "tambahkan id_barang",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglkeluar",
                        "type" => "text",
                        "fc" => "tglkeluar",
                        "placeholder" => "tambahkan tglkeluar",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jumlah",
                        "type" => "text",
                        "fc" => "jumlah",
                        "placeholder" => "tambahkan jumlah",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jumlahkeluar",
                        "type" => "text",
                        "fc" => "jumlahkeluar",
                        "placeholder" => "tambahkan jumlahkeluar",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "pemohon",
                        "type" => "text",
                        "fc" => "pemohon",
                        "placeholder" => "tambahkan pemohon",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_inventaris'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>