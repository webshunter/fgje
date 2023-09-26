<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Detail Personal </span>
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
                    <li class='active'>Detail Personal <?php echo $tanggaltiba;?> </li>
                </ul>
            </div>
        </div>
    </div>
</div>  


	                       

<div class="row-fluid">

                    <div class="row-fluid">


            <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Detail Visa</div>
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

                                     <div class="control-group">
                                                            <label class="control-label span4"> Tanggal TERIMA LEG </label>
                                                            <div class="controls">
                                                                <input type="text" name="novisa" value="<?php echo $tanggaltiba;?>" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap"  />
                                                            </div>
                                                            </div>

<?php   
                                   
                                  if($hitungvisa==0){
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
                                 <?php foreach ($tampil_data_visa as $row) { ?>

                                  
                        

                               

                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td class="span3"> No Visa :</td>
                                                <td> <?php echo $row->novisa;?> </td>
                                            </tr>
                                             <tr>
                                                <td class="span3"> Tanggal Berlaku :</td>
                                                <td> <?php echo $row->tglberlaku." - ".$row->expired ?> </td>
                                            </tr>
                                             
                                            <tr>
                                                <td class="span2"> 抽獎 KOCOKAN :</td>
                                                <td> <?php echo $row->kocokan; 
                                                
                                                        $hasil1= $row->statuskocokan;
                                                        if($hasil1=='A'){
                                                            echo " (Actual)";

                                                        }else{
                                                             echo " (Calculation)";
                                                        }?> </td>
                                            </tr>
                                           
                                           <tr>
                                                <td class="span2"> 指纹 FINGER PRINT :</td>
                                                <td> <?php echo $row->finger; 
                                                
                                                        $hasil2= $row->statusfinger;
                                                        if($hasil2=='A'){
                                                            echo " (Actual)";

                                                        }else{
                                                             echo " (Calculation)";
                                                        }?> </td>
                                            </tr>
                                           
                                           <tr>
                                                <td class="span2"> 領 TERIMA :</td>
                                                <td> <?php echo $row->terima; 
                                                
                                                        $hasil3= $row->statusterima;
                                                        if($hasil3=='A'){
                                                            echo " (Actual)";

                                                        }else{
                                                             echo " (Calculation)";
                                                        }?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> No PAP :</td>
                                                <td> <?php echo $row->nopap;?> </td>
                                            </tr>
                                           <tr>
                                                <td class="span2"> 受訓-PAP & 外勞卡 KTKLN
 :</td>
                                                <td> <?php echo $row->pap; 
                                                
                                                        $hasil3= $row->statuspap;
                                                        if($hasil3=='A'){
                                                            echo " (Actual)";

                                                        }else{
                                                             echo " (Calculation)";
                                                        }?> </td>
                                            </tr>

                                            <tr>
                                                <td class="span2"> PERKIRAAN TERBANG SESUAI KESIAPAN DOKUMEN 文件完整入境日期
 :</td>
                                                <td> <?php echo $row->ktkln; 
                                                
                                                        $hasil3= $row->statuspap;
                                                        if($hasil3=='A'){
                                                            echo " (Actual)";

                                                        }else{
                                                             echo " (Calculation)";
                                                        }?> </td>
                                            </tr>
                                           
<!--
                                            <tr>
                                                <td class="span3"> Tanggal Tiba di Taiwan :</td>
                                                <td> <?php echo $row->tanggalterbang; 

                                                        $hasil= $row->statustgl;
                                                        if($hasil=='A'){
                                                            echo " (Actual)";

                                                        }else{
                                                             echo " (Calculation)";
                                                        }?> </td>
                                            </tr>
                                            
 <tr>
                                                <td class="span3"> Jadwal Penerbangan :</td>
                                                <td> <?php echo $row->detailberangkat1;echo " : ".$row->jamtiba;?></td>
                                            </tr>

                                            <tr>
                                                <td class="span3"> Jadwal Penerbangan Lanjutan:</td>
                                                <td> <?php 

                                                if($row->detailberangkat2==""){

                                                }else{
                                                    echo $row->detailberangkat2;echo " : ".$row->jamtiba;
                                                }?>
                                                </td>
                                            </tr>


                                              <tr>
                                                <td class="span3"> Tiket:</td>
                                                <td> <?php 
                                                 $hasil3= $row->tiket;
                                                        if($hasil3=='wl'){
                                                            echo " (候補 - Waiting List)";
                                                        }
                                                        if($hasil3=='issued'){
                                                            echo " (開票 - ISSUED)";
                                                        }
                                                        if($hasil3=='ok'){
                                                            echo " (可以 - OK)";
                                                        }
                                                        ?> </td>
                                            </tr>

                                              <tr>
                                                <td class="span3"> Tanggal Terbang :</td>
                                                <td> <?php echo $row->tglberangkat; 
                                                
                                                        $hasil2= $row->statusterbang;
                                                        if($hasil2=='A'){
                                                            echo " A(Actual)";

                                                        }else{
                                                             echo " C(Calculation)";
                                                        }?> </td>
                                            </tr>

                                             <tr>
                                                <td class="span3"> Airport Saat Kembali :</td>
                                                <td> <?php echo $row->airport;?> </td>
                                            </tr>-->
                                            <tr>
    <td class="span3" colspan='2'> <div class="alert alert-info"><button data-dismiss="alert" class="close"> x </button> Data DOKUMEN DIBAWA TKI</div> </td>
                                            <tr>
                                                <td class="span3"> Apendik A :</td>
                                                <td> <?php echo $row->apendik_a;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> Apendik B :</td>
                                                <td> <?php echo $row->apendik_b;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> Apendik C :</td>
                                                <td> <?php echo $row->apendik_c;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> Apendik D :</td>
                                                <td> <?php echo $row->apendik_d;?> </td>
                                            </tr>
                                            </tr>

                                             <tr>
                                                <td class="span3" colspan='2'> 
                                                    <div class="alert alert-info">
                                                        <button data-dismiss="alert" class="close"> x </button> Data SUhan</div> 
                                                    </td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> Status Dokumen :</td>
                                                <td> <?php echo $row->statsuhandok;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> 正本? :</td>
                                                <td> <?php echo $row->tempatsuhandok;?> </td>
                                            </tr>

                                              <tr>
                                                <td class="span3"> KETERANGAN 備註 SUHAN :</td>
                                                <td> <?php echo $row->ketdoksuhan;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3" colspan='2'> 
                                                    <div class="alert alert-info">
                                                        <button data-dismiss="alert" class="close"> x </button> Data Visa Permit</div> 
                                                    </td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> Status Dokumen :</td>
                                                <td> <?php echo $row->statvpdok;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3">  正本?  :</td>
                                                <td> <?php echo $row->tempatvpdok;?> </td>
                                            </tr>

                                              <tr>
                                                <td class="span3"> KETERANGAN 備註 VISAPERMIT :</td>
                                                <td> <?php echo $row->ketdokvp;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3" colspan='2'> 
                                                    <div class="alert alert-info">
                                                        <button data-dismiss="alert" class="close"> x </button> Data Titipan</div> 
                                                    </td>
                                            </tr>
                                            <tr>
                                                <td class="span3">ID:</td>
                                                <td> <?php echo $row->id_biodata_titipan;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3">NAMA:</td>
                                                <td> <?php echo $row->nama_titipan;?> </td>
                                            </tr>

                                            <tr>
                                                <td class="span3"> TANGGAL TERBANG TITIPAN:</td>
                                                <td> <?php echo $row->tgl_terbang_titipan;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3">NO.SUHAN TITIPAN:</td>
                                                <td> <?php echo $row->no_suhan_titipan;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3">NO VISAPERMIT TITIPAN:</td>
                                                <td> <?php echo $row->no_vp_titipan;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3" colspan='2'> 
                                                    <div class="alert alert-info">
                                                        <button data-dismiss="alert" class="close"> x </button> Data Suhan diTitipkan</div> 
                                                    </td>
                                            </tr>
                                            <tr>
                                                <td class="span3">ID:</td>
                                                <td> <?php echo $row->id_biodata_dititipkan;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3">NAMA:</td>
                                                <td> <?php echo $row->nama_dititipkan;?> </td>
                                            </tr>

                                            <tr>
                                                <td class="span3">TANGGAL TERBANG DITITIPKAN:</td>
                                                <td> <?php echo $row->tgl_terbang_dititipkan;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3">NO.SUHAN DITITIPKAN:</td>
                                                <td> <?php echo $row->no_suhan_dititipkan;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3" colspan='2'> 
                                                    <div class="alert alert-info">
                                                        <button data-dismiss="alert" class="close"> x </button> Data Visa Permit diTitipkan</div> 
                                                    </td>
                                            </tr>
                                            <tr>
                                                <td class="span3">ID:</td>
                                                <td> <?php echo $row->id_biodata_dititipkan2;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3">NAMA:</td>
                                                <td> <?php echo $row->nama_dititipkan2;?> </td>
                                            </tr>

                                            <tr>
                                                <td class="span3"> TANGGAL TERBANG DITITIPKAN:</td>
                                                <td> <?php echo $row->tgl_terbang_dititipkan2;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3">NO VISAPERMIT DITITIPKAN:</td>
                                                <td> <?php echo $row->no_vp_dititipkan;?> </td>
                                            </tr>
                                             <tr>
                                                <td class="span3" colspan='2'> 
                                                    <div class="alert alert-info">
                                                        <button data-dismiss="alert" class="close"> x </button> Data Detail Dokumen</div> 
                                                    </td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> 聘工表/Job description :</td>
                                                <td> <?php echo $row->jddok;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> ARC TKI :</td>
                                                <td> <?php echo $row->arcdok;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> 外勞保險卡Insurance Card-TKI :</td>
                                                <td> <?php echo $row->icdok;?> </td>
                                            </tr>

                                            <?php } ?>

                                            <?php foreach ($tampil_data_signing as $row) { ?>

                                            <tr>
                                                <td class="span3"><?php echo $row->mandarinnya;?></td>
                                                <!-- <td> <?php echo $row->mandarinnya;?> </td> -->
                                            </tr> 
                                            <tr>
                                                <td class="span3"><?php echo $row->mandarinnya2;?></td>
                                                <!-- <td> <?php echo $row->mandarinnya2;?> </td> -->
                                            </tr> 
                                            <?php } ?>

                                            <?php foreach ($tampil_data_visa as $row) { ?>

                                            <!-- <tr>
                                                <td class="span3"><?php echo $row->isidok1;?></td>
                                                <td> <?php echo $row->statdok1;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3"><?php echo $row->isidok2;?></td>
                                                <td> <?php echo $row->statdok2;?> </td>
                                            </tr> -->
                                            <tr>
                                                <td class="span3"><?php echo $row->isidok3;?></td>
                                                <td> <?php echo $row->statdok3;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3"><?php echo $row->isidok4;?></td>
                                                <td> <?php echo $row->statdok4;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3"><?php echo $row->isidok5;?></td>
                                                <td> <?php echo $row->statdok5;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3"><?php echo $row->isidok6;?></td>
                                                <td> <?php echo $row->statdok6;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3"><?php echo $row->isidok7;?></td>
                                                <td> <?php echo $row->statdok7;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3"><?php echo $row->isidok8;?></td>
                                                <td> <?php echo $row->statdok8;?> </td>
                                            </tr>


                                            <tr>
                                                <td class="span3"> KETERANGAN 備註 :</td>
                                                <td> <?php echo $row->ketdok;?> </td>
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

         <div class='span3 box box-transparent'>
                <br>
                 <br>
                  <br>
                      <h4>PRINT DOKUMEN </h4>
            <div class='row-fluid'>
            <div class=' box-quick-link blue-background'>
                  <a target='_blank' href='<?php echo site_url().'/pdf7/cetakdokdibawa/'.$detailpersonalid; ?>'>
                    <div class='header'>
                        <div class='icon-book'></div>
                    </div>
                    <div class='content'>DOKUMEN DIBAWA TKI</div>
                </a>
            </div>
            <br>
            <div class=' box-quick-link blue-background'>
                  <a target='_blank' href='<?php echo site_url().'/apendik/document_send_taiwan/'.$detailpersonalid; ?>'>
                    <div class='header'>
                        <div class='icon-book'></div>
                    </div>
                    <div class='content'>DOKUMEN DIBAWA TKI NEW</div>
                </a>
            </div>
            <br>
            <div class=' box-quick-link blue-background'>
                  <a target='_blank' href='<?php echo site_url().'/apendik/document_sebelum_terbang/'.$detailpersonalid; ?>'>
                    <div class='header'>
                        <div class='icon-book'></div>
                    </div>
                    <div class='content'>DOKUMEN SEBELUM TKI TERBANG</div>
                </a>
            </div>
            <br>
        </div>
        </div>
    </div>
</div>
                </div>

<div class='modal hide fade' id='tambah' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Tambah Visa</h3>
                </div>
                <div class='modal-body'>
  <form action="<?php echo site_url('detailvisa/tambahvisa');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />

                                                            <div class="control-group">
                                                            <label class="control-label span4"> No Visa </label>
                                                            <div class="controls">
                                                                <input type="text" name="novisa" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap"  />
                                                            </div>
                                                            </div>

                                                              <div class="control-group">
                                                                <label class="control-label">Tanggal Berlaku Dari</label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglberlaku"  placeholder='Select datepicker' type='text' />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                </div>
                                                            </div>
                                                            
                                                           <div class="control-group">
                                                                <label class="control-label"> 抽獎 Kocokan</label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglkocokan"  placeholder='Select datepicker' type='text' />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                    <label class='radio '>
                                                                            <input type='radio' name="kocokana" value='A' />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="kocokana" value='C' checked />
                                                                            Calculation
                                                                        </label>
                                                                </div>
                                                            </div>

                                                             <div class="control-group">
                                                                <label class="control-label"> 指纹 FINGER PRINT</label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglfinger"  placeholder='Select datepicker' type='text' />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                    <label class='radio '>
                                                                            <input type='radio' name="fingera" value='A' />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="fingera" value='C' checked />
                                                                            Calculation
                                                                        </label>
                                                                </div>
                                                            </div>

                                                             <div class="control-group">
                                                                <label class="control-label"> 領 TERIMA</label>
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
                                                            <label class="control-label span4"> Nomor PAP </label>
                                                            <div class="controls">
                                                                <input type="text" name="nopap" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap"  />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> 受訓-PAP & 外勞卡 KTKLN</label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglpap"  placeholder='Select datepicker' type='text' />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                    <label class='radio '>
                                                                            <input type='radio' name="papa" value='A' />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="papa" value='C' checked />
                                                                            Calculation
                                                                        </label>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> PERKIRAAN TERBANG SESUAI KESIAPAN DOKUMEN 文件完整入境日期</label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglktkln"  placeholder='Select datepicker' type='text' />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                    <label class='radio '>
                                                                            <input type='radio' name="ktklna" value='A' />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="ktklna" value='C' checked />
                                                                            Calculation
                                                                        </label>
                                                                </div>
                                                            </div>
<!--
                                                             <div class="control-group">
                                                                <label class="control-label">Tanggal Tiba di Taiwan </label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd' name="tanggalterbang"  placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
                                                                        <label class='radio '>
                                                                            <input type='radio' name="tanggalterbanga" value='A' />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="tanggalterbanga" value='C' checked />
                                                                            Calculation
                                                                        </label>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Pilih Penerbangan</label>
                                                                <div class="controls">
                                                                    <select class="span12 " name="id_terbang" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                        <?php  foreach ($tampil_dataterbang as $pilihan) { ?>
                                                                            <option value="<?php echo $pilihan->id_terbang;?>" /><?php echo $pilihan->detailberangkat1;echo " : ".$pilihan->detailberangkat2;echo " : ".$pilihan->jamtiba;?>

                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                        
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> Tiket </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="tiket" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="wl" />候補 - WL
                                                                            <option value="issued" />開票-ISSUED
                                                                            <option value="ok" />可以 - OK
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Tanggal Terbang </label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglberangkat"  placeholder='Select datepicker' type='text' />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                    <label class='radio '>
                                                                            <input type='radio' name="berangkata" value='A' />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="berangkata" value='C' checked />
                                                                            Calculation
                                                                        </label>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Airport Saat Kembali</label>
                                                                <div class="controls">
                                                                    <select class="span12 " name="airport" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                        <?php  foreach ($tampil_data_dataairport as $pilihan) { ?>
                                                                            <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>

                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                        
                                                                </div>
                                                            </div>-->

                 <div class="alert alert-info"><button data-dismiss="alert" class="close"> x </button> Inputan Data DOKUMEN DIBAWA TKI</div>


                             <div class="alert alert-info"><button data-dismiss="alert" class="close"> x </button> Data Suhan</div>

                                        <div class="control-group">
                                            <label class="control-label">Status Dokumen</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="statsuhandok"  >
                                                    <option value="" />
                                                    <option value="正本-ORIGINAL" />正本-ORIGINAL
                                                    <option value="影本-COPY" />影本-COPY
                                                    <option value="沒有-TIDAK ADA" />沒有-TIDAK ADA
                                                </select>
                                            </div>
                                        </div>

                                         <div class="control-group">
                                            <label class="control-label"> 正本? </label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="tempatsuhandok"  >
                                                     <option value="" />
                                                    <option value="放印尼 DI INDONESIA" />放印尼 DI INDONESIA
                                                    <option value="寄臺灣KE TAIWAN" />寄臺灣KE TAIWAN
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                                            <label class="control-label span4"> KETERANGAN 備註  </label>
                                                            <div class="controls">
                                                                <input type="text" name="ketdoksuhan" class="span12 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap"  />
                                                            </div>
                                                            </div>

                             <div class="alert alert-info"><button data-dismiss="alert" class="close"> x </button> Data Visapermit</div>

                             <div class="control-group">
                                            <label class="control-label">Status Dokumen</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="statvpdok"  >
                                                     <option value="" />
                                                    <option value="正本-ORIGINAL" />正本-ORIGINAL
                                                    <option value="影本-COPY" />影本-COPY
                                                    <option value="沒有-TIDAK ADA" />沒有-TIDAK ADA
                                                </select>
                                            </div>
                                        </div>

                                         <div class="control-group">
                                            <label class="control-label"> 正本? </label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="tempatvpdok"  >
                                                     <option value="" />
                                                    <option value="放印尼 DI INDONESIA" />放印尼 DI INDONESIA
                                                    <option value="寄臺灣KE TAIWAN" />寄臺灣KE TAIWAN
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                                            <label class="control-label span4"> KETERANGAN 備註  </label>
                                                            <div class="controls">
                                                                <input type="text" name="ketdokvp" class="span12 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap"  />
                                                            </div>
                                                            </div>

                        <div class="alert alert-info"><button data-dismiss="alert" class="close"> x </button> Detail Dokumen</div>

                        <div class="control-group">
                                            <label class="control-label">聘工表/Job description</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="jddok"  >
                                                     <option value="" />
                                                    <option value="正本-ORIGINAL" />正本-ORIGINAL
                                                    <option value="影本-COPY" />影本-COPY
                                                    <option value="沒有-TIDAK ADA" />沒有-TIDAK ADA
                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">ARC TKI</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="arcdok"  >
                                                     <option value="" />
                                                    <option value="正本-ORIGINAL" />正本-ORIGINAL
                                                    <option value="影本-COPY" />影本-COPY
                                                    <option value="沒有-TIDAK ADA" />沒有-TIDAK ADA
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">外勞保險卡Insurance Card-TKI</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="icdok"  >
                                                     <option value="" />
                                                    <option value="正本-ORIGINAL" />正本-ORIGINAL
                                                    <option value="影本-COPY" />影本-COPY
                                                    <option value="沒有-TIDAK ADA" />沒有-TIDAK ADA
                                                </select>
                                            </div>
                                        </div>

                                        <div class="alert alert-info"><button data-dismiss="alert" class="close"> x </button> Dokumen Lainnya</div>

                                       <!-- <div class="control-group">
                                            <label class="control-label">Dokumen Lain</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="isidok1"  >
                                                     <option value="" />Select...
                                                                        <?php  foreach ($tampil_data_pildok as $pilihan) { ?>
                                                                            <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>

                                                                         <?php
                                                                     } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Status Dokumen</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="statdok1"  >
                                                     <option value="" />
                                                    <option value="正本-ORIGINAL" />正本-ORIGINAL
                                                    <option value="影本-COPY" />影本-COPY
                                                    <option value="沒有-TIDAK ADA" />沒有-TIDAK ADA
                                                </select>
                                            </div>
                                        </div>

                                        <div class="alert alert-info"><button data-dismiss="alert" class="close"> x </button> Dokumen Lainnya</div>

                                        <div class="control-group">
                                            <label class="control-label">Dokumen Lain</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="isidok2"  >
                                                     <option value="" />Select...
                                                                        <?php  foreach ($tampil_data_pildok as $pilihan) { ?>
                                                                            <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>

                                                                         <?php
                                                                     } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Status Dokumen</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="statdok2"  >
                                                     <option value="" />
                                                    <option value="正本-ORIGINAL" />正本-ORIGINAL
                                                    <option value="影本-COPY" />影本-COPY
                                                    <option value="沒有-TIDAK ADA" />沒有-TIDAK ADA
                                                </select>
                                            </div>
                                        </div> -->

                                        <div class="alert alert-info"><button data-dismiss="alert" class="close"> x </button> Dokumen Lainnya</div>

                                        <div class="control-group">
                                            <label class="control-label">Dokumen Lain</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="isidok3"  >
                                                     <option value="" />Select...
                                                                        <?php  foreach ($tampil_data_pildok as $pilihan) { ?>
                                                                            <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>

                                                                         <?php
                                                                     } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Status Dokumen</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="statdok3"  >
                                                     <option value="" />
                                                    <option value="正本-ORIGINAL" />正本-ORIGINAL
                                                    <option value="影本-COPY" />影本-COPY
                                                    <option value="沒有-TIDAK ADA" />沒有-TIDAK ADA
                                                </select>
                                            </div>
                                        </div>

                                        <div class="alert alert-info"><button data-dismiss="alert" class="close"> x </button> Dokumen Lainnya</div>

                                        <div class="control-group">
                                            <label class="control-label">Dokumen Lain</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="isidok4"  >
                                                     <option value="" />Select...
                                                                        <?php  foreach ($tampil_data_pildok as $pilihan) { ?>
                                                                            <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>

                                                                         <?php
                                                                     } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Status Dokumen</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="statdok4"  >
                                                     <option value="" />
                                                    <option value="正本-ORIGINAL" />正本-ORIGINAL
                                                    <option value="影本-COPY" />影本-COPY
                                                    <option value="沒有-TIDAK ADA" />沒有-TIDAK ADA
                                                </select>
                                            </div>
                                        </div>

                                        <div class="alert alert-info"><button data-dismiss="alert" class="close"> x </button> Dokumen Lainnya</div>

                                        <div class="control-group">
                                            <label class="control-label">Dokumen Lain</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="isidok5"  >
                                                     <option value="" />Select...
                                                                        <?php  foreach ($tampil_data_pildok as $pilihan) { ?>
                                                                            <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>

                                                                         <?php
                                                                     } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Status Dokumen</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="statdok5"  >
                                                     <option value="" />
                                                    <option value="正本-ORIGINAL" />正本-ORIGINAL
                                                    <option value="影本-COPY" />影本-COPY
                                                    <option value="沒有-TIDAK ADA" />沒有-TIDAK ADA
                                                </select>
                                            </div>
                                        </div>

                                        <div class="alert alert-info"><button data-dismiss="alert" class="close"> x </button> Dokumen Lainnya</div>

                                        <div class="control-group">
                                            <label class="control-label">Dokumen Lain</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="isidok6"  >
                                                     <option value="" />Select...
                                                                        <?php  foreach ($tampil_data_pildok as $pilihan) { ?>
                                                                            <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>

                                                                         <?php
                                                                     } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Status Dokumen</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="statdok6"  >
                                                     <option value="" />
                                                    <option value="正本-ORIGINAL" />正本-ORIGINAL
                                                    <option value="影本-COPY" />影本-COPY
                                                    <option value="沒有-TIDAK ADA" />沒有-TIDAK ADA
                                                </select>
                                            </div>
                                        </div>

                                        <div class="alert alert-info"><button data-dismiss="alert" class="close"> x </button> Dokumen Lainnya</div>

                                        <div class="control-group">
                                            <label class="control-label">Dokumen Lain</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="isidok7"  >
                                                     <option value="" />Select...
                                                                        <?php  foreach ($tampil_data_pildok as $pilihan) { ?>
                                                                            <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>

                                                                         <?php
                                                                     } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Status Dokumen</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="statdok7"  >
                                                     <option value="" />
                                                    <option value="正本-ORIGINAL" />正本-ORIGINAL
                                                    <option value="影本-COPY" />影本-COPY
                                                    <option value="沒有-TIDAK ADA" />沒有-TIDAK ADA
                                                </select>
                                            </div>
                                        </div>

                                        <div class="alert alert-info"><button data-dismiss="alert" class="close"> x </button> Dokumen Lainnya</div>

                                        <div class="control-group">
                                            <label class="control-label">Dokumen Lain</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="isidok8"  >
                                                     <option value="" />Select...
                                                                        <?php  foreach ($tampil_data_pildok as $pilihan) { ?>
                                                                            <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>

                                                                         <?php
                                                                     } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Status Dokumen</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="statdok8"  >
                                                     <option value="" />
                                                    <option value="正本-ORIGINAL" />正本-ORIGINAL
                                                    <option value="影本-COPY" />影本-COPY
                                                    <option value="沒有-TIDAK ADA" />沒有-TIDAK ADA
                                                </select>
                                            </div>
                                        </div>



                                          <div class="control-group">
                                                            <label class="control-label span4"> KETERANGAN 備註  </label>
                                                            <div class="controls">
                                                                <input type="text" name="ketdok" class="span12 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap"  />
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
                    <h3>Ubah Visa</h3>
                </div>
                <div class='modal-body'>
  <form action="<?php echo site_url('detailvisa/ubahvisa');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                 <?php foreach ($tampil_data_visa as $row) { ?>

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />

                                                            <div class="control-group">
                                                            <label class="control-label span4"> No Visa </label>
                                                            <div class="controls">
                                                                <input type="text" name="novisa" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" value="<?php echo $row->novisa;?>"/>
                                                            </div>
                                                            </div>

                                                              <div class="control-group">
                                                                <label class="control-label">Tanggal Berlaku Dari</label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglberlaku"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglberlaku;?>"/>
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                </div>
                                                            </div>

                                                            
                                                           <div class="control-group">
                                                                <label class="control-label"> 抽獎 Kocokan</label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglkocokan"  placeholder='Select datepicker' type='text' value="<?php echo $row->kocokan;?>"/>
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                    <?php $tgla= $row->statuskocokan;
                                                        if($tgla=='A'){
                                                            ?>
                                                                            <label class='radio '>
                                                                            <input type='radio' name="kocokana" value='A' checked />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="kocokana" value='C'  />
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }else{
                                                            ?>
                                                            <label class='radio '>
                                                                            <input type='radio' name="kocokana" value='A'  />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="kocokana" value='C'  checked/>
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }?>
                                                                </div>
                                                            </div>

                                                             <div class="control-group">
                                                                <label class="control-label"> 指纹 FINGER PRINT</label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglfinger"  placeholder='Select datepicker' type='text' value="<?php echo $row->finger;?>"/>
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                    <?php $tglb= $row->statusfinger;
                                                        if($tglb=='A'){
                                                            ?>
                                                                            <label class='radio '>
                                                                            <input type='radio' name="fingera" value='A' checked />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="fingera" value='C'  />
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }else{
                                                            ?>
                                                            <label class='radio '>
                                                                            <input type='radio' name="fingera" value='A'  />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="fingera" value='C'  checked/>
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }?>
                                                                </div>
                                                            </div>

                                                             <div class="control-group">
                                                                <label class="control-label"> 領 TERIMA</label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglterima"  placeholder='Select datepicker' type='text' value="<?php echo $row->terima;?>"/>
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
                                                            <label class="control-label span4"> Nomor PAP </label>
                                                            <div class="controls">
                                                                <input type="text" name="nopap" class="span7 popovers"  value="<?php echo $row->nopap;?>" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap"  />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> 受訓-PAP & 外勞卡 KTKLN</label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglpap"  placeholder='Select datepicker' type='text' value="<?php echo $row->pap;?>"/>
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                     <?php $tgld= $row->statuspap;
                                                        if($tgld=='A'){
                                                            ?>
                                                                            <label class='radio '>
                                                                            <input type='radio' name="papa" value='A' checked />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="papa" value='C'  />
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }else{
                                                            ?>
                                                            <label class='radio '>
                                                                            <input type='radio' name="papa" value='A'  />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="papa" value='C'  checked/>
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }?>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> PERKIRAAN TERBANG SESUAI KESIAPAN DOKUMEN 文件完整入境日期</label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglktkln"  placeholder='Select datepicker' type='text' value="<?php echo $row->ktkln;?>"/>
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                   <?php $tgle= $row->statusktkln;
                                                        if($tgle=='A'){
                                                            ?>
                                                                            <label class='radio '>
                                                                            <input type='radio' name="ktklna" value='A' checked />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="ktklna" value='C'  />
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }else{
                                                            ?>
                                                            <label class='radio '>
                                                                            <input type='radio' name="ktklna" value='A'  />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="ktklna" value='C'  checked/>
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }?>
                                                                </div>
      <!--                                                      </div>
  <div class="control-group">
                                                                <label class="control-label">Tanggal Tiba di Taiwan</label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd' value="<?php echo $row->tanggalterbang;?>" name="tanggalterbang"  placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
                                                <?php $tglb= $row->statustgl;
                                                        if($tglb=='A'){
                                                            ?>
                                                                            <label class='radio '>
                                                                            <input type='radio' name="tanggalterbanga" value='A' checked />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="tanggalterbanga" value='C'  />
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }else{
                                                            ?>
                                                            <label class='radio '>
                                                                            <input type='radio' name="tanggalterbanga" value='A'  />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="tanggalterbanga" value='C'  checked/>
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }?>

                                                                 
                                                                </div> 
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Pilih Penerbangan</label>
                                                                <div class="controls">
                                                                    <select class="span12 " name="id_terbang" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="<?php echo $row->id_terbang;?>" /><?php echo $row->detailberangkat1;echo " : ".$row->detailberangkat2;echo " : ".$row->jamtiba;?>
                                                                       <?php  foreach ($tampil_dataterbang as $pilihan) { ?>
                                                                            <option value="<?php echo $pilihan->id_terbang;?>" /><?php echo $pilihan->detailberangkat1;echo " : ".$pilihan->detailberangkat2;echo " : ".$pilihan->jamtiba;?>

                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div> 

                                                     <div class="control-group">
                                                                <label class="control-label"> Tiket </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="tiket" data-placeholder="Choose a Category" tabindex="1">
                                                                              <?php $datavalue = array('pilih', 'wl', 'issued', 'ok'); ?>
                                                                        <?php $datatiket = array('pilih', '候補 - Waiting List', '開票 - ISSUED', '可以 - OK'); ?>
                                                                        <?php for($i=0; $i<count($datatiket); $i++) : ?>
                                                                            <?php if($datavalue[$i] == $row->tiket) : ?>
                                                                                    <option selected="selected" value="<?= $datavalue[$i]; ?>"><?= $datatiket[$i]; ?></option>
                                                                                <?php else : ?>
                                                                                    <option value="<?= $datavalue[$i]; ?>"><?= $datatiket[$i]; ?></option>
                                                                            <?php endif; ?>
                                                                        <?php endfor; ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Tanggal Terbang </label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglberangkat"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglberangkat;?>" />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                    <?php $tgla= $row->statusterbang;
                                                        if($tgla=='A'){
                                                            ?>
                                                                            <label class='radio '>
                                                                            <input type='radio' name="berangkata" value='A' checked />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="berangkata" value='C'  />
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }else{
                                                            ?>
                                                            <label class='radio '>
                                                                            <input type='radio' name="berangkata" value='A'  />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="berangkata" value='C'  checked/>
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }?>

                                                                </div>
                                                            </div>

                                                              <div class="control-group">
                                                                <label class="control-label">Airport Saat Kembali</label>
                                                                <div class="controls">
                                                                    <select class="span12 " name="airport" data-placeholder="Choose a Category" tabindex="1">
                                                                         <option value="<?php echo $row->airport;?>" /><?php echo $row->airport;?>
                                                                        <?php  foreach ($tampil_data_dataairport as $pilihan2) { ?>
                                                                            <option value="<?php echo $pilihan2->isi;?>" /><?php echo $pilihan2->isi;?>

                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                        
                                                                </div>
                                                            </div>   -->

              <div class="alert alert-info"><button data-dismiss="alert" class="close"> x </button> Inputan DOKUMEN DIBAWA TKI</div>
                                        <div class="control-group">
                                            <label class="control-label">Apendik A</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="apendik_a"  >

                                                    <?php $data_apendik_a = array('','ada'); ?>
                                                    <?php $data_apendik_a_isi = array('Berkas Tidak Tersedia', 'Berkas ADA'); ?>
                                                    <?php for ($i=0; $i < count($data_apendik_a) ; $i++) : ?>
                                                        <?php if ( $data_apendik_a[$i] == $row->apendik_a) : ?>
                                                            <option selected="selected" value="<?= $data_apendik_a[$i] ?>"><?= $data_apendik_a_isi[$i] ?></option>
                                                            <?php else : ?>
                                                            <option value="<?= $data_apendik_a[$i] ?>"><?= $data_apendik_a_isi[$i] ?></option>
                                                        <?php endif; ?>
                                                    <?php endfor; ?>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Apendik B</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="apendik_b"  >

                                                    <?php $data_apendik_b = array('','ada'); ?>
                                                    <?php $data_apendik_b_isi = array('Berkas Tidak Tersedia', 'Berkas ADA'); ?>
                                                    <?php for ($i=0; $i < count($data_apendik_b) ; $i++) : ?>
                                                        <?php if ( $data_apendik_b[$i] == $row->apendik_b) : ?>
                                                            <option selected="selected" value="<?= $data_apendik_b[$i] ?>"><?= $data_apendik_b_isi[$i] ?></option>
                                                            <?php else : ?>
                                                            <option value="<?= $data_apendik_b[$i] ?>"><?= $data_apendik_b_isi[$i] ?></option>
                                                        <?php endif; ?>
                                                    <?php endfor; ?>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Apendik C</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="apendik_c"  >

                                                    <?php $data_apendik_c = array('','ada'); ?>
                                                    <?php $data_apendik_c_isi = array('Berkas Tidak Tersedia', 'Berkas ADA'); ?>
                                                    <?php for ($i=0; $i < count($data_apendik_c) ; $i++) : ?>
                                                        <?php if ( $data_apendik_c[$i] == $row->apendik_c) : ?>
                                                            <option selected="selected" value="<?= $data_apendik_c[$i] ?>"><?= $data_apendik_c_isi[$i] ?></option>
                                                            <?php else : ?>
                                                            <option value="<?= $data_apendik_c[$i] ?>"><?= $data_apendik_c_isi[$i] ?></option>
                                                        <?php endif; ?>
                                                    <?php endfor; ?>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Apendik D</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="apendik_d"  >

                                                    <?php $data_apendik_d = array('','ada'); ?>
                                                    <?php $data_apendik_d_isi = array('Berkas Tidak Tersedia', 'Berkas ADA'); ?>
                                                    <?php for ($i=0; $i < count($data_apendik_d) ; $i++) : ?>
                                                        <?php if ( $data_apendik_d[$i] == $row->apendik_d) : ?>
                                                            <option selected="selected" value="<?= $data_apendik_d[$i] ?>"><?= $data_apendik_d_isi[$i] ?></option>
                                                            <?php else : ?>
                                                            <option value="<?= $data_apendik_d[$i] ?>"><?= $data_apendik_d_isi[$i] ?></option>
                                                        <?php endif; ?>
                                                    <?php endfor; ?>

                                                </select>
                                            </div>
                                        </div>

                             <div class="alert alert-info"><button data-dismiss="alert" class="close"> x </button> Data Suhan</div>

                                        <div class="control-group">
                                            <label class="control-label">Status Dokumen</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="statsuhandok"  >
                                                    <option value="<?php echo $row->statsuhandok;?>" /><?php echo $row->statsuhandok;?>
                                                    <option value="正本-ORIGINAL" />正本-ORIGINAL
                                                    <option value="影本-COPY" />影本-COPY
                                                    <option value="沒有-TIDAK ADA" />沒有-TIDAK ADA
                                                </select>
                                            </div>
                                        </div>

                                         <div class="control-group">
                                            <label class="control-label"> 正本? </label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="tempatsuhandok"  >
                                                    <option value="<?php echo $row->tempatsuhandok;?>" /><?php echo $row->tempatsuhandok;?>
                                                    <option value="放印尼 DI INDONESIA" />放印尼 DI INDONESIA
                                                    <option value="寄臺灣KE TAIWAN" />寄臺灣KE TAIWAN
                                                </select>
                                            </div>
                                        </div>

                                            <div class="control-group">
                                                            <label class="control-label span4"> KETERANGAN 備註  </label>
                                                            <div class="controls">
                                                                <input type="text" name="ketdoksuhan" class="span12 popovers" value="<?php echo $row->ketdoksuhan;?>" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap"  />
                                                            </div>
                                                            </div>

                             <div class="alert alert-info"><button data-dismiss="alert" class="close"> x </button> Data Visapermit</div>

                             <div class="control-group">
                                            <label class="control-label">Status Dokumen</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="statvpdok"  >
                                                    <option value="<?php echo $row->statvpdok;?>" /><?php echo $row->statvpdok;?>
                                                    <option value="正本-ORIGINAL" />正本-ORIGINAL
                                                    <option value="影本-COPY" />影本-COPY
                                                    <option value="沒有-TIDAK ADA" />沒有-TIDAK ADA
                                                </select>
                                            </div>
                                        </div>

                                         <div class="control-group">
                                            <label class="control-label"> 正本? </label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="tempatvpdok"  >
                                                    <option value="<?php echo $row->tempatvpdok;?>" /><?php echo $row->tempatvpdok;?>
                                                    <option value="放印尼 DI INDONESIA" />放印尼 DI INDONESIA
                                                    <option value="寄臺灣KE TAIWAN" />寄臺灣KE TAIWAN
                                                    <option value="" />沒有-TIDAK ADA

                                                </select>
                                            </div>
                                        </div>

                                            <div class="control-group">
                                                            <label class="control-label span4"> KETERANGAN 備註  </label>
                                                            <div class="controls">
                                                                <input type="text" name="ketdokvp" class="span12 popovers" value="<?php echo $row->ketdokvp;?>" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap"  />
                                                            </div>
                                                            </div>
                                                            
                                            <div class="alert alert-info"><button data-dismiss="alert" class="close"> x </button> Data Titipan</div>
                                                        <div class="control-group">
                                                            <label class="control-label span4"> NAMA</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama_titipan" class="span12 popovers" value="<?php echo $row->nama_titipan;?>"  />
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label span4"> ID </label>
                                                            <div class="controls">
                                                                <input type="text" name="id_biodata_titipan" class="span12 popovers" value="<?php echo $row->id_biodata_titipan;?>"/>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label span4">NO SUHAN</label>
                                                            <div class="controls">
                                                                <input type="text" name="no_suhan_titipan" class="span12 popovers" value="<?php echo $row->no_suhan_titipan;?>"/>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label span4"> NO VISAPERMIT </label>
                                                            <div class="controls">
                                                                <input type="text" name="no_vp_titipan" class="span12 popovers" value="<?php echo $row->no_vp_titipan;?>" />
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label span4"> Tanggal Terbang di titipkan </label>
                                                            <div class="controls">
                                                            <div class='datepicker input-append' id='datepicker'>
                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_terbang_titipan"  placeholder='Select datepicker' type='text' value="<?php echo $row->tgl_terbang_titipan;?>" />
                                                            <span class='add-on'>
                                                                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                            </span>
                                                            </div>
                                                            </div>
                                                            
                                                        </div>

                                            <div class="alert alert-info"><button data-dismiss="alert" class="close"> x </button> Data Suhan Dititipkan</div>

                                                    <div class="control-group">
                                                        <label class="control-label span4"> NAMA</label>
                                                        <div class="controls">
                                                            <input type="text" name="nama_dititipkan" class="span12 popovers" value="<?php echo $row->nama_dititipkan;?>"  />
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label span4"> ID </label>
                                                        <div class="controls">
                                                            <input type="text" name="id_biodata_dititipkan" class="span12 popovers" value="<?php echo $row->id_biodata_dititipkan;?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label span4">NO SUHAN</label>
                                                        <div class="controls">
                                                            <input type="text" name="no_suhan_dititipkan" class="span12 popovers" value="<?php echo $row->no_suhan_dititipkan;?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label span4"> Tanggal Terbang di titipkan </label>
                                                        <div class="controls">
                                                        <div class='datepicker input-append' id='datepicker'>
                                                        <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_terbang_dititipkan"  placeholder='Select datepicker' type='text' value="<?php echo $row->tgl_terbang_dititipkan;?>" />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                         </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="alert alert-info"><button data-dismiss="alert" class="close"> x </button> Data Visa Permit Dititipkan</div>

                                                    <div class="control-group">
                                                        <label class="control-label span4"> NAMA</label>
                                                        <div class="controls">
                                                            <input type="text" name="nama_dititipkan2" class="span12 popovers" value="<?php echo $row->nama_dititipkan2;?>"  />
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label span4"> ID </label>
                                                        <div class="controls">
                                                            <input type="text" name="id_biodata_dititipkan2" class="span12 popovers" value="<?php echo $row->id_biodata_dititipkan2;?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label span4"> NO VISAPERMIT </label>
                                                        <div class="controls">
                                                            <input type="text" name="no_vp_dititipkan" class="span12 popovers" value="<?php echo $row->no_vp_dititipkan;?>" />
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label span4"> Tanggal Terbang di titipkan </label>
                                                        <div class="controls">
                                                        <div class='datepicker input-append' id='datepicker'>
                                                        <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_terbang_dititipkan2"  placeholder='Select datepicker' type='text' value="<?php echo $row->tgl_terbang_dititipkan2;?>" />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                         </div>
                                                        </div>
                                                        
                                                    </div>
                                                   

                        <div class="alert alert-info"><button data-dismiss="alert" class="close"> x </button> Detail Dokumen</div>

                        <div class="control-group">
                                            <label class="control-label">聘工表/Job description</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="jddok"  >
                                                    <option value="<?php echo $row->jddok;?>" /><?php echo $row->jddok;?>
                                                    <option value="正本-ORIGINAL" />正本-ORIGINAL
                                                    <option value="影本-COPY" />影本-COPY
                                                    <option value="沒有-TIDAK ADA" />沒有-TIDAK ADA
                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">ARC TKI</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="arcdok"  >
                                                    <option value="<?php echo $row->arcdok;?>" /><?php echo $row->arcdok;?>
                                                    <option value="正本-ORIGINAL" />正本-ORIGINAL
                                                    <option value="影本-COPY" />影本-COPY
                                                    <option value="沒有-TIDAK ADA" />沒有-TIDAK ADA
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">外勞保險卡Insurance Card-TKI</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="icdok"  >
                                                    <option value="<?php echo $row->icdok;?>" /><?php echo $row->icdok;?>
                                                    <option value="正本-ORIGINAL" />正本-ORIGINAL
                                                    <option value="影本-COPY" />影本-COPY
                                                    <option value="沒有-TIDAK ADA" />沒有-TIDAK ADA
                                                </select>
                                            </div>
                                        </div>


                                        <div class="alert alert-info"><button data-dismiss="alert" class="close"> x </button> Dokumen Lainnya</div>

                                        <!-- <div class="control-group">
                                            <label class="control-label">Dokumen Lain</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="isidok1"  >
                                                     <option value="<?php echo $row->isidok1;?>" /> <?php echo $row->isidok1;?>
                                                         <option value="" />
                                                                        <?php  foreach ($tampil_data_pildok as $pilihan) { ?>
                                                                            <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>

                                                                         <?php
                                                                     } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Status Dokumen</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="statdok1"  >
                                                     <option value="<?php echo $row->statdok1;?>" /> <?php echo $row->statdok1;?>
                                                        <option value="" />
                                                    <option value="正本-ORIGINAL" />正本-ORIGINAL
                                                    <option value="影本-COPY" />影本-COPY
                                                    <option value="沒有-TIDAK ADA" />沒有-TIDAK ADA
                                                </select>
                                            </div>
                                        </div>

                                        <div class="alert alert-info"><button data-dismiss="alert" class="close"> x </button> Dokumen Lainnya</div>

                                        <div class="control-group">
                                            <label class="control-label">Dokumen Lain</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="isidok2"  >
                                                     <option value="<?php echo $row->isidok2;?>" /> <?php echo $row->isidok2;?>
                                                        <option value="" />
                                                                        <?php  foreach ($tampil_data_pildok as $pilihan) { ?>
                                                                            <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>

                                                                         <?php
                                                                     } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Status Dokumen</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="statdok2"  >
                                                     <option value="<?php echo $row->statdok2;?>" /> <?php echo $row->statdok2;?>
                                                        <option value="" />
                                                    <option value="正本-ORIGINAL" />正本-ORIGINAL
                                                    <option value="影本-COPY" />影本-COPY
                                                    <option value="沒有-TIDAK ADA" />沒有-TIDAK ADA
                                                </select>
                                            </div>
                                        </div> -->

                                        <div class="alert alert-info"><button data-dismiss="alert" class="close"> x </button> Dokumen Lainnya</div>

                                        <div class="control-group">
                                            <label class="control-label">Dokumen Lain</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="isidok3"  >
                                                    <option value="<?php echo $row->isidok3;?>" /> <?php echo $row->isidok3;?>
                                                        <option value="" />
                                                                        <?php  foreach ($tampil_data_pildok as $pilihan) { ?>
                                                                            <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>

                                                                         <?php
                                                                     } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Status Dokumen</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="statdok3"  >
                                                    <option value="<?php echo $row->statdok3;?>" /> <?php echo $row->statdok3;?>
                                                        <option value="" />
                                                    <option value="正本-ORIGINAL" />正本-ORIGINAL
                                                    <option value="影本-COPY" />影本-COPY
                                                    <option value="沒有-TIDAK ADA" />沒有-TIDAK ADA
                                                </select>
                                            </div>
                                        </div>

                                        <div class="alert alert-info"><button data-dismiss="alert" class="close"> x </button> Dokumen Lainnya</div>

                                        <div class="control-group">
                                            <label class="control-label">Dokumen Lain</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="isidok4"  >
                                                     <option value="<?php echo $row->isidok4;?>" /> <?php echo $row->isidok4;?>
                                                        <option value="" />
                                                                        <?php  foreach ($tampil_data_pildok as $pilihan) { ?>
                                                                            <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>

                                                                         <?php
                                                                     } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Status Dokumen</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="statdok4"  >
                                                    <option value="<?php echo $row->statdok4;?>" /> <?php echo $row->statdok4;?>
                                                        <option value="" />
                                                    <option value="正本-ORIGINAL" />正本-ORIGINAL
                                                    <option value="影本-COPY" />影本-COPY
                                                    <option value="沒有-TIDAK ADA" />沒有-TIDAK ADA
                                                </select>
                                            </div>
                                        </div>

                                        <div class="alert alert-info"><button data-dismiss="alert" class="close"> x </button> Dokumen Lainnya</div>

                                        <div class="control-group">
                                            <label class="control-label">Dokumen Lain</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="isidok5"  >
                                                     <option value="<?php echo $row->isidok5;?>" /> <?php echo $row->isidok5;?>
                                                        <option value="" />
                                                                        <?php  foreach ($tampil_data_pildok as $pilihan) { ?>
                                                                            <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>

                                                                         <?php
                                                                     } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Status Dokumen</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="statdok5"  >
                                                   <option value="<?php echo $row->statdok5;?>" /> <?php echo $row->statdok5;?>
                                                    <option value="" />
                                                    <option value="正本-ORIGINAL" />正本-ORIGINAL
                                                    <option value="影本-COPY" />影本-COPY
                                                    <option value="沒有-TIDAK ADA" />沒有-TIDAK ADA
                                                </select>
                                            </div>
                                        </div>

                                        <div class="alert alert-info"><button data-dismiss="alert" class="close"> x </button> Dokumen Lainnya</div>

                                        <div class="control-group">
                                            <label class="control-label">Dokumen Lain</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="isidok6"  >
                                                     <option value="<?php echo $row->isidok6;?>" /> <?php echo $row->isidok6;?>
                                                        <option value="" />
                                                                        <?php  foreach ($tampil_data_pildok as $pilihan) { ?>
                                                                            <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>

                                                                         <?php
                                                                     } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Status Dokumen</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="statdok6"  >
                                                    <option value="<?php echo $row->statdok6;?>" /> <?php echo $row->statdok6;?>
                                                        <option value="" />
                                                    <option value="正本-ORIGINAL" />正本-ORIGINAL
                                                    <option value="影本-COPY" />影本-COPY
                                                    <option value="沒有-TIDAK ADA" />沒有-TIDAK ADA
                                                </select>
                                            </div>
                                        </div>

                                        <div class="alert alert-info"><button data-dismiss="alert" class="close"> x </button> Dokumen Lainnya</div>

                                        <div class="control-group">
                                            <label class="control-label">Dokumen Lain</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="isidok7"  >
                                                     <option value="<?php echo $row->isidok7;?>" /> <?php echo $row->isidok7;?>
                                                        <option value="" />
                                                                        <?php  foreach ($tampil_data_pildok as $pilihan) { ?>
                                                                            <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>

                                                                         <?php
                                                                     } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Status Dokumen</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="statdok7"  >
                                                    <option value="<?php echo $row->statdok7;?>" /> <?php echo $row->statdok7;?>
                                                        <option value="" />
                                                    <option value="正本-ORIGINAL" />正本-ORIGINAL
                                                    <option value="影本-COPY" />影本-COPY
                                                    <option value="沒有-TIDAK ADA" />沒有-TIDAK ADA
                                                </select>
                                            </div>
                                        </div>

                                        <div class="alert alert-info"><button data-dismiss="alert" class="close"> x </button> Dokumen Lainnya</div>

                                        <div class="control-group">
                                            <label class="control-label">Dokumen Lain</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="isidok8"  >
                                                    <option value="<?php echo $row->isidok8;?>" /> <?php echo $row->isidok8;?>
                                                        <option value="" />
                                                                        <?php  foreach ($tampil_data_pildok as $pilihan) { ?>
                                                                            <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>

                                                                         <?php
                                                                     } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Status Dokumen</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="statdok8"  >
                                                    <option value="<?php echo $row->statdok8;?>" /> <?php echo $row->statdok8;?>
                                                        <option value="" />
                                                    <option value="正本-ORIGINAL" />正本-ORIGINAL
                                                    <option value="影本-COPY" />影本-COPY
                                                    <option value="沒有-TIDAK ADA" />沒有-TIDAK ADA
                                                </select>
                                            </div>
                                        </div>



                                          <div class="control-group">
                                                            <label class="control-label span4"> KETERANGAN 備註  </label>
                                                            <div class="controls">
                                                                <input type="text" name="ketdok" class="span12 popovers" value="<?php echo $row->ketdok;?>" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap"  />
                                                            </div>
                                                            </div>
   


                                                  <?php } ?>      

                                  <!--                           <div class="form-actions">
                                    <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                    <a type="button" class="btn" href="<?php echo base_url()."index.php/detailterbangpermit/"?>"><i class=" icon-remove"></i> Kembali </a>
                                </div>
                                                            
                                               -->         
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                 </form>
            </div>