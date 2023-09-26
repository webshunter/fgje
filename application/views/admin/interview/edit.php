<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah interview</h1>
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
                    <form action="<?= site_url('admin/interview/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_interview",
                "value" => $form_data->id_interview,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "id_biodata",
                        "type" => "text",
                        "fc" => "id_biodata",
                        "placeholder" => "tambahkan id_biodata",
                        "value" => $form_data->id_biodata,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "sunction",
                        "type" => "text",
                        "fc" => "sunction",
                        "placeholder" => "tambahkan sunction",
                        "value" => $form_data->sunction,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "food",
                        "type" => "text",
                        "fc" => "food",
                        "placeholder" => "tambahkan food",
                        "value" => $form_data->food,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "cateter",
                        "type" => "text",
                        "fc" => "cateter",
                        "placeholder" => "tambahkan cateter",
                        "value" => $form_data->cateter,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "injection",
                        "type" => "text",
                        "fc" => "injection",
                        "placeholder" => "tambahkan injection",
                        "value" => $form_data->injection,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "therapy",
                        "type" => "text",
                        "fc" => "therapy",
                        "placeholder" => "tambahkan therapy",
                        "value" => $form_data->therapy,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "helping",
                        "type" => "text",
                        "fc" => "helping",
                        "placeholder" => "tambahkan helping",
                        "value" => $form_data->helping,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "bed",
                        "type" => "text",
                        "fc" => "bed",
                        "placeholder" => "tambahkan bed",
                        "value" => $form_data->bed,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "stairs",
                        "type" => "text",
                        "fc" => "stairs",
                        "placeholder" => "tambahkan stairs",
                        "value" => $form_data->stairs,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/interview'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

