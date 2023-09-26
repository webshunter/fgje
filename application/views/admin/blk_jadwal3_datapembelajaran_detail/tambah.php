<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan blk_jadwal3_datapembelajaran_detail</h1>
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
                    <form action="<?= site_url('admin/blk_jadwal3_datapembelajaran_detail/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "id_biodata",
                        "type" => "text",
                        "fc" => "id_biodata",
                        "placeholder" => "tambahkan id_biodata",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "datapembelajaran_id",
                        "type" => "text",
                        "fc" => "datapembelajaran_id",
                        "placeholder" => "tambahkan datapembelajaran_id",
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
                        "title" => "deleted_at",
                        "type" => "text",
                        "fc" => "deleted_at",
                        "placeholder" => "tambahkan deleted_at",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_jadwal3_datapembelajaran_detail'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>