<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan blk_jadwal3_paket</h1>
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
                    <form action="<?= site_url('admin/blk_jadwal3_paket/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "nama_paket",
                        "type" => "text",
                        "fc" => "nama_paket",
                        "placeholder" => "tambahkan nama_paket",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "pelajaran_id",
                        "type" => "text",
                        "fc" => "pelajaran_id",
                        "placeholder" => "tambahkan pelajaran_id",
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
                        "title" => "detail",
                        "type" => "text",
                        "fc" => "detail",
                        "placeholder" => "tambahkan detail",
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
                          <a class="btn btn-default" href="<?= site_url('admin/blk_jadwal3_paket'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>