<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah pengaduan</h1>
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
                    <form action="<?= site_url('admin/pengaduan/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_peng",
                "value" => $form_data->id_peng,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "judul",
                        "type" => "text",
                        "fc" => "judul",
                        "placeholder" => "tambahkan judul",
                        "value" => $form_data->judul,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "isi",
                        "type" => "text",
                        "fc" => "isi",
                        "placeholder" => "tambahkan isi",
                        "value" => $form_data->isi,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jenis_peng",
                        "type" => "text",
                        "fc" => "jenis_peng",
                        "placeholder" => "tambahkan jenis_peng",
                        "value" => $form_data->jenis_peng,
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
            
                <?=
                    form::input([
                        "title" => "id_user",
                        "type" => "text",
                        "fc" => "id_user",
                        "placeholder" => "tambahkan id_user",
                        "value" => $form_data->id_user,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nm_user",
                        "type" => "text",
                        "fc" => "nm_user",
                        "placeholder" => "tambahkan nm_user",
                        "value" => $form_data->nm_user,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/pengaduan'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

