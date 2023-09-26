<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah working</h1>
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
                    <form action="<?= site_url('admin/working/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_working",
                "value" => $form_data->id_working,
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
                        "title" => "negara",
                        "type" => "text",
                        "fc" => "negara",
                        "placeholder" => "tambahkan negara",
                        "value" => $form_data->negara,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jenis_usaha",
                        "type" => "text",
                        "fc" => "jenis_usaha",
                        "placeholder" => "tambahkan jenis_usaha",
                        "value" => $form_data->jenis_usaha,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "posisi",
                        "type" => "text",
                        "fc" => "posisi",
                        "placeholder" => "tambahkan posisi",
                        "value" => $form_data->posisi,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "penjelasan",
                        "type" => "text",
                        "fc" => "penjelasan",
                        "placeholder" => "tambahkan penjelasan",
                        "value" => $form_data->penjelasan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "masa_kerja",
                        "type" => "text",
                        "fc" => "masa_kerja",
                        "placeholder" => "tambahkan masa_kerja",
                        "value" => $form_data->masa_kerja,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "masabulan",
                        "type" => "text",
                        "fc" => "masabulan",
                        "placeholder" => "tambahkan masabulan",
                        "value" => $form_data->masabulan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tahun",
                        "type" => "text",
                        "fc" => "tahun",
                        "placeholder" => "tambahkan tahun",
                        "value" => $form_data->tahun,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "alasan",
                        "type" => "text",
                        "fc" => "alasan",
                        "placeholder" => "tambahkan alasan",
                        "value" => $form_data->alasan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama_perusahaan",
                        "type" => "text",
                        "fc" => "nama_perusahaan",
                        "placeholder" => "tambahkan nama_perusahaan",
                        "value" => $form_data->nama_perusahaan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "satuan",
                        "type" => "text",
                        "fc" => "satuan",
                        "placeholder" => "tambahkan satuan",
                        "value" => $form_data->satuan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "gaji",
                        "type" => "text",
                        "fc" => "gaji",
                        "placeholder" => "tambahkan gaji",
                        "value" => $form_data->gaji,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "detail_gaji",
                        "type" => "text",
                        "fc" => "detail_gaji",
                        "placeholder" => "tambahkan detail_gaji",
                        "value" => $form_data->detail_gaji,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "barangdiproduksi",
                        "type" => "text",
                        "fc" => "barangdiproduksi",
                        "placeholder" => "tambahkan barangdiproduksi",
                        "value" => $form_data->barangdiproduksi,
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

