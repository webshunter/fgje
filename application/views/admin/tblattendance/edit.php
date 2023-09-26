<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah tblattendance</h1>
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
                    <form action="<?= site_url('admin/tblattendance/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "idAttendance",
                "value" => $form_data->idAttendance,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "idblk",
                        "type" => "text",
                        "fc" => "idblk",
                        "placeholder" => "tambahkan idblk",
                        "value" => $form_data->idblk,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "dteDate",
                        "type" => "text",
                        "fc" => "dteDate",
                        "placeholder" => "tambahkan dteDate",
                        "value" => $form_data->dteDate,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tmeTime",
                        "type" => "text",
                        "fc" => "tmeTime",
                        "placeholder" => "tambahkan tmeTime",
                        "value" => $form_data->tmeTime,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "waktu",
                        "type" => "text",
                        "fc" => "waktu",
                        "placeholder" => "tambahkan waktu",
                        "value" => $form_data->waktu,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "rec",
                        "type" => "text",
                        "fc" => "rec",
                        "placeholder" => "tambahkan rec",
                        "value" => $form_data->rec,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/tblattendance'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

