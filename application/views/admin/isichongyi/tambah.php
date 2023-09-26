<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan isichongyi</h1>
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
                    <form action="<?= site_url('admin/isichongyi/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "id_biodata",
                        "type" => "text",
                        "fc" => "id_biodata",
                        "placeholder" => "tambahkan id_biodata",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kbm",
                        "type" => "text",
                        "fc" => "kbm",
                        "placeholder" => "tambahkan kbm",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kbi",
                        "type" => "text",
                        "fc" => "kbi",
                        "placeholder" => "tambahkan kbi",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "lbbi",
                        "type" => "text",
                        "fc" => "lbbi",
                        "placeholder" => "tambahkan lbbi",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "sbt",
                        "type" => "text",
                        "fc" => "sbt",
                        "placeholder" => "tambahkan sbt",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "hub",
                        "type" => "text",
                        "fc" => "hub",
                        "placeholder" => "tambahkan hub",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/isichongyi'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>