<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah sewa_harga_perolehan</h1>
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
                    <form action="<?= site_url('admin/sewa_harga_perolehan/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_harga_perolehan",
                "value" => $form_data->id_harga_perolehan,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "id_harga_perolehan",
                        "type" => "text",
                        "fc" => "id_harga_perolehan",
                        "placeholder" => "tambahkan id_harga_perolehan",
                        "value" => $form_data->id_harga_perolehan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama",
                        "type" => "text",
                        "fc" => "nama",
                        "placeholder" => "tambahkan nama",
                        "value" => $form_data->nama,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "hp",
                        "type" => "text",
                        "fc" => "hp",
                        "placeholder" => "tambahkan hp",
                        "value" => $form_data->hp,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl",
                        "type" => "text",
                        "fc" => "tgl",
                        "placeholder" => "tambahkan tgl",
                        "value" => $form_data->tgl,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/sewa_harga_perolehan'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

