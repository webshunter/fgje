                <div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Data Upload Foto Paspor Baru </span>
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
                    <li class='active'>Data Upload Foto Paspor Baru  </li>
                </ul>
            </div>
        </div>
    </div>
</div>  

<div class="alert alert-info">
                        
						<button data-dismiss="alert" class="close"> x </button> Welcome <strong> <?php echo $tampil_nama_user; ?> </strong> PT Flamboyan Gema Jasa 
						</div>

<div class="row-fluid">

                <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Dokumen Paspor Baru</div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
                            <div class='box-content box-no-padding'>



                            <?php foreach ($tampil_data_personal as $row) { ?>
<div class="span3">
                                                
            <?php 
            $fotoo = base_url()."assets/uploads/".$row->foto;
            $exif = exif_read_data($fotoo);
            if($exif && isset($exif['Orientation']))
            {
                $orien = $exif['Orientation'];
                if ($orien != 1)
                {
                    $img=imagecreatefromjpeg($fotoo);
                    $deg = 0;
                    switch ($orien)
                    {
                        case 3:
                        $deg = 180;
                        break;
                        case 6:
                        $deg = 270;
                        break;
                        case 8:
                        $deg = 90;
                        break;
                    }
                    if ($deg)
                    {
                        $img = imagerotate($img, $deg, 0);
                        echo '<div style="display: table;"><div style="padding: 50% 0;height: 0;"><a class="text-center profile-pic" data-toggle="modal" href="#uploadfoto" role="button"><img src="'.$fotoo.'" style="display: block;transform-origin: top left;-ms-transform:rotate(270deg) translate(-100%); -webkit-transform:rotate(270deg) translate(-100%); transform:rotate(270deg) translate(-100%); margin-top: -50%;white-space: nowrap;" /></a></div></div>';
                    }
                    else
                    {
                        echo '<a class="text-center profile-pic" data-toggle="modal" href="#uploadfoto" role="button"><img src="'.base_url()."assets/uploads/".$row->foto.'" /></a>';
                    }
                }
                else
                {
                        echo '<a class="text-center profile-pic" data-toggle="modal" href="#uploadfoto" role="button"><img src="'.base_url()."assets/uploads/".$row->foto.'" /></a>';
                }
            }
            else
            {
                        echo '<a class="text-center profile-pic" data-toggle="modal" href="#uploadfoto" role="button"><img src="'.base_url()."assets/uploads/".$row->foto.'" /></a>';
            }
        ?>
                                    
                                </div>

                                <div class="span9">
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid ?></small></h4>
                                <?php }?>

<div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> silahkan menambahkan data pada tombol ini... 
                        <a class='btn btn-info btn-large' data-toggle='modal' href='#tambah' role='button'>Tambah Data</a>
                          <a class='btn btn-info btn-large' data-toggle='modal' href='<?php echo site_url().'/detailpaspor'; ?>' role='button'>Kembali</a>
                        </div>


                                                      <div class="row-fluid">
<div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Dokumen Paspor Baru</div>
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
                                            <th>Nama Dokumen</th>
                                            <th>Status Keperluan</th>
                                            <th>Status Dokumen</th>
                                            <th>Tanggal Terima</th>
                                            <th>Keterangan</th>
                                            <th>Tampilkan</th>
                                            <th>File</th>
                                            
                                             <th>Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_pasporbaru as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->namadok;?></td>
                                            <td><?php echo $row->penting;?></td>
                                             <td><?php echo $row->cekdokumen;?></td>
                                              <td><?php echo $row->tglterima;?></td>
                                               <td><?php echo $row->keterangan;?></td>
                                               <td><?php echo $row->tampilkan;?></td>
                                               <td>
                                                    <a target="_blank" href="<?php echo base_url().'/assets/uploadpasporbaru/'.$row->file;?>"<?php echo $row->file;?>><img src="<?php echo base_url(); ?>assets/uploadpasporbaru/<?php echo "".$row->file ?>"/></a> </td>

                                            <td>
                                            <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#edit<?php echo $no; ?>"><span>Edit</span></a>  
                                        <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><span>Hapus</span></td>
                                            
                                        </tr>

 <div class='modal hide fade' id='edit<?php echo $no; ?>' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update pasporbaru</h3>
                </div>  
                          <form action="<?php echo site_url('upload_pasporbaru/update_data_pasporbaru');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

                           <div class="modal-body">
                           

                          <input type="hidden" class="form-control" name="id_pasporbaru" value="<?php echo $row->id_pasporbaru; ?>">
