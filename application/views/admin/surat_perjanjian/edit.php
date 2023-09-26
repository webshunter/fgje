<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah surat_perjanjian</h1>
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
                    <form action="<?= site_url('admin/surat_perjanjian/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_perjanjian",
                "value" => $form_data->id_perjanjian,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "nama_tki",
                        "type" => "text",
                        "fc" => "nama_tki",
                        "placeholder" => "tambahkan nama_tki",
                        "value" => $form_data->nama_tki,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nopass",
                        "type" => "text",
                        "fc" => "nopass",
                        "placeholder" => "tambahkan nopass",
                        "value" => $form_data->nopass,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/surat_perjanjian'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

