<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan blk_izin_keluar</h1>
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
                    <form action="<?= site_url('admin/blk_izin_keluar/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "nodaftar",
                        "type" => "text",
                        "fc" => "nodaftar",
                        "placeholder" => "tambahkan nodaftar",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl",
                        "type" => "text",
                        "fc" => "tgl",
                        "placeholder" => "tambahkan tgl",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jam_keluar",
                        "type" => "text",
                        "fc" => "jam_keluar",
                        "placeholder" => "tambahkan jam_keluar",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jam_kembali",
                        "type" => "text",
                        "fc" => "jam_kembali",
                        "placeholder" => "tambahkan jam_kembali",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terlambat",
                        "type" => "text",
                        "fc" => "terlambat",
                        "placeholder" => "tambahkan terlambat",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "akm_terlambat",
                        "type" => "text",
                        "fc" => "akm_terlambat",
                        "placeholder" => "tambahkan akm_terlambat",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "keperluan",
                        "type" => "text",
                        "fc" => "keperluan",
                        "placeholder" => "tambahkan keperluan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ditemani_oleh",
                        "type" => "text",
                        "fc" => "ditemani_oleh",
                        "placeholder" => "tambahkan ditemani_oleh",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "blk_pemberi_izin",
                        "type" => "text",
                        "fc" => "blk_pemberi_izin",
                        "placeholder" => "tambahkan blk_pemberi_izin",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ket",
                        "type" => "text",
                        "fc" => "ket",
                        "placeholder" => "tambahkan ket",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_izin_keluar'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>