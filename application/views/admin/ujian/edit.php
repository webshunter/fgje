<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah ujian</h1>
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
                    <form action="<?= site_url('admin/ujian/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_ujian",
                "value" => $form_data->id_ujian,
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
                        "title" => "jenis_ujian",
                        "type" => "text",
                        "fc" => "jenis_ujian",
                        "placeholder" => "tambahkan jenis_ujian",
                        "value" => $form_data->jenis_ujian,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nilai1",
                        "type" => "text",
                        "fc" => "nilai1",
                        "placeholder" => "tambahkan nilai1",
                        "value" => $form_data->nilai1,
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
                        "title" => "nilai3",
                        "type" => "text",
                        "fc" => "nilai3",
                        "placeholder" => "tambahkan nilai3",
                        "value" => $form_data->nilai3,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "keterangan",
                        "type" => "text",
                        "fc" => "keterangan",
                        "placeholder" => "tambahkan keterangan",
                        "value" => $form_data->keterangan,
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
                        "title" => "status",
                        "type" => "text",
                        "fc" => "status",
                        "placeholder" => "tambahkan status",
                        "value" => $form_data->status,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/ujian'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

