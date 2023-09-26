<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan buka_rekening_baru</h1>
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
                    <form action="<?= site_url('admin/buka_rekening_baru/simpan') ?>" method="post" enctype="multipart/form-data">
                        
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
                        "title" => "tanggal_buka_rek",
                        "type" => "text",
                        "fc" => "tanggal_buka_rek",
                        "placeholder" => "tambahkan tanggal_buka_rek",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "data_berkas",
                        "type" => "text",
                        "fc" => "data_berkas",
                        "placeholder" => "tambahkan data_berkas",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "hapus",
                        "type" => "text",
                        "fc" => "hapus",
                        "placeholder" => "tambahkan hapus",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/buka_rekening_baru'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>