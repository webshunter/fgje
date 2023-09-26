<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah pengantar_pktkln</h1>
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
                    <form action="<?= site_url('admin/pengantar_pktkln/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_pktkln",
                "value" => $form_data->id_pktkln,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "nomor_3",
                        "type" => "text",
                        "fc" => "nomor_3",
                        "placeholder" => "tambahkan nomor_3",
                        "value" => $form_data->nomor_3,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tki_3",
                        "type" => "text",
                        "fc" => "tki_3",
                        "placeholder" => "tambahkan tki_3",
                        "value" => $form_data->tki_3,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/pengantar_pktkln'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

