<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan pembuatan_tabungan</h1>
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
                    <form action="<?= site_url('admin/pembuatan_tabungan/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "nomor",
                        "type" => "text",
                        "fc" => "nomor",
                        "placeholder" => "tambahkan nomor",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "lampiran",
                        "type" => "text",
                        "fc" => "lampiran",
                        "placeholder" => "tambahkan lampiran",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "perihal",
                        "type" => "text",
                        "fc" => "perihal",
                        "placeholder" => "tambahkan perihal",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jabatan",
                        "type" => "text",
                        "fc" => "jabatan",
                        "placeholder" => "tambahkan jabatan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kepada",
                        "type" => "text",
                        "fc" => "kepada",
                        "placeholder" => "tambahkan kepada",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_tki",
                        "type" => "text",
                        "fc" => "id_tki",
                        "placeholder" => "tambahkan id_tki",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/pembuatan_tabungan'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>