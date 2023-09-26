<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah setup_menu</h1>
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
                    <form action="<?= site_url('admin/setup_menu/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "menu",
                "value" => $form_data->menu,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "title",
                        "type" => "text",
                        "fc" => "title",
                        "placeholder" => "tambahkan title",
                        "value" => $form_data->title,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "link",
                        "type" => "text",
                        "fc" => "link",
                        "placeholder" => "tambahkan link",
                        "value" => $form_data->link,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "judul",
                        "type" => "text",
                        "fc" => "judul",
                        "placeholder" => "tambahkan judul",
                        "value" => $form_data->judul,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "group_menu",
                        "type" => "text",
                        "fc" => "group_menu",
                        "placeholder" => "tambahkan group_menu",
                        "value" => $form_data->group_menu,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/setup_menu'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

