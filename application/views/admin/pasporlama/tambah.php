<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan pasporlama</h1>
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
                    <form action="<?= site_url('admin/pasporlama/simpan') ?>" method="post" enctype="multipart/form-data">
                        
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
                        "title" => "keterangan",
                        "type" => "text",
                        "fc" => "keterangan",
                        "placeholder" => "tambahkan keterangan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nopaspor",
                        "type" => "text",
                        "fc" => "nopaspor",
                        "placeholder" => "tambahkan nopaspor",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "office",
                        "type" => "text",
                        "fc" => "office",
                        "placeholder" => "tambahkan office",
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
                        "title" => "berlaku",
                        "type" => "text",
                        "fc" => "berlaku",
                        "placeholder" => "tambahkan berlaku",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglpengajuan",
                        "type" => "text",
                        "fc" => "tglpengajuan",
                        "placeholder" => "tambahkan tglpengajuan",
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
                        "title" => "tglfoto",
                        "type" => "text",
                        "fc" => "tglfoto",
                        "placeholder" => "tambahkan tglfoto",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statusfoto",
                        "type" => "text",
                        "fc" => "statusfoto",
                        "placeholder" => "tambahkan statusfoto",
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
                        "title" => "statusterima",
                        "type" => "text",
                        "fc" => "statusterima",
                        "placeholder" => "tambahkan statusterima",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "sampai",
                        "type" => "text",
                        "fc" => "sampai",
                        "placeholder" => "tambahkan sampai",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/pasporlama'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>