<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan blk_sertifikat</h1>
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
                    <form action="<?= site_url('admin/blk_sertifikat/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "sektor",
                        "type" => "text",
                        "fc" => "sektor",
                        "placeholder" => "tambahkan sektor",
                    ])
                ?>
            
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
                        "title" => "no_urut_sertifikat",
                        "type" => "text",
                        "fc" => "no_urut_sertifikat",
                        "placeholder" => "tambahkan no_urut_sertifikat",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tipe_download",
                        "type" => "text",
                        "fc" => "tipe_download",
                        "placeholder" => "tambahkan tipe_download",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglawal",
                        "type" => "text",
                        "fc" => "tglawal",
                        "placeholder" => "tambahkan tglawal",
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
                        "title" => "date_created",
                        "type" => "text",
                        "fc" => "date_created",
                        "placeholder" => "tambahkan date_created",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_sertifikat'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>