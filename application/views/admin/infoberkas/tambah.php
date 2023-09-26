<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan infoberkas</h1>
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
                    <form action="<?= site_url('admin/infoberkas/simpan') ?>" method="post" enctype="multipart/form-data">
                        
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
                        "title" => "tgl_dok_siap",
                        "type" => "text",
                        "fc" => "tgl_dok_siap",
                        "placeholder" => "tambahkan tgl_dok_siap",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "info_berkas",
                        "type" => "text",
                        "fc" => "info_berkas",
                        "placeholder" => "tambahkan info_berkas",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "hptki_berkas",
                        "type" => "text",
                        "fc" => "hptki_berkas",
                        "placeholder" => "tambahkan hptki_berkas",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama_ambil_berkas",
                        "type" => "text",
                        "fc" => "nama_ambil_berkas",
                        "placeholder" => "tambahkan nama_ambil_berkas",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama_hub_berkas",
                        "type" => "text",
                        "fc" => "nama_hub_berkas",
                        "placeholder" => "tambahkan nama_hub_berkas",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama_hp_berkas",
                        "type" => "text",
                        "fc" => "nama_hp_berkas",
                        "placeholder" => "tambahkan nama_hp_berkas",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama_terima_berkas",
                        "type" => "text",
                        "fc" => "nama_terima_berkas",
                        "placeholder" => "tambahkan nama_terima_berkas",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "rak_berkas",
                        "type" => "text",
                        "fc" => "rak_berkas",
                        "placeholder" => "tambahkan rak_berkas",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/infoberkas'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>