<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan dokumen</h1>
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
                    <form action="<?= site_url('admin/dokumen/simpan') ?>" method="post" enctype="multipart/form-data">
                        
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
                        "title" => "ktp",
                        "type" => "text",
                        "fc" => "ktp",
                        "placeholder" => "tambahkan ktp",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_ktp",
                        "type" => "text",
                        "fc" => "terakhir_ktp",
                        "placeholder" => "tambahkan terakhir_ktp",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kk",
                        "type" => "text",
                        "fc" => "kk",
                        "placeholder" => "tambahkan kk",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_kk",
                        "type" => "text",
                        "fc" => "terakhir_kk",
                        "placeholder" => "tambahkan terakhir_kk",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "akte",
                        "type" => "text",
                        "fc" => "akte",
                        "placeholder" => "tambahkan akte",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_akte",
                        "type" => "text",
                        "fc" => "terakhir_akte",
                        "placeholder" => "tambahkan terakhir_akte",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ijazah",
                        "type" => "text",
                        "fc" => "ijazah",
                        "placeholder" => "tambahkan ijazah",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_ijazah",
                        "type" => "text",
                        "fc" => "terakhir_ijazah",
                        "placeholder" => "tambahkan terakhir_ijazah",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "si",
                        "type" => "text",
                        "fc" => "si",
                        "placeholder" => "tambahkan si",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_si",
                        "type" => "text",
                        "fc" => "terakhir_si",
                        "placeholder" => "tambahkan terakhir_si",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "sn",
                        "type" => "text",
                        "fc" => "sn",
                        "placeholder" => "tambahkan sn",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_sn",
                        "type" => "text",
                        "fc" => "terakhir_sn",
                        "placeholder" => "tambahkan terakhir_sn",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "paspor",
                        "type" => "text",
                        "fc" => "paspor",
                        "placeholder" => "tambahkan paspor",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_paspor",
                        "type" => "text",
                        "fc" => "terakhir_paspor",
                        "placeholder" => "tambahkan terakhir_paspor",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "arc",
                        "type" => "text",
                        "fc" => "arc",
                        "placeholder" => "tambahkan arc",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_arc",
                        "type" => "text",
                        "fc" => "terakhir_arc",
                        "placeholder" => "tambahkan terakhir_arc",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "asuransi",
                        "type" => "text",
                        "fc" => "asuransi",
                        "placeholder" => "tambahkan asuransi",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_asuransi",
                        "type" => "text",
                        "fc" => "terakhir_asuransi",
                        "placeholder" => "tambahkan terakhir_asuransi",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "medikal1",
                        "type" => "text",
                        "fc" => "medikal1",
                        "placeholder" => "tambahkan medikal1",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_medikal1",
                        "type" => "text",
                        "fc" => "terakhir_medikal1",
                        "placeholder" => "tambahkan terakhir_medikal1",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "medikal2",
                        "type" => "text",
                        "fc" => "medikal2",
                        "placeholder" => "tambahkan medikal2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_medikal2",
                        "type" => "text",
                        "fc" => "terakhir_medikal2",
                        "placeholder" => "tambahkan terakhir_medikal2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "medikal3",
                        "type" => "text",
                        "fc" => "medikal3",
                        "placeholder" => "tambahkan medikal3",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_medikal3",
                        "type" => "text",
                        "fc" => "terakhir_medikal3",
                        "placeholder" => "tambahkan terakhir_medikal3",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "skck",
                        "type" => "text",
                        "fc" => "skck",
                        "placeholder" => "tambahkan skck",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_skck",
                        "type" => "text",
                        "fc" => "terakhir_skck",
                        "placeholder" => "tambahkan terakhir_skck",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "fingerprint",
                        "type" => "text",
                        "fc" => "fingerprint",
                        "placeholder" => "tambahkan fingerprint",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_fingerprint",
                        "type" => "text",
                        "fc" => "terakhir_fingerprint",
                        "placeholder" => "tambahkan terakhir_fingerprint",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "visa",
                        "type" => "text",
                        "fc" => "visa",
                        "placeholder" => "tambahkan visa",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_visa",
                        "type" => "text",
                        "fc" => "terakhir_visa",
                        "placeholder" => "tambahkan terakhir_visa",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "pap",
                        "type" => "text",
                        "fc" => "pap",
                        "placeholder" => "tambahkan pap",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_pap",
                        "type" => "text",
                        "fc" => "terakhir_pap",
                        "placeholder" => "tambahkan terakhir_pap",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/dokumen'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>