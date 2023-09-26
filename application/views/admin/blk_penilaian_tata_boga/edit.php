<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah blk_penilaian_tata_boga</h1>
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
                    <form action="<?= site_url('admin/blk_penilaian_tata_boga/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_penilaian_tata_boga",
                "value" => $form_data->id_penilaian_tata_boga,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "no_daftar",
                        "type" => "text",
                        "fc" => "no_daftar",
                        "placeholder" => "tambahkan no_daftar",
                        "value" => $form_data->no_daftar,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl",
                        "type" => "text",
                        "fc" => "tgl",
                        "placeholder" => "tambahkan tgl",
                        "value" => $form_data->tgl,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "penilai_id",
                        "type" => "text",
                        "fc" => "penilai_id",
                        "placeholder" => "tambahkan penilai_id",
                        "value" => $form_data->penilai_id,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tata_boga_id",
                        "type" => "text",
                        "fc" => "tata_boga_id",
                        "placeholder" => "tambahkan tata_boga_id",
                        "value" => $form_data->tata_boga_id,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nilai_a_id",
                        "type" => "text",
                        "fc" => "nilai_a_id",
                        "placeholder" => "tambahkan nilai_a_id",
                        "value" => $form_data->nilai_a_id,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nilai_b_id",
                        "type" => "text",
                        "fc" => "nilai_b_id",
                        "placeholder" => "tambahkan nilai_b_id",
                        "value" => $form_data->nilai_b_id,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "keterangan",
                        "type" => "text",
                        "fc" => "keterangan",
                        "placeholder" => "tambahkan keterangan",
                        "value" => $form_data->keterangan,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tipe",
                        "type" => "text",
                        "fc" => "tipe",
                        "placeholder" => "tambahkan tipe",
                        "value" => $form_data->tipe,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "minggu_id",
                        "type" => "text",
                        "fc" => "minggu_id",
                        "placeholder" => "tambahkan minggu_id",
                        "value" => $form_data->minggu_id,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/blk_penilaian_tata_boga'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

