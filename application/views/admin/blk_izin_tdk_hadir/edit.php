<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah blk_izin_tdk_hadir</h1>
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
                    <form action="<?= site_url('admin/blk_izin_tdk_hadir/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_izin_tdk_hadir",
                "value" => $form_data->id_izin_tdk_hadir,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "nodaftar",
                        "type" => "text",
                        "fc" => "nodaftar",
                        "placeholder" => "tambahkan nodaftar",
                        "value" => $form_data->nodaftar,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "keluar_kembali",
                        "type" => "text",
                        "fc" => "keluar_kembali",
                        "placeholder" => "tambahkan keluar_kembali",
                        "value" => $form_data->keluar_kembali,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglkeluar",
                        "type" => "text",
                        "fc" => "tglkeluar",
                        "placeholder" => "tambahkan tglkeluar",
                        "value" => $form_data->tglkeluar,
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
                        "title" => "tglkembali",
                        "type" => "text",
                        "fc" => "tglkembali",
                        "placeholder" => "tambahkan tglkembali",
                        "value" => $form_data->tglkembali,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jamkembali",
                        "type" => "text",
                        "fc" => "jamkembali",
                        "placeholder" => "tambahkan jamkembali",
                        "value" => $form_data->jamkembali,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "keperluan",
                        "type" => "text",
                        "fc" => "keperluan",
                        "placeholder" => "tambahkan keperluan",
                        "value" => $form_data->keperluan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "mark",
                        "type" => "text",
                        "fc" => "mark",
                        "placeholder" => "tambahkan mark",
                        "value" => $form_data->mark,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "adm",
                        "type" => "text",
                        "fc" => "adm",
                        "placeholder" => "tambahkan adm",
                        "value" => $form_data->adm,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "blk",
                        "type" => "text",
                        "fc" => "blk",
                        "placeholder" => "tambahkan blk",
                        "value" => $form_data->blk,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_izin_tdk_hadir'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

