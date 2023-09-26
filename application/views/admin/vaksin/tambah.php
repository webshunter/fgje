<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan vaksin</h1>
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
                    <form action="<?= site_url('admin/vaksin/simpan') ?>" method="post" enctype="multipart/form-data">
                        
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
                        "title" => "nama1",
                        "type" => "text",
                        "fc" => "nama1",
                        "placeholder" => "tambahkan nama1",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl1",
                        "type" => "text",
                        "fc" => "tgl1",
                        "placeholder" => "tambahkan tgl1",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama2",
                        "type" => "text",
                        "fc" => "nama2",
                        "placeholder" => "tambahkan nama2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl2",
                        "type" => "text",
                        "fc" => "tgl2",
                        "placeholder" => "tambahkan tgl2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama3",
                        "type" => "text",
                        "fc" => "nama3",
                        "placeholder" => "tambahkan nama3",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl3",
                        "type" => "text",
                        "fc" => "tgl3",
                        "placeholder" => "tambahkan tgl3",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/vaksin'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>