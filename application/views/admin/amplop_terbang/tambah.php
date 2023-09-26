<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan amplop_terbang</h1>
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
                    <form action="<?= site_url('admin/amplop_terbang/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "tanggal_awal",
                        "type" => "text",
                        "fc" => "tanggal_awal",
                        "placeholder" => "tambahkan tanggal_awal",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tanggal_akhir",
                        "type" => "text",
                        "fc" => "tanggal_akhir",
                        "placeholder" => "tambahkan tanggal_akhir",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "pilih_tipe",
                        "type" => "text",
                        "fc" => "pilih_tipe",
                        "placeholder" => "tambahkan pilih_tipe",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/amplop_terbang'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>