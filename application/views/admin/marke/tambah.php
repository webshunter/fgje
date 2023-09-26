<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan marke</h1>
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
                    <form action="<?= site_url('admin/marke/simpan') ?>" method="post" enctype="multipart/form-data">
                        
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
                        "title" => "tgl_kocokan",
                        "type" => "text",
                        "fc" => "tgl_kocokan",
                        "placeholder" => "tambahkan tgl_kocokan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "pt_kocokan",
                        "type" => "text",
                        "fc" => "pt_kocokan",
                        "placeholder" => "tambahkan pt_kocokan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_finger",
                        "type" => "text",
                        "fc" => "tgl_finger",
                        "placeholder" => "tambahkan tgl_finger",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "trm_visa",
                        "type" => "text",
                        "fc" => "trm_visa",
                        "placeholder" => "tambahkan trm_visa",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "terbang_perkiraan",
                        "type" => "text",
                        "fc" => "terbang_perkiraan",
                        "placeholder" => "tambahkan terbang_perkiraan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "pap_perkiraan",
                        "type" => "text",
                        "fc" => "pap_perkiraan",
                        "placeholder" => "tambahkan pap_perkiraan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kira_kocokan",
                        "type" => "text",
                        "fc" => "kira_kocokan",
                        "placeholder" => "tambahkan kira_kocokan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kira_finger",
                        "type" => "text",
                        "fc" => "kira_finger",
                        "placeholder" => "tambahkan kira_finger",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kira_visa",
                        "type" => "text",
                        "fc" => "kira_visa",
                        "placeholder" => "tambahkan kira_visa",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kira_terbang",
                        "type" => "text",
                        "fc" => "kira_terbang",
                        "placeholder" => "tambahkan kira_terbang",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "no_visa",
                        "type" => "text",
                        "fc" => "no_visa",
                        "placeholder" => "tambahkan no_visa",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_berlaku",
                        "type" => "text",
                        "fc" => "tgl_berlaku",
                        "placeholder" => "tambahkan tgl_berlaku",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_sampai",
                        "type" => "text",
                        "fc" => "tgl_sampai",
                        "placeholder" => "tambahkan tgl_sampai",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/marke'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>