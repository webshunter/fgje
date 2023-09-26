<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan pengajuan_ktkln</h1>
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
                    <form action="<?= site_url('admin/pengajuan_ktkln/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "nomor_2",
                        "type" => "text",
                        "fc" => "nomor_2",
                        "placeholder" => "tambahkan nomor_2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kepada_2",
                        "type" => "text",
                        "fc" => "kepada_2",
                        "placeholder" => "tambahkan kepada_2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tki_2",
                        "type" => "text",
                        "fc" => "tki_2",
                        "placeholder" => "tambahkan tki_2",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/pengajuan_ktkln'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>