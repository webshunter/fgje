<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan agenagree1</h1>
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
                    <form action="<?= site_url('admin/agenagree1/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "noagree1",
                        "type" => "text",
                        "fc" => "noagree1",
                        "placeholder" => "tambahkan noagree1",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglberlaku1",
                        "type" => "text",
                        "fc" => "tglberlaku1",
                        "placeholder" => "tambahkan tglberlaku1",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglberakhir1",
                        "type" => "text",
                        "fc" => "tglberakhir1",
                        "placeholder" => "tambahkan tglberakhir1",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglterima1",
                        "type" => "text",
                        "fc" => "tglterima1",
                        "placeholder" => "tambahkan tglterima1",
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
                          <a class="btn btn-default" href="<?= site_url('admin/agenagree1'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>