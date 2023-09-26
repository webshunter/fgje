<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan visa</h1>
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
                    <form action="<?= site_url('admin/visa/simpan') ?>" method="post" enctype="multipart/form-data">
                        
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
                        "title" => "novisa",
                        "type" => "text",
                        "fc" => "novisa",
                        "placeholder" => "tambahkan novisa",
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
                        "title" => "jabatan",
                        "type" => "text",
                        "fc" => "jabatan",
                        "placeholder" => "tambahkan jabatan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kocokan",
                        "type" => "text",
                        "fc" => "kocokan",
                        "placeholder" => "tambahkan kocokan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "finger",
                        "type" => "text",
                        "fc" => "finger",
                        "placeholder" => "tambahkan finger",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terima",
                        "type" => "text",
                        "fc" => "terima",
                        "placeholder" => "tambahkan terima",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statuskocokan",
                        "type" => "text",
                        "fc" => "statuskocokan",
                        "placeholder" => "tambahkan statuskocokan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statusfinger",
                        "type" => "text",
                        "fc" => "statusfinger",
                        "placeholder" => "tambahkan statusfinger",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statusterima",
                        "type" => "text",
                        "fc" => "statusterima",
                        "placeholder" => "tambahkan statusterima",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglberlaku",
                        "type" => "text",
                        "fc" => "tglberlaku",
                        "placeholder" => "tambahkan tglberlaku",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglsampai",
                        "type" => "text",
                        "fc" => "tglsampai",
                        "placeholder" => "tambahkan tglsampai",
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
                        "title" => "nopap",
                        "type" => "text",
                        "fc" => "nopap",
                        "placeholder" => "tambahkan nopap",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statuspap",
                        "type" => "text",
                        "fc" => "statuspap",
                        "placeholder" => "tambahkan statuspap",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ktkln",
                        "type" => "text",
                        "fc" => "ktkln",
                        "placeholder" => "tambahkan ktkln",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statusktkln",
                        "type" => "text",
                        "fc" => "statusktkln",
                        "placeholder" => "tambahkan statusktkln",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tanggalterbang",
                        "type" => "text",
                        "fc" => "tanggalterbang",
                        "placeholder" => "tambahkan tanggalterbang",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_terbang",
                        "type" => "text",
                        "fc" => "id_terbang",
                        "placeholder" => "tambahkan id_terbang",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statustgl",
                        "type" => "text",
                        "fc" => "statustgl",
                        "placeholder" => "tambahkan statustgl",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tiket",
                        "type" => "text",
                        "fc" => "tiket",
                        "placeholder" => "tambahkan tiket",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statusterbang",
                        "type" => "text",
                        "fc" => "statusterbang",
                        "placeholder" => "tambahkan statusterbang",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglberangkat",
                        "type" => "text",
                        "fc" => "tglberangkat",
                        "placeholder" => "tambahkan tglberangkat",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "airport",
                        "type" => "text",
                        "fc" => "airport",
                        "placeholder" => "tambahkan airport",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglterimadok",
                        "type" => "text",
                        "fc" => "tglterimadok",
                        "placeholder" => "tambahkan tglterimadok",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statsuhandok",
                        "type" => "text",
                        "fc" => "statsuhandok",
                        "placeholder" => "tambahkan statsuhandok",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tempatsuhandok",
                        "type" => "text",
                        "fc" => "tempatsuhandok",
                        "placeholder" => "tambahkan tempatsuhandok",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statvpdok",
                        "type" => "text",
                        "fc" => "statvpdok",
                        "placeholder" => "tambahkan statvpdok",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tempatvpdok",
                        "type" => "text",
                        "fc" => "tempatvpdok",
                        "placeholder" => "tambahkan tempatvpdok",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jddok",
                        "type" => "text",
                        "fc" => "jddok",
                        "placeholder" => "tambahkan jddok",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "arcdok",
                        "type" => "text",
                        "fc" => "arcdok",
                        "placeholder" => "tambahkan arcdok",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "icdok",
                        "type" => "text",
                        "fc" => "icdok",
                        "placeholder" => "tambahkan icdok",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ketdok",
                        "type" => "text",
                        "fc" => "ketdok",
                        "placeholder" => "tambahkan ketdok",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ketdoksuhan",
                        "type" => "text",
                        "fc" => "ketdoksuhan",
                        "placeholder" => "tambahkan ketdoksuhan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ketdokvp",
                        "type" => "text",
                        "fc" => "ketdokvp",
                        "placeholder" => "tambahkan ketdokvp",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "suhanketdok",
                        "type" => "text",
                        "fc" => "suhanketdok",
                        "placeholder" => "tambahkan suhanketdok",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "vpketdok",
                        "type" => "text",
                        "fc" => "vpketdok",
                        "placeholder" => "tambahkan vpketdok",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_biodata_titipan",
                        "type" => "text",
                        "fc" => "id_biodata_titipan",
                        "placeholder" => "tambahkan id_biodata_titipan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama_titipan",
                        "type" => "text",
                        "fc" => "nama_titipan",
                        "placeholder" => "tambahkan nama_titipan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_terbang_titipan",
                        "type" => "text",
                        "fc" => "tgl_terbang_titipan",
                        "placeholder" => "tambahkan tgl_terbang_titipan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "no_suhan_titipan",
                        "type" => "text",
                        "fc" => "no_suhan_titipan",
                        "placeholder" => "tambahkan no_suhan_titipan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "no_vp_titipan",
                        "type" => "text",
                        "fc" => "no_vp_titipan",
                        "placeholder" => "tambahkan no_vp_titipan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_biodata_dititipkan",
                        "type" => "text",
                        "fc" => "id_biodata_dititipkan",
                        "placeholder" => "tambahkan id_biodata_dititipkan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama_dititipkan",
                        "type" => "text",
                        "fc" => "nama_dititipkan",
                        "placeholder" => "tambahkan nama_dititipkan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_terbang_dititipkan",
                        "type" => "text",
                        "fc" => "tgl_terbang_dititipkan",
                        "placeholder" => "tambahkan tgl_terbang_dititipkan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "no_suhan_dititipkan",
                        "type" => "text",
                        "fc" => "no_suhan_dititipkan",
                        "placeholder" => "tambahkan no_suhan_dititipkan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_biodata_dititipkan2",
                        "type" => "text",
                        "fc" => "id_biodata_dititipkan2",
                        "placeholder" => "tambahkan id_biodata_dititipkan2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama_dititipkan2",
                        "type" => "text",
                        "fc" => "nama_dititipkan2",
                        "placeholder" => "tambahkan nama_dititipkan2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_terbang_dititipkan2",
                        "type" => "text",
                        "fc" => "tgl_terbang_dititipkan2",
                        "placeholder" => "tambahkan tgl_terbang_dititipkan2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "no_vp_dititipkan",
                        "type" => "text",
                        "fc" => "no_vp_dititipkan",
                        "placeholder" => "tambahkan no_vp_dititipkan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "isidok1",
                        "type" => "text",
                        "fc" => "isidok1",
                        "placeholder" => "tambahkan isidok1",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statdok1",
                        "type" => "text",
                        "fc" => "statdok1",
                        "placeholder" => "tambahkan statdok1",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "isidok2",
                        "type" => "text",
                        "fc" => "isidok2",
                        "placeholder" => "tambahkan isidok2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statdok2",
                        "type" => "text",
                        "fc" => "statdok2",
                        "placeholder" => "tambahkan statdok2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "isidok3",
                        "type" => "text",
                        "fc" => "isidok3",
                        "placeholder" => "tambahkan isidok3",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statdok3",
                        "type" => "text",
                        "fc" => "statdok3",
                        "placeholder" => "tambahkan statdok3",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "isidok4",
                        "type" => "text",
                        "fc" => "isidok4",
                        "placeholder" => "tambahkan isidok4",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statdok4",
                        "type" => "text",
                        "fc" => "statdok4",
                        "placeholder" => "tambahkan statdok4",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "isidok5",
                        "type" => "text",
                        "fc" => "isidok5",
                        "placeholder" => "tambahkan isidok5",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statdok5",
                        "type" => "text",
                        "fc" => "statdok5",
                        "placeholder" => "tambahkan statdok5",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "isidok6",
                        "type" => "text",
                        "fc" => "isidok6",
                        "placeholder" => "tambahkan isidok6",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statdok6",
                        "type" => "text",
                        "fc" => "statdok6",
                        "placeholder" => "tambahkan statdok6",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "isidok7",
                        "type" => "text",
                        "fc" => "isidok7",
                        "placeholder" => "tambahkan isidok7",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statdok7",
                        "type" => "text",
                        "fc" => "statdok7",
                        "placeholder" => "tambahkan statdok7",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "isidok8",
                        "type" => "text",
                        "fc" => "isidok8",
                        "placeholder" => "tambahkan isidok8",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statdok8",
                        "type" => "text",
                        "fc" => "statdok8",
                        "placeholder" => "tambahkan statdok8",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "apendik_a",
                        "type" => "text",
                        "fc" => "apendik_a",
                        "placeholder" => "tambahkan apendik_a",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "apendik_b",
                        "type" => "text",
                        "fc" => "apendik_b",
                        "placeholder" => "tambahkan apendik_b",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "apendik_c",
                        "type" => "text",
                        "fc" => "apendik_c",
                        "placeholder" => "tambahkan apendik_c",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "apendik_d",
                        "type" => "text",
                        "fc" => "apendik_d",
                        "placeholder" => "tambahkan apendik_d",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tanggal_input",
                        "type" => "text",
                        "fc" => "tanggal_input",
                        "placeholder" => "tambahkan tanggal_input",
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