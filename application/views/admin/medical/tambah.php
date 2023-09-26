<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan medical</h1>
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
                    <form action="<?= site_url('admin/medical/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "id_biodata",
                        "type" => "text",
                        "fc" => "id_biodata",
                        "placeholder" => "tambahkan id_biodata",
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
                        "title" => "nomor",
                        "type" => "text",
                        "fc" => "nomor",
                        "placeholder" => "tambahkan nomor",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "keterangan",
                        "type" => "text",
                        "fc" => "keterangan",
                        "placeholder" => "tambahkan keterangan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jenismedical",
                        "type" => "text",
                        "fc" => "jenismedical",
                        "placeholder" => "tambahkan jenismedical",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "expired",
                        "type" => "text",
                        "fc" => "expired",
                        "placeholder" => "tambahkan expired",
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
                        "title" => "status",
                        "type" => "text",
                        "fc" => "status",
                        "placeholder" => "tambahkan status",
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
            
                <?=
                    form::input([
                        "title" => "d_nomor",
                        "type" => "text",
                        "fc" => "d_nomor",
                        "placeholder" => "tambahkan d_nomor",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "d_klinik",
                        "type" => "text",
                        "fc" => "d_klinik",
                        "placeholder" => "tambahkan d_klinik",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "d_dokter",
                        "type" => "text",
                        "fc" => "d_dokter",
                        "placeholder" => "tambahkan d_dokter",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/medical'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>