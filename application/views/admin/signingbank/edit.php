<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah signingbank</h1>
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
                    <form action="<?= site_url('admin/signingbank/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_signing",
                "value" => $form_data->id_signing,
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
                        "title" => "nama_bank",
                        "type" => "text",
                        "fc" => "nama_bank",
                        "placeholder" => "tambahkan nama_bank",
                        "value" => $form_data->nama_bank,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_bank",
                        "type" => "text",
                        "fc" => "tgl_bank",
                        "placeholder" => "tambahkan tgl_bank",
                        "value" => $form_data->tgl_bank,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_tki_ttd",
                        "type" => "text",
                        "fc" => "tgl_tki_ttd",
                        "placeholder" => "tambahkan tgl_tki_ttd",
                        "value" => $form_data->tgl_tki_ttd,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "idkredit",
                        "type" => "text",
                        "fc" => "idkredit",
                        "placeholder" => "tambahkan idkredit",
                        "value" => $form_data->idkredit,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglapplycs",
                        "type" => "text",
                        "fc" => "tglapplycs",
                        "placeholder" => "tambahkan tglapplycs",
                        "value" => $form_data->tglapplycs,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglterimacs",
                        "type" => "text",
                        "fc" => "tglterimacs",
                        "placeholder" => "tambahkan tglterimacs",
                        "value" => $form_data->tglterimacs,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statustglterimacs",
                        "type" => "text",
                        "fc" => "statustglterimacs",
                        "placeholder" => "tambahkan statustglterimacs",
                        "value" => $form_data->statustglterimacs,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglapplyleg",
                        "type" => "text",
                        "fc" => "tglapplyleg",
                        "placeholder" => "tambahkan tglapplyleg",
                        "value" => $form_data->tglapplyleg,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgltrmleg",
                        "type" => "text",
                        "fc" => "tgltrmleg",
                        "placeholder" => "tambahkan tgltrmleg",
                        "value" => $form_data->tgltrmleg,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statustgltrmleg",
                        "type" => "text",
                        "fc" => "statustgltrmleg",
                        "placeholder" => "tambahkan statustgltrmleg",
                        "value" => $form_data->statustgltrmleg,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgldokbank",
                        "type" => "text",
                        "fc" => "tgldokbank",
                        "placeholder" => "tambahkan tgldokbank",
                        "value" => $form_data->tgldokbank,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "norektki",
                        "type" => "text",
                        "fc" => "norektki",
                        "placeholder" => "tambahkan norektki",
                        "value" => $form_data->norektki,
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
                        "title" => "pribadi",
                        "type" => "text",
                        "fc" => "pribadi",
                        "placeholder" => "tambahkan pribadi",
                        "value" => $form_data->pribadi,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "karantina",
                        "type" => "text",
                        "fc" => "karantina",
                        "placeholder" => "tambahkan karantina",
                        "value" => $form_data->karantina,
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

