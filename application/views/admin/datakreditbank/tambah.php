<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan datakreditbank</h1>
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
                    <form action="<?= site_url('admin/datakreditbank/simpan') ?>" method="post" enctype="multipart/form-data">
                        
                <?=
                    form::input([
                        "title" => "kode_sektor",
                        "type" => "text",
                        "fc" => "kode_sektor",
                        "placeholder" => "tambahkan kode_sektor",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "namakredit",
                        "type" => "text",
                        "fc" => "namakredit",
                        "placeholder" => "tambahkan namakredit",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "isikredit",
                        "type" => "text",
                        "fc" => "isikredit",
                        "placeholder" => "tambahkan isikredit",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nilaikredit",
                        "type" => "text",
                        "fc" => "nilaikredit",
                        "placeholder" => "tambahkan nilaikredit",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "mandarinnya",
                        "type" => "text",
                        "fc" => "mandarinnya",
                        "placeholder" => "tambahkan mandarinnya",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statuskredit",
                        "type" => "text",
                        "fc" => "statuskredit",
                        "placeholder" => "tambahkan statuskredit",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "mandarinnya2",
                        "type" => "text",
                        "fc" => "mandarinnya2",
                        "placeholder" => "tambahkan mandarinnya2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statuskredit2",
                        "type" => "text",
                        "fc" => "statuskredit2",
                        "placeholder" => "tambahkan statuskredit2",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/datakreditbank'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>