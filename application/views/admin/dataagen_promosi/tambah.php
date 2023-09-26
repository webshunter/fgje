<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan dataagen_promosi</h1>
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
                    <form action="<?= site_url('admin/dataagen_promosi/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "tgl_transfer_doku",
                        "type" => "text",
                        "fc" => "tgl_transfer_doku",
                        "placeholder" => "tambahkan tgl_transfer_doku",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "agen_id",
                        "type" => "text",
                        "fc" => "agen_id",
                        "placeholder" => "tambahkan agen_id",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "bank_id",
                        "type" => "text",
                        "fc" => "bank_id",
                        "placeholder" => "tambahkan bank_id",
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
                        "title" => "date_created",
                        "type" => "text",
                        "fc" => "date_created",
                        "placeholder" => "tambahkan date_created",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "softDelete",
                        "type" => "text",
                        "fc" => "softDelete",
                        "placeholder" => "tambahkan softDelete",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/dataagen_promosi'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>