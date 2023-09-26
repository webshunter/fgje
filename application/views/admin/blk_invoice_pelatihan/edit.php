<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah blk_invoice_pelatihan</h1>
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
                    <form action="<?= site_url('admin/blk_invoice_pelatihan/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_invoice_pelatihan",
                "value" => $form_data->id_invoice_pelatihan,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "id_invoice_pelatihan",
                        "type" => "text",
                        "fc" => "id_invoice_pelatihan",
                        "placeholder" => "tambahkan id_invoice_pelatihan",
                        "value" => $form_data->id_invoice_pelatihan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "noinvoice_pelatihan",
                        "type" => "text",
                        "fc" => "noinvoice_pelatihan",
                        "placeholder" => "tambahkan noinvoice_pelatihan",
                        "value" => $form_data->noinvoice_pelatihan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglsurat",
                        "type" => "text",
                        "fc" => "tglsurat",
                        "placeholder" => "tambahkan tglsurat",
                        "value" => $form_data->tglsurat,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "blk_pemilik",
                        "type" => "text",
                        "fc" => "blk_pemilik",
                        "placeholder" => "tambahkan blk_pemilik",
                        "value" => $form_data->blk_pemilik,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "biaya",
                        "type" => "text",
                        "fc" => "biaya",
                        "placeholder" => "tambahkan biaya",
                        "value" => $form_data->biaya,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_laporan_bulanan",
                        "type" => "text",
                        "fc" => "id_laporan_bulanan",
                        "placeholder" => "tambahkan id_laporan_bulanan",
                        "value" => $form_data->id_laporan_bulanan,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_invoice_pelatihan'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

