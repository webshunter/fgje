<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah markg</h1>
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
                    <form action="<?= site_url('admin/markg/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_markg",
                "value" => $form_data->id_markg,
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
                        "title" => "tgl_cair",
                        "type" => "text",
                        "fc" => "tgl_cair",
                        "placeholder" => "tambahkan tgl_cair",
                        "value" => $form_data->tgl_cair,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nilai_tma",
                        "type" => "text",
                        "fc" => "nilai_tma",
                        "placeholder" => "tambahkan nilai_tma",
                        "value" => $form_data->nilai_tma,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nilai_tmi",
                        "type" => "text",
                        "fc" => "nilai_tmi",
                        "placeholder" => "tambahkan nilai_tmi",
                        "value" => $form_data->nilai_tmi,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/markg'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

