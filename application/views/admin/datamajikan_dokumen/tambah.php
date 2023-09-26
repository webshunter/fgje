<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan datamajikan_dokumen</h1>
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
                    <form action="<?= site_url('admin/datamajikan_dokumen/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "filetglinput",
                        "type" => "text",
                        "fc" => "filetglinput",
                        "placeholder" => "tambahkan filetglinput",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "file",
                        "type" => "text",
                        "fc" => "file",
                        "placeholder" => "tambahkan file",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "majikan_id",
                        "type" => "text",
                        "fc" => "majikan_id",
                        "placeholder" => "tambahkan majikan_id",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/datamajikan_dokumen'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>