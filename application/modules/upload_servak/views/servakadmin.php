                <div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Data PASPOR BERLAKU</span>
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
                    <li class='active'>Data PASPOR BERLAKU  </li>
                </ul>
            </div>
        </div>
    </div>
</div>  

<div class="alert alert-info">
                        <a href="<?= site_url(); ?>/detailupload/" class="btn btn-success">back</a>
                        
						<button data-dismiss="alert" class="close"> x </button> Welcome <strong> <?php echo $tampil_nama_user; ?> </strong> PT Flamboyan Gema Jasa 
						</div>

<div class="row-fluid">

                <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Data PASPOR BERLAKU </div>
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

<?php if($hitungan==0){?>
               <div class="row-fluid">
                            <div class='span8 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Data UPLOAD Paspor Ditampilkan</div>
                                <div class='actions'>
                                    <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                                    </a>
                                    <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                                    </a>
                                </div>
                            </div>
                            <form action="<?php echo site_url('upload_servak/simpan_data_servak');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
<br>
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




<div class="form-actions">
                                            <?php echo form_submit('submit', 'Tambah', "class = 'btn blue'"); ?>
                                               
                                        </div>
                                    </form>
                        </div>

                        <?php }else{ ?>
 <div class='span8 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Data UPLOAD Paspor Ditampilkan</div>
                                <div class='actions'>
                                    <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                                    </a>
                                    <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                                    </a>
                                </div>
                            </div>

<?php foreach ($tampil_data_servak as $row) { ?>
                            <form action="<?php echo site_url('upload_servak/update_data_servak');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
<br>
<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
<input type="hidden" class="form-control" name="id_servak" value="<?php echo $row->id_servak; ?>">



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




<div class="form-actions">
                                            <?php echo form_submit('submit', 'Update', "class = 'btn blue'"); ?>
                                               
                                        </div>
                                    </form>
                        </div>

                        <?php } }?>

                                                            <div class='span3 box box-transparent'>
        <div class='row-fluid'>
            <div class=' box-quick-link blue-background'>
                  <!-- <a href='<?php echo site_url().'/tambah1/cetak/'.$detailpersonalid; ?>' target="_blank"> -->
                                    <a href='<?php echo site_url().'/upload_servak/uploadfile/'.$detailpersonalid; ?>'>
                    <div class='header'>
                        <div class='icon-upload'></div>
                    </div>
                    <div class='content'>UPLOAD FILE</div>
                </a>
            </div>
            <a class='btn btn-info btn-large span11' data-toggle='modal' href='<?php echo site_url().'/detailupload'; ?>' role='button'>Tabel Dokumen</a>
        </div>
    </div>
                    </div>


<div class='span12'>
<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-picture'></i>
                <span>File</span>
            </h1>
            <div class='pull-right'>
                <ul class='breadcrumb'>
                    <li>
                        <a href="index.html"><i class='icon-bar-chart'></i>
                        </a>
                    </li>
                    <li class='separator'>
                        <i class='icon-angle-right'></i>
                    </li>
                    <li></li>
                    <li class='separator'>
                        <i class='icon-angle-right'></i>
                    </li>
                    <li class='active'>Gallery</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class='row-fluid'>
<div class='span12 box'>
<div class='box-content'>
<div class='row-fluid'>
<div class='span12'>
<div class='gallery'>
<ul class='unstyled inline'>
<?php $no = 1;  foreach ($ambildatafoto as $rows) { ?>
<li>
    <div class='picture'>
        <div class='tags'>
           <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><span>Hapus</span></a>
        </div>
        <div class='actions'>
            <div class='pull-left'>
                <a href="#" class="btn btn-link"><small>
                    <i class='icon-user'></i>
                    <?php echo $rows->namafile;?>

                </small>
                </a>
            </div>
        </div>
         <a target="_blank" href="<?php echo base_url().'upload-servak/'.$rows->namafile;?>"<?php echo $rows->namafile;?>>
                                                        <?php if (strpos($rows->namafile, '.doc') !== false){?>
                                                          <img width="200" src="<?php echo base_url(); ?>assets/dokmajikan/nodok.jpg"/></a> 
                                                        <?php }else{?>
                                                           <img width="200" src="<?php echo base_url(); ?>_upload/vaksin/<?php echo "".$rows->namafile ?>"/></a> 
                                                        <?php } ?>
                                        
                        
    </div>
</li>
 <div class="modal fade" id="hapus<?php echo $no; ?>" tabindex="-1" role="dialog">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <form class="form-horizontal" method="post" action="<?php echo site_url('upload_servak/hapus_data_servak'); ?>">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                             <h4 class="modal-title">Hapus Data servak</h4>
                           </div>
                           <div class="modal-body">
                             <input type="hidden" class="form-control" name="id" value="<?php echo $rows->id; ?>">
                              <p>Apakah anda yakin akan menghapus data ini? : <?php echo $rows->namafile; ?></p>
                           </div>
                           <div class="modal-footer">
                             <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                           </div>
                           </form>
                         </div>
                       </div>
                     </div>

 <?php  $no++; }?>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
