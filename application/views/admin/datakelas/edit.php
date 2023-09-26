<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah datakelas</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
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
                    <form action="<?= site_url('admin/datakelas/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_kelas",
                "value" => $form_data->id_kelas,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "namakelas",
                        "type" => "text",
                        "fc" => "namakelas",
                        "placeholder" => "tambahkan namakelas",
                        "value" => $form_data->namakelas,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jammasuk",
                        "type" => "text",
                        "fc" => "jammasuk",
                        "placeholder" => "tambahkan jammasuk",
                        "value" => $form_data->jammasuk,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jamkeluar",
                        "type" => "text",
                        "fc" => "jamkeluar",
                        "placeholder" => "tambahkan jamkeluar",
                        "value" => $form_data->jamkeluar,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jumlahjam",
                        "type" => "text",
                        "fc" => "jumlahjam",
                        "placeholder" => "tambahkan jumlahjam",
                        "value" => $form_data->jumlahjam,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/datakelas'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

