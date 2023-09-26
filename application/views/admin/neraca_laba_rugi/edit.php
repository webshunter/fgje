<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah neraca_laba_rugi</h1>
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
                    <form action="<?= site_url('admin/neraca_laba_rugi/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_laba_rugi",
                "value" => $form_data->id_laba_rugi,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "id_laba_rugi",
                        "type" => "text",
                        "fc" => "id_laba_rugi",
                        "placeholder" => "tambahkan id_laba_rugi",
                        "value" => $form_data->id_laba_rugi,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tahun",
                        "type" => "text",
                        "fc" => "tahun",
                        "placeholder" => "tambahkan tahun",
                        "value" => $form_data->tahun,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "saldo_laba",
                        "type" => "text",
                        "fc" => "saldo_laba",
                        "placeholder" => "tambahkan saldo_laba",
                        "value" => $form_data->saldo_laba,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "laba_rugi_ditahan",
                        "type" => "text",
                        "fc" => "laba_rugi_ditahan",
                        "placeholder" => "tambahkan laba_rugi_ditahan",
                        "value" => $form_data->laba_rugi_ditahan,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/neraca_laba_rugi'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

