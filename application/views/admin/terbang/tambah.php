<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan terbang</h1>
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
                    <form action="<?= site_url('admin/terbang/simpan') ?>" method="post" enctype="multipart/form-data">
                        
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
                        "title" => "tanggalterbang",
                        "type" => "text",
                        "fc" => "tanggalterbang",
                        "placeholder" => "tambahkan tanggalterbang",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_terbang",
                        "type" => "text",
                        "fc" => "id_terbang",
                        "placeholder" => "tambahkan id_terbang",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statustgl",
                        "type" => "text",
                        "fc" => "statustgl",
                        "placeholder" => "tambahkan statustgl",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tiket",
                        "type" => "text",
                        "fc" => "tiket",
                        "placeholder" => "tambahkan tiket",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statusterbang",
                        "type" => "text",
                        "fc" => "statusterbang",
                        "placeholder" => "tambahkan statusterbang",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglberangkat",
                        "type" => "text",
                        "fc" => "tglberangkat",
                        "placeholder" => "tambahkan tglberangkat",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/terbang'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>