<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan markc</h1>
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
                    <form action="<?= site_url('admin/markc/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "id_biodata",
                        "type" => "text",
                        "fc" => "id_biodata",
                        "placeholder" => "tambahkan id_biodata",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_legal",
                        "type" => "text",
                        "fc" => "tgl_legal",
                        "placeholder" => "tambahkan tgl_legal",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama_legal",
                        "type" => "text",
                        "fc" => "nama_legal",
                        "placeholder" => "tambahkan nama_legal",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "hub_legal",
                        "type" => "text",
                        "fc" => "hub_legal",
                        "placeholder" => "tambahkan hub_legal",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "khusus_legal",
                        "type" => "text",
                        "fc" => "khusus_legal",
                        "placeholder" => "tambahkan khusus_legal",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_nota",
                        "type" => "text",
                        "fc" => "tgl_nota",
                        "placeholder" => "tambahkan tgl_nota",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama_nota",
                        "type" => "text",
                        "fc" => "nama_nota",
                        "placeholder" => "tambahkan nama_nota",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "hub_nota",
                        "type" => "text",
                        "fc" => "hub_nota",
                        "placeholder" => "tambahkan hub_nota",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "khusus_nota",
                        "type" => "text",
                        "fc" => "khusus_nota",
                        "placeholder" => "tambahkan khusus_nota",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_pram",
                        "type" => "text",
                        "fc" => "tgl_pram",
                        "placeholder" => "tambahkan tgl_pram",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "hasil_pram",
                        "type" => "text",
                        "fc" => "hasil_pram",
                        "placeholder" => "tambahkan hasil_pram",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_samm",
                        "type" => "text",
                        "fc" => "tgl_samm",
                        "placeholder" => "tambahkan tgl_samm",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "hasil_samm",
                        "type" => "text",
                        "fc" => "hasil_samm",
                        "placeholder" => "tambahkan hasil_samm",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "exp_samm",
                        "type" => "text",
                        "fc" => "exp_samm",
                        "placeholder" => "tambahkan exp_samm",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_murm",
                        "type" => "text",
                        "fc" => "tgl_murm",
                        "placeholder" => "tambahkan tgl_murm",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "hasil_murm",
                        "type" => "text",
                        "fc" => "hasil_murm",
                        "placeholder" => "tambahkan hasil_murm",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "exp_murm",
                        "type" => "text",
                        "fc" => "exp_murm",
                        "placeholder" => "tambahkan exp_murm",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "in_paspor",
                        "type" => "text",
                        "fc" => "in_paspor",
                        "placeholder" => "tambahkan in_paspor",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "bk_paspor",
                        "type" => "text",
                        "fc" => "bk_paspor",
                        "placeholder" => "tambahkan bk_paspor",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "aju_skck",
                        "type" => "text",
                        "fc" => "aju_skck",
                        "placeholder" => "tambahkan aju_skck",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "trm_skck",
                        "type" => "text",
                        "fc" => "trm_skck",
                        "placeholder" => "tambahkan trm_skck",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "exp_skck",
                        "type" => "text",
                        "fc" => "exp_skck",
                        "placeholder" => "tambahkan exp_skck",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/markc'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>