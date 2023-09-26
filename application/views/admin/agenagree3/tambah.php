<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan agenagree3</h1>
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
                    <form action="<?= site_url('admin/agenagree3/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "noagree3",
                        "type" => "text",
                        "fc" => "noagree3",
                        "placeholder" => "tambahkan noagree3",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglberlaku3",
                        "type" => "text",
                        "fc" => "tglberlaku3",
                        "placeholder" => "tambahkan tglberlaku3",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglberakhir3",
                        "type" => "text",
                        "fc" => "tglberakhir3",
                        "placeholder" => "tambahkan tglberakhir3",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglterima3",
                        "type" => "text",
                        "fc" => "tglterima3",
                        "placeholder" => "tambahkan tglterima3",
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
                          <a class="btn btn-default" href="<?= site_url('admin/agenagree3'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>