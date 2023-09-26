<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah pembuatan_perjanjian</h1>
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
                    <form action="<?= site_url('admin/pembuatan_perjanjian/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_pembuatan",
                "value" => $form_data->id_pembuatan,
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
            
                <?=
                    form::input([
                        "title" => "lembur",
                        "type" => "text",
                        "fc" => "lembur",
                        "placeholder" => "tambahkan lembur",
                        "value" => $form_data->lembur,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "namasaksi",
                        "type" => "text",
                        "fc" => "namasaksi",
                        "placeholder" => "tambahkan namasaksi",
                        "value" => $form_data->namasaksi,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "hubsaksi",
                        "type" => "text",
                        "fc" => "hubsaksi",
                        "placeholder" => "tambahkan hubsaksi",
                        "value" => $form_data->hubsaksi,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_tki",
                        "type" => "text",
                        "fc" => "id_tki",
                        "placeholder" => "tambahkan id_tki",
                        "value" => $form_data->id_tki,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "namadinas",
                        "type" => "text",
                        "fc" => "namadinas",
                        "placeholder" => "tambahkan namadinas",
                        "value" => $form_data->namadinas,
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
                        "title" => "a1",
                        "type" => "text",
                        "fc" => "a1",
                        "placeholder" => "tambahkan a1",
                        "value" => $form_data->a1,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "a2",
                        "type" => "text",
                        "fc" => "a2",
                        "placeholder" => "tambahkan a2",
                        "value" => $form_data->a2,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "a3",
                        "type" => "text",
                        "fc" => "a3",
                        "placeholder" => "tambahkan a3",
                        "value" => $form_data->a3,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "a4",
                        "type" => "text",
                        "fc" => "a4",
                        "placeholder" => "tambahkan a4",
                        "value" => $form_data->a4,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "a5",
                        "type" => "text",
                        "fc" => "a5",
                        "placeholder" => "tambahkan a5",
                        "value" => $form_data->a5,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "a6",
                        "type" => "text",
                        "fc" => "a6",
                        "placeholder" => "tambahkan a6",
                        "value" => $form_data->a6,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "a7",
                        "type" => "text",
                        "fc" => "a7",
                        "placeholder" => "tambahkan a7",
                        "value" => $form_data->a7,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/pembuatan_perjanjian'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

