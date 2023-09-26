<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan dataagen_penerima_nama</h1>
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
                    <form action="<?= site_url('admin/dataagen_penerima_nama/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "nama",
                        "type" => "text",
                        "fc" => "nama",
                        "placeholder" => "tambahkan nama",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "namamandarin",
                        "type" => "text",
                        "fc" => "namamandarin",
                        "placeholder" => "tambahkan namamandarin",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "branch",
                        "type" => "text",
                        "fc" => "branch",
                        "placeholder" => "tambahkan branch",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "bank_code",
                        "type" => "text",
                        "fc" => "bank_code",
                        "placeholder" => "tambahkan bank_code",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "bank_no",
                        "type" => "text",
                        "fc" => "bank_no",
                        "placeholder" => "tambahkan bank_no",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "bank_tel",
                        "type" => "text",
                        "fc" => "bank_tel",
                        "placeholder" => "tambahkan bank_tel",
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
                          <a class="btn btn-default" href="<?= site_url('admin/dataagen_penerima_nama'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>