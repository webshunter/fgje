<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan setting_spbg_nilai</h1>
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
                    <form action="<?= site_url('admin/setting_spbg_nilai/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "fpj1",
                        "type" => "text",
                        "fc" => "fpj1",
                        "placeholder" => "tambahkan fpj1",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "fpj2",
                        "type" => "text",
                        "fc" => "fpj2",
                        "placeholder" => "tambahkan fpj2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "fpj3",
                        "type" => "text",
                        "fc" => "fpj3",
                        "placeholder" => "tambahkan fpj3",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "fpj4",
                        "type" => "text",
                        "fc" => "fpj4",
                        "placeholder" => "tambahkan fpj4",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "flj1",
                        "type" => "text",
                        "fc" => "flj1",
                        "placeholder" => "tambahkan flj1",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "flj2",
                        "type" => "text",
                        "fc" => "flj2",
                        "placeholder" => "tambahkan flj2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "flj3",
                        "type" => "text",
                        "fc" => "flj3",
                        "placeholder" => "tambahkan flj3",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "flj4",
                        "type" => "text",
                        "fc" => "flj4",
                        "placeholder" => "tambahkan flj4",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ipj1",
                        "type" => "text",
                        "fc" => "ipj1",
                        "placeholder" => "tambahkan ipj1",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ipj2",
                        "type" => "text",
                        "fc" => "ipj2",
                        "placeholder" => "tambahkan ipj2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ipj3",
                        "type" => "text",
                        "fc" => "ipj3",
                        "placeholder" => "tambahkan ipj3",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ipj4",
                        "type" => "text",
                        "fc" => "ipj4",
                        "placeholder" => "tambahkan ipj4",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ilj1",
                        "type" => "text",
                        "fc" => "ilj1",
                        "placeholder" => "tambahkan ilj1",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ilj2",
                        "type" => "text",
                        "fc" => "ilj2",
                        "placeholder" => "tambahkan ilj2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ilj3",
                        "type" => "text",
                        "fc" => "ilj3",
                        "placeholder" => "tambahkan ilj3",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ilj4",
                        "type" => "text",
                        "fc" => "ilj4",
                        "placeholder" => "tambahkan ilj4",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/setting_spbg_nilai'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>