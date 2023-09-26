<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah notarisan</h1>
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
                    <form action="<?= site_url('admin/notarisan/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_notarisan",
                "value" => $form_data->id_notarisan,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "id_biodata",
                        "type" => "text",
                        "fc" => "id_biodata",
                        "placeholder" => "tambahkan id_biodata",
                        "value" => $form_data->id_biodata,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_nota",
                        "type" => "text",
                        "fc" => "tgl_nota",
                        "placeholder" => "tambahkan tgl_nota",
                        "value" => $form_data->tgl_nota,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama_nota",
                        "type" => "text",
                        "fc" => "nama_nota",
                        "placeholder" => "tambahkan nama_nota",
                        "value" => $form_data->nama_nota,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "hub_nota",
                        "type" => "text",
                        "fc" => "hub_nota",
                        "placeholder" => "tambahkan hub_nota",
                        "value" => $form_data->hub_nota,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "notelp",
                        "type" => "text",
                        "fc" => "notelp",
                        "placeholder" => "tambahkan notelp",
                        "value" => $form_data->notelp,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "khusus_nota",
                        "type" => "text",
                        "fc" => "khusus_nota",
                        "placeholder" => "tambahkan khusus_nota",
                        "value" => $form_data->khusus_nota,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/notarisan'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

