<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah datamajikan</h1>
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
                    <form action="<?= site_url('admin/datamajikan/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_majikan",
                "value" => $form_data->id_majikan,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "kode_majikan",
                        "type" => "text",
                        "fc" => "kode_majikan",
                        "placeholder" => "tambahkan kode_majikan",
                        "value" => $form_data->kode_majikan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama",
                        "type" => "text",
                        "fc" => "nama",
                        "placeholder" => "tambahkan nama",
                        "value" => $form_data->nama,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "namamajikan",
                        "type" => "text",
                        "fc" => "namamajikan",
                        "placeholder" => "tambahkan namamajikan",
                        "value" => $form_data->namamajikan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "hp",
                        "type" => "text",
                        "fc" => "hp",
                        "placeholder" => "tambahkan hp",
                        "value" => $form_data->hp,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "email",
                        "type" => "text",
                        "fc" => "email",
                        "placeholder" => "tambahkan email",
                        "value" => $form_data->email,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "alamat",
                        "type" => "text",
                        "fc" => "alamat",
                        "placeholder" => "tambahkan alamat",
                        "value" => $form_data->alamat,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "alamat_mandarin",
                        "type" => "text",
                        "fc" => "alamat_mandarin",
                        "placeholder" => "tambahkan alamat_mandarin",
                        "value" => $form_data->alamat_mandarin,
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
            
                <?=
                    form::input([
                        "title" => "kode_agen",
                        "type" => "text",
                        "fc" => "kode_agen",
                        "placeholder" => "tambahkan kode_agen",
                        "value" => $form_data->kode_agen,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kode_group",
                        "type" => "text",
                        "fc" => "kode_group",
                        "placeholder" => "tambahkan kode_group",
                        "value" => $form_data->kode_group,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "file",
                        "type" => "text",
                        "fc" => "file",
                        "placeholder" => "tambahkan file",
                        "value" => $form_data->file,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "data_tki",
                        "type" => "text",
                        "fc" => "data_tki",
                        "placeholder" => "tambahkan data_tki",
                        "value" => $form_data->data_tki,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "pimpinan_man",
                        "type" => "text",
                        "fc" => "pimpinan_man",
                        "placeholder" => "tambahkan pimpinan_man",
                        "value" => $form_data->pimpinan_man,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "pimpinan_indo",
                        "type" => "text",
                        "fc" => "pimpinan_indo",
                        "placeholder" => "tambahkan pimpinan_indo",
                        "value" => $form_data->pimpinan_indo,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jabatan_man",
                        "type" => "text",
                        "fc" => "jabatan_man",
                        "placeholder" => "tambahkan jabatan_man",
                        "value" => $form_data->jabatan_man,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jabatan_indo",
                        "type" => "text",
                        "fc" => "jabatan_indo",
                        "placeholder" => "tambahkan jabatan_indo",
                        "value" => $form_data->jabatan_indo,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "filetglinput",
                        "type" => "text",
                        "fc" => "filetglinput",
                        "placeholder" => "tambahkan filetglinput",
                        "value" => $form_data->filetglinput,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/datamajikan'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

