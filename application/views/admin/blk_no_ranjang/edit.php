<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah blk_no_ranjang</h1>
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
                    <form action="<?= site_url('admin/blk_no_ranjang/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_no_ranjang",
                "value" => $form_data->id_no_ranjang,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "kode_no_ranjang",
                        "type" => "text",
                        "fc" => "kode_no_ranjang",
                        "placeholder" => "tambahkan kode_no_ranjang",
                        "value" => $form_data->kode_no_ranjang,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "lokasi",
                        "type" => "text",
                        "fc" => "lokasi",
                        "placeholder" => "tambahkan lokasi",
                        "value" => $form_data->lokasi,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ranjang",
                        "type" => "text",
                        "fc" => "ranjang",
                        "placeholder" => "tambahkan ranjang",
                        "value" => $form_data->ranjang,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kasur",
                        "type" => "text",
                        "fc" => "kasur",
                        "placeholder" => "tambahkan kasur",
                        "value" => $form_data->kasur,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "sprei",
                        "type" => "text",
                        "fc" => "sprei",
                        "placeholder" => "tambahkan sprei",
                        "value" => $form_data->sprei,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "bantal",
                        "type" => "text",
                        "fc" => "bantal",
                        "placeholder" => "tambahkan bantal",
                        "value" => $form_data->bantal,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "sarung_bantal",
                        "type" => "text",
                        "fc" => "sarung_bantal",
                        "placeholder" => "tambahkan sarung_bantal",
                        "value" => $form_data->sarung_bantal,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_no_ranjang'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

