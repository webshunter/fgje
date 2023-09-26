<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan detail_dokmajikan</h1>
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
                    <form action="<?= site_url('admin/detail_dokmajikan/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "dokumen",
                        "type" => "text",
                        "fc" => "dokumen",
                        "placeholder" => "tambahkan dokumen",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "stats",
                        "type" => "text",
                        "fc" => "stats",
                        "placeholder" => "tambahkan stats",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "status",
                        "type" => "text",
                        "fc" => "status",
                        "placeholder" => "tambahkan status",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_majikan",
                        "type" => "text",
                        "fc" => "id_majikan",
                        "placeholder" => "tambahkan id_majikan",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/detail_dokmajikan'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>