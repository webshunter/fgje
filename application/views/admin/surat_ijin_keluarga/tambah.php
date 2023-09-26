<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan surat_ijin_keluarga</h1>
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
                    <form action="<?= site_url('admin/surat_ijin_keluarga/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "id_keluarga",
                        "type" => "text",
                        "fc" => "id_keluarga",
                        "placeholder" => "tambahkan id_keluarga",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "pekerjaan1",
                        "type" => "text",
                        "fc" => "pekerjaan1",
                        "placeholder" => "tambahkan pekerjaan1",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tempat4",
                        "type" => "text",
                        "fc" => "tempat4",
                        "placeholder" => "tambahkan tempat4",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tanggal4",
                        "type" => "text",
                        "fc" => "tanggal4",
                        "placeholder" => "tambahkan tanggal4",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "alamat4",
                        "type" => "text",
                        "fc" => "alamat4",
                        "placeholder" => "tambahkan alamat4",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "desa1",
                        "type" => "text",
                        "fc" => "desa1",
                        "placeholder" => "tambahkan desa1",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kel1",
                        "type" => "text",
                        "fc" => "kel1",
                        "placeholder" => "tambahkan kel1",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kab1",
                        "type" => "text",
                        "fc" => "kab1",
                        "placeholder" => "tambahkan kab1",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "rt1",
                        "type" => "text",
                        "fc" => "rt1",
                        "placeholder" => "tambahkan rt1",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kec1",
                        "type" => "text",
                        "fc" => "kec1",
                        "placeholder" => "tambahkan kec1",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "id_tki",
                        "type" => "text",
                        "fc" => "id_tki",
                        "placeholder" => "tambahkan id_tki",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "pekerjaan2",
                        "type" => "text",
                        "fc" => "pekerjaan2",
                        "placeholder" => "tambahkan pekerjaan2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "desa2",
                        "type" => "text",
                        "fc" => "desa2",
                        "placeholder" => "tambahkan desa2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kel2",
                        "type" => "text",
                        "fc" => "kel2",
                        "placeholder" => "tambahkan kel2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kab2",
                        "type" => "text",
                        "fc" => "kab2",
                        "placeholder" => "tambahkan kab2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "rt2",
                        "type" => "text",
                        "fc" => "rt2",
                        "placeholder" => "tambahkan rt2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kec2",
                        "type" => "text",
                        "fc" => "kec2",
                        "placeholder" => "tambahkan kec2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "hubungan4",
                        "type" => "text",
                        "fc" => "hubungan4",
                        "placeholder" => "tambahkan hubungan4",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tujuan4",
                        "type" => "text",
                        "fc" => "tujuan4",
                        "placeholder" => "tambahkan tujuan4",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/surat_ijin_keluarga'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>