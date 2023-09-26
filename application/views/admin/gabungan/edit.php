<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah gabungan</h1>
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
                    <form action="<?= site_url('admin/gabungan/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_gabung",
                "value" => $form_data->id_gabung,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "id_user",
                        "type" => "text",
                        "fc" => "id_user",
                        "placeholder" => "tambahkan id_user",
                        "value" => $form_data->id_user,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_kelas",
                        "type" => "text",
                        "fc" => "id_kelas",
                        "placeholder" => "tambahkan id_kelas",
                        "value" => $form_data->id_kelas,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/gabungan'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

