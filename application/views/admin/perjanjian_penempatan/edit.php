<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah perjanjian_penempatan</h1>
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
                    <form action="<?= site_url('admin/perjanjian_penempatan/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_penempatan",
                "value" => $form_data->id_penempatan,
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
                        "title" => "jabatan",
                        "type" => "text",
                        "fc" => "jabatan",
                        "placeholder" => "tambahkan jabatan",
                        "value" => $form_data->jabatan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "negara",
                        "type" => "text",
                        "fc" => "negara",
                        "placeholder" => "tambahkan negara",
                        "value" => $form_data->negara,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "gaji",
                        "type" => "text",
                        "fc" => "gaji",
                        "placeholder" => "tambahkan gaji",
                        "value" => $form_data->gaji,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "hubungan",
                        "type" => "text",
                        "fc" => "hubungan",
                        "placeholder" => "tambahkan hubungan",
                        "value" => $form_data->hubungan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "wali",
                        "type" => "text",
                        "fc" => "wali",
                        "placeholder" => "tambahkan wali",
                        "value" => $form_data->wali,
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
                        "title" => "nama_dinas",
                        "type" => "text",
                        "fc" => "nama_dinas",
                        "placeholder" => "tambahkan nama_dinas",
                        "value" => $form_data->nama_dinas,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/perjanjian_penempatan'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

