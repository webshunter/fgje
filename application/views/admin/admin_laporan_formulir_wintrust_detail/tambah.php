<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan admin_laporan_formulir_wintrust_detail</h1>
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
                    <form action="<?= site_url('admin/admin_laporan_formulir_wintrust_detail/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "idbio",
                        "type" => "text",
                        "fc" => "idbio",
                        "placeholder" => "tambahkan idbio",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "agen_id",
                        "type" => "text",
                        "fc" => "agen_id",
                        "placeholder" => "tambahkan agen_id",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "penerima_id",
                        "type" => "text",
                        "fc" => "penerima_id",
                        "placeholder" => "tambahkan penerima_id",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ntd",
                        "type" => "text",
                        "fc" => "ntd",
                        "placeholder" => "tambahkan ntd",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "formulir_wintrust_id",
                        "type" => "text",
                        "fc" => "formulir_wintrust_id",
                        "placeholder" => "tambahkan formulir_wintrust_id",
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
                          <a class="btn btn-default" href="<?= site_url('admin/admin_laporan_formulir_wintrust_detail'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>