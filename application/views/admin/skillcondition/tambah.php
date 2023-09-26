<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan skillcondition</h1>
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
                    <form action="<?= site_url('admin/skillcondition/simpan') ?>" method="post" enctype="multipart/form-data">
                        
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
                        "title" => "keterampilan",
                        "type" => "text",
                        "fc" => "keterampilan",
                        "placeholder" => "tambahkan keterampilan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "hobi",
                        "type" => "text",
                        "fc" => "hobi",
                        "placeholder" => "tambahkan hobi",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "alkohol",
                        "type" => "text",
                        "fc" => "alkohol",
                        "placeholder" => "tambahkan alkohol",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "merokok",
                        "type" => "text",
                        "fc" => "merokok",
                        "placeholder" => "tambahkan merokok",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "food",
                        "type" => "text",
                        "fc" => "food",
                        "placeholder" => "tambahkan food",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "alergi",
                        "type" => "text",
                        "fc" => "alergi",
                        "placeholder" => "tambahkan alergi",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "operasi",
                        "type" => "text",
                        "fc" => "operasi",
                        "placeholder" => "tambahkan operasi",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tato",
                        "type" => "text",
                        "fc" => "tato",
                        "placeholder" => "tambahkan tato",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kidal",
                        "type" => "text",
                        "fc" => "kidal",
                        "placeholder" => "tambahkan kidal",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "angkat",
                        "type" => "text",
                        "fc" => "angkat",
                        "placeholder" => "tambahkan angkat",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "pushup",
                        "type" => "text",
                        "fc" => "pushup",
                        "placeholder" => "tambahkan pushup",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "peglihatan",
                        "type" => "text",
                        "fc" => "peglihatan",
                        "placeholder" => "tambahkan peglihatan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "butawarna",
                        "type" => "text",
                        "fc" => "butawarna",
                        "placeholder" => "tambahkan butawarna",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "banyakrokok",
                        "type" => "text",
                        "fc" => "banyakrokok",
                        "placeholder" => "tambahkan banyakrokok",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tanganbasah",
                        "type" => "text",
                        "fc" => "tanganbasah",
                        "placeholder" => "tambahkan tanganbasah",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "banyakrabun",
                        "type" => "text",
                        "fc" => "banyakrabun",
                        "placeholder" => "tambahkan banyakrabun",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "idiomatik",
                        "type" => "text",
                        "fc" => "idiomatik",
                        "placeholder" => "tambahkan idiomatik",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "mata2",
                        "type" => "text",
                        "fc" => "mata2",
                        "placeholder" => "tambahkan mata2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tanganbasahchongyi",
                        "type" => "text",
                        "fc" => "tanganbasahchongyi",
                        "placeholder" => "tambahkan tanganbasahchongyi",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "operasiket",
                        "type" => "text",
                        "fc" => "operasiket",
                        "placeholder" => "tambahkan operasiket",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/skillcondition'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>