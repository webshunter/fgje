<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan blk_data_pengeluaran</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
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
                    <form action="<?= site_url('admin/blk_data_pengeluaran/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "id_data_pengeluaran",
                        "type" => "text",
                        "fc" => "id_data_pengeluaran",
                        "placeholder" => "tambahkan id_data_pengeluaran",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tipe_pengeluaran",
                        "type" => "text",
                        "fc" => "tipe_pengeluaran",
                        "placeholder" => "tambahkan tipe_pengeluaran",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nominal_pengeluaran",
                        "type" => "text",
                        "fc" => "nominal_pengeluaran",
                        "placeholder" => "tambahkan nominal_pengeluaran",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tanggal_pengeluaran",
                        "type" => "text",
                        "fc" => "tanggal_pengeluaran",
                        "placeholder" => "tambahkan tanggal_pengeluaran",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tanggal_input",
                        "type" => "text",
                        "fc" => "tanggal_input",
                        "placeholder" => "tambahkan tanggal_input",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jam_input",
                        "type" => "text",
                        "fc" => "jam_input",
                        "placeholder" => "tambahkan jam_input",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "user_input",
                        "type" => "text",
                        "fc" => "user_input",
                        "placeholder" => "tambahkan user_input",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ip_input",
                        "type" => "text",
                        "fc" => "ip_input",
                        "placeholder" => "tambahkan ip_input",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tanggal_edit",
                        "type" => "text",
                        "fc" => "tanggal_edit",
                        "placeholder" => "tambahkan tanggal_edit",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jam_edit",
                        "type" => "text",
                        "fc" => "jam_edit",
                        "placeholder" => "tambahkan jam_edit",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "user_edit",
                        "type" => "text",
                        "fc" => "user_edit",
                        "placeholder" => "tambahkan user_edit",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ip_edit",
                        "type" => "text",
                        "fc" => "ip_edit",
                        "placeholder" => "tambahkan ip_edit",
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
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_data_pengeluaran'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>