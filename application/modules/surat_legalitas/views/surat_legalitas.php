<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Surat legalitas Dokumen</span>
            </h1>
            <div class='pull-right'>
                <ul class='breadcrumb'>
                    <li>
                        <a href="<?php echo site_url().'/dashboard'; ?>"><i class='icon-bar-chart'></i>
                        </a>
                    </li>
                    <li class='separator'>
                        <i class='icon-angle-right'></i>
                    </li>
                    <li class='active'>Print Surat legalitas Dokumen</li>
                </ul>
            </div>
        </div>
    </div>
</div>


                            <div class='row-fluid'>
                            <div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
                            	<div class='title'>Data TKI</div>
                                <div class='actions'>
                           			 <a href="#myModal1" role="button" class="btn btn-success" data-toggle="modal">Tambah Data</a>
                                </div>
                            	</div>
                            <div class='box-content box-no-padding'>
                            <div class='responsive-table'>
                            <div class='scrollable-area'>
                            <table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
                                    <thead>

                                        <tr>
                                            <th>#</th>
                                            <th colspan="2">Nama Lengkap / No.ID</th>
                                            <th colspan="2">Tempat / Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Opsi</th>
                                            <th>Print</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_personal as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->nama;?></td>
                                            <td><?php echo $row->noid;?></td>
                                            <td><?php echo $row->tempatlahir;?></td>
                                            <td><?php echo $row->tgllahir;?></td>
                                            <td><?php echo $row->jeniskelamin;?></td>
                                            <td><?php echo $row->alamat;?></td>
                                            <td><a href="#myModal2<?php echo $no; ?>" role="button" data-toggle="modal" class="btn btn-primary">Edit</a>
                                            	<a href="#hapus" role="button" data-toggle="modal" class="btn btn-danger">Hapus</a></td>
                                            <td><a href="<?php echo base_url(); ?>printdata/cetak4/<?php echo $row->id_legalitas;?>" class="btn btn-warning">Print</a></td>                                           
                                            
                                        </tr>

                                        </tbody>
                                            
                                            <div id="myModal2<?php echo $no; ?>" class="modal hide fade" tabindex="-2" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3 id="myModalLabel1">Tambah Data</h3></div>
                                            <div class="modal-body">
                                                <form action="<?php echo site_url('surat_legalitas/edit_surat');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                            	<input type="hidden" class="form-control" name="id_legalitas" value="<?php echo $row->id_legalitas; ?>">
                                            <div class="control-group">
                                                <label class="control-label">Nama TKI</label>
                                                <div class="controls">
                                                    			 <select class="span10 popovers" name="id_tki" tabindex="1" required>
                                        
                                                                                <?php foreach ($tampil_data_tki as $row1) { ?>
                                                                              <option value="<?php echo $row1->id_personal;?>"><?php echo $row1->nama;?></option>
                                                              <?php }?>
                                                                          </select>
                                                  			</div>
                                         			</div>
                                                    <div class="control-group">
                                                        <label class="control-label">No Id</label>
                                                      <div class="controls">
                                                        <input type="text" name="noid"  class="span10 popovers" value="<?php echo $row->noid;?>" class="form-control" required>
                                                      </div>
                                                    </div></div>
                                                <div class="modal-footer">
                                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                                    <button class="btn btn-primary">Save</button>
                                                </div>
                                                </form>
                                            </div>
                                            </div>
                                            </div>
                                            
                                            <div id="hapus" class="modal hide fade" tabindex="-hapus" role="dialog" aria-labelledby="hapus" aria-hidden="true">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3 id="myModalLabel1">Hapus Data</h3></div>
                                            <div class="modal-body">
                                            	<form action="<?php echo site_url('surat_legalitas/hapus_data_surat');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                                  <input type="hidden" class="form-control" name="id_legalitas" value="<?php echo $row->id_legalitas; ?>">
                                                    <p>Apakah anda yakin akan menghapus Data dari: <code class="text-danger"><?php echo $row->nama; ?></code> ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                                    <button class="btn btn-primary">Save</button>
                                                </div>
                                                </form>
                                            </div>
                                        <?php $no++;
                                        } ?>
                                </table>    
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>

                                        <div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3 id="myModalLabel1">Tambah Data</h3></div>
                                            <div class="modal-body">
                                                <form action="<?php echo site_url('surat_legalitas/simpan_data_surat');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                            	
                                            <div class="control-group">
                                                <label class="control-label">Nama TKI</label>
                                                <div class="controls">
                                                    			 <select  class="span10 popovers"  name="id_tki" tabindex="1" required>
                                        
                                                                                <?php foreach ($tampil_data_tki as $row1) { ?>
                                                                              <option value="<?php echo $row1->id_personal;?>"><?php echo $row1->nama;?></option>
                                                              <?php }?>
                                                                          </select>
                                                  			</div>
                                         			</div>
                                                    <div class="control-group">
                                                        <label class="control-label">No Id</label>
                                                      <div class="controls">
                                                        <input type="text" name="noid"  class="span10 popovers" placeholder="Berisi Data Surat" class="form-control" required>
                                                      </div>
                                                    </div>
                                                  </div>
                                                <div class="modal-footer">
                                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                                    <button class="btn btn-primary">Save</button>
                                                </div>
                                                </form>
                                            </div>