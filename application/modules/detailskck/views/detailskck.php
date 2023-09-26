<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Detail SKCK (POLDA) </span>
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
                    <li class='active'>Detail SKCK (POLDA) </li>
                </ul>
            </div>
        </div>
    </div>
</div>  



	                       

<div class="row-fluid">

    <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Detail SKCK (POLDA)</div>
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
                                     <?php 
                        $this->load->view('template/menuadministrasi');
                    ?>
                                </div>

                                <div class="span6">
                                      <?php if($row->skill1==""){?>
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid."".$row->negara1."".$row->negara2."".$row->calling."".$row->skill1."".$row->skill2."".$row->skill3; ?></small></h4>
                                    <?php }else{?>
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid."".$row->negara1."".$row->negara2."".$row->calling."-".$row->skill1."".$row->skill2."".$row->skill3; ?></small></h4>
                                     <?php }?>                                <?php }?>
                                       <div class='row-fluid'>
    <div class='span12 box box-transparent'>
        <div class='row-fluid'>
 <div class='span6 box-quick-link red-background'>
                <a href='<?php echo site_url().'/upload_skck'; ?>'>
                    <div class='header'>
                        <div class='icon-flag'></div>
                    </div>
                    <div class='content'><b>SKCK (POLDA)</b></div>
                     <div class='content'><b>0 DOKUMEN</b></div> 
                </a>
            </div>

        </div>
    </div>
</div>
<?php   
                                  if($hitungskck==0){
                                ?>
<div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> Silahkan menambahkan data pada tombol ini... 

                        <a class='btn btn-info btn-large' data-toggle='modal' href='#tambah' role='button'>Tambah Data</a>
                        </div>
                                 <?php
                                }else{ ?>

                                <div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> silahkan mengubah data pada tombol ini... 
                        <a class='btn btn-info btn-large' data-toggle='modal' href='#ubah' role='button'>Ubah Data</a>
                        </div>
                                 <?php foreach ($tampil_data_skck as $pilihan) { ?>

                                  
                
                               

                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td class="span3"> Tanggal Pengajuan :</td>
                                                <td> <?php echo $pilihan->pengajuan; 

                                                        $hasil= $pilihan->statuspengajuan;
                                                        if($hasil=='A'){
                                                            echo " A(Actual)";

                                                        }else{
                                                             echo " C(Calculation)";
                                                        }?> </td>
                                            </tr>
                                           

                                              <tr>
                                                <td class="span3"> Tanggal Terima :</td>
                                                <td> <?php echo $pilihan->terima; 
                                                
                                                        $hasil2= $pilihan->statusterima;
                                                        if($hasil2=='A'){
                                                            echo " A(Actual)";

                                                        }else{
                                                             echo " C(Calculation)";
                                                        }?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> Tanggal Expired :</td>
                                                <td> <?php echo $pilihan->tglexp; 
                                                
                                                        $hasil2= $pilihan->statusexp;
                                                        if($hasil2=='A'){
                                                            echo " A(Actual)";

                                                        }else{
                                                             echo " C(Calculation)";
                                                        }?> </td>
                                            </tr>
                                           

                                           

                                             <tr>
                                                <td class="span2"></td>
                                                <td> </td>
                                            </tr>
                                        </tbody>
                                    </table>


                            
                                   
                                     <?php }

                                 } ?>

                                </div>

                                <div class="space5"></div>

                            </div>
        </div>

                </div>

<div class='modal hide fade' id='tambah' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Tambah SKCK</h3>
                </div>
                <div class='modal-body'>
  <form action="<?php echo site_url('detailskck/tambahskck');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />


                                                            <div class="control-group">
                                                                <label class="control-label">Tanggal Pengajuan </label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglpengajuan"  placeholder='Select datepicker' type='text' />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                    <label class='radio '>
                                                                            <input type='radio' name="pengajuana" value='A' />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="pengajuana" value='C' checked />
                                                                            Calculation
                                                                        </label>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Tanggal Terima </label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglterima"  placeholder='Select datepicker' type='text' />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                    <label class='radio '>
                                                                            <input type='radio' name="terimaa" value='A' />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="terimaa" value='C' checked />
                                                                            Calculation
                                                                        </label>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Tanggal Expired </label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglexpired"  placeholder='Select datepicker' type='text' />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                    <label class='radio '>
                                                                            <input type='radio' name="expireda" value='A' />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="expireda" value='C' checked />
                                                                            Calculation
                                                                        </label>
                                                                </div>
                                                            </div>
<!-- 
                                                            <div class="form-actions">
                                    <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                    <a type="button" class="btn" href="<?php echo base_url()."index.php/detailterbang/"?>"><i class=" icon-remove"></i> Kembali </a>
                                </div>
                                            -->    

                                                        
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                </form>
            </div>

<div class='modal hide fade' id='ubah' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Form in modal</h3>
                </div>
                <div class='modal-body'>
  <form action="<?php echo site_url('detailskck/ubahskck');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                 <?php foreach ($tampil_data_skck as $row) { ?>

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />

<div class="control-group">
                                                                <label class="control-label">Tanggal Pengajuan </label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglpengajuan"  placeholder='Select datepicker' type='text' value="<?php echo $row->pengajuan;?>" />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                   <?php $tglb= $row->statuspengajuan;
                                                        if($tglb=='A'){
                                                            ?>
                                                                            <label class='radio '>
                                                                            <input type='radio' name="pengajuana" value='A' checked />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="pengajuana" value='C'  />
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }else{
                                                            ?>
                                                            <label class='radio '>
                                                                            <input type='radio' name="pengajuana" value='A'  />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="pengajuana" value='C'  checked/>
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }?>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Tanggal Terima </label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglterima"  placeholder='Select datepicker' type='text' value="<?php echo $row->terima;?>" />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                  <?php $tglc= $row->statusterima;
                                                        if($tglc=='A'){
                                                            ?>
                                                                            <label class='radio '>
                                                                            <input type='radio' name="terimaa" value='A' checked />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="terimaa" value='C'  />
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }else{
                                                            ?>
                                                            <label class='radio '>
                                                                            <input type='radio' name="terimaa" value='A'  />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="terimaa" value='C'  checked/>
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }?>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Tanggal Expired </label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglexpired"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglexp;?>" />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                    <?php $tgld= $row->statusexp;
                                                        if($tgld=='A'){
                                                            ?>
                                                                            <label class='radio '>
                                                                            <input type='radio' name="expireda" value='A' checked />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="expireda" value='C'  />
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }else{
                                                            ?>
                                                            <label class='radio '>
                                                                            <input type='radio' name="expireda" value='A'  />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="expireda" value='C'  checked/>
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }?>
                                                                </div>
                                                            </div>

                                                  <?php } ?>            
<!-- 

                                                            <div class="form-actions">
                                    <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                    <a type="button" class="btn" href="<?php echo base_url()."index.php/detailterbangpermit/"?>"><i class=" icon-remove"></i> Kembali </a>
                                </div> -->
                                                            
                                                       
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                 </form>
            </div>