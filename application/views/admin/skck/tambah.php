<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan skck</h1>
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
                    <form action="<?= site_url('admin/skck/simpan') ?>" method="post" enctype="multipart/form-data">
                        
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
                        "title" => "namaskck",
                        "type" => "text",
                        "fc" => "namaskck",
                        "placeholder" => "tambahkan namaskck",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "pengajuan",
                        "type" => "text",
                        "fc" => "pengajuan",
                        "placeholder" => "tambahkan pengajuan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terima",
                        "type" => "text",
                        "fc" => "terima",
                        "placeholder" => "tambahkan terima",
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
                        "title" => "statuspengajuan",
                        "type" => "text",
                        "fc" => "statuspengajuan",
                        "placeholder" => "tambahkan statuspengajuan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statusterima",
                        "type" => "text",
                        "fc" => "statusterima",
                        "placeholder" => "tambahkan statusterima",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statusexp",
                        "type" => "text",
                        "fc" => "statusexp",
                        "placeholder" => "tambahkan statusexp",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/skck'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>