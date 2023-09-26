<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan blk_formulir</h1>
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
                    <form action="<?= site_url('admin/blk_formulir/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "tgl_pengajuan",
                        "type" => "text",
                        "fc" => "tgl_pengajuan",
                        "placeholder" => "tambahkan tgl_pengajuan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_keluar",
                        "type" => "text",
                        "fc" => "tgl_keluar",
                        "placeholder" => "tambahkan tgl_keluar",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_ujk",
                        "type" => "text",
                        "fc" => "tgl_ujk",
                        "placeholder" => "tambahkan tgl_ujk",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tipe",
                        "type" => "text",
                        "fc" => "tipe",
                        "placeholder" => "tambahkan tipe",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "resi_no",
                        "type" => "text",
                        "fc" => "resi_no",
                        "placeholder" => "tambahkan resi_no",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_formulir'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>