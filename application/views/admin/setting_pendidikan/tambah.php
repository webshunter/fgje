<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan setting_pendidikan</h1>
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
                    <form action="<?= site_url('admin/setting_pendidikan/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "k1",
                        "type" => "text",
                        "fc" => "k1",
                        "placeholder" => "tambahkan k1",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "k2",
                        "type" => "text",
                        "fc" => "k2",
                        "placeholder" => "tambahkan k2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "k3",
                        "type" => "text",
                        "fc" => "k3",
                        "placeholder" => "tambahkan k3",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/setting_pendidikan'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>