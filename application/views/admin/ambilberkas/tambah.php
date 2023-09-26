<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan ambilberkas</h1>
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
                    <form action="<?= site_url('admin/ambilberkas/simpan') ?>" method="post" enctype="multipart/form-data">
                        
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
                        "title" => "tgl_ambil_dok",
                        "type" => "text",
                        "fc" => "tgl_ambil_dok",
                        "placeholder" => "tambahkan tgl_ambil_dok",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama_ambil_dok",
                        "type" => "text",
                        "fc" => "nama_ambil_dok",
                        "placeholder" => "tambahkan nama_ambil_dok",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "hub_ambil_dok",
                        "type" => "text",
                        "fc" => "hub_ambil_dok",
                        "placeholder" => "tambahkan hub_ambil_dok",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tel_ambil_dok",
                        "type" => "text",
                        "fc" => "tel_ambil_dok",
                        "placeholder" => "tambahkan tel_ambil_dok",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama_serah_dok",
                        "type" => "text",
                        "fc" => "nama_serah_dok",
                        "placeholder" => "tambahkan nama_serah_dok",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "dokdiserahkan",
                        "type" => "text",
                        "fc" => "dokdiserahkan",
                        "placeholder" => "tambahkan dokdiserahkan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tanggal_input",
                        "type" => "text",
                        "fc" => "tanggal_input",
                        "placeholder" => "tambahkan tanggal_input",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/ambilberkas'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>