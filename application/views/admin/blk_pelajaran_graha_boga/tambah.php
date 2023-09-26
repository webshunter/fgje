<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan blk_pelajaran_graha_boga</h1>
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
                    <form action="<?= site_url('admin/blk_pelajaran_graha_boga/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "kode_materi",
                        "type" => "text",
                        "fc" => "kode_materi",
                        "placeholder" => "tambahkan kode_materi",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama_materi",
                        "type" => "text",
                        "fc" => "nama_materi",
                        "placeholder" => "tambahkan nama_materi",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "buku_hal",
                        "type" => "text",
                        "fc" => "buku_hal",
                        "placeholder" => "tambahkan buku_hal",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "penjelasan",
                        "type" => "text",
                        "fc" => "penjelasan",
                        "placeholder" => "tambahkan penjelasan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "keterangan",
                        "type" => "text",
                        "fc" => "keterangan",
                        "placeholder" => "tambahkan keterangan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tipe_input",
                        "type" => "text",
                        "fc" => "tipe_input",
                        "placeholder" => "tambahkan tipe_input",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_pelajaran_graha_boga'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>