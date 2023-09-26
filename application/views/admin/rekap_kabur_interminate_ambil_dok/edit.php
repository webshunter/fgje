<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah rekap_kabur_interminate_ambil_dok</h1>
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
                    <form action="<?= site_url('admin/rekap_kabur_interminate_ambil_dok/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id",
                "value" => $form_data->id,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "tgl_start",
                        "type" => "text",
                        "fc" => "tgl_start",
                        "placeholder" => "tambahkan tgl_start",
                        "value" => $form_data->tgl_start,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_end",
                        "type" => "text",
                        "fc" => "tgl_end",
                        "placeholder" => "tambahkan tgl_end",
                        "value" => $form_data->tgl_end,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kondisi",
                        "type" => "text",
                        "fc" => "kondisi",
                        "placeholder" => "tambahkan kondisi",
                        "value" => $form_data->kondisi,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/rekap_kabur_interminate_ambil_dok'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

