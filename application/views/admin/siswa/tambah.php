<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan siswa</h1>
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
                    <form action="<?= site_url('admin/siswa/simpan') ?>" method="post" enctype="multipart/form-data">
                        
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
                        "title" => "alamat",
                        "type" => "text",
                        "fc" => "alamat",
                        "placeholder" => "tambahkan alamat",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ttl",
                        "type" => "text",
                        "fc" => "ttl",
                        "placeholder" => "tambahkan ttl",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_angkatan",
                        "type" => "text",
                        "fc" => "id_angkatan",
                        "placeholder" => "tambahkan id_angkatan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "no_hp",
                        "type" => "text",
                        "fc" => "no_hp",
                        "placeholder" => "tambahkan no_hp",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "foto",
                        "type" => "text",
                        "fc" => "foto",
                        "placeholder" => "tambahkan foto",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kelas",
                        "type" => "text",
                        "fc" => "kelas",
                        "placeholder" => "tambahkan kelas",
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
                        "title" => "status",
                        "type" => "text",
                        "fc" => "status",
                        "placeholder" => "tambahkan status",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "status_ol",
                        "type" => "text",
                        "fc" => "status_ol",
                        "placeholder" => "tambahkan status_ol",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/siswa'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>