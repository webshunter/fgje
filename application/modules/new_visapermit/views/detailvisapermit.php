
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Visa Permit</h1>
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
                        <h5 class="card-title text-center">Data Visa Permit <br> </h5><br />
                        <button class="btn btn-lg btn-primary" data-toggle='modal' data-target='#tambaha'
                            role='button'>Tambah Data</button>
                        <a class="btn btn-lg btn-primary"
                            href="<?php echo site_url('pdf9/cetakvisapermit/'); ?>">Print Data Visa Permit</a>
                        <a class="btn btn-lg btn-primary"
                            href="<?php echo site_url('new_visapermit_expired'); ?>">Cek Expired</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover" id="fixedeks">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th></th>
                                    <th></th>
                                    <th>File</th>
                                    <th>No Suhan</th>
                                    <th>No Visa Permit</th>
                                    <th>Nama Group</th>
                                    <th>Nama Agen</th>
                                    <th>Nama Majikan</th>
                                    <th>tgl terbit</th>
                                    <th>tgl exp</th>
                                    <th>tgl exp Perpanjangan</th>
                                </tr>
                            </thead>
                            <tbody>
        
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class='modal fade' id='tambaha' role='dialog' tabindex='-2'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class='modal-header bg-primary'>
                <h5>Tambah Data Visa Permit </h5>
                <button class='close' data-dismiss='modal' type='button'>&times;</button>
            </div>
            <form action="<?php echo site_url('new_visapermit/simpan_data_visapermit');?>"
                enctype="multipart/form-data" method="post" class="form-horizontal" />
                <div class='modal-body'>
                    <div class="form-group">
                        <label class="control-label col-sm-3"> Pilih Group </label>
                        <div class="col-12">
                            <?php   echo form_dropdown("group",$option_group,"","id='group_id4' class='form-control'"); ?>
                            <div id="load" style="display:none"><img
                                    src="<?php echo base_url(); ?>assets/assets/pre-loader/Whirlpool.gif"
                                    alt="Whirlpool" /></div>
                        </div>
                    </div>

                    <div class="form-group" id="jelasin_agen">
                        <label class="control-label col-sm-3">Pilih Agen </label>
                        <div class="col-12">
                            <?php    echo form_dropdown("kode_group",array('Pilih Group'=>'Pilih Group Terkebih Dahulu'),'','disabled class="form-control"'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">No Visa Permit </label>
                        <div class="col-12">
                            <input type="text" name="no" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Tgl Terbit</label>
                        <div class="col-12">
                            <div class="input-group input-append date dewdate" id="datePicker">
                                <input type="text" class="form-control" name="tglterbit" />
                                <span class="input-group-addon add-on"><span
                                        class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Tgl Expired </label>
                        <div class="col-12">
                            <div class="input-group input-append date dewdate" id="datePicker">
                                <input type="text" class="form-control" name="tglexp" />
                                <span class="input-group-addon add-on"><span
                                        class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Tgl Expired Perpanjangan </label>
                        <div class="col-12">
                            <div class="input-group input-append date dewdate" id="datePicker">
                                <input type="text" class="form-control" name="tglexpext" />
                                <span class="input-group-addon add-on"><span
                                        class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">File Upload</label>
                        <div class="col-12">
                            <input type="file" class="form-control" name="filenya" />
                        </div>
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


<script type="text/javascript">
        $('#fixedeks').dataTable({
            scrollX: true,
            scrollY: "400px",
            processing: true,
            serverSide: true,
            ajax: {
                "url"       : "<?php echo site_url('new_visapermit/show_visapermit') ?>",
                "type"      : "POST"
            }
        });
        $("#group_id4").change(function(){
            var kode_group = {kode_group:$("#group_id4").val()};
            document.getElementById("load").style.display = "block";  // show the loading message.
            $.ajax({
                type: "POST",
                url : "<?php echo site_url('new_visapermit/select_agenlist4')?>",
                data: kode_group,
                success: function(msg) {
                $('#jelasin_agen').html(msg);
                    document.getElementById("load").style.display = "none";
                }
            });
        });
</script>