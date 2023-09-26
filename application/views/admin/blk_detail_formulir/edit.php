<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah blk_detail_formulir</h1>
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
                    <form action="<?= site_url('admin/blk_detail_formulir/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_detail_formulir",
                "value" => $form_data->id_detail_formulir,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "nodaftar",
                        "type" => "text",
                        "fc" => "nodaftar",
                        "placeholder" => "tambahkan nodaftar",
                        "value" => $form_data->nodaftar,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "noserlok",
                        "type" => "text",
                        "fc" => "noserlok",
                        "placeholder" => "tambahkan noserlok",
                        "value" => $form_data->noserlok,
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
            
                <?=
                    form::input([
                        "title" => "id_formulir",
                        "type" => "text",
                        "fc" => "id_formulir",
                        "placeholder" => "tambahkan id_formulir",
                        "value" => $form_data->id_formulir,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statujk",
                        "type" => "text",
                        "fc" => "statujk",
                        "placeholder" => "tambahkan statujk",
                        "value" => $form_data->statujk,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_detail_formulir'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

