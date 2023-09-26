<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan datasuhan</h1>
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
                    <form action="<?= site_url('admin/datasuhan/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "id_group",
                        "type" => "text",
                        "fc" => "id_group",
                        "placeholder" => "tambahkan id_group",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_agen",
                        "type" => "text",
                        "fc" => "id_agen",
                        "placeholder" => "tambahkan id_agen",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_majikan",
                        "type" => "text",
                        "fc" => "id_majikan",
                        "placeholder" => "tambahkan id_majikan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "no_suhan",
                        "type" => "text",
                        "fc" => "no_suhan",
                        "placeholder" => "tambahkan no_suhan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglterbit",
                        "type" => "text",
                        "fc" => "tglterbit",
                        "placeholder" => "tambahkan tglterbit",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglexp",
                        "type" => "text",
                        "fc" => "tglexp",
                        "placeholder" => "tambahkan tglexp",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglterima",
                        "type" => "text",
                        "fc" => "tglterima",
                        "placeholder" => "tambahkan tglterima",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglsimpan",
                        "type" => "text",
                        "fc" => "tglsimpan",
                        "placeholder" => "tambahkan tglsimpan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglbawa",
                        "type" => "text",
                        "fc" => "tglbawa",
                        "placeholder" => "tambahkan tglbawa",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglminta",
                        "type" => "text",
                        "fc" => "tglminta",
                        "placeholder" => "tambahkan tglminta",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "quotasuhan",
                        "type" => "text",
                        "fc" => "quotasuhan",
                        "placeholder" => "tambahkan quotasuhan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "filesuhan",
                        "type" => "text",
                        "fc" => "filesuhan",
                        "placeholder" => "tambahkan filesuhan",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/datasuhan'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>