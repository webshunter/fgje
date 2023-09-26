<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah majikan</h1>
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
                    <form action="<?= site_url('admin/majikan/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_majikan",
                "value" => $form_data->id_majikan,
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
                        "title" => "kode_group",
                        "type" => "text",
                        "fc" => "kode_group",
                        "placeholder" => "tambahkan kode_group",
                        "value" => $form_data->kode_group,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kode_agen",
                        "type" => "text",
                        "fc" => "kode_agen",
                        "placeholder" => "tambahkan kode_agen",
                        "value" => $form_data->kode_agen,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kode_majikan",
                        "type" => "text",
                        "fc" => "kode_majikan",
                        "placeholder" => "tambahkan kode_majikan",
                        "value" => $form_data->kode_majikan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kode_suhan",
                        "type" => "text",
                        "fc" => "kode_suhan",
                        "placeholder" => "tambahkan kode_suhan",
                        "value" => $form_data->kode_suhan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kode_visapermit",
                        "type" => "text",
                        "fc" => "kode_visapermit",
                        "placeholder" => "tambahkan kode_visapermit",
                        "value" => $form_data->kode_visapermit,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "namamajikan",
                        "type" => "text",
                        "fc" => "namamajikan",
                        "placeholder" => "tambahkan namamajikan",
                        "value" => $form_data->namamajikan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "namataiwan",
                        "type" => "text",
                        "fc" => "namataiwan",
                        "placeholder" => "tambahkan namataiwan",
                        "value" => $form_data->namataiwan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "alamatmajikan",
                        "type" => "text",
                        "fc" => "alamatmajikan",
                        "placeholder" => "tambahkan alamatmajikan",
                        "value" => $form_data->alamatmajikan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "notelpmajikan",
                        "type" => "text",
                        "fc" => "notelpmajikan",
                        "placeholder" => "tambahkan notelpmajikan",
                        "value" => $form_data->notelpmajikan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglterpilih",
                        "type" => "text",
                        "fc" => "tglterpilih",
                        "placeholder" => "tambahkan tglterpilih",
                        "value" => $form_data->tglterpilih,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statustglterbang",
                        "type" => "text",
                        "fc" => "statustglterbang",
                        "placeholder" => "tambahkan statustglterbang",
                        "value" => $form_data->statustglterbang,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "JD",
                        "type" => "text",
                        "fc" => "JD",
                        "placeholder" => "tambahkan JD",
                        "value" => $form_data->JD,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglterbang",
                        "type" => "text",
                        "fc" => "tglterbang",
                        "placeholder" => "tambahkan tglterbang",
                        "value" => $form_data->tglterbang,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_majikannya",
                        "type" => "text",
                        "fc" => "id_majikannya",
                        "placeholder" => "tambahkan id_majikannya",
                        "value" => $form_data->id_majikannya,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_suhan",
                        "type" => "text",
                        "fc" => "id_suhan",
                        "placeholder" => "tambahkan id_suhan",
                        "value" => $form_data->id_suhan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_visapermit",
                        "type" => "text",
                        "fc" => "id_visapermit",
                        "placeholder" => "tambahkan id_visapermit",
                        "value" => $form_data->id_visapermit,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kode_visa",
                        "type" => "text",
                        "fc" => "kode_visa",
                        "placeholder" => "tambahkan kode_visa",
                        "value" => $form_data->kode_visa,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglpk",
                        "type" => "text",
                        "fc" => "tglpk",
                        "placeholder" => "tambahkan tglpk",
                        "value" => $form_data->tglpk,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglterbitsuhan",
                        "type" => "text",
                        "fc" => "tglterbitsuhan",
                        "placeholder" => "tambahkan tglterbitsuhan",
                        "value" => $form_data->tglterbitsuhan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglterimasuhan",
                        "type" => "text",
                        "fc" => "tglterimasuhan",
                        "placeholder" => "tambahkan tglterimasuhan",
                        "value" => $form_data->tglterimasuhan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglterbitpermit",
                        "type" => "text",
                        "fc" => "tglterbitpermit",
                        "placeholder" => "tambahkan tglterbitpermit",
                        "value" => $form_data->tglterbitpermit,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglterimapermit",
                        "type" => "text",
                        "fc" => "tglterimapermit",
                        "placeholder" => "tambahkan tglterimapermit",
                        "value" => $form_data->tglterimapermit,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "insterimasuhan",
                        "type" => "text",
                        "fc" => "insterimasuhan",
                        "placeholder" => "tambahkan insterimasuhan",
                        "value" => $form_data->insterimasuhan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglinfosuhan",
                        "type" => "text",
                        "fc" => "tglinfosuhan",
                        "placeholder" => "tambahkan tglinfosuhan",
                        "value" => $form_data->tglinfosuhan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgltransaksisuhan",
                        "type" => "text",
                        "fc" => "tgltransaksisuhan",
                        "placeholder" => "tambahkan tgltransaksisuhan",
                        "value" => $form_data->tgltransaksisuhan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "instransaksisuhan",
                        "type" => "text",
                        "fc" => "instransaksisuhan",
                        "placeholder" => "tambahkan instransaksisuhan",
                        "value" => $form_data->instransaksisuhan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "insterimapermit",
                        "type" => "text",
                        "fc" => "insterimapermit",
                        "placeholder" => "tambahkan insterimapermit",
                        "value" => $form_data->insterimapermit,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglinfopermit",
                        "type" => "text",
                        "fc" => "tglinfopermit",
                        "placeholder" => "tambahkan tglinfopermit",
                        "value" => $form_data->tglinfopermit,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgltransaksipermit",
                        "type" => "text",
                        "fc" => "tgltransaksipermit",
                        "placeholder" => "tambahkan tgltransaksipermit",
                        "value" => $form_data->tgltransaksipermit,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "instransaksipermit",
                        "type" => "text",
                        "fc" => "instransaksipermit",
                        "placeholder" => "tambahkan instransaksipermit",
                        "value" => $form_data->instransaksipermit,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ketsuhan",
                        "type" => "text",
                        "fc" => "ketsuhan",
                        "placeholder" => "tambahkan ketsuhan",
                        "value" => $form_data->ketsuhan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ketpermit",
                        "type" => "text",
                        "fc" => "ketpermit",
                        "placeholder" => "tambahkan ketpermit",
                        "value" => $form_data->ketpermit,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "simpansuhan",
                        "type" => "text",
                        "fc" => "simpansuhan",
                        "placeholder" => "tambahkan simpansuhan",
                        "value" => $form_data->simpansuhan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kirimsuhan",
                        "type" => "text",
                        "fc" => "kirimsuhan",
                        "placeholder" => "tambahkan kirimsuhan",
                        "value" => $form_data->kirimsuhan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "simpanvisapermit",
                        "type" => "text",
                        "fc" => "simpanvisapermit",
                        "placeholder" => "tambahkan simpanvisapermit",
                        "value" => $form_data->simpanvisapermit,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kirimvisapermit",
                        "type" => "text",
                        "fc" => "kirimvisapermit",
                        "placeholder" => "tambahkan kirimvisapermit",
                        "value" => $form_data->kirimvisapermit,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglsimpansuhan",
                        "type" => "text",
                        "fc" => "tglsimpansuhan",
                        "placeholder" => "tambahkan tglsimpansuhan",
                        "value" => $form_data->tglsimpansuhan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statsuhan",
                        "type" => "text",
                        "fc" => "statsuhan",
                        "placeholder" => "tambahkan statsuhan",
                        "value" => $form_data->statsuhan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglsimpanvp",
                        "type" => "text",
                        "fc" => "tglsimpanvp",
                        "placeholder" => "tambahkan tglsimpanvp",
                        "value" => $form_data->tglsimpanvp,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statvp",
                        "type" => "text",
                        "fc" => "statvp",
                        "placeholder" => "tambahkan statvp",
                        "value" => $form_data->statvp,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "bandaratuju",
                        "type" => "text",
                        "fc" => "bandaratuju",
                        "placeholder" => "tambahkan bandaratuju",
                        "value" => $form_data->bandaratuju,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tanggal_input",
                        "type" => "text",
                        "fc" => "tanggal_input",
                        "placeholder" => "tambahkan tanggal_input",
                        "value" => $form_data->tanggal_input,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_scan_ke_indo",
                        "type" => "text",
                        "fc" => "tgl_scan_ke_indo",
                        "placeholder" => "tambahkan tgl_scan_ke_indo",
                        "value" => $form_data->tgl_scan_ke_indo,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgltrmspbg",
                        "type" => "text",
                        "fc" => "tgltrmspbg",
                        "placeholder" => "tambahkan tgltrmspbg",
                        "value" => $form_data->tgltrmspbg,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/majikan'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

