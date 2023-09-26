<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah dokumen</h1>
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
                    <form action="<?= site_url('admin/dokumen/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_dokumen",
                "value" => $form_data->id_dokumen,
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
                        "title" => "ktp",
                        "type" => "text",
                        "fc" => "ktp",
                        "placeholder" => "tambahkan ktp",
                        "value" => $form_data->ktp,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_ktp",
                        "type" => "text",
                        "fc" => "terakhir_ktp",
                        "placeholder" => "tambahkan terakhir_ktp",
                        "value" => $form_data->terakhir_ktp,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kk",
                        "type" => "text",
                        "fc" => "kk",
                        "placeholder" => "tambahkan kk",
                        "value" => $form_data->kk,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_kk",
                        "type" => "text",
                        "fc" => "terakhir_kk",
                        "placeholder" => "tambahkan terakhir_kk",
                        "value" => $form_data->terakhir_kk,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "akte",
                        "type" => "text",
                        "fc" => "akte",
                        "placeholder" => "tambahkan akte",
                        "value" => $form_data->akte,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_akte",
                        "type" => "text",
                        "fc" => "terakhir_akte",
                        "placeholder" => "tambahkan terakhir_akte",
                        "value" => $form_data->terakhir_akte,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ijazah",
                        "type" => "text",
                        "fc" => "ijazah",
                        "placeholder" => "tambahkan ijazah",
                        "value" => $form_data->ijazah,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_ijazah",
                        "type" => "text",
                        "fc" => "terakhir_ijazah",
                        "placeholder" => "tambahkan terakhir_ijazah",
                        "value" => $form_data->terakhir_ijazah,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "si",
                        "type" => "text",
                        "fc" => "si",
                        "placeholder" => "tambahkan si",
                        "value" => $form_data->si,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_si",
                        "type" => "text",
                        "fc" => "terakhir_si",
                        "placeholder" => "tambahkan terakhir_si",
                        "value" => $form_data->terakhir_si,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "sn",
                        "type" => "text",
                        "fc" => "sn",
                        "placeholder" => "tambahkan sn",
                        "value" => $form_data->sn,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_sn",
                        "type" => "text",
                        "fc" => "terakhir_sn",
                        "placeholder" => "tambahkan terakhir_sn",
                        "value" => $form_data->terakhir_sn,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "paspor",
                        "type" => "text",
                        "fc" => "paspor",
                        "placeholder" => "tambahkan paspor",
                        "value" => $form_data->paspor,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_paspor",
                        "type" => "text",
                        "fc" => "terakhir_paspor",
                        "placeholder" => "tambahkan terakhir_paspor",
                        "value" => $form_data->terakhir_paspor,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "arc",
                        "type" => "text",
                        "fc" => "arc",
                        "placeholder" => "tambahkan arc",
                        "value" => $form_data->arc,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_arc",
                        "type" => "text",
                        "fc" => "terakhir_arc",
                        "placeholder" => "tambahkan terakhir_arc",
                        "value" => $form_data->terakhir_arc,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "asuransi",
                        "type" => "text",
                        "fc" => "asuransi",
                        "placeholder" => "tambahkan asuransi",
                        "value" => $form_data->asuransi,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_asuransi",
                        "type" => "text",
                        "fc" => "terakhir_asuransi",
                        "placeholder" => "tambahkan terakhir_asuransi",
                        "value" => $form_data->terakhir_asuransi,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "medikal1",
                        "type" => "text",
                        "fc" => "medikal1",
                        "placeholder" => "tambahkan medikal1",
                        "value" => $form_data->medikal1,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_medikal1",
                        "type" => "text",
                        "fc" => "terakhir_medikal1",
                        "placeholder" => "tambahkan terakhir_medikal1",
                        "value" => $form_data->terakhir_medikal1,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "medikal2",
                        "type" => "text",
                        "fc" => "medikal2",
                        "placeholder" => "tambahkan medikal2",
                        "value" => $form_data->medikal2,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_medikal2",
                        "type" => "text",
                        "fc" => "terakhir_medikal2",
                        "placeholder" => "tambahkan terakhir_medikal2",
                        "value" => $form_data->terakhir_medikal2,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "medikal3",
                        "type" => "text",
                        "fc" => "medikal3",
                        "placeholder" => "tambahkan medikal3",
                        "value" => $form_data->medikal3,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_medikal3",
                        "type" => "text",
                        "fc" => "terakhir_medikal3",
                        "placeholder" => "tambahkan terakhir_medikal3",
                        "value" => $form_data->terakhir_medikal3,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "skck",
                        "type" => "text",
                        "fc" => "skck",
                        "placeholder" => "tambahkan skck",
                        "value" => $form_data->skck,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_skck",
                        "type" => "text",
                        "fc" => "terakhir_skck",
                        "placeholder" => "tambahkan terakhir_skck",
                        "value" => $form_data->terakhir_skck,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "fingerprint",
                        "type" => "text",
                        "fc" => "fingerprint",
                        "placeholder" => "tambahkan fingerprint",
                        "value" => $form_data->fingerprint,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_fingerprint",
                        "type" => "text",
                        "fc" => "terakhir_fingerprint",
                        "placeholder" => "tambahkan terakhir_fingerprint",
                        "value" => $form_data->terakhir_fingerprint,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "visa",
                        "type" => "text",
                        "fc" => "visa",
                        "placeholder" => "tambahkan visa",
                        "value" => $form_data->visa,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_visa",
                        "type" => "text",
                        "fc" => "terakhir_visa",
                        "placeholder" => "tambahkan terakhir_visa",
                        "value" => $form_data->terakhir_visa,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "pap",
                        "type" => "text",
                        "fc" => "pap",
                        "placeholder" => "tambahkan pap",
                        "value" => $form_data->pap,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terakhir_pap",
                        "type" => "text",
                        "fc" => "terakhir_pap",
                        "placeholder" => "tambahkan terakhir_pap",
                        "value" => $form_data->terakhir_pap,
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