<!--                          <input type="hidden" class="form-control" name="namafile" value="<?php echo $row->file; ?>">
 --> 
                                             <div class="control-group">
                                        <label class="control-label">Nama Dokumen </label>
                                        <div class="controls">
                                            <input type="text" name="namadok" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->namadok; ?>"/>
                                        </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Status Keperluan</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="penting"  >
                                                <option value="<?php echo $row->penting; ?>" /><?php echo $row->penting; ?>
                                                    <option value="perlu" />Perlu
                                                    <option value="tdkperlu" />Tidak Perlu

                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Status Dokumen</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="cekdokumen"  >
                                                <option value="<?php echo $row->cekdokumen; ?>" /><?php echo $row->cekdokumen; ?>
                                                    <option value="O" />Original
                                                    <option value="C/F" />Copy / File
                                                    <option value="P" />Print
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                                                <label class="control-label">Tgl Terima </label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='dd/MM/yyyy' name="tglterima"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglterima; ?>"/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                        <label class="control-label">Keterangan </label>
                                        <div class="controls">
                                            <input type="text" name="keterangan" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->keterangan; ?>" />
                                        </div>
                                        </div>

                                         <div class="control-group">
                                            <label class="control-label">Tampikan Di PRINT DATA?</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="tampilkan"  >
                                                     <option  value="<?php echo $row->tampilkan; ?>" /> <?php echo $row->tampilkan; ?>
                                                    <option value="Tidak" />Tidak
                                                    <option value="Ya" />Ya
                                                </select>
                                            </div>
                                        </div>
                                        

                                       <div class="control-group">
                                    <label class="control-label">Image Upload</label>
                                    <div class="controls">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo base_url(); ?>assets/uploadpasporbaru/<?php echo "".$row->file ?>"  alt="" /></div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div><span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                                                <input type="file" class="default" name="filenya" />
                                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a></div>
                                        </div><span class="label label-important">NOTE!</span><span> Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span></div>
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
                           <form class="form-horizontal" method="post" action="<?php echo site_url('upload_pasporbaru/hapus_data_pasporbaru'); ?>">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                             <h4 class="modal-title">Hapus Data pasporbaru</h4>
                           </div>
                           <div class="modal-body">
                             <input type="hidden" class="form-control" name="id_pasporbaru" value="<?php echo $row->id_pasporbaru; ?>">
                              <p>Apakah anda yakin akan menghapus data ini? : <?php echo $row->namadok; ?></p>
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


</div>
</div>

<div class='modal hide fade' id='tambah' role='dialog' tabindex='-2'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Tambah Agama</h3>
                </div>
                <div class='modal-body'>
<form action="<?php echo site_url('upload_pasporbaru/simpan_data_pasporbaru');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />

                                  <div class="control-group">
                                        <label class="control-label">Nama Dokumen </label>
                                        <div class="controls">
                                            <input type="text" name="namadok" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                        </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Status Keperluan</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="penting"  >
                                                    <option value="perlu" />Perlu
                                                    <option value="tdkperlu" />Tidak Perlu

                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Status Dokumen</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="cekdokumen"  >
                                                    <option value="O" />Original
                                                    <option value="C/F" />Copy / File
                                                    <option value="P" />Print
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                                                <label class="control-label">Tgl Terima </label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='dd/MM/yyyy' name="tglterima"  placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                        <label class="control-label">Keterangan </label>
                                        <div class="controls">
                                            <input type="text" name="keterangan" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                        </div>
                                        </div>

                                         <div class="control-group">
                                            <label class="control-label">Tampikan Di PRINT DATA?</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="tampilkan"  >
                                                    <option value="Tidak" />Tidak
                                                    <option value="Ya" />Ya
                                                </select>
                                            </div>
                                        </div>

                                         <div class="control-group">
                                    <label class="control-label">File Upload</label>
                                    <div class="controls">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div><span class="btn btn-file"><span class="fileupload-new">Select File</span><span class="fileupload-exists">Change</span>
                                                <input type="file" class="default" name="filenya" />
                                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a></div>
                                        </div></div>
                                </div>

                               

                                                          
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                                                    </form>

            </div>
            </div>
