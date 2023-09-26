<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan adm_saldo_awal</h1>
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
                    <form action="<?= site_url('admin/adm_saldo_awal/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "id_saldo_awal",
                        "type" => "text",
                        "fc" => "id_saldo_awal",
                        "placeholder" => "tambahkan id_saldo_awal",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nominal_saldo_awal",
                        "type" => "text",
                        "fc" => "nominal_saldo_awal",
                        "placeholder" => "tambahkan nominal_saldo_awal",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tahun_saldo_awal",
                        "type" => "text",
                        "fc" => "tahun_saldo_awal",
                        "placeholder" => "tambahkan tahun_saldo_awal",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "keterangan",
                        "type" => "text",
                        "fc" => "keterangan",
                        "placeholder" => "tambahkan keterangan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "user_modified",
                        "type" => "text",
                        "fc" => "user_modified",
                        "placeholder" => "tambahkan user_modified",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ip_modified",
                        "type" => "text",
                        "fc" => "ip_modified",
                        "placeholder" => "tambahkan ip_modified",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "date_modified",
                        "type" => "text",
                        "fc" => "date_modified",
                        "placeholder" => "tambahkan date_modified",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "time_modified",
                        "type" => "text",
                        "fc" => "time_modified",
                        "placeholder" => "tambahkan time_modified",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/adm_saldo_awal'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>