<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah blk_inap</h1>
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
                    <form action="<?= site_url('admin/blk_inap/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_blk_inap",
                "value" => $form_data->id_blk_inap,
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
                        "title" => "mulai_inap",
                        "type" => "text",
                        "fc" => "mulai_inap",
                        "placeholder" => "tambahkan mulai_inap",
                        "value" => $form_data->mulai_inap,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kembali_inap",
                        "type" => "text",
                        "fc" => "kembali_inap",
                        "placeholder" => "tambahkan kembali_inap",
                        "value" => $form_data->kembali_inap,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terlambat_inap",
                        "type" => "text",
                        "fc" => "terlambat_inap",
                        "placeholder" => "tambahkan terlambat_inap",
                        "value" => $form_data->terlambat_inap,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "hari_inap",
                        "type" => "text",
                        "fc" => "hari_inap",
                        "placeholder" => "tambahkan hari_inap",
                        "value" => $form_data->hari_inap,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ket_inap",
                        "type" => "text",
                        "fc" => "ket_inap",
                        "placeholder" => "tambahkan ket_inap",
                        "value" => $form_data->ket_inap,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_inap'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

