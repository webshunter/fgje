<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah surat_kerja</h1>
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
                    <form action="<?= site_url('admin/surat_kerja/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_kerja",
                "value" => $form_data->id_kerja,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "id_majikan",
                        "type" => "text",
                        "fc" => "id_majikan",
                        "placeholder" => "tambahkan id_majikan",
                        "value" => $form_data->id_majikan,
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
                        "title" => "nopass",
                        "type" => "text",
                        "fc" => "nopass",
                        "placeholder" => "tambahkan nopass",
                        "value" => $form_data->nopass,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jmanak",
                        "type" => "text",
                        "fc" => "jmanak",
                        "placeholder" => "tambahkan jmanak",
                        "value" => $form_data->jmanak,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_keluarga",
                        "type" => "text",
                        "fc" => "id_keluarga",
                        "placeholder" => "tambahkan id_keluarga",
                        "value" => $form_data->id_keluarga,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "alamat2",
                        "type" => "text",
                        "fc" => "alamat2",
                        "placeholder" => "tambahkan alamat2",
                        "value" => $form_data->alamat2,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "hp2",
                        "type" => "text",
                        "fc" => "hp2",
                        "placeholder" => "tambahkan hp2",
                        "value" => $form_data->hp2,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "hubungan2",
                        "type" => "text",
                        "fc" => "hubungan2",
                        "placeholder" => "tambahkan hubungan2",
                        "value" => $form_data->hubungan2,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/surat_kerja'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

