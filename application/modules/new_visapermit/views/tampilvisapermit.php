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
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h5 class="card-title text-center ">Detail History Visa Permit <br> </h5>
                        <br/>
                        <a class='btn btn-primary' data-toggle='modal' href='#tambahagama' role='button'>Tambah History Visa Permit</a>
                        <a class='btn bg-pink float-right' href="<?php echo site_url('new_visapermit/') ?>">Kembali</a>
                    </div>
                    <div class="card-body">

                        <table class=" table table-bordered table-striped" style='margin-bottom:0;' id="fixedeks">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal Terima</th>
                                    <th>Tanggal Kirim</th>
                                    <th>Ket</th>
                                        <th>Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; 
                                    foreach ($tampil_datahistoryvisapermit as $row) { ?>
                                <tr>
                                    <td><?php echo $no;?></td>
                                    <td><?php echo $row->tgl_terima;?></td>
                                    <td><?php echo $row->tgl_kirim;?></td>
                                    <td><?php echo $row->ket;?></td>
                                    <td>
                                        <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#edit<?php echo $no; ?>"><span>Edit</span></a> 
                                        <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><span>Hapus</span></a>
                                    </td>
                                </tr>

                                <div class='modal fade' id='edit<?php echo $no; ?>' role='dialog' tabindex='-1'>
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class='modal-header bg-primary'>
                                                <button class='close' data-dismiss='modal' type='button'>&times;</button>
                                                <h3>Ubah History Suhan</h3>
                                            </div>
                                            <form class="form-horizontal" method="post" action="<?php echo site_url('new_visapermit/update_history_visapermit/'.$idnya); ?>">
                                                <div class="modal-body">
                                                    <input type="hidden" class="form-control" name="id_visapermithistory" value="<?php echo $row->id_visapermithistory; ?>">
                                                    <div class="control-group" id="berlaku">
                                                        <label class="control-label"> Tgl Simpan visapermit </label>
                                                        <div class="controls">
                                                            <div class="input-group input-append date dewdate" id="datePicker">
                                                                <input type="text" class="form-control" name="tgl_terima" value="<?php echo $row->tgl_terima; ?>"/>
                                                                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="control-group" id="berlaku">
                                                        <label class="control-label"> Tgl Kirim </label>
                                                        <div class="controls">
                                                            <div class="input-group input-append date dewdate" id="datePicker">
                                                                <input type="text" class="form-control" name="tgl_kirim" value="<?php echo $row->tgl_kirim; ?>"/>
                                                                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="control-group" id="berlaku">
                                                        <label class="control-label">Ket </label>
                                                        <div class="controls">
                                                            <input type="text" class="form-control" name="ket" value="<?php echo $row->ket; ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal fade" id="hapus<?php echo $no; ?>" tabindex="-2" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form class="form-horizontal" method="post" action="<?php echo site_url('new_visapermit/hapus_history_visapermit/'.$idnya); ?>">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                                    <h4 class="modal-title">Hapus Data History</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" class="form-control" name="id_visapermithistory" value="<?php echo $row->id_visapermithistory; ?>">
                                                    <p>Apakah anda yakin akan menghapus data History ini? : <?php echo $row->id_visapermithistory; ?></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php $no++;
                                } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



                    




<div class='modal fade' id='tambahagama' role='dialog' tabindex='-2'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class='modal-header bg-primary'>
                <button class='close' data-dismiss='modal' type='button'>&times;</button>
                <h3>Tambah History visapermit </h3>
            </div>
            <div class='modal-body'>
                <form action="<?php echo site_url('new_visapermit/simpan_history_visapermit/'.$idnya);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                    <input type="hidden" class="form-control" name="id_visapermithistory" value="<?php echo $idnya; ?>">
                    <div class="form-group" id="berlaku">
                        <label class="control-label"> Tgl Terima </label>
                        <div class="controls">
                            <div class="input-group input-append date dewdate" id="datePicker">
                                <input type="text" class="form-control" name="tgl_terima" />
                                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group" id="berlaku">
                        <label class="control-label"> Tgl Kirim</label>
                        <div class="controls">
                            <div class="input-group input-append date dewdate" id="datePicker">
                                <input type="text" class="form-control" name="tgl_kirim"/>
                                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group" id="berlaku">
                        <label class="control-label">Ket </label>
                        <div class="controls">
                            <input type="text" class="form-control" name="ket"/>
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <button class='btn' data-dismiss='modal'>Close</button>
                        <button class='btn btn-primary'>Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function goBack() {
        window.history.back();
    }

    $('#fixedeks').dataTable();
</script>