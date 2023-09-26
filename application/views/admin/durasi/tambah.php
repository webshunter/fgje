<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan durasi</h1>
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
                    <form action="<?= site_url('admin/durasi/simpan') ?>" method="post" enctype="multipart/form-data">
                        
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
                        "title" => "tgl_update",
                        "type" => "text",
                        "fc" => "tgl_update",
                        "placeholder" => "tambahkan tgl_update",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_habisdurasi",
                        "type" => "text",
                        "fc" => "tgl_habisdurasi",
                        "placeholder" => "tambahkan tgl_habisdurasi",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_registrasi",
                        "type" => "text",
                        "fc" => "tgl_registrasi",
                        "placeholder" => "tambahkan tgl_registrasi",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jml_hari",
                        "type" => "text",
                        "fc" => "jml_hari",
                        "placeholder" => "tambahkan jml_hari",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "status",
                        "type" => "text",
                        "fc" => "status",
                        "placeholder" => "tambahkan status",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/durasi'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>