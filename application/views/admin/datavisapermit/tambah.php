<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan datavisapermit</h1>
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
                    <form action="<?= site_url('admin/datavisapermit/simpan') ?>" method="post" enctype="multipart/form-data">
                        
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
                        "title" => "id_suhan",
                        "type" => "text",
                        "fc" => "id_suhan",
                        "placeholder" => "tambahkan id_suhan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "no_visapermit",
                        "type" => "text",
                        "fc" => "no_visapermit",
                        "placeholder" => "tambahkan no_visapermit",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglterbitvs",
                        "type" => "text",
                        "fc" => "tglterbitvs",
                        "placeholder" => "tambahkan tglterbitvs",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglexpvs",
                        "type" => "text",
                        "fc" => "tglexpvs",
                        "placeholder" => "tambahkan tglexpvs",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglterimavs",
                        "type" => "text",
                        "fc" => "tglterimavs",
                        "placeholder" => "tambahkan tglterimavs",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglsimpanvs",
                        "type" => "text",
                        "fc" => "tglsimpanvs",
                        "placeholder" => "tambahkan tglsimpanvs",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglbawavs",
                        "type" => "text",
                        "fc" => "tglbawavs",
                        "placeholder" => "tambahkan tglbawavs",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglmintavs",
                        "type" => "text",
                        "fc" => "tglmintavs",
                        "placeholder" => "tambahkan tglmintavs",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "quotavs",
                        "type" => "text",
                        "fc" => "quotavs",
                        "placeholder" => "tambahkan quotavs",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "filevisapermit",
                        "type" => "text",
                        "fc" => "filevisapermit",
                        "placeholder" => "tambahkan filevisapermit",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglexpext",
                        "type" => "text",
                        "fc" => "tglexpext",
                        "placeholder" => "tambahkan tglexpext",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/datavisapermit'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>