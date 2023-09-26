<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah blk_izin_inap</h1>
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
                    <form action="<?= site_url('admin/blk_izin_inap/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_izin_inap",
                "value" => $form_data->id_izin_inap,
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
                        "title" => "tglmasuk",
                        "type" => "text",
                        "fc" => "tglmasuk",
                        "placeholder" => "tambahkan tglmasuk",
                        "value" => $form_data->tglmasuk,
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
                        "title" => "terlambat",
                        "type" => "text",
                        "fc" => "terlambat",
                        "placeholder" => "tambahkan terlambat",
                        "value" => $form_data->terlambat,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "akm_terlambat",
                        "type" => "text",
                        "fc" => "akm_terlambat",
                        "placeholder" => "tambahkan akm_terlambat",
                        "value" => $form_data->akm_terlambat,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "blk_pemberi_izin",
                        "type" => "text",
                        "fc" => "blk_pemberi_izin",
                        "placeholder" => "tambahkan blk_pemberi_izin",
                        "value" => $form_data->blk_pemberi_izin,
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
                          <a class="btn btn-default" href="<?= site_url('admin/blk_izin_inap'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

