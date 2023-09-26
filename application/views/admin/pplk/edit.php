<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah pplk</h1>
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
                    <form action="<?= site_url('admin/pplk/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id",
                "value" => $form_data->id,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "nopermonhonan",
                        "type" => "text",
                        "fc" => "nopermonhonan",
                        "placeholder" => "tambahkan nopermonhonan",
                        "value" => $form_data->nopermonhonan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tglpermohonan",
                        "type" => "text",
                        "fc" => "tglpermohonan",
                        "placeholder" => "tambahkan tglpermohonan",
                        "value" => $form_data->tglpermohonan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tujuanpermohonan",
                        "type" => "text",
                        "fc" => "tujuanpermohonan",
                        "placeholder" => "tambahkan tujuanpermohonan",
                        "value" => $form_data->tujuanpermohonan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "datatki",
                        "type" => "text",
                        "fc" => "datatki",
                        "placeholder" => "tambahkan datatki",
                        "value" => $form_data->datatki,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "pinjaman",
                        "type" => "text",
                        "fc" => "pinjaman",
                        "placeholder" => "tambahkan pinjaman",
                        "value" => $form_data->pinjaman,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "aproval",
                        "type" => "text",
                        "fc" => "aproval",
                        "placeholder" => "tambahkan aproval",
                        "value" => $form_data->aproval,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_aproval",
                        "type" => "text",
                        "fc" => "tgl_aproval",
                        "placeholder" => "tambahkan tgl_aproval",
                        "value" => $form_data->tgl_aproval,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "deleted",
                        "type" => "text",
                        "fc" => "deleted",
                        "placeholder" => "tambahkan deleted",
                        "value" => $form_data->deleted,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/pplk'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

