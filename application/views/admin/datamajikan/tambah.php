<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan datamajikan</h1>
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
                    <form action="<?= site_url('admin/datamajikan/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "kode_majikan",
                        "type" => "text",
                        "fc" => "kode_majikan",
                        "placeholder" => "tambahkan kode_majikan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama",
                        "type" => "text",
                        "fc" => "nama",
                        "placeholder" => "tambahkan nama",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "namamajikan",
                        "type" => "text",
                        "fc" => "namamajikan",
                        "placeholder" => "tambahkan namamajikan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "hp",
                        "type" => "text",
                        "fc" => "hp",
                        "placeholder" => "tambahkan hp",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "email",
                        "type" => "text",
                        "fc" => "email",
                        "placeholder" => "tambahkan email",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "alamat",
                        "type" => "text",
                        "fc" => "alamat",
                        "placeholder" => "tambahkan alamat",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "alamat_mandarin",
                        "type" => "text",
                        "fc" => "alamat_mandarin",
                        "placeholder" => "tambahkan alamat_mandarin",
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
                        "title" => "kode_agen",
                        "type" => "text",
                        "fc" => "kode_agen",
                        "placeholder" => "tambahkan kode_agen",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kode_group",
                        "type" => "text",
                        "fc" => "kode_group",
                        "placeholder" => "tambahkan kode_group",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "file",
                        "type" => "text",
                        "fc" => "file",
                        "placeholder" => "tambahkan file",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "data_tki",
                        "type" => "text",
                        "fc" => "data_tki",
                        "placeholder" => "tambahkan data_tki",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "pimpinan_man",
                        "type" => "text",
                        "fc" => "pimpinan_man",
                        "placeholder" => "tambahkan pimpinan_man",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "pimpinan_indo",
                        "type" => "text",
                        "fc" => "pimpinan_indo",
                        "placeholder" => "tambahkan pimpinan_indo",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jabatan_man",
                        "type" => "text",
                        "fc" => "jabatan_man",
                        "placeholder" => "tambahkan jabatan_man",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jabatan_indo",
                        "type" => "text",
                        "fc" => "jabatan_indo",
                        "placeholder" => "tambahkan jabatan_indo",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "filetglinput",
                        "type" => "text",
                        "fc" => "filetglinput",
                        "placeholder" => "tambahkan filetglinput",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/datamajikan'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>