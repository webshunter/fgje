<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan asuransi_dan_hotel</h1>
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
                    <form action="<?= site_url('admin/asuransi_dan_hotel/simpan') ?>" method="post" enctype="multipart/form-data">
                        
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
                        "title" => "dakt",
                        "type" => "text",
                        "fc" => "dakt",
                        "placeholder" => "tambahkan dakt",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "daki",
                        "type" => "text",
                        "fc" => "daki",
                        "placeholder" => "tambahkan daki",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "dattt",
                        "type" => "text",
                        "fc" => "dattt",
                        "placeholder" => "tambahkan dattt",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "aju_ht",
                        "type" => "text",
                        "fc" => "aju_ht",
                        "placeholder" => "tambahkan aju_ht",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "idhotel",
                        "type" => "text",
                        "fc" => "idhotel",
                        "placeholder" => "tambahkan idhotel",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "adh_nohp",
                        "type" => "text",
                        "fc" => "adh_nohp",
                        "placeholder" => "tambahkan adh_nohp",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "adh_line",
                        "type" => "text",
                        "fc" => "adh_line",
                        "placeholder" => "tambahkan adh_line",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "adh_email",
                        "type" => "text",
                        "fc" => "adh_email",
                        "placeholder" => "tambahkan adh_email",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/asuransi_dan_hotel'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>