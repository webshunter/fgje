<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan staff_finger</h1>
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
                    <form action="<?= site_url('admin/staff_finger/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "id",
                        "type" => "text",
                        "fc" => "id",
                        "placeholder" => "tambahkan id",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama",
                        "type" => "text",
                        "fc" => "nama",
                        "placeholder" => "tambahkan nama",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "dept",
                        "type" => "text",
                        "fc" => "dept",
                        "placeholder" => "tambahkan dept",
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
                        "title" => "tm1_masuk",
                        "type" => "text",
                        "fc" => "tm1_masuk",
                        "placeholder" => "tambahkan tm1_masuk",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tm1_keluar",
                        "type" => "text",
                        "fc" => "tm1_keluar",
                        "placeholder" => "tambahkan tm1_keluar",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tm2_masuk",
                        "type" => "text",
                        "fc" => "tm2_masuk",
                        "placeholder" => "tambahkan tm2_masuk",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tm2_keluar",
                        "type" => "text",
                        "fc" => "tm2_keluar",
                        "placeholder" => "tambahkan tm2_keluar",
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
                        "title" => "pulang_awal",
                        "type" => "text",
                        "fc" => "pulang_awal",
                        "placeholder" => "tambahkan pulang_awal",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "absen",
                        "type" => "text",
                        "fc" => "absen",
                        "placeholder" => "tambahkan absen",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "total",
                        "type" => "text",
                        "fc" => "total",
                        "placeholder" => "tambahkan total",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "catatan",
                        "type" => "text",
                        "fc" => "catatan",
                        "placeholder" => "tambahkan catatan",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/staff_finger'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>