<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah skck_polres</h1>
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
                    <form action="<?= site_url('admin/skck_polres/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_skck",
                "value" => $form_data->id_skck,
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
                        "title" => "namaskck",
                        "type" => "text",
                        "fc" => "namaskck",
                        "placeholder" => "tambahkan namaskck",
                        "value" => $form_data->namaskck,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "pengajuan",
                        "type" => "text",
                        "fc" => "pengajuan",
                        "placeholder" => "tambahkan pengajuan",
                        "value" => $form_data->pengajuan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terima",
                        "type" => "text",
                        "fc" => "terima",
                        "placeholder" => "tambahkan terima",
                        "value" => $form_data->terima,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglexp",
                        "type" => "text",
                        "fc" => "tglexp",
                        "placeholder" => "tambahkan tglexp",
                        "value" => $form_data->tglexp,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statuspengajuan",
                        "type" => "text",
                        "fc" => "statuspengajuan",
                        "placeholder" => "tambahkan statuspengajuan",
                        "value" => $form_data->statuspengajuan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statusterima",
                        "type" => "text",
                        "fc" => "statusterima",
                        "placeholder" => "tambahkan statusterima",
                        "value" => $form_data->statusterima,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statusexp",
                        "type" => "text",
                        "fc" => "statusexp",
                        "placeholder" => "tambahkan statusexp",
                        "value" => $form_data->statusexp,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/skck_polres'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

