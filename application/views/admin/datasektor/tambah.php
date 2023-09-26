<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan datasektor</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
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
                    <form action="<?= site_url('admin/datasektor/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "kode_jenis",
                        "type" => "text",
                        "fc" => "kode_jenis",
                        "placeholder" => "tambahkan kode_jenis",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "isi",
                        "type" => "text",
                        "fc" => "isi",
                        "placeholder" => "tambahkan isi",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "isi_taiwan",
                        "type" => "text",
                        "fc" => "isi_taiwan",
                        "placeholder" => "tambahkan isi_taiwan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "no_urut",
                        "type" => "text",
                        "fc" => "no_urut",
                        "placeholder" => "tambahkan no_urut",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jeniskelamin",
                        "type" => "text",
                        "fc" => "jeniskelamin",
                        "placeholder" => "tambahkan jeniskelamin",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/datasektor'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>