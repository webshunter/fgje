<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">data_pemasukan_delete_history</h1>
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
                <div class="card-header">
                    <?php
                        link_button([
                            "link" => "admin/data_pemasukan_delete_history/tambah_data",
                            "class" => "btn btn-primary",
                            "text" => "Tambah Data",
                        ]);
                    ?>
                    <?php
                        link_button([
                            "link" => "admin/data_pemasukan_delete_history/exls",
                            "class" => "btn btn-primary",
                            "text" => "Export Excel",
                        ]);
                    ?>
                </div>
                <div class="card-body">
                    <?= $datatable ?>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>