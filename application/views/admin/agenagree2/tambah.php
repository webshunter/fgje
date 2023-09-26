<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan agenagree2</h1>
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
                    <form action="<?= site_url('admin/agenagree2/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "noagree2",
                        "type" => "text",
                        "fc" => "noagree2",
                        "placeholder" => "tambahkan noagree2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglberlaku2",
                        "type" => "text",
                        "fc" => "tglberlaku2",
                        "placeholder" => "tambahkan tglberlaku2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglberakhir2",
                        "type" => "text",
                        "fc" => "tglberakhir2",
                        "placeholder" => "tambahkan tglberakhir2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglterima2",
                        "type" => "text",
                        "fc" => "tglterima2",
                        "placeholder" => "tambahkan tglterima2",
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
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/agenagree2'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>