<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan upload_ttdt</h1>
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
                    <form action="<?= site_url('admin/upload_ttdt/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "pinho",
                        "type" => "text",
                        "fc" => "pinho",
                        "placeholder" => "tambahkan pinho",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "namadok",
                        "type" => "text",
                        "fc" => "namadok",
                        "placeholder" => "tambahkan namadok",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "penting",
                        "type" => "text",
                        "fc" => "penting",
                        "placeholder" => "tambahkan penting",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "cekdokumen",
                        "type" => "text",
                        "fc" => "cekdokumen",
                        "placeholder" => "tambahkan cekdokumen",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglterima",
                        "type" => "text",
                        "fc" => "tglterima",
                        "placeholder" => "tambahkan tglterima",
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
                        "title" => "tgl_input",
                        "type" => "text",
                        "fc" => "tgl_input",
                        "placeholder" => "tambahkan tgl_input",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/upload_ttdt'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>