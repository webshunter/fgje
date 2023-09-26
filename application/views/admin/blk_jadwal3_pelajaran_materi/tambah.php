<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan blk_jadwal3_pelajaran_materi</h1>
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
                    <form action="<?= site_url('admin/blk_jadwal3_pelajaran_materi/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "kode",
                        "type" => "text",
                        "fc" => "kode",
                        "placeholder" => "tambahkan kode",
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
                        "title" => "tipe_input_nilai",
                        "type" => "text",
                        "fc" => "tipe_input_nilai",
                        "placeholder" => "tambahkan tipe_input_nilai",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "pelajaran_revisi_id",
                        "type" => "text",
                        "fc" => "pelajaran_revisi_id",
                        "placeholder" => "tambahkan pelajaran_revisi_id",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "created_at",
                        "type" => "text",
                        "fc" => "created_at",
                        "placeholder" => "tambahkan created_at",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "updated_at",
                        "type" => "text",
                        "fc" => "updated_at",
                        "placeholder" => "tambahkan updated_at",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "deleted_at",
                        "type" => "text",
                        "fc" => "deleted_at",
                        "placeholder" => "tambahkan deleted_at",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_jadwal3_pelajaran_materi'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>