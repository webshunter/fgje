<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah blk_kb</h1>
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
                    <form action="<?= site_url('admin/blk_kb/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_kb",
                "value" => $form_data->id_kb,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "nodaftar",
                        "type" => "text",
                        "fc" => "nodaftar",
                        "placeholder" => "tambahkan nodaftar",
                        "value" => $form_data->nodaftar,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_jenis_kb",
                        "type" => "text",
                        "fc" => "id_jenis_kb",
                        "placeholder" => "tambahkan id_jenis_kb",
                        "value" => $form_data->id_jenis_kb,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_suntik",
                        "type" => "text",
                        "fc" => "tgl_suntik",
                        "placeholder" => "tambahkan tgl_suntik",
                        "value" => $form_data->tgl_suntik,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kb_suntik",
                        "type" => "text",
                        "fc" => "kb_suntik",
                        "placeholder" => "tambahkan kb_suntik",
                        "value" => $form_data->kb_suntik,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "masa_kadaluwarsa",
                        "type" => "text",
                        "fc" => "masa_kadaluwarsa",
                        "placeholder" => "tambahkan masa_kadaluwarsa",
                        "value" => $form_data->masa_kadaluwarsa,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_instruktur",
                        "type" => "text",
                        "fc" => "id_instruktur",
                        "placeholder" => "tambahkan id_instruktur",
                        "value" => $form_data->id_instruktur,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ket",
                        "type" => "text",
                        "fc" => "ket",
                        "placeholder" => "tambahkan ket",
                        "value" => $form_data->ket,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_kb'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

