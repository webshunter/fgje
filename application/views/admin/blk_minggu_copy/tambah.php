<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan blk_minggu_copy</h1>
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
                    <form action="<?= site_url('admin/blk_minggu_copy/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "kode_minggu",
                        "type" => "text",
                        "fc" => "kode_minggu",
                        "placeholder" => "tambahkan kode_minggu",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "minggu",
                        "type" => "text",
                        "fc" => "minggu",
                        "placeholder" => "tambahkan minggu",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ket",
                        "type" => "text",
                        "fc" => "ket",
                        "placeholder" => "tambahkan ket",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_minggu_copy'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>