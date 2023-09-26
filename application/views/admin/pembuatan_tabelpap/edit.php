<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah pembuatan_tabelpap</h1>
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
                    <form action="<?= site_url('admin/pembuatan_tabelpap/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_pembuatanpap",
                "value" => $form_data->id_pembuatanpap,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "tanggalpap",
                        "type" => "text",
                        "fc" => "tanggalpap",
                        "placeholder" => "tambahkan tanggalpap",
                        "value" => $form_data->tanggalpap,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nomorktkln",
                        "type" => "text",
                        "fc" => "nomorktkln",
                        "placeholder" => "tambahkan nomorktkln",
                        "value" => $form_data->nomorktkln,
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
                        "title" => "nomor",
                        "type" => "text",
                        "fc" => "nomor",
                        "placeholder" => "tambahkan nomor",
                        "value" => $form_data->nomor,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/pembuatan_tabelpap'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

