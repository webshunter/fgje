<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan legalitas</h1>
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
                    <form action="<?= site_url('admin/legalitas/simpan') ?>" method="post" enctype="multipart/form-data">
                        
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
                        "title" => "tgl_legal",
                        "type" => "text",
                        "fc" => "tgl_legal",
                        "placeholder" => "tambahkan tgl_legal",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama_legal",
                        "type" => "text",
                        "fc" => "nama_legal",
                        "placeholder" => "tambahkan nama_legal",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "hub_legal",
                        "type" => "text",
                        "fc" => "hub_legal",
                        "placeholder" => "tambahkan hub_legal",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "notelp",
                        "type" => "text",
                        "fc" => "notelp",
                        "placeholder" => "tambahkan notelp",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "khusus_legal",
                        "type" => "text",
                        "fc" => "khusus_legal",
                        "placeholder" => "tambahkan khusus_legal",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/legalitas'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>