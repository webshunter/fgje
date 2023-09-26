<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah blk_hasilpkl</h1>
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
                    <form action="<?= site_url('admin/blk_hasilpkl/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_pkl",
                "value" => $form_data->id_pkl,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "id_personalblk",
                        "type" => "text",
                        "fc" => "id_personalblk",
                        "placeholder" => "tambahkan id_personalblk",
                        "value" => $form_data->id_personalblk,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_mulai",
                        "type" => "text",
                        "fc" => "tgl_mulai",
                        "placeholder" => "tambahkan tgl_mulai",
                        "value" => $form_data->tgl_mulai,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_selesai",
                        "type" => "text",
                        "fc" => "tgl_selesai",
                        "placeholder" => "tambahkan tgl_selesai",
                        "value" => $form_data->tgl_selesai,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jml_hari",
                        "type" => "text",
                        "fc" => "jml_hari",
                        "placeholder" => "tambahkan jml_hari",
                        "value" => $form_data->jml_hari,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "pkl_ke",
                        "type" => "text",
                        "fc" => "pkl_ke",
                        "placeholder" => "tambahkan pkl_ke",
                        "value" => $form_data->pkl_ke,
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
                        "title" => "id_tempatpkl",
                        "type" => "text",
                        "fc" => "id_tempatpkl",
                        "placeholder" => "tambahkan id_tempatpkl",
                        "value" => $form_data->id_tempatpkl,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "no_resi",
                        "type" => "text",
                        "fc" => "no_resi",
                        "placeholder" => "tambahkan no_resi",
                        "value" => $form_data->no_resi,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nominal",
                        "type" => "text",
                        "fc" => "nominal",
                        "placeholder" => "tambahkan nominal",
                        "value" => $form_data->nominal,
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
                        "title" => "catatan",
                        "type" => "text",
                        "fc" => "catatan",
                        "placeholder" => "tambahkan catatan",
                        "value" => $form_data->catatan,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_hasilpkl'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

