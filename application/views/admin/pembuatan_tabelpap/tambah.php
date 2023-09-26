<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan pembuatan_tabelpap</h1>
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
                    <form action="<?= site_url('admin/pembuatan_tabelpap/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "tanggalpap",
                        "type" => "text",
                        "fc" => "tanggalpap",
                        "placeholder" => "tambahkan tanggalpap",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nomorktkln",
                        "type" => "text",
                        "fc" => "nomorktkln",
                        "placeholder" => "tambahkan nomorktkln",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "daerah",
                        "type" => "text",
                        "fc" => "daerah",
                        "placeholder" => "tambahkan daerah",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tanggal",
                        "type" => "text",
                        "fc" => "tanggal",
                        "placeholder" => "tambahkan tanggal",
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
                        "title" => "nomor",
                        "type" => "text",
                        "fc" => "nomor",
                        "placeholder" => "tambahkan nomor",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/pembuatan_tabelpap'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>