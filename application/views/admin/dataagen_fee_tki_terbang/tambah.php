<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan dataagen_fee_tki_terbang</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
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
                    <form action="<?= site_url('admin/dataagen_fee_tki_terbang/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "tgl1",
                        "type" => "text",
                        "fc" => "tgl1",
                        "placeholder" => "tambahkan tgl1",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl2",
                        "type" => "text",
                        "fc" => "tgl2",
                        "placeholder" => "tambahkan tgl2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "catatan",
                        "type" => "text",
                        "fc" => "catatan",
                        "placeholder" => "tambahkan catatan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_transfer",
                        "type" => "text",
                        "fc" => "tgl_transfer",
                        "placeholder" => "tambahkan tgl_transfer",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "pilihan",
                        "type" => "text",
                        "fc" => "pilihan",
                        "placeholder" => "tambahkan pilihan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "group",
                        "type" => "text",
                        "fc" => "group",
                        "placeholder" => "tambahkan group",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "agen",
                        "type" => "text",
                        "fc" => "agen",
                        "placeholder" => "tambahkan agen",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jenis_tki",
                        "type" => "text",
                        "fc" => "jenis_tki",
                        "placeholder" => "tambahkan jenis_tki",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "data",
                        "type" => "text",
                        "fc" => "data",
                        "placeholder" => "tambahkan data",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "agen_list",
                        "type" => "text",
                        "fc" => "agen_list",
                        "placeholder" => "tambahkan agen_list",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "date_created",
                        "type" => "text",
                        "fc" => "date_created",
                        "placeholder" => "tambahkan date_created",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "deleted_at",
                        "type" => "text",
                        "fc" => "deleted_at",
                        "placeholder" => "tambahkan deleted_at",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/dataagen_fee_tki_terbang'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>