<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan working</h1>
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
                    <form action="<?= site_url('admin/working/simpan') ?>" method="post" enctype="multipart/form-data">
                        
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
                        "title" => "negara",
                        "type" => "text",
                        "fc" => "negara",
                        "placeholder" => "tambahkan negara",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jenis_usaha",
                        "type" => "text",
                        "fc" => "jenis_usaha",
                        "placeholder" => "tambahkan jenis_usaha",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "posisi",
                        "type" => "text",
                        "fc" => "posisi",
                        "placeholder" => "tambahkan posisi",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "penjelasan",
                        "type" => "text",
                        "fc" => "penjelasan",
                        "placeholder" => "tambahkan penjelasan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "masa_kerja",
                        "type" => "text",
                        "fc" => "masa_kerja",
                        "placeholder" => "tambahkan masa_kerja",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "masabulan",
                        "type" => "text",
                        "fc" => "masabulan",
                        "placeholder" => "tambahkan masabulan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tahun",
                        "type" => "text",
                        "fc" => "tahun",
                        "placeholder" => "tambahkan tahun",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "alasan",
                        "type" => "text",
                        "fc" => "alasan",
                        "placeholder" => "tambahkan alasan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama_perusahaan",
                        "type" => "text",
                        "fc" => "nama_perusahaan",
                        "placeholder" => "tambahkan nama_perusahaan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "satuan",
                        "type" => "text",
                        "fc" => "satuan",
                        "placeholder" => "tambahkan satuan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "gaji",
                        "type" => "text",
                        "fc" => "gaji",
                        "placeholder" => "tambahkan gaji",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "detail_gaji",
                        "type" => "text",
                        "fc" => "detail_gaji",
                        "placeholder" => "tambahkan detail_gaji",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "barangdiproduksi",
                        "type" => "text",
                        "fc" => "barangdiproduksi",
                        "placeholder" => "tambahkan barangdiproduksi",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/working'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>