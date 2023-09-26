<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan setelahterbang</h1>
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
                    <form action="<?= site_url('admin/setelahterbang/simpan') ?>" method="post" enctype="multipart/form-data">
                        
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
                        "title" => "tgl_setelah_terbang",
                        "type" => "text",
                        "fc" => "tgl_setelah_terbang",
                        "placeholder" => "tambahkan tgl_setelah_terbang",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_kejadian",
                        "type" => "text",
                        "fc" => "tgl_kejadian",
                        "placeholder" => "tambahkan tgl_kejadian",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kejadian",
                        "type" => "text",
                        "fc" => "kejadian",
                        "placeholder" => "tambahkan kejadian",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nilai_kekurangan_cicilan_bank",
                        "type" => "text",
                        "fc" => "nilai_kekurangan_cicilan_bank",
                        "placeholder" => "tambahkan nilai_kekurangan_cicilan_bank",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nilai_kekurangan_cicilan_bank2",
                        "type" => "text",
                        "fc" => "nilai_kekurangan_cicilan_bank2",
                        "placeholder" => "tambahkan nilai_kekurangan_cicilan_bank2",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "ket_setelah_terbang",
                        "type" => "text",
                        "fc" => "ket_setelah_terbang",
                        "placeholder" => "tambahkan ket_setelah_terbang",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/setelahterbang'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>