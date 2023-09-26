<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah dataagen</h1>
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
                    <form action="<?= site_url('admin/dataagen/update') ?>" method="post" enctype="multipart/form-data">
                        
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id_agen",
                "value" => $form_data->id_agen,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "kode_agen",
                        "type" => "text",
                        "fc" => "kode_agen",
                        "placeholder" => "tambahkan kode_agen",
                        "value" => $form_data->kode_agen,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "kode_group",
                        "type" => "text",
                        "fc" => "kode_group",
                        "placeholder" => "tambahkan kode_group",
                        "value" => $form_data->kode_group,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama",
                        "type" => "text",
                        "fc" => "nama",
                        "placeholder" => "tambahkan nama",
                        "value" => $form_data->nama,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "hp",
                        "type" => "text",
                        "fc" => "hp",
                        "placeholder" => "tambahkan hp",
                        "value" => $form_data->hp,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "email",
                        "type" => "text",
                        "fc" => "email",
                        "placeholder" => "tambahkan email",
                        "value" => $form_data->email,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "alamat",
                        "type" => "text",
                        "fc" => "alamat",
                        "placeholder" => "tambahkan alamat",
                        "value" => $form_data->alamat,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "status",
                        "type" => "text",
                        "fc" => "status",
                        "placeholder" => "tambahkan status",
                        "value" => $form_data->status,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "username",
                        "type" => "text",
                        "fc" => "username",
                        "placeholder" => "tambahkan username",
                        "value" => $form_data->username,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "password",
                        "type" => "text",
                        "fc" => "password",
                        "placeholder" => "tambahkan password",
                        "value" => $form_data->password,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "namamandarin",
                        "type" => "text",
                        "fc" => "namamandarin",
                        "placeholder" => "tambahkan namamandarin",
                        "value" => $form_data->namamandarin,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "alamatmandarin",
                        "type" => "text",
                        "fc" => "alamatmandarin",
                        "placeholder" => "tambahkan alamatmandarin",
                        "value" => $form_data->alamatmandarin,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "notel",
                        "type" => "text",
                        "fc" => "notel",
                        "placeholder" => "tambahkan notel",
                        "value" => $form_data->notel,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nofax",
                        "type" => "text",
                        "fc" => "nofax",
                        "placeholder" => "tambahkan nofax",
                        "value" => $form_data->nofax,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "direktur",
                        "type" => "text",
                        "fc" => "direktur",
                        "placeholder" => "tambahkan direktur",
                        "value" => $form_data->direktur,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "direktur2",
                        "type" => "text",
                        "fc" => "direktur2",
                        "placeholder" => "tambahkan direktur2",
                        "value" => $form_data->direktur2,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nosiup",
                        "type" => "text",
                        "fc" => "nosiup",
                        "placeholder" => "tambahkan nosiup",
                        "value" => $form_data->nosiup,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "berlaku",
                        "type" => "text",
                        "fc" => "berlaku",
                        "placeholder" => "tambahkan berlaku",
                        "value" => $form_data->berlaku,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "selesai",
                        "type" => "text",
                        "fc" => "selesai",
                        "placeholder" => "tambahkan selesai",
                        "value" => $form_data->selesai,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jenisagre",
                        "type" => "text",
                        "fc" => "jenisagre",
                        "placeholder" => "tambahkan jenisagre",
                        "value" => $form_data->jenisagre,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jenisagre2",
                        "type" => "text",
                        "fc" => "jenisagre2",
                        "placeholder" => "tambahkan jenisagre2",
                        "value" => $form_data->jenisagre2,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "berlaku2",
                        "type" => "text",
                        "fc" => "berlaku2",
                        "placeholder" => "tambahkan berlaku2",
                        "value" => $form_data->berlaku2,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "selesai2",
                        "type" => "text",
                        "fc" => "selesai2",
                        "placeholder" => "tambahkan selesai2",
                        "value" => $form_data->selesai2,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jenisagre3",
                        "type" => "text",
                        "fc" => "jenisagre3",
                        "placeholder" => "tambahkan jenisagre3",
                        "value" => $form_data->jenisagre3,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "berlaku3",
                        "type" => "text",
                        "fc" => "berlaku3",
                        "placeholder" => "tambahkan berlaku3",
                        "value" => $form_data->berlaku3,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "selesai3",
                        "type" => "text",
                        "fc" => "selesai3",
                        "placeholder" => "tambahkan selesai3",
                        "value" => $form_data->selesai3,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "noagree",
                        "type" => "text",
                        "fc" => "noagree",
                        "placeholder" => "tambahkan noagree",
                        "value" => $form_data->noagree,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "noagree2",
                        "type" => "text",
                        "fc" => "noagree2",
                        "placeholder" => "tambahkan noagree2",
                        "value" => $form_data->noagree2,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "noagree3",
                        "type" => "text",
                        "fc" => "noagree3",
                        "placeholder" => "tambahkan noagree3",
                        "value" => $form_data->noagree3,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_terimaagree",
                        "type" => "text",
                        "fc" => "tgl_terimaagree",
                        "placeholder" => "tambahkan tgl_terimaagree",
                        "value" => $form_data->tgl_terimaagree,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_terimaagree2",
                        "type" => "text",
                        "fc" => "tgl_terimaagree2",
                        "placeholder" => "tambahkan tgl_terimaagree2",
                        "value" => $form_data->tgl_terimaagree2,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "tgl_terimaagree3",
                        "type" => "text",
                        "fc" => "tgl_terimaagree3",
                        "placeholder" => "tambahkan tgl_terimaagree3",
                        "value" => $form_data->tgl_terimaagree3,
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
                        "title" => "komnama",
                        "type" => "text",
                        "fc" => "komnama",
                        "placeholder" => "tambahkan komnama",
                        "value" => $form_data->komnama,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "komline",
                        "type" => "text",
                        "fc" => "komline",
                        "placeholder" => "tambahkan komline",
                        "value" => $form_data->komline,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "komskype",
                        "type" => "text",
                        "fc" => "komskype",
                        "placeholder" => "tambahkan komskype",
                        "value" => $form_data->komskype,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "komhp",
                        "type" => "text",
                        "fc" => "komhp",
                        "placeholder" => "tambahkan komhp",
                        "value" => $form_data->komhp,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jabatan_man",
                        "type" => "text",
                        "fc" => "jabatan_man",
                        "placeholder" => "tambahkan jabatan_man",
                        "value" => $form_data->jabatan_man,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "jabatan_indo",
                        "type" => "text",
                        "fc" => "jabatan_indo",
                        "placeholder" => "tambahkan jabatan_indo",
                        "value" => $form_data->jabatan_indo,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "statusnonaktif",
                        "type" => "text",
                        "fc" => "statusnonaktif",
                        "placeholder" => "tambahkan statusnonaktif",
                        "value" => $form_data->statusnonaktif,
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/dataagen'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

