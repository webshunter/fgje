                <div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Data Medical </span>
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
                    <li class='active'>Data Medical </li>
                </ul>
            </div>
        </div>
    </div>
</div>  

<div class="alert alert-info">
                        
						<button data-dismiss="alert" class="close"> x </button> Welcome <strong> <?php echo $tampil_nama_user; ?> </strong> PT Flamboyan Gema Jasa 
						</div>

                          <div class='row-fluid'>
    <div class='span12'>
<a class='btn btn-info btn-large' data-toggle='modal' href='#tambahmedical' role='button'>Tambah Medical</a>
</div>  </div> 
</br>

                    <div class="row-fluid">
<div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Data Medical</div>
                                <div class='actions'>
                                    <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                                    </a>
                                    <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                                    </a>
                                </div>
                            </div>
                            <div class='box-content box-no-padding'>
                            <div class='responsive-table'>
                            <div class='scrollable-area'>
                            <table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
                                    <thead>

                                        <tr>
                                            <th>#</th>
                                            <th>medical</th>
                                            <th>Bhs Taiwan</th>
                                             <th>Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_medical as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->isi;?></td>
                                            <td><?php echo $row->mandarin;?></td>
                                            <td>
                                            <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#edit<?php echo $no; ?>"><span>Edit</span></a>  
                                        <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><span>Hapus</span></td>
                                            
                                        </tr>

 <div class='modal hide fade' id='edit<?php echo $no; ?>' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update Medical</h3>
                </div>  
                <form class="form-horizontal" method="post" action="<?php echo site_url('medical/update_data_medical'); ?>">
                           <div class="modal-body">
                           
                          <input type="hidden" class="form-control" name="id_medical" value="<?php echo $row->id_medical; ?>">

                                       <div class="control-group">
                                                            <label class="control-label">Nama medical</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama_medical" class="span10 popovers" value="<?php echo $row->isi; ?>"/>
                                                            </div>
                                                            </div>
                                                             
                                    <div class="control-group">
                                                            <label class="control-label">Nama medical (Bahasa Taiwan)</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama_medical_taiwan" class="span10 popovers" value="<?php echo $row->mandarin; ?>"/>
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
                           <form class="form-horizontal" method="post" action="<?php echo site_url('medical/hapus_data_medical'); ?>">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                             <h4 class="modal-title">Hapus Data Medical</h4>
                           </div>
                           <div class="modal-body">
                             <input type="hidden" class="form-control" name="id_medical" value="<?php echo $row->id_medical; ?>">
                              <p>Apakah anda yakin akan menghapus data Medical ini? : <?php echo $row->isi; ?></p>
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
                       <!--  <div class="span5">
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>Input medical</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                                <div class="widget-body">

<?php echo form_open('medical/simpan_data_medical', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>

                                                                
                                    <div class="control-group">
                                                            <label class="control-label">Nama medical</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama_medical" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                                            </div>
                                                            </div>
                                                             
                                    <div class="control-group">
                                                            <label class="control-label">Nama medical (Bahasa Taiwan)</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama_medical_taiwan" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal Dalam Bahasa Taiwan" data-original-title="Nama Sektor (Bahsa Taiwan)" />
                                                            </div>
                                                            </div>

                                                        
                                                            <div class="form-actions">
                                                <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                                <button type="button" class="btn"><i class=" icon-remove"></i> Batal</button>
                                            </div>
                                                            
                              <?php echo form_close(); ?>

                                </div>
                            </div>
                        </div> -->
                    </div>
                    

                                           <div class='modal hide fade' id='tambahmedical' role='dialog' tabindex='-2'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Tambah Medical</h3>
                </div>
                <div class='modal-body'>
<form action="<?php echo site_url('medical/simpan_data_medical');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

                                       
                                 <div class="control-group">
                                                            <label class="control-label">Nama medical</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama_medical" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                                            </div>
                                                            </div>
                                                             
                                    <div class="control-group">
                                                            <label class="control-label">Nama medical (Bahasa Taiwan)</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama_medical_taiwan" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal Dalam Bahasa Taiwan" data-original-title="Nama Sektor (Bahsa Taiwan)" />
                                                            </div>
                                                            </div>
                                                          
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                                                    </form>

            </div>
            </div>
                    