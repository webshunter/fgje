<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah family</h1>
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
                    <form action="<?= site_url('admin/family/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_family",
                "value" => $form_data->id_family,
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
                        "title" => "nama_bapak",
                        "type" => "text",
                        "fc" => "nama_bapak",
                        "placeholder" => "tambahkan nama_bapak",
                        "value" => $form_data->nama_bapak,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "umur_bapak",
                        "type" => "text",
                        "fc" => "umur_bapak",
                        "placeholder" => "tambahkan umur_bapak",
                        "value" => $form_data->umur_bapak,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kerja_bapak",
                        "type" => "text",
                        "fc" => "kerja_bapak",
                        "placeholder" => "tambahkan kerja_bapak",
                        "value" => $form_data->kerja_bapak,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama_ibu",
                        "type" => "text",
                        "fc" => "nama_ibu",
                        "placeholder" => "tambahkan nama_ibu",
                        "value" => $form_data->nama_ibu,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "umur_ibu",
                        "type" => "text",
                        "fc" => "umur_ibu",
                        "placeholder" => "tambahkan umur_ibu",
                        "value" => $form_data->umur_ibu,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kerja_ibu",
                        "type" => "text",
                        "fc" => "kerja_ibu",
                        "placeholder" => "tambahkan kerja_ibu",
                        "value" => $form_data->kerja_ibu,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama_istri_suami",
                        "type" => "text",
                        "fc" => "nama_istri_suami",
                        "placeholder" => "tambahkan nama_istri_suami",
                        "value" => $form_data->nama_istri_suami,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "umur_istri_suami",
                        "type" => "text",
                        "fc" => "umur_istri_suami",
                        "placeholder" => "tambahkan umur_istri_suami",
                        "value" => $form_data->umur_istri_suami,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kerja_istri_suami",
                        "type" => "text",
                        "fc" => "kerja_istri_suami",
                        "placeholder" => "tambahkan kerja_istri_suami",
                        "value" => $form_data->kerja_istri_suami,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "saudara_laki",
                        "type" => "text",
                        "fc" => "saudara_laki",
                        "placeholder" => "tambahkan saudara_laki",
                        "value" => $form_data->saudara_laki,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "saudar_pr",
                        "type" => "text",
                        "fc" => "saudar_pr",
                        "placeholder" => "tambahkan saudar_pr",
                        "value" => $form_data->saudar_pr,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "anak_ke",
                        "type" => "text",
                        "fc" => "anak_ke",
                        "placeholder" => "tambahkan anak_ke",
                        "value" => $form_data->anak_ke,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "data_anak",
                        "type" => "text",
                        "fc" => "data_anak",
                        "placeholder" => "tambahkan data_anak",
                        "value" => $form_data->data_anak,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/family'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

