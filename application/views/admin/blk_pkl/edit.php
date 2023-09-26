<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah blk_pkl</h1>
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
                    <form action="<?= site_url('admin/blk_pkl/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_blk_pkl",
                "value" => $form_data->id_blk_pkl,
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
                        "title" => "tempat",
                        "type" => "text",
                        "fc" => "tempat",
                        "placeholder" => "tambahkan tempat",
                        "value" => $form_data->tempat,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "mulai_tgl",
                        "type" => "text",
                        "fc" => "mulai_tgl",
                        "placeholder" => "tambahkan mulai_tgl",
                        "value" => $form_data->mulai_tgl,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "selesai_tgl",
                        "type" => "text",
                        "fc" => "selesai_tgl",
                        "placeholder" => "tambahkan selesai_tgl",
                        "value" => $form_data->selesai_tgl,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jml_hari",
                        "type" => "text",
                        "fc" => "jml_hari",
                        "placeholder" => "tambahkan jml_hari",
                        "value" => $form_data->jml_hari,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "penilaian",
                        "type" => "text",
                        "fc" => "penilaian",
                        "placeholder" => "tambahkan penilaian",
                        "value" => $form_data->penilaian,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "total_hari",
                        "type" => "text",
                        "fc" => "total_hari",
                        "placeholder" => "tambahkan total_hari",
                        "value" => $form_data->total_hari,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ket",
                        "type" => "text",
                        "fc" => "ket",
                        "placeholder" => "tambahkan ket",
                        "value" => $form_data->ket,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_pkl'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

