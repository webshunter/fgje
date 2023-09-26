<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan datagroup</h1>
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
                    <form action="<?= site_url('admin/datagroup/simpan') ?>" method="post" enctype="multipart/form-data">
                        
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
                        "title" => "nama",
                        "type" => "text",
                        "fc" => "nama",
                        "placeholder" => "tambahkan nama",
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
                        "title" => "status",
                        "type" => "text",
                        "fc" => "status",
                        "placeholder" => "tambahkan status",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "username",
                        "type" => "text",
                        "fc" => "username",
                        "placeholder" => "tambahkan username",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "password",
                        "type" => "text",
                        "fc" => "password",
                        "placeholder" => "tambahkan password",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "namamandarin",
                        "type" => "text",
                        "fc" => "namamandarin",
                        "placeholder" => "tambahkan namamandarin",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "alamatmandarin",
                        "type" => "text",
                        "fc" => "alamatmandarin",
                        "placeholder" => "tambahkan alamatmandarin",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "direktur",
                        "type" => "text",
                        "fc" => "direktur",
                        "placeholder" => "tambahkan direktur",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "notelp",
                        "type" => "text",
                        "fc" => "notelp",
                        "placeholder" => "tambahkan notelp",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nofax",
                        "type" => "text",
                        "fc" => "nofax",
                        "placeholder" => "tambahkan nofax",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tanggungnama",
                        "type" => "text",
                        "fc" => "tanggungnama",
                        "placeholder" => "tambahkan tanggungnama",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tanggungline",
                        "type" => "text",
                        "fc" => "tanggungline",
                        "placeholder" => "tambahkan tanggungline",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "komnama",
                        "type" => "text",
                        "fc" => "komnama",
                        "placeholder" => "tambahkan komnama",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "komline",
                        "type" => "text",
                        "fc" => "komline",
                        "placeholder" => "tambahkan komline",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "komskype",
                        "type" => "text",
                        "fc" => "komskype",
                        "placeholder" => "tambahkan komskype",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "komhp",
                        "type" => "text",
                        "fc" => "komhp",
                        "placeholder" => "tambahkan komhp",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "agenbergabung",
                        "type" => "text",
                        "fc" => "agenbergabung",
                        "placeholder" => "tambahkan agenbergabung",
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
                          <a class="btn btn-default" href="<?= site_url('admin/datagroup'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>