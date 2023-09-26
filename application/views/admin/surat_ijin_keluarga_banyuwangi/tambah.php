<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan surat_ijin_keluarga_banyuwangi</h1>
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
                    <form action="<?= site_url('admin/surat_ijin_keluarga_banyuwangi/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "id_tki",
                        "type" => "text",
                        "fc" => "id_tki",
                        "placeholder" => "tambahkan id_tki",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_keluarga",
                        "type" => "text",
                        "fc" => "id_keluarga",
                        "placeholder" => "tambahkan id_keluarga",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "noktp",
                        "type" => "text",
                        "fc" => "noktp",
                        "placeholder" => "tambahkan noktp",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tmp",
                        "type" => "text",
                        "fc" => "tmp",
                        "placeholder" => "tambahkan tmp",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl",
                        "type" => "text",
                        "fc" => "tgl",
                        "placeholder" => "tambahkan tgl",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "mengijinkan",
                        "type" => "text",
                        "fc" => "mengijinkan",
                        "placeholder" => "tambahkan mengijinkan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nopass",
                        "type" => "text",
                        "fc" => "nopass",
                        "placeholder" => "tambahkan nopass",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "alamat2",
                        "type" => "text",
                        "fc" => "alamat2",
                        "placeholder" => "tambahkan alamat2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tujuan",
                        "type" => "text",
                        "fc" => "tujuan",
                        "placeholder" => "tambahkan tujuan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "sebagai",
                        "type" => "text",
                        "fc" => "sebagai",
                        "placeholder" => "tambahkan sebagai",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/surat_ijin_keluarga_banyuwangi'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>