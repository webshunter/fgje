<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan surat_pernyataan</h1>
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
                    <form action="<?= site_url('admin/surat_pernyataan/simpan') ?>" method="post" enctype="multipart/form-data">
                        
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
                        "title" => "tempat",
                        "type" => "text",
                        "fc" => "tempat",
                        "placeholder" => "tambahkan tempat",
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
                        "title" => "alamat2",
                        "type" => "text",
                        "fc" => "alamat2",
                        "placeholder" => "tambahkan alamat2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tempat3",
                        "type" => "text",
                        "fc" => "tempat3",
                        "placeholder" => "tambahkan tempat3",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/surat_pernyataan'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>