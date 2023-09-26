<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah markf</h1>
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
                    <form action="<?= site_url('admin/markf/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_markf",
                "value" => $form_data->id_markf,
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
                        "title" => "periode_kredit",
                        "type" => "text",
                        "fc" => "periode_kredit",
                        "placeholder" => "tambahkan periode_kredit",
                        "value" => $form_data->periode_kredit,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jumlah_kredit",
                        "type" => "text",
                        "fc" => "jumlah_kredit",
                        "placeholder" => "tambahkan jumlah_kredit",
                        "value" => $form_data->jumlah_kredit,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_email",
                        "type" => "text",
                        "fc" => "tgl_email",
                        "placeholder" => "tambahkan tgl_email",
                        "value" => $form_data->tgl_email,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ket_email",
                        "type" => "text",
                        "fc" => "ket_email",
                        "placeholder" => "tambahkan ket_email",
                        "value" => $form_data->ket_email,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_setelah_terbang",
                        "type" => "text",
                        "fc" => "tgl_setelah_terbang",
                        "placeholder" => "tambahkan tgl_setelah_terbang",
                        "value" => $form_data->tgl_setelah_terbang,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ket_setelah_terbang",
                        "type" => "text",
                        "fc" => "ket_setelah_terbang",
                        "placeholder" => "tambahkan ket_setelah_terbang",
                        "value" => $form_data->ket_setelah_terbang,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "info_berkas",
                        "type" => "text",
                        "fc" => "info_berkas",
                        "placeholder" => "tambahkan info_berkas",
                        "value" => $form_data->info_berkas,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "hptki_berkas",
                        "type" => "text",
                        "fc" => "hptki_berkas",
                        "placeholder" => "tambahkan hptki_berkas",
                        "value" => $form_data->hptki_berkas,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama_ambil_berkas",
                        "type" => "text",
                        "fc" => "nama_ambil_berkas",
                        "placeholder" => "tambahkan nama_ambil_berkas",
                        "value" => $form_data->nama_ambil_berkas,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama_hub_berkas",
                        "type" => "text",
                        "fc" => "nama_hub_berkas",
                        "placeholder" => "tambahkan nama_hub_berkas",
                        "value" => $form_data->nama_hub_berkas,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama_hp_berkas",
                        "type" => "text",
                        "fc" => "nama_hp_berkas",
                        "placeholder" => "tambahkan nama_hp_berkas",
                        "value" => $form_data->nama_hp_berkas,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama_terima_berkas",
                        "type" => "text",
                        "fc" => "nama_terima_berkas",
                        "placeholder" => "tambahkan nama_terima_berkas",
                        "value" => $form_data->nama_terima_berkas,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_ambil_dok",
                        "type" => "text",
                        "fc" => "tgl_ambil_dok",
                        "placeholder" => "tambahkan tgl_ambil_dok",
                        "value" => $form_data->tgl_ambil_dok,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama_ambil_dok",
                        "type" => "text",
                        "fc" => "nama_ambil_dok",
                        "placeholder" => "tambahkan nama_ambil_dok",
                        "value" => $form_data->nama_ambil_dok,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "hub_ambil_dok",
                        "type" => "text",
                        "fc" => "hub_ambil_dok",
                        "placeholder" => "tambahkan hub_ambil_dok",
                        "value" => $form_data->hub_ambil_dok,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tel_ambil_dok",
                        "type" => "text",
                        "fc" => "tel_ambil_dok",
                        "placeholder" => "tambahkan tel_ambil_dok",
                        "value" => $form_data->tel_ambil_dok,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama_serah_dok",
                        "type" => "text",
                        "fc" => "nama_serah_dok",
                        "placeholder" => "tambahkan nama_serah_dok",
                        "value" => $form_data->nama_serah_dok,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglujk",
                        "type" => "text",
                        "fc" => "tglujk",
                        "placeholder" => "tambahkan tglujk",
                        "value" => $form_data->tglujk,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglujk_status",
                        "type" => "text",
                        "fc" => "tglujk_status",
                        "placeholder" => "tambahkan tglujk_status",
                        "value" => $form_data->tglujk_status,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/markf'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

