<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah blk_berat</h1>
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
                    <form action="<?= site_url('admin/blk_berat/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_berat",
                "value" => $form_data->id_berat,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "kode_berat",
                        "type" => "text",
                        "fc" => "kode_berat",
                        "placeholder" => "tambahkan kode_berat",
                        "value" => $form_data->kode_berat,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "berat",
                        "type" => "text",
                        "fc" => "berat",
                        "placeholder" => "tambahkan berat",
                        "value" => $form_data->berat,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ket",
                        "type" => "text",
                        "fc" => "ket",
                        "placeholder" => "tambahkan ket",
                        "value" => $form_data->ket,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_berat'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

