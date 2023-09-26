<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan pembuatan_perjanjian</h1>
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
                    <form action="<?= site_url('admin/pembuatan_perjanjian/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "nomor",
                        "type" => "text",
                        "fc" => "nomor",
                        "placeholder" => "tambahkan nomor",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "lembur",
                        "type" => "text",
                        "fc" => "lembur",
                        "placeholder" => "tambahkan lembur",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "namasaksi",
                        "type" => "text",
                        "fc" => "namasaksi",
                        "placeholder" => "tambahkan namasaksi",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "hubsaksi",
                        "type" => "text",
                        "fc" => "hubsaksi",
                        "placeholder" => "tambahkan hubsaksi",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_tki",
                        "type" => "text",
                        "fc" => "id_tki",
                        "placeholder" => "tambahkan id_tki",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "namadinas",
                        "type" => "text",
                        "fc" => "namadinas",
                        "placeholder" => "tambahkan namadinas",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tanggal",
                        "type" => "text",
                        "fc" => "tanggal",
                        "placeholder" => "tambahkan tanggal",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "a1",
                        "type" => "text",
                        "fc" => "a1",
                        "placeholder" => "tambahkan a1",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "a2",
                        "type" => "text",
                        "fc" => "a2",
                        "placeholder" => "tambahkan a2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "a3",
                        "type" => "text",
                        "fc" => "a3",
                        "placeholder" => "tambahkan a3",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "a4",
                        "type" => "text",
                        "fc" => "a4",
                        "placeholder" => "tambahkan a4",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "a5",
                        "type" => "text",
                        "fc" => "a5",
                        "placeholder" => "tambahkan a5",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "a6",
                        "type" => "text",
                        "fc" => "a6",
                        "placeholder" => "tambahkan a6",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "a7",
                        "type" => "text",
                        "fc" => "a7",
                        "placeholder" => "tambahkan a7",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/pembuatan_perjanjian'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>