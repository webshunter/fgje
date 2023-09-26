<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah surat_pengajuan</h1>
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
                    <form action="<?= site_url('admin/surat_pengajuan/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_surat_aju",
                "value" => $form_data->id_surat_aju,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "pptkis",
                        "type" => "text",
                        "fc" => "pptkis",
                        "placeholder" => "tambahkan pptkis",
                        "value" => $form_data->pptkis,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "lembaga",
                        "type" => "text",
                        "fc" => "lembaga",
                        "placeholder" => "tambahkan lembaga",
                        "value" => $form_data->lembaga,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "no_surat",
                        "type" => "text",
                        "fc" => "no_surat",
                        "placeholder" => "tambahkan no_surat",
                        "value" => $form_data->no_surat,
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
                          <a class="btn btn-default" href="<?= site_url('admin/surat_pengajuan'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

