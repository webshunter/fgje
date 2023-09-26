<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan blk_penilaian_fisik_mental</h1>
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
                    <form action="<?= site_url('admin/blk_penilaian_fisik_mental/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "idbio",
                        "type" => "text",
                        "fc" => "idbio",
                        "placeholder" => "tambahkan idbio",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_ang",
                        "type" => "text",
                        "fc" => "tgl_ang",
                        "placeholder" => "tambahkan tgl_ang",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "instruktur",
                        "type" => "text",
                        "fc" => "instruktur",
                        "placeholder" => "tambahkan instruktur",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_nilai",
                        "type" => "text",
                        "fc" => "id_nilai",
                        "placeholder" => "tambahkan id_nilai",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_materi",
                        "type" => "text",
                        "fc" => "id_materi",
                        "placeholder" => "tambahkan id_materi",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_penilaian_fisik_mental'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>