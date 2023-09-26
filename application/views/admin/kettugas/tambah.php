<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambahkan kettugas</h1>
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
                    <form action="<?= site_url('admin/kettugas/simpan') ?>" method="post" enctype="multipart/form-data">
                        
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
                        "title" => "t1_pengalaman",
                        "type" => "text",
                        "fc" => "t1_pengalaman",
                        "placeholder" => "tambahkan t1_pengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t1_latihan",
                        "type" => "text",
                        "fc" => "t1_latihan",
                        "placeholder" => "tambahkan t1_latihan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t1_bersedia",
                        "type" => "text",
                        "fc" => "t1_bersedia",
                        "placeholder" => "tambahkan t1_bersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t2_pengalaman",
                        "type" => "text",
                        "fc" => "t2_pengalaman",
                        "placeholder" => "tambahkan t2_pengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t2_latihan",
                        "type" => "text",
                        "fc" => "t2_latihan",
                        "placeholder" => "tambahkan t2_latihan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t2_bersedia",
                        "type" => "text",
                        "fc" => "t2_bersedia",
                        "placeholder" => "tambahkan t2_bersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t3_pengalaman",
                        "type" => "text",
                        "fc" => "t3_pengalaman",
                        "placeholder" => "tambahkan t3_pengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t3_latihan",
                        "type" => "text",
                        "fc" => "t3_latihan",
                        "placeholder" => "tambahkan t3_latihan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t3_bersedia",
                        "type" => "text",
                        "fc" => "t3_bersedia",
                        "placeholder" => "tambahkan t3_bersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t4_pengalaman",
                        "type" => "text",
                        "fc" => "t4_pengalaman",
                        "placeholder" => "tambahkan t4_pengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t4_latihan",
                        "type" => "text",
                        "fc" => "t4_latihan",
                        "placeholder" => "tambahkan t4_latihan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t4_bersedia",
                        "type" => "text",
                        "fc" => "t4_bersedia",
                        "placeholder" => "tambahkan t4_bersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t5_pengalaman",
                        "type" => "text",
                        "fc" => "t5_pengalaman",
                        "placeholder" => "tambahkan t5_pengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t5_bersedia",
                        "type" => "text",
                        "fc" => "t5_bersedia",
                        "placeholder" => "tambahkan t5_bersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t6_pengalaman",
                        "type" => "text",
                        "fc" => "t6_pengalaman",
                        "placeholder" => "tambahkan t6_pengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t6_bersedia",
                        "type" => "text",
                        "fc" => "t6_bersedia",
                        "placeholder" => "tambahkan t6_bersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t7_pengalaman",
                        "type" => "text",
                        "fc" => "t7_pengalaman",
                        "placeholder" => "tambahkan t7_pengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t7_bersedia",
                        "type" => "text",
                        "fc" => "t7_bersedia",
                        "placeholder" => "tambahkan t7_bersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t8_pengalaman",
                        "type" => "text",
                        "fc" => "t8_pengalaman",
                        "placeholder" => "tambahkan t8_pengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t8_bersedia",
                        "type" => "text",
                        "fc" => "t8_bersedia",
                        "placeholder" => "tambahkan t8_bersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t9_pengalaman",
                        "type" => "text",
                        "fc" => "t9_pengalaman",
                        "placeholder" => "tambahkan t9_pengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t9_bersedia",
                        "type" => "text",
                        "fc" => "t9_bersedia",
                        "placeholder" => "tambahkan t9_bersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t10_pengalaman",
                        "type" => "text",
                        "fc" => "t10_pengalaman",
                        "placeholder" => "tambahkan t10_pengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t10_latihan",
                        "type" => "text",
                        "fc" => "t10_latihan",
                        "placeholder" => "tambahkan t10_latihan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t10_bersedia",
                        "type" => "text",
                        "fc" => "t10_bersedia",
                        "placeholder" => "tambahkan t10_bersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t11_pengalaman",
                        "type" => "text",
                        "fc" => "t11_pengalaman",
                        "placeholder" => "tambahkan t11_pengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t11_latihan",
                        "type" => "text",
                        "fc" => "t11_latihan",
                        "placeholder" => "tambahkan t11_latihan",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t11_bersedia",
                        "type" => "text",
                        "fc" => "t11_bersedia",
                        "placeholder" => "tambahkan t11_bersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t12_pengalaman",
                        "type" => "text",
                        "fc" => "t12_pengalaman",
                        "placeholder" => "tambahkan t12_pengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t12_bersedia",
                        "type" => "text",
                        "fc" => "t12_bersedia",
                        "placeholder" => "tambahkan t12_bersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t13_pengalaman",
                        "type" => "text",
                        "fc" => "t13_pengalaman",
                        "placeholder" => "tambahkan t13_pengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t13_bersedia",
                        "type" => "text",
                        "fc" => "t13_bersedia",
                        "placeholder" => "tambahkan t13_bersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t14apengalaman",
                        "type" => "text",
                        "fc" => "t14apengalaman",
                        "placeholder" => "tambahkan t14apengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t14abersedia",
                        "type" => "text",
                        "fc" => "t14abersedia",
                        "placeholder" => "tambahkan t14abersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t14bpengalaman",
                        "type" => "text",
                        "fc" => "t14bpengalaman",
                        "placeholder" => "tambahkan t14bpengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t14bbersedia",
                        "type" => "text",
                        "fc" => "t14bbersedia",
                        "placeholder" => "tambahkan t14bbersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t15_pengalaman",
                        "type" => "text",
                        "fc" => "t15_pengalaman",
                        "placeholder" => "tambahkan t15_pengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t15_bersedia",
                        "type" => "text",
                        "fc" => "t15_bersedia",
                        "placeholder" => "tambahkan t15_bersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t16_pengalaman",
                        "type" => "text",
                        "fc" => "t16_pengalaman",
                        "placeholder" => "tambahkan t16_pengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t16_bersedia",
                        "type" => "text",
                        "fc" => "t16_bersedia",
                        "placeholder" => "tambahkan t16_bersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t17_pengalaman",
                        "type" => "text",
                        "fc" => "t17_pengalaman",
                        "placeholder" => "tambahkan t17_pengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t17_bersedia",
                        "type" => "text",
                        "fc" => "t17_bersedia",
                        "placeholder" => "tambahkan t17_bersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t18_pengalaman",
                        "type" => "text",
                        "fc" => "t18_pengalaman",
                        "placeholder" => "tambahkan t18_pengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t18_bersedia",
                        "type" => "text",
                        "fc" => "t18_bersedia",
                        "placeholder" => "tambahkan t18_bersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t19_pengalaman",
                        "type" => "text",
                        "fc" => "t19_pengalaman",
                        "placeholder" => "tambahkan t19_pengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t19_bersedia",
                        "type" => "text",
                        "fc" => "t19_bersedia",
                        "placeholder" => "tambahkan t19_bersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t20_pengalaman",
                        "type" => "text",
                        "fc" => "t20_pengalaman",
                        "placeholder" => "tambahkan t20_pengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t20_bersedia",
                        "type" => "text",
                        "fc" => "t20_bersedia",
                        "placeholder" => "tambahkan t20_bersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t21_pengalaman",
                        "type" => "text",
                        "fc" => "t21_pengalaman",
                        "placeholder" => "tambahkan t21_pengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t21_bersedia",
                        "type" => "text",
                        "fc" => "t21_bersedia",
                        "placeholder" => "tambahkan t21_bersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t22_pengalaman",
                        "type" => "text",
                        "fc" => "t22_pengalaman",
                        "placeholder" => "tambahkan t22_pengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t22_bersedia",
                        "type" => "text",
                        "fc" => "t22_bersedia",
                        "placeholder" => "tambahkan t22_bersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t23_pengalaman",
                        "type" => "text",
                        "fc" => "t23_pengalaman",
                        "placeholder" => "tambahkan t23_pengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t23_bersedia",
                        "type" => "text",
                        "fc" => "t23_bersedia",
                        "placeholder" => "tambahkan t23_bersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t24_pengalaman",
                        "type" => "text",
                        "fc" => "t24_pengalaman",
                        "placeholder" => "tambahkan t24_pengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t24_bersedia",
                        "type" => "text",
                        "fc" => "t24_bersedia",
                        "placeholder" => "tambahkan t24_bersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t25_pengalaman",
                        "type" => "text",
                        "fc" => "t25_pengalaman",
                        "placeholder" => "tambahkan t25_pengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t25_bersedia",
                        "type" => "text",
                        "fc" => "t25_bersedia",
                        "placeholder" => "tambahkan t25_bersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t26_pengalaman",
                        "type" => "text",
                        "fc" => "t26_pengalaman",
                        "placeholder" => "tambahkan t26_pengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t26_bersedia",
                        "type" => "text",
                        "fc" => "t26_bersedia",
                        "placeholder" => "tambahkan t26_bersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t27_pengalaman",
                        "type" => "text",
                        "fc" => "t27_pengalaman",
                        "placeholder" => "tambahkan t27_pengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t27_bersedia",
                        "type" => "text",
                        "fc" => "t27_bersedia",
                        "placeholder" => "tambahkan t27_bersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t28_pengalaman",
                        "type" => "text",
                        "fc" => "t28_pengalaman",
                        "placeholder" => "tambahkan t28_pengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t28_bersedia",
                        "type" => "text",
                        "fc" => "t28_bersedia",
                        "placeholder" => "tambahkan t28_bersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t29_pengalaman",
                        "type" => "text",
                        "fc" => "t29_pengalaman",
                        "placeholder" => "tambahkan t29_pengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t29_bersedia",
                        "type" => "text",
                        "fc" => "t29_bersedia",
                        "placeholder" => "tambahkan t29_bersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t30_pengalaman",
                        "type" => "text",
                        "fc" => "t30_pengalaman",
                        "placeholder" => "tambahkan t30_pengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t30_bersedia",
                        "type" => "text",
                        "fc" => "t30_bersedia",
                        "placeholder" => "tambahkan t30_bersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t31_pengalaman",
                        "type" => "text",
                        "fc" => "t31_pengalaman",
                        "placeholder" => "tambahkan t31_pengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t31_bersedia",
                        "type" => "text",
                        "fc" => "t31_bersedia",
                        "placeholder" => "tambahkan t31_bersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t32_pengalaman",
                        "type" => "text",
                        "fc" => "t32_pengalaman",
                        "placeholder" => "tambahkan t32_pengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t32_bersedia",
                        "type" => "text",
                        "fc" => "t32_bersedia",
                        "placeholder" => "tambahkan t32_bersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t33_pengalaman",
                        "type" => "text",
                        "fc" => "t33_pengalaman",
                        "placeholder" => "tambahkan t33_pengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t33_bersedia",
                        "type" => "text",
                        "fc" => "t33_bersedia",
                        "placeholder" => "tambahkan t33_bersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t34_pengalaman",
                        "type" => "text",
                        "fc" => "t34_pengalaman",
                        "placeholder" => "tambahkan t34_pengalaman",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t34_bersedia",
                        "type" => "text",
                        "fc" => "t34_bersedia",
                        "placeholder" => "tambahkan t34_bersedia",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "t35_kg",
                        "type" => "text",
                        "fc" => "t35_kg",
                        "placeholder" => "tambahkan t35_kg",
                    ])
                ?>
            
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a class="btn btn-default" href="<?= site_url('admin/kettugas'); ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>