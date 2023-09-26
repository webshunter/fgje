<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan interview</h1>
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
                    <form action="<?= site_url('admin/interview/simpan') ?>" method="post" enctype="multipart/form-data">
                        
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
                        "title" => "sunction",
                        "type" => "text",
                        "fc" => "sunction",
                        "placeholder" => "tambahkan sunction",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "food",
                        "type" => "text",
                        "fc" => "food",
                        "placeholder" => "tambahkan food",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "cateter",
                        "type" => "text",
                        "fc" => "cateter",
                        "placeholder" => "tambahkan cateter",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "injection",
                        "type" => "text",
                        "fc" => "injection",
                        "placeholder" => "tambahkan injection",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "therapy",
                        "type" => "text",
                        "fc" => "therapy",
                        "placeholder" => "tambahkan therapy",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "helping",
                        "type" => "text",
                        "fc" => "helping",
                        "placeholder" => "tambahkan helping",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "bed",
                        "type" => "text",
                        "fc" => "bed",
                        "placeholder" => "tambahkan bed",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "stairs",
                        "type" => "text",
                        "fc" => "stairs",
                        "placeholder" => "tambahkan stairs",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/interview'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>