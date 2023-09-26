<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan blk_invoice_reftuk</h1>
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
                    <form action="<?= site_url('admin/blk_invoice_reftuk/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "id_invoice_reftuk",
                        "type" => "text",
                        "fc" => "id_invoice_reftuk",
                        "placeholder" => "tambahkan id_invoice_reftuk",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "noinvoice_reftuk",
                        "type" => "text",
                        "fc" => "noinvoice_reftuk",
                        "placeholder" => "tambahkan noinvoice_reftuk",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglsurat",
                        "type" => "text",
                        "fc" => "tglsurat",
                        "placeholder" => "tambahkan tglsurat",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "lembagalsp",
                        "type" => "text",
                        "fc" => "lembagalsp",
                        "placeholder" => "tambahkan lembagalsp",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "biaya",
                        "type" => "text",
                        "fc" => "biaya",
                        "placeholder" => "tambahkan biaya",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_laporan_bulanan",
                        "type" => "text",
                        "fc" => "id_laporan_bulanan",
                        "placeholder" => "tambahkan id_laporan_bulanan",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_invoice_reftuk'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>