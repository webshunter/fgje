<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah pengantar_ppap</h1>
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
                    <form action="<?= site_url('admin/pengantar_ppap/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_ppap",
                "value" => $form_data->id_ppap,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "nomor_2",
                        "type" => "text",
                        "fc" => "nomor_2",
                        "placeholder" => "tambahkan nomor_2",
                        "value" => $form_data->nomor_2,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tanggal_2",
                        "type" => "text",
                        "fc" => "tanggal_2",
                        "placeholder" => "tambahkan tanggal_2",
                        "value" => $form_data->tanggal_2,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tki_2",
                        "type" => "text",
                        "fc" => "tki_2",
                        "placeholder" => "tambahkan tki_2",
                        "value" => $form_data->tki_2,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/pengantar_ppap'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

