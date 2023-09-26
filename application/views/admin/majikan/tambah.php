<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan majikan</h1>
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
                    <form action="<?= site_url('admin/majikan/simpan') ?>" method="post" enctype="multipart/form-data">
                        
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
                        "title" => "kode_group",
                        "type" => "text",
                        "fc" => "kode_group",
                        "placeholder" => "tambahkan kode_group",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kode_agen",
                        "type" => "text",
                        "fc" => "kode_agen",
                        "placeholder" => "tambahkan kode_agen",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kode_majikan",
                        "type" => "text",
                        "fc" => "kode_majikan",
                        "placeholder" => "tambahkan kode_majikan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kode_suhan",
                        "type" => "text",
                        "fc" => "kode_suhan",
                        "placeholder" => "tambahkan kode_suhan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kode_visapermit",
                        "type" => "text",
                        "fc" => "kode_visapermit",
                        "placeholder" => "tambahkan kode_visapermit",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "namamajikan",
                        "type" => "text",
                        "fc" => "namamajikan",
                        "placeholder" => "tambahkan namamajikan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "namataiwan",
                        "type" => "text",
                        "fc" => "namataiwan",
                        "placeholder" => "tambahkan namataiwan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "alamatmajikan",
                        "type" => "text",
                        "fc" => "alamatmajikan",
                        "placeholder" => "tambahkan alamatmajikan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "notelpmajikan",
                        "type" => "text",
                        "fc" => "notelpmajikan",
                        "placeholder" => "tambahkan notelpmajikan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglterpilih",
                        "type" => "text",
                        "fc" => "tglterpilih",
                        "placeholder" => "tambahkan tglterpilih",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statustglterbang",
                        "type" => "text",
                        "fc" => "statustglterbang",
                        "placeholder" => "tambahkan statustglterbang",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "JD",
                        "type" => "text",
                        "fc" => "JD",
                        "placeholder" => "tambahkan JD",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglterbang",
                        "type" => "text",
                        "fc" => "tglterbang",
                        "placeholder" => "tambahkan tglterbang",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_majikannya",
                        "type" => "text",
                        "fc" => "id_majikannya",
                        "placeholder" => "tambahkan id_majikannya",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_suhan",
                        "type" => "text",
                        "fc" => "id_suhan",
                        "placeholder" => "tambahkan id_suhan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_visapermit",
                        "type" => "text",
                        "fc" => "id_visapermit",
                        "placeholder" => "tambahkan id_visapermit",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kode_visa",
                        "type" => "text",
                        "fc" => "kode_visa",
                        "placeholder" => "tambahkan kode_visa",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglpk",
                        "type" => "text",
                        "fc" => "tglpk",
                        "placeholder" => "tambahkan tglpk",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglterbitsuhan",
                        "type" => "text",
                        "fc" => "tglterbitsuhan",
                        "placeholder" => "tambahkan tglterbitsuhan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglterimasuhan",
                        "type" => "text",
                        "fc" => "tglterimasuhan",
                        "placeholder" => "tambahkan tglterimasuhan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglterbitpermit",
                        "type" => "text",
                        "fc" => "tglterbitpermit",
                        "placeholder" => "tambahkan tglterbitpermit",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglterimapermit",
                        "type" => "text",
                        "fc" => "tglterimapermit",
                        "placeholder" => "tambahkan tglterimapermit",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "insterimasuhan",
                        "type" => "text",
                        "fc" => "insterimasuhan",
                        "placeholder" => "tambahkan insterimasuhan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglinfosuhan",
                        "type" => "text",
                        "fc" => "tglinfosuhan",
                        "placeholder" => "tambahkan tglinfosuhan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgltransaksisuhan",
                        "type" => "text",
                        "fc" => "tgltransaksisuhan",
                        "placeholder" => "tambahkan tgltransaksisuhan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "instransaksisuhan",
                        "type" => "text",
                        "fc" => "instransaksisuhan",
                        "placeholder" => "tambahkan instransaksisuhan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "insterimapermit",
                        "type" => "text",
                        "fc" => "insterimapermit",
                        "placeholder" => "tambahkan insterimapermit",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglinfopermit",
                        "type" => "text",
                        "fc" => "tglinfopermit",
                        "placeholder" => "tambahkan tglinfopermit",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgltransaksipermit",
                        "type" => "text",
                        "fc" => "tgltransaksipermit",
                        "placeholder" => "tambahkan tgltransaksipermit",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "instransaksipermit",
                        "type" => "text",
                        "fc" => "instransaksipermit",
                        "placeholder" => "tambahkan instransaksipermit",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ketsuhan",
                        "type" => "text",
                        "fc" => "ketsuhan",
                        "placeholder" => "tambahkan ketsuhan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ketpermit",
                        "type" => "text",
                        "fc" => "ketpermit",
                        "placeholder" => "tambahkan ketpermit",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "simpansuhan",
                        "type" => "text",
                        "fc" => "simpansuhan",
                        "placeholder" => "tambahkan simpansuhan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kirimsuhan",
                        "type" => "text",
                        "fc" => "kirimsuhan",
                        "placeholder" => "tambahkan kirimsuhan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "simpanvisapermit",
                        "type" => "text",
                        "fc" => "simpanvisapermit",
                        "placeholder" => "tambahkan simpanvisapermit",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kirimvisapermit",
                        "type" => "text",
                        "fc" => "kirimvisapermit",
                        "placeholder" => "tambahkan kirimvisapermit",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglsimpansuhan",
                        "type" => "text",
                        "fc" => "tglsimpansuhan",
                        "placeholder" => "tambahkan tglsimpansuhan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statsuhan",
                        "type" => "text",
                        "fc" => "statsuhan",
                        "placeholder" => "tambahkan statsuhan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglsimpanvp",
                        "type" => "text",
                        "fc" => "tglsimpanvp",
                        "placeholder" => "tambahkan tglsimpanvp",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statvp",
                        "type" => "text",
                        "fc" => "statvp",
                        "placeholder" => "tambahkan statvp",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "bandaratuju",
                        "type" => "text",
                        "fc" => "bandaratuju",
                        "placeholder" => "tambahkan bandaratuju",
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
            
                <?=
                    form::input([
                        "title" => "tgl_scan_ke_indo",
                        "type" => "text",
                        "fc" => "tgl_scan_ke_indo",
                        "placeholder" => "tambahkan tgl_scan_ke_indo",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgltrmspbg",
                        "type" => "text",
                        "fc" => "tgltrmspbg",
                        "placeholder" => "tambahkan tgltrmspbg",
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