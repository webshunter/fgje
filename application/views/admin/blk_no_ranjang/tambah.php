<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan blk_no_ranjang</h1>
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
                    <form action="<?= site_url('admin/blk_no_ranjang/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "kode_no_ranjang",
                        "type" => "text",
                        "fc" => "kode_no_ranjang",
                        "placeholder" => "tambahkan kode_no_ranjang",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "lokasi",
                        "type" => "text",
                        "fc" => "lokasi",
                        "placeholder" => "tambahkan lokasi",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ranjang",
                        "type" => "text",
                        "fc" => "ranjang",
                        "placeholder" => "tambahkan ranjang",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kasur",
                        "type" => "text",
                        "fc" => "kasur",
                        "placeholder" => "tambahkan kasur",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "sprei",
                        "type" => "text",
                        "fc" => "sprei",
                        "placeholder" => "tambahkan sprei",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "bantal",
                        "type" => "text",
                        "fc" => "bantal",
                        "placeholder" => "tambahkan bantal",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "sarung_bantal",
                        "type" => "text",
                        "fc" => "sarung_bantal",
                        "placeholder" => "tambahkan sarung_bantal",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_no_ranjang'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>