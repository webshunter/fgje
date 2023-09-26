<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah asuransifull</h1>
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
                    <form action="<?= site_url('admin/asuransifull/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_asuransi",
                "value" => $form_data->id_asuransi,
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
                        "title" => "noasuransi",
                        "type" => "text",
                        "fc" => "noasuransi",
                        "placeholder" => "tambahkan noasuransi",
                        "value" => $form_data->noasuransi,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "namaasuransi",
                        "type" => "text",
                        "fc" => "namaasuransi",
                        "placeholder" => "tambahkan namaasuransi",
                        "value" => $form_data->namaasuransi,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglasuransi",
                        "type" => "text",
                        "fc" => "tglasuransi",
                        "placeholder" => "tambahkan tglasuransi",
                        "value" => $form_data->tglasuransi,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jumlah",
                        "type" => "text",
                        "fc" => "jumlah",
                        "placeholder" => "tambahkan jumlah",
                        "value" => $form_data->jumlah,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/asuransifull'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

