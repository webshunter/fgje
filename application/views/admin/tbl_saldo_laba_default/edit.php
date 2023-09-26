<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah tbl_saldo_laba_default</h1>
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
                    <form action="<?= site_url('admin/tbl_saldo_laba_default/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_saldo_laba",
                "value" => $form_data->id_saldo_laba,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "id_saldo_laba",
                        "type" => "text",
                        "fc" => "id_saldo_laba",
                        "placeholder" => "tambahkan id_saldo_laba",
                        "value" => $form_data->id_saldo_laba,
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
                        "title" => "tgl",
                        "type" => "text",
                        "fc" => "tgl",
                        "placeholder" => "tambahkan tgl",
                        "value" => $form_data->tgl,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/tbl_saldo_laba_default'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

