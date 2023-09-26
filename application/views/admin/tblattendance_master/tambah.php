<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan tblattendance_master</h1>
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
                    <form action="<?= site_url('admin/tblattendance_master/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "idblk",
                        "type" => "text",
                        "fc" => "idblk",
                        "placeholder" => "tambahkan idblk",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "dteDate",
                        "type" => "text",
                        "fc" => "dteDate",
                        "placeholder" => "tambahkan dteDate",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tmeTime",
                        "type" => "text",
                        "fc" => "tmeTime",
                        "placeholder" => "tambahkan tmeTime",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "waktu",
                        "type" => "text",
                        "fc" => "waktu",
                        "placeholder" => "tambahkan waktu",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "rec",
                        "type" => "text",
                        "fc" => "rec",
                        "placeholder" => "tambahkan rec",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/tblattendance_master'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>