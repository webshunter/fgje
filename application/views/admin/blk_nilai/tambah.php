<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan blk_nilai</h1>
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
                    <form action="<?= site_url('admin/blk_nilai/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "kode_nilai",
                        "type" => "text",
                        "fc" => "kode_nilai",
                        "placeholder" => "tambahkan kode_nilai",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nilai",
                        "type" => "text",
                        "fc" => "nilai",
                        "placeholder" => "tambahkan nilai",
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
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_nilai'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>