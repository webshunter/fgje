<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah blk_jadwal_penilaian</h1>
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
                    <form action="<?= site_url('admin/blk_jadwal_penilaian/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_penilaian",
                "value" => $form_data->id_penilaian,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "jadwal_data_tki_id",
                        "type" => "text",
                        "fc" => "jadwal_data_tki_id",
                        "placeholder" => "tambahkan jadwal_data_tki_id",
                        "value" => $form_data->jadwal_data_tki_id,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "hari",
                        "type" => "text",
                        "fc" => "hari",
                        "placeholder" => "tambahkan hari",
                        "value" => $form_data->hari,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nilai",
                        "type" => "text",
                        "fc" => "nilai",
                        "placeholder" => "tambahkan nilai",
                        "value" => $form_data->nilai,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nilai2",
                        "type" => "text",
                        "fc" => "nilai2",
                        "placeholder" => "tambahkan nilai2",
                        "value" => $form_data->nilai2,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "materi_id",
                        "type" => "text",
                        "fc" => "materi_id",
                        "placeholder" => "tambahkan materi_id",
                        "value" => $form_data->materi_id,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_jadwal_penilaian'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

