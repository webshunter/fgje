<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah surat_pengajuan_data</h1>
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
                    <form action="<?= site_url('admin/surat_pengajuan_data/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_surat_pengajuan_data",
                "value" => $form_data->id_surat_pengajuan_data,
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
                        "title" => "jumlah_pinjaman",
                        "type" => "text",
                        "fc" => "jumlah_pinjaman",
                        "placeholder" => "tambahkan jumlah_pinjaman",
                        "value" => $form_data->jumlah_pinjaman,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "loan",
                        "type" => "text",
                        "fc" => "loan",
                        "placeholder" => "tambahkan loan",
                        "value" => $form_data->loan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "aju_id",
                        "type" => "text",
                        "fc" => "aju_id",
                        "placeholder" => "tambahkan aju_id",
                        "value" => $form_data->aju_id,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/surat_pengajuan_data'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

