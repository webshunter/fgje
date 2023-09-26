<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan marka_biotoagen</h1>
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
                    <form action="<?= site_url('admin/marka_biotoagen/simpan') ?>" method="post" enctype="multipart/form-data">
                        
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
                        "title" => "tgl_to_agen",
                        "type" => "text",
                        "fc" => "tgl_to_agen",
                        "placeholder" => "tambahkan tgl_to_agen",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama_agen",
                        "type" => "text",
                        "fc" => "nama_agen",
                        "placeholder" => "tambahkan nama_agen",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "grup_to_agen",
                        "type" => "text",
                        "fc" => "grup_to_agen",
                        "placeholder" => "tambahkan grup_to_agen",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama_pabrik",
                        "type" => "text",
                        "fc" => "nama_pabrik",
                        "placeholder" => "tambahkan nama_pabrik",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_pauliu",
                        "type" => "text",
                        "fc" => "tgl_pauliu",
                        "placeholder" => "tambahkan tgl_pauliu",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_inter",
                        "type" => "text",
                        "fc" => "tgl_inter",
                        "placeholder" => "tambahkan tgl_inter",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgldilepas",
                        "type" => "text",
                        "fc" => "tgldilepas",
                        "placeholder" => "tambahkan tgldilepas",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama_mandarin",
                        "type" => "text",
                        "fc" => "nama_mandarin",
                        "placeholder" => "tambahkan nama_mandarin",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/marka_biotoagen'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>