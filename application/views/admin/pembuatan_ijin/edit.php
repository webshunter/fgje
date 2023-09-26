<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah pembuatan_ijin</h1>
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
                    <form action="<?= site_url('admin/pembuatan_ijin/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_pembuatan",
                "value" => $form_data->id_pembuatan,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "nomor",
                        "type" => "text",
                        "fc" => "nomor",
                        "placeholder" => "tambahkan nomor",
                        "value" => $form_data->nomor,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "lampiran",
                        "type" => "text",
                        "fc" => "lampiran",
                        "placeholder" => "tambahkan lampiran",
                        "value" => $form_data->lampiran,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tampilkan",
                        "type" => "text",
                        "fc" => "tampilkan",
                        "placeholder" => "tambahkan tampilkan",
                        "value" => $form_data->tampilkan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "perihal",
                        "type" => "text",
                        "fc" => "perihal",
                        "placeholder" => "tambahkan perihal",
                        "value" => $form_data->perihal,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kepada",
                        "type" => "text",
                        "fc" => "kepada",
                        "placeholder" => "tambahkan kepada",
                        "value" => $form_data->kepada,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "imigrasi",
                        "type" => "text",
                        "fc" => "imigrasi",
                        "placeholder" => "tambahkan imigrasi",
                        "value" => $form_data->imigrasi,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_tki",
                        "type" => "text",
                        "fc" => "id_tki",
                        "placeholder" => "tambahkan id_tki",
                        "value" => $form_data->id_tki,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jabatan",
                        "type" => "text",
                        "fc" => "jabatan",
                        "placeholder" => "tambahkan jabatan",
                        "value" => $form_data->jabatan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "daerah",
                        "type" => "text",
                        "fc" => "daerah",
                        "placeholder" => "tambahkan daerah",
                        "value" => $form_data->daerah,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tanggal",
                        "type" => "text",
                        "fc" => "tanggal",
                        "placeholder" => "tambahkan tanggal",
                        "value" => $form_data->tanggal,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/pembuatan_ijin'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

