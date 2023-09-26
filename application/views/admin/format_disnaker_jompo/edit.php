<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah format_disnaker_jompo</h1>
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
                    <form action="<?= site_url('admin/format_disnaker_jompo/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_karep",
                "value" => $form_data->id_karep,
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
                        "title" => "no_ktpnya",
                        "type" => "text",
                        "fc" => "no_ktpnya",
                        "placeholder" => "tambahkan no_ktpnya",
                        "value" => $form_data->no_ktpnya,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_berangkatnya",
                        "type" => "text",
                        "fc" => "tgl_berangkatnya",
                        "placeholder" => "tambahkan tgl_berangkatnya",
                        "value" => $form_data->tgl_berangkatnya,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_tibanya",
                        "type" => "text",
                        "fc" => "tgl_tibanya",
                        "placeholder" => "tambahkan tgl_tibanya",
                        "value" => $form_data->tgl_tibanya,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "gajinya",
                        "type" => "text",
                        "fc" => "gajinya",
                        "placeholder" => "tambahkan gajinya",
                        "value" => $form_data->gajinya,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "mata_uang",
                        "type" => "text",
                        "fc" => "mata_uang",
                        "placeholder" => "tambahkan mata_uang",
                        "value" => $form_data->mata_uang,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/format_disnaker_jompo'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

