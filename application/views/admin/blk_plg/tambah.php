<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan blk_plg</h1>
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
                    <form action="<?= site_url('admin/blk_plg/simpan') ?>" method="post" enctype="multipart/form-data">
                        
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
                        "title" => "mulai_plg",
                        "type" => "text",
                        "fc" => "mulai_plg",
                        "placeholder" => "tambahkan mulai_plg",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kembali_plg",
                        "type" => "text",
                        "fc" => "kembali_plg",
                        "placeholder" => "tambahkan kembali_plg",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terlambat_plg",
                        "type" => "text",
                        "fc" => "terlambat_plg",
                        "placeholder" => "tambahkan terlambat_plg",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "hari_plg",
                        "type" => "text",
                        "fc" => "hari_plg",
                        "placeholder" => "tambahkan hari_plg",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ket_plg",
                        "type" => "text",
                        "fc" => "ket_plg",
                        "placeholder" => "tambahkan ket_plg",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_plg'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>