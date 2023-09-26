<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah visa</h1>
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
                    <form action="<?= site_url('admin/visa/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_visa",
                "value" => $form_data->id_visa,
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
                        "title" => "novisa",
                        "type" => "text",
                        "fc" => "novisa",
                        "placeholder" => "tambahkan novisa",
                        "value" => $form_data->novisa,
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
                        "title" => "jabatan",
                        "type" => "text",
                        "fc" => "jabatan",
                        "placeholder" => "tambahkan jabatan",
                        "value" => $form_data->jabatan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kocokan",
                        "type" => "text",
                        "fc" => "kocokan",
                        "placeholder" => "tambahkan kocokan",
                        "value" => $form_data->kocokan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "finger",
                        "type" => "text",
                        "fc" => "finger",
                        "placeholder" => "tambahkan finger",
                        "value" => $form_data->finger,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terima",
                        "type" => "text",
                        "fc" => "terima",
                        "placeholder" => "tambahkan terima",
                        "value" => $form_data->terima,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statuskocokan",
                        "type" => "text",
                        "fc" => "statuskocokan",
                        "placeholder" => "tambahkan statuskocokan",
                        "value" => $form_data->statuskocokan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statusfinger",
                        "type" => "text",
                        "fc" => "statusfinger",
                        "placeholder" => "tambahkan statusfinger",
                        "value" => $form_data->statusfinger,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statusterima",
                        "type" => "text",
                        "fc" => "statusterima",
                        "placeholder" => "tambahkan statusterima",
                        "value" => $form_data->statusterima,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglberlaku",
                        "type" => "text",
                        "fc" => "tglberlaku",
                        "placeholder" => "tambahkan tglberlaku",
                        "value" => $form_data->tglberlaku,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglsampai",
                        "type" => "text",
                        "fc" => "tglsampai",
                        "placeholder" => "tambahkan tglsampai",
                        "value" => $form_data->tglsampai,
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
                        "title" => "nopap",
                        "type" => "text",
                        "fc" => "nopap",
                        "placeholder" => "tambahkan nopap",
                        "value" => $form_data->nopap,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statuspap",
                        "type" => "text",
                        "fc" => "statuspap",
                        "placeholder" => "tambahkan statuspap",
                        "value" => $form_data->statuspap,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ktkln",
                        "type" => "text",
                        "fc" => "ktkln",
                        "placeholder" => "tambahkan ktkln",
                        "value" => $form_data->ktkln,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statusktkln",
                        "type" => "text",
                        "fc" => "statusktkln",
                        "placeholder" => "tambahkan statusktkln",
                        "value" => $form_data->statusktkln,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tanggalterbang",
                        "type" => "text",
                        "fc" => "tanggalterbang",
                        "placeholder" => "tambahkan tanggalterbang",
                        "value" => $form_data->tanggalterbang,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_terbang",
                        "type" => "text",
                        "fc" => "id_terbang",
                        "placeholder" => "tambahkan id_terbang",
                        "value" => $form_data->id_terbang,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statustgl",
                        "type" => "text",
                        "fc" => "statustgl",
                        "placeholder" => "tambahkan statustgl",
                        "value" => $form_data->statustgl,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tiket",
                        "type" => "text",
                        "fc" => "tiket",
                        "placeholder" => "tambahkan tiket",
                        "value" => $form_data->tiket,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statusterbang",
                        "type" => "text",
                        "fc" => "statusterbang",
                        "placeholder" => "tambahkan statusterbang",
                        "value" => $form_data->statusterbang,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglberangkat",
                        "type" => "text",
                        "fc" => "tglberangkat",
                        "placeholder" => "tambahkan tglberangkat",
                        "value" => $form_data->tglberangkat,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "airport",
                        "type" => "text",
                        "fc" => "airport",
                        "placeholder" => "tambahkan airport",
                        "value" => $form_data->airport,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglterimadok",
                        "type" => "text",
                        "fc" => "tglterimadok",
                        "placeholder" => "tambahkan tglterimadok",
                        "value" => $form_data->tglterimadok,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statsuhandok",
                        "type" => "text",
                        "fc" => "statsuhandok",
                        "placeholder" => "tambahkan statsuhandok",
                        "value" => $form_data->statsuhandok,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tempatsuhandok",
                        "type" => "text",
                        "fc" => "tempatsuhandok",
                        "placeholder" => "tambahkan tempatsuhandok",
                        "value" => $form_data->tempatsuhandok,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statvpdok",
                        "type" => "text",
                        "fc" => "statvpdok",
                        "placeholder" => "tambahkan statvpdok",
                        "value" => $form_data->statvpdok,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tempatvpdok",
                        "type" => "text",
                        "fc" => "tempatvpdok",
                        "placeholder" => "tambahkan tempatvpdok",
                        "value" => $form_data->tempatvpdok,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jddok",
                        "type" => "text",
                        "fc" => "jddok",
                        "placeholder" => "tambahkan jddok",
                        "value" => $form_data->jddok,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "arcdok",
                        "type" => "text",
                        "fc" => "arcdok",
                        "placeholder" => "tambahkan arcdok",
                        "value" => $form_data->arcdok,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "icdok",
                        "type" => "text",
                        "fc" => "icdok",
                        "placeholder" => "tambahkan icdok",
                        "value" => $form_data->icdok,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ketdok",
                        "type" => "text",
                        "fc" => "ketdok",
                        "placeholder" => "tambahkan ketdok",
                        "value" => $form_data->ketdok,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ketdoksuhan",
                        "type" => "text",
                        "fc" => "ketdoksuhan",
                        "placeholder" => "tambahkan ketdoksuhan",
                        "value" => $form_data->ketdoksuhan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ketdokvp",
                        "type" => "text",
                        "fc" => "ketdokvp",
                        "placeholder" => "tambahkan ketdokvp",
                        "value" => $form_data->ketdokvp,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "suhanketdok",
                        "type" => "text",
                        "fc" => "suhanketdok",
                        "placeholder" => "tambahkan suhanketdok",
                        "value" => $form_data->suhanketdok,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "vpketdok",
                        "type" => "text",
                        "fc" => "vpketdok",
                        "placeholder" => "tambahkan vpketdok",
                        "value" => $form_data->vpketdok,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_biodata_titipan",
                        "type" => "text",
                        "fc" => "id_biodata_titipan",
                        "placeholder" => "tambahkan id_biodata_titipan",
                        "value" => $form_data->id_biodata_titipan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama_titipan",
                        "type" => "text",
                        "fc" => "nama_titipan",
                        "placeholder" => "tambahkan nama_titipan",
                        "value" => $form_data->nama_titipan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_terbang_titipan",
                        "type" => "text",
                        "fc" => "tgl_terbang_titipan",
                        "placeholder" => "tambahkan tgl_terbang_titipan",
                        "value" => $form_data->tgl_terbang_titipan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "no_suhan_titipan",
                        "type" => "text",
                        "fc" => "no_suhan_titipan",
                        "placeholder" => "tambahkan no_suhan_titipan",
                        "value" => $form_data->no_suhan_titipan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "no_vp_titipan",
                        "type" => "text",
                        "fc" => "no_vp_titipan",
                        "placeholder" => "tambahkan no_vp_titipan",
                        "value" => $form_data->no_vp_titipan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_biodata_dititipkan",
                        "type" => "text",
                        "fc" => "id_biodata_dititipkan",
                        "placeholder" => "tambahkan id_biodata_dititipkan",
                        "value" => $form_data->id_biodata_dititipkan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama_dititipkan",
                        "type" => "text",
                        "fc" => "nama_dititipkan",
                        "placeholder" => "tambahkan nama_dititipkan",
                        "value" => $form_data->nama_dititipkan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_terbang_dititipkan",
                        "type" => "text",
                        "fc" => "tgl_terbang_dititipkan",
                        "placeholder" => "tambahkan tgl_terbang_dititipkan",
                        "value" => $form_data->tgl_terbang_dititipkan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "no_suhan_dititipkan",
                        "type" => "text",
                        "fc" => "no_suhan_dititipkan",
                        "placeholder" => "tambahkan no_suhan_dititipkan",
                        "value" => $form_data->no_suhan_dititipkan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_biodata_dititipkan2",
                        "type" => "text",
                        "fc" => "id_biodata_dititipkan2",
                        "placeholder" => "tambahkan id_biodata_dititipkan2",
                        "value" => $form_data->id_biodata_dititipkan2,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama_dititipkan2",
                        "type" => "text",
                        "fc" => "nama_dititipkan2",
                        "placeholder" => "tambahkan nama_dititipkan2",
                        "value" => $form_data->nama_dititipkan2,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_terbang_dititipkan2",
                        "type" => "text",
                        "fc" => "tgl_terbang_dititipkan2",
                        "placeholder" => "tambahkan tgl_terbang_dititipkan2",
                        "value" => $form_data->tgl_terbang_dititipkan2,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "no_vp_dititipkan",
                        "type" => "text",
                        "fc" => "no_vp_dititipkan",
                        "placeholder" => "tambahkan no_vp_dititipkan",
                        "value" => $form_data->no_vp_dititipkan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "isidok1",
                        "type" => "text",
                        "fc" => "isidok1",
                        "placeholder" => "tambahkan isidok1",
                        "value" => $form_data->isidok1,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statdok1",
                        "type" => "text",
                        "fc" => "statdok1",
                        "placeholder" => "tambahkan statdok1",
                        "value" => $form_data->statdok1,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "isidok2",
                        "type" => "text",
                        "fc" => "isidok2",
                        "placeholder" => "tambahkan isidok2",
                        "value" => $form_data->isidok2,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statdok2",
                        "type" => "text",
                        "fc" => "statdok2",
                        "placeholder" => "tambahkan statdok2",
                        "value" => $form_data->statdok2,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "isidok3",
                        "type" => "text",
                        "fc" => "isidok3",
                        "placeholder" => "tambahkan isidok3",
                        "value" => $form_data->isidok3,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statdok3",
                        "type" => "text",
                        "fc" => "statdok3",
                        "placeholder" => "tambahkan statdok3",
                        "value" => $form_data->statdok3,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "isidok4",
                        "type" => "text",
                        "fc" => "isidok4",
                        "placeholder" => "tambahkan isidok4",
                        "value" => $form_data->isidok4,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statdok4",
                        "type" => "text",
                        "fc" => "statdok4",
                        "placeholder" => "tambahkan statdok4",
                        "value" => $form_data->statdok4,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "isidok5",
                        "type" => "text",
                        "fc" => "isidok5",
                        "placeholder" => "tambahkan isidok5",
                        "value" => $form_data->isidok5,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statdok5",
                        "type" => "text",
                        "fc" => "statdok5",
                        "placeholder" => "tambahkan statdok5",
                        "value" => $form_data->statdok5,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "isidok6",
                        "type" => "text",
                        "fc" => "isidok6",
                        "placeholder" => "tambahkan isidok6",
                        "value" => $form_data->isidok6,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statdok6",
                        "type" => "text",
                        "fc" => "statdok6",
                        "placeholder" => "tambahkan statdok6",
                        "value" => $form_data->statdok6,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "isidok7",
                        "type" => "text",
                        "fc" => "isidok7",
                        "placeholder" => "tambahkan isidok7",
                        "value" => $form_data->isidok7,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statdok7",
                        "type" => "text",
                        "fc" => "statdok7",
                        "placeholder" => "tambahkan statdok7",
                        "value" => $form_data->statdok7,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "isidok8",
                        "type" => "text",
                        "fc" => "isidok8",
                        "placeholder" => "tambahkan isidok8",
                        "value" => $form_data->isidok8,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statdok8",
                        "type" => "text",
                        "fc" => "statdok8",
                        "placeholder" => "tambahkan statdok8",
                        "value" => $form_data->statdok8,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "apendik_a",
                        "type" => "text",
                        "fc" => "apendik_a",
                        "placeholder" => "tambahkan apendik_a",
                        "value" => $form_data->apendik_a,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "apendik_b",
                        "type" => "text",
                        "fc" => "apendik_b",
                        "placeholder" => "tambahkan apendik_b",
                        "value" => $form_data->apendik_b,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "apendik_c",
                        "type" => "text",
                        "fc" => "apendik_c",
                        "placeholder" => "tambahkan apendik_c",
                        "value" => $form_data->apendik_c,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "apendik_d",
                        "type" => "text",
                        "fc" => "apendik_d",
                        "placeholder" => "tambahkan apendik_d",
                        "value" => $form_data->apendik_d,
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
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/visa'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

