<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah datasektor_nt</h1>
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
                    <form action="<?= site_url('admin/datasektor_nt/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_sektor",
                "value" => $form_data->id_sektor,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "kode_sektor",
                        "type" => "text",
                        "fc" => "kode_sektor",
                        "placeholder" => "tambahkan kode_sektor",
                        "value" => $form_data->kode_sektor,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "sektor",
                        "type" => "text",
                        "fc" => "sektor",
                        "placeholder" => "tambahkan sektor",
                        "value" => $form_data->sektor,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "no_urut",
                        "type" => "text",
                        "fc" => "no_urut",
                        "placeholder" => "tambahkan no_urut",
                        "value" => $form_data->no_urut,
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
                          <a class="btn btn-default" href="<?= site_url('admin/datasektor_nt'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

