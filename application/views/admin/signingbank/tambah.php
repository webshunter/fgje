<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan signingbank</h1>
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
                    <form action="<?= site_url('admin/signingbank/simpan') ?>" method="post" enctype="multipart/form-data">
                        
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
                        "title" => "nama_bank",
                        "type" => "text",
                        "fc" => "nama_bank",
                        "placeholder" => "tambahkan nama_bank",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_bank",
                        "type" => "text",
                        "fc" => "tgl_bank",
                        "placeholder" => "tambahkan tgl_bank",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_tki_ttd",
                        "type" => "text",
                        "fc" => "tgl_tki_ttd",
                        "placeholder" => "tambahkan tgl_tki_ttd",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "idkredit",
                        "type" => "text",
                        "fc" => "idkredit",
                        "placeholder" => "tambahkan idkredit",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglapplycs",
                        "type" => "text",
                        "fc" => "tglapplycs",
                        "placeholder" => "tambahkan tglapplycs",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglterimacs",
                        "type" => "text",
                        "fc" => "tglterimacs",
                        "placeholder" => "tambahkan tglterimacs",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statustglterimacs",
                        "type" => "text",
                        "fc" => "statustglterimacs",
                        "placeholder" => "tambahkan statustglterimacs",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglapplyleg",
                        "type" => "text",
                        "fc" => "tglapplyleg",
                        "placeholder" => "tambahkan tglapplyleg",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgltrmleg",
                        "type" => "text",
                        "fc" => "tgltrmleg",
                        "placeholder" => "tambahkan tgltrmleg",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statustgltrmleg",
                        "type" => "text",
                        "fc" => "statustgltrmleg",
                        "placeholder" => "tambahkan statustgltrmleg",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgldokbank",
                        "type" => "text",
                        "fc" => "tgldokbank",
                        "placeholder" => "tambahkan tgldokbank",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "norektki",
                        "type" => "text",
                        "fc" => "norektki",
                        "placeholder" => "tambahkan norektki",
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
                        "title" => "pribadi",
                        "type" => "text",
                        "fc" => "pribadi",
                        "placeholder" => "tambahkan pribadi",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "karantina",
                        "type" => "text",
                        "fc" => "karantina",
                        "placeholder" => "tambahkan karantina",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/signingbank'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>