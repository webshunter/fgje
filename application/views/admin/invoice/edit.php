<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah invoice</h1>
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
                    <form action="<?= site_url('admin/invoice/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_invoice",
                "value" => $form_data->id_invoice,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "ip",
                        "type" => "text",
                        "fc" => "ip",
                        "placeholder" => "tambahkan ip",
                        "value" => $form_data->ip,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_diisi",
                        "type" => "text",
                        "fc" => "tgl_diisi",
                        "placeholder" => "tambahkan tgl_diisi",
                        "value" => $form_data->tgl_diisi,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "date_modified",
                        "type" => "text",
                        "fc" => "date_modified",
                        "placeholder" => "tambahkan date_modified",
                        "value" => $form_data->date_modified,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "bulan",
                        "type" => "text",
                        "fc" => "bulan",
                        "placeholder" => "tambahkan bulan",
                        "value" => $form_data->bulan,
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
                        "title" => "pnbp",
                        "type" => "text",
                        "fc" => "pnbp",
                        "placeholder" => "tambahkan pnbp",
                        "value" => $form_data->pnbp,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "sidik_jari",
                        "type" => "text",
                        "fc" => "sidik_jari",
                        "placeholder" => "tambahkan sidik_jari",
                        "value" => $form_data->sidik_jari,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "foto",
                        "type" => "text",
                        "fc" => "foto",
                        "placeholder" => "tambahkan foto",
                        "value" => $form_data->foto,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "online",
                        "type" => "text",
                        "fc" => "online",
                        "placeholder" => "tambahkan online",
                        "value" => $form_data->online,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kesehatan",
                        "type" => "text",
                        "fc" => "kesehatan",
                        "placeholder" => "tambahkan kesehatan",
                        "value" => $form_data->kesehatan,
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
                        "title" => "asuransi",
                        "type" => "text",
                        "fc" => "asuransi",
                        "placeholder" => "tambahkan asuransi",
                        "value" => $form_data->asuransi,
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
                        "title" => "id",
                        "type" => "text",
                        "fc" => "id",
                        "placeholder" => "tambahkan id",
                        "value" => $form_data->id,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "transport",
                        "type" => "text",
                        "fc" => "transport",
                        "placeholder" => "tambahkan transport",
                        "value" => $form_data->transport,
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
                        "title" => "airport",
                        "type" => "text",
                        "fc" => "airport",
                        "placeholder" => "tambahkan airport",
                        "value" => $form_data->airport,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ujk",
                        "type" => "text",
                        "fc" => "ujk",
                        "placeholder" => "tambahkan ujk",
                        "value" => $form_data->ujk,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "akomodasi",
                        "type" => "text",
                        "fc" => "akomodasi",
                        "placeholder" => "tambahkan akomodasi",
                        "value" => $form_data->akomodasi,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "konsumsi",
                        "type" => "text",
                        "fc" => "konsumsi",
                        "placeholder" => "tambahkan konsumsi",
                        "value" => $form_data->konsumsi,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ins_honor",
                        "type" => "text",
                        "fc" => "ins_honor",
                        "placeholder" => "tambahkan ins_honor",
                        "value" => $form_data->ins_honor,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ins_transport",
                        "type" => "text",
                        "fc" => "ins_transport",
                        "placeholder" => "tambahkan ins_transport",
                        "value" => $form_data->ins_transport,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "buku_baju",
                        "type" => "text",
                        "fc" => "buku_baju",
                        "placeholder" => "tambahkan buku_baju",
                        "value" => $form_data->buku_baju,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "alat_praktek",
                        "type" => "text",
                        "fc" => "alat_praktek",
                        "placeholder" => "tambahkan alat_praktek",
                        "value" => $form_data->alat_praktek,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "atk",
                        "type" => "text",
                        "fc" => "atk",
                        "placeholder" => "tambahkan atk",
                        "value" => $form_data->atk,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "fee_pl",
                        "type" => "text",
                        "fc" => "fee_pl",
                        "placeholder" => "tambahkan fee_pl",
                        "value" => $form_data->fee_pl,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/invoice'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

