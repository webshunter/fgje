<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>History Visa Permit</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card card-bordered">
            <div class="card-header">
                <a class='btn float-right bg-pink' href="<?php echo site_url('new_visapermit/') ?>">Kembali</a>
                <h5 class="card-title text-center ">Detail History Visa Permit <br> </h5><br/>
            </div>
            <div class="card-body">

                <table class='data-table table table-bordered table-striped' style='margin-bottom:0;' id="fixedeks">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID TKI </th>
                            <th>NAMA TKI</th>
                            <th>Tanggal Terima</th>
                            <th>Stats Visa Permit</th>
                            <th>Tanggal Simpan</th>
                            <th>Tanggal Kirim</th>
                            <th>KETERANGAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; 
                        foreach ($tampil_datatkivisapermit as $row) { ?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $row->idnyabio;?></td>
                                <td><?php echo $row->nama;?></td>
                                <td><?php echo $row->tglsimpanvp;?></td>
                                <td><?php echo $row->statvp;?></td>
                                <td>
                                    <?php 
                                        if($row->tempatvpdok=='放印尼 DI INDONESIA'){
                                            echo $row->tglberangkat;
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        if($row->tempatvpdok=='寄臺灣KE TAIWAN'){
                                            echo $row->tglberangkat;
                                        }
                                    ?> 
                                </td>
                                <td><?php echo $row->ketdokvp;?></td>
                            </tr>
                        <?php $no++;
                        } ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    function goBack() {
        window.history.back();
    }

    $('#fixedeks').dataTable();
</script>