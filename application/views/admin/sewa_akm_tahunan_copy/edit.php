<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah sewa_akm_tahunan_copy</h1>
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
                    <form action="<?= site_url('admin/sewa_akm_tahunan_copy/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_hp",
                "value" => $form_data->id_hp,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "id_hp",
                        "type" => "text",
                        "fc" => "id_hp",
                        "placeholder" => "tambahkan id_hp",
                        "value" => $form_data->id_hp,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama",
                        "type" => "text",
                        "fc" => "nama",
                        "placeholder" => "tambahkan nama",
                        "value" => $form_data->nama,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "harga_perolehan",
                        "type" => "text",
                        "fc" => "harga_perolehan",
                        "placeholder" => "tambahkan harga_perolehan",
                        "value" => $form_data->harga_perolehan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "akm_penyusutan",
                        "type" => "text",
                        "fc" => "akm_penyusutan",
                        "placeholder" => "tambahkan akm_penyusutan",
                        "value" => $form_data->akm_penyusutan,
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
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/sewa_akm_tahunan_copy'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

