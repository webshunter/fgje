<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Data Agen </span>
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
                    <li class='active'>Data Agen </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="alert alert-info">
    <button data-dismiss="alert" class="close"> x </button> Welcome <strong>
        <?php echo $tampil_nama_user; ?>
    </strong> PT Flamboyan Gema Jasa
</div>
<div class='row-fluid'>
    <div class='span12'>
        <a class='btn btn-info btn-large' data-toggle='modal' href='#tambahgroup' role='button'>Tambah GROUP</a>
        <a class='btn btn-info btn-large' data-toggle='modal' href='#tambahagen' role='button'>Tambah AGEN</a>
        <a class='btn btn-info btn-large' id="submit1" role='button'>print Group</a>


    </div>
</div>
</br>
<div class="row-fluid">

    <div class='span12 card bordered-card orange-border' style='margin-bottom:0;'>
        <div class='card-header orange-background'>
            <div class='title'>Data Group</div>
            <div class='actions'>
                <a href="#" class="btn card-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn card-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
        <div class='card-body card-no-padding'>
            <div class='responsive-table'>
                <div class='scrollable-area'>
                    <table class='data-table table table-bordered table-striped' style='margin-bottom:0;'
                        id="printTable">
                        <thead>


                            <tr>
                                <th>#</th>
                                <th></th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Nama Mandarin</th>
                                <th>alamat</th>
                                <th>Alamat Mandarin</th>
                                <th>direktur</th>
                                <th>No telp</th>
                                <th>No Fax</th>
                                <th>Nama Penangggung Jawab</th>
                                <th>Line Penanggung Jawab</th>
                                <th>Komunikasi Nama</th>
                                <th>Komunikasi Line</th>
                                <th>Komunikasi Skype</th>
                                <th>Komunikasi Hp</th>
                                <th>Agen Bergabung</th>
                                <th>Keterangan</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; 
                                                foreach ($tampil_data_group as $row) { ?>
                            <tr>
                                <td>
                                    <?php echo $no;?>
                                </td>
                                <td>

                                    <div style='position: relative ;' class='btn-group'>
                                        <button class='btn btn-primary dropdown-toggle' data-toggle='dropdown'
                                            style='margin-bottom:5px'>
                                            Menu
                                            <span class='caret'></span>
                                        </button>
                                        <ul style='position: relative;' class='dropdown-menu'>
                                            <li>
                                                <a href="#" data-toggle="modal"
                                                    data-target="#edit<?php echo $no; ?>"><span>Edit</span>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="modal"
                                                    data-target="#hapus<?php echo $no; ?>"><span>Hapus</span></a>
                                            </li>

                                        </ul>
                                    </div>
                                    </a>
                                </td>
                                <td>
                                    <?php echo $row->kode_group;?>
                                </td>
                                <td>
                                    <?php echo $row->nama;?>
                                </td>
                                <td>
                                    <?php echo $row->namamandarin;?>
                                </td>
                                <td>
                                    <?php echo $row->alamat;?>
                                </td>
                                <td>
                                    <?php echo $row->alamatmandarin;?>
                                </td>
                                <td>
                                    <?php echo $row->direktur;?>
                                </td>
                                <td>
                                    <?php echo $row->notelp;?>
                                </td>
                                <td>
                                    <?php echo $row->nofax;?>
                                </td>
                                <td>
                                    <?php echo $row->tanggungnama;?>
                                </td>
                                <td>
                                    <?php echo $row->tanggungline;?>
                                </td>
                                <td>
                                    <?php echo $row->komnama;?>
                                </td>
                                <td>
                                    <?php echo $row->komline;?>
                                </td>
                                <td>
                                    <?php echo $row->komskype;?>
                                </td>
                                <td>
                                    <?php echo $row->komhp;?>
                                </td>
                                <td>
                                    <?php echo $row->agenbergabung;?>
                                </td>
                                <td>
                                    <?php echo $row->keterangan;?>
                                </td>


                            </tr>

                            <div class='modal hide fade' id='edit<?php echo $no; ?>' role='dialog' tabindex='-3'>
                                <div class='modal-header'>
                                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                                    <h3>Ubah Data Group</h3>
                                </div>
                                <form class="form-horizontal" method="post"
                                    action="<?php echo site_url('agen/update_group'); ?>">
                                    <div class="modal-body">

                                        <input type="hidden" class="form-control" name="id_group"
                                            value="<?php echo $row->id_group; ?>">

                                        <div class="control-group">
                                            <label class="control-label">Kode </label>
                                            <div class="controls">
                                                <input type="text" name="kode" value="<?php echo $row->kode_group;?>"
                                                    class="span10 popovers" data-trigger="hover"
                                                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                    data-original-title="Nama Sektor" />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Nama </label>
                                            <div class="controls">
                                                <input type="text" name="nama" value="<?php echo $row->nama;?>"
                                                    class="span10 popovers" data-trigger="hover"
                                                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                    data-original-title="Nama Sektor" />

                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Nama Mandarin Grup </label>
                                            <div class="controls">
                                                <input type="text" name="namamandarin" class="span10 popovers"
                                                    data-trigger="hover"
                                                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                    data-original-title="Nama Sektor"
                                                    value="<?php echo $row->namamandarin;?>" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Alamat </label>
                                            <div class="controls">
                                                <input type="text" name="alamat" class="span10 popovers"
                                                    data-trigger="hover"
                                                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                    data-original-title="Nama Sektor"
                                                    value="<?php echo $row->alamat;?>" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Alamat Mandarin </label>
                                            <div class="controls">
                                                <input type="text" name="alamatmandarin" class="span10 popovers"
                                                    data-trigger="hover"
                                                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                    data-original-title="Nama Sektor"
                                                    value="<?php echo $row->alamatmandarin;?>" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Direktur </label>
                                            <div class="controls">
                                                <input type="text" name="direktur" class="span10 popovers"
                                                    data-trigger="hover"
                                                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                    data-original-title="Nama Sektor"
                                                    value="<?php echo $row->direktur;?>" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">No Telp </label>
                                            <div class="controls">
                                                <input type="text" name="notelp" class="span10 popovers"
                                                    data-trigger="hover"
                                                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                    data-original-title="Nama Sektor"
                                                    value="<?php echo $row->notelp;?>" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">No Fax </label>
                                            <div class="controls">
                                                <input type="text" name="nofax" class="span10 popovers"
                                                    data-trigger="hover"
                                                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                    data-original-title="Nama Sektor"
                                                    value="<?php echo $row->nofax;?>" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Nama Penanggung Jawab </label>
                                            <div class="controls">
                                                <input type="text" name="tanggungnama" class="span10 popovers"
                                                    data-trigger="hover"
                                                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                    data-original-title="Nama Sektor"
                                                    value="<?php echo $row->tanggungnama;?>" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Line Penanggung Jawab </label>
                                            <div class="controls">
                                                <input type="text" name="tanggungline" class="span10 popovers"
                                                    data-trigger="hover"
                                                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                    data-original-title="Nama Sektor"
                                                    value="<?php echo $row->tanggungline;?>" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Komunikasi Nama </label>
                                            <div class="controls">
                                                <input type="text" name="komnama" class="span10 popovers"
                                                    data-trigger="hover"
                                                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                    data-original-title="Nama Sektor"
                                                    value="<?php echo $row->komnama;?>" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Komunikasi Line </label>
                                            <div class="controls">
                                                <input type="text" name="komline" class="span10 popovers"
                                                    data-trigger="hover"
                                                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                    data-original-title="Nama Sektor"
                                                    value="<?php echo $row->komline;?>" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Komunikasi Skype </label>
                                            <div class="controls">
                                                <input type="text" name="komskype" class="span10 popovers"
                                                    data-trigger="hover"
                                                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                    data-original-title="Nama Sektor"
                                                    value="<?php echo $row->komskype;?>" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Komunikasi Hp </label>
                                            <div class="controls">
                                                <input type="text" name="komhp" class="span10 popovers"
                                                    data-trigger="hover"
                                                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                    data-original-title="Nama Sektor"
                                                    value="<?php echo $row->komhp;?>" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Agen Bergabung </label>
                                            <div class="controls">
                                                <input type="text" name="agenbergabung" class="span10 popovers"
                                                    data-trigger="hover"
                                                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                    data-original-title="Nama Sektor"
                                                    value="<?php echo $row->agenbergabung;?>" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Keterangan </label>
                                            <div class="controls">
                                                <input type="text" name="keterangan" class="span10 popovers"
                                                    data-trigger="hover"
                                                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                    data-original-title="Nama Sektor"
                                                    value="<?php echo $row->keterangan;?>" />
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Tutup</button>
                                    </div>
                                </form>
                            </div>
                </div>
            </div>

            <div class="modal fade" id="hapus<?php echo $no; ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form class="form-horizontal" method="post"
                            action="<?php echo site_url('agen/hapus_group'); ?>">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                <h4 class="modal-title">Hapus Data Group</h4>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" class="form-control" name="id_group"
                                    value="<?php echo $row->id_group; ?>">
                                <p>Apakah anda yakin akan menghapus data Group ini? :
                                    <?php echo $row->id_group; ?>
                                </p>
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
</br>
<div class="alert alert-info">
    <div class='row-fluid'>

        <div class='span12'>
            <form class="form-horizontal" method="post" action="<?php echo site_url('agen/filterdataagen'); ?>">
                <div class="control-group">
                    <label class="control-label">TAMPIKAN PER GROUP</label>
                    <div class="controls">
                        <select class="span5 " name="kodegroup" data-placeholder="Choose a Category" tabindex="1">

                            <?php  foreach ($tampil_pilihan_group as $pilihan) { ?>
                            <option value="<?php echo $pilihan->id_group;?>" />
                            <?php echo $pilihan->nama;?>
                            <?php
                                                                     } ?>
                        </select>
                        <button type="submit" class="btn btn-info btn-large" name="submit">Tampilkan Agen</button>
            </form>
            <a class='btn btn-info btn-large' id="submit2" role='button'>print Agen</a>
            <a type="button" class='btn btn-info btn-large' href="<?php echo base_url()." index.php/agen/"?>"> Tampilkan
                Semua </a>
        </div>
    </div>




</div>
</div>
</div>
</br>
<div class="row-fluid">
    <div class='span12 card bordered-card orange-border' style='margin-bottom:0;'>

        <div class='card-header orange-background'>
            <div class='title'>Data Agen</div>
            <div class='actions'>
                <a href="#" class="btn card-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn card-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
        <div class='card-body card-no-padding'>
            <div class='responsive-table'>
                <div class='scrollable-area'>
                    <table class='data-table table table-bordered table-striped' style='margin-bottom:0;'
                        id="printTable2">
                        <thead>


                            <tr>

                                <th>#</th>
                                <th>Option</th>
                                <th>Status</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Mandarin</th>
                                <th>No Telp</th>
                                <th>No Fax</th>
                                <th>Nama Direktur</th>
                                <th>Nama Direktur (Taiwan)</th>
                                <th>Jabatan Mandarin</th>
                                <th>Jabatan Indonesia</th>
                                <th>No SIUP</th>
                                <th>Hadphone</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Alamat Mandarin</th>
                                <th>Jenis agree (1)</th>

                                <th>Jenis agree (2)</th>

                                <th>Jenis agree (3)</th>
                                <th>Kom Nama</th>
                                <th>Kom Line</th>
                                <th>Kom Skype</th>
                                <th>Kom Hp</th>
                                <th>Keterangan</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; 
                                                foreach ($tampil_data_agen as $row) { ?>
                            <tr>


                                <td>
                                    <?php echo $no;?>
                                </td>
                                <td>

                                    <div class='btn-group'>
                                        <button class='btn btn-primary dropdown-toggle' data-toggle='dropdown'
                                            style='margin-bottom:5px'>
                                            Menu
                                            <span class='caret'></span>
                                        </button>
                                        <ul style='position: relative;' class='dropdown-menu'>
                                            <li>
                                                <a href="<?php echo site_url('agen/detailagen1/'.$row->id_agen); ?>">Tampil
                                                    Agree (1)</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo site_url('agen/detailagen2/'.$row->id_agen); ?>">Tampil
                                                    Agree (2)</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo site_url('agen/detailagen3/'.$row->id_agen); ?>">Tampil
                                                    Agree (3)</a>
                                            </li>
                                            <li>
                                                <a
                                                    href="<?php echo site_url('agen_tambah_tki/majikan_tki/'.$row->id_agen); ?>">Tambah
                                                    Tki</a>
                                            </li>
                                            <li class='divider'></li>
                                            <li>
                                                <a href="#" data-toggle="modal"
                                                    data-target="#editagen<?php echo $no; ?>"><span>Edit</span></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="modal"
                                                    data-target="#hapusagen<?php echo $no; ?>"><span>Hapus</span></a>
                                            </li>
                                            <li class='divider'></li>
                                            <li>
                                                <a href="<?php echo site_url('agen/detaildokumen/'.$row->id_agen); ?>">Permintaan
                                                    Dokumen</a></a>
                                            </li>
                                            <li class='divider'></li>
                                            <li>
                                                <a
                                                    href="<?php echo site_url('new_agen_penerima_dana/index/'.$row->id_agen); ?>">Bank</a></a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                                <td>
                                    <?php if ( $row->statusnonaktif == 1 ) { ?>
                                    <a type="button" href="<?php echo site_url('agen/changestatus/0/'.$row->id_agen) ?>"
                                        class="btn btn-danger">NON-AKTIF</a>
                                    <?php } else { ?>
                                    <a type="button" href="<?php echo site_url('agen/changestatus/1/'.$row->id_agen) ?>"
                                        class="btn btn-success">AKTIF</a>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php echo $row->kode_agen;?>
                                </td>
                                <td>
                                    <?php echo $row->nama;?>
                                </td>
                                <td>
                                    <?php echo $row->namamandarin;?>
                                </td>
                                <td>
                                    <?php echo $row->notel;?>
                                </td>
                                <td>
                                    <?php echo $row->nofax;?>
                                </td>
                                <td>
                                    <?php echo $row->direktur;?>
                                </td>
                                <td>
                                    <?php echo $row->direktur2;?>
                                </td>
                                <td>
                                    <?php echo $row->jabatan_man;?>
                                </td>
                                <td>
                                    <?php echo $row->jabatan_indo;?>
                                </td>
                                <td>
                                    <?php echo $row->nosiup;?>
                                </td>
                                <td>
                                    <?php echo $row->hp;?>
                                </td>
                                <td>
                                    <?php echo $row->email;?>
                                </td>
                                <td>
                                    <?php echo $row->alamat;?>
                                </td>
                                <td>
                                    <?php echo $row->alamatmandarin;?>
                                </td>

                                <td>
                                    <?php echo $row->jenisagre;?>
                                </td>

                                <td>
                                    <?php echo $row->jenisagre2;?>
                                </td>

                                <td>
                                    <?php echo $row->jenisagre3;?>
                                </td>


                                <td>
                                    <?php echo $row->komnama;?>
                                </td>
                                <td>
                                    <?php echo $row->komline;?>
                                </td>
                                <td>
                                    <?php echo $row->komskype;?>
                                </td>
                                <td>
                                    <?php echo $row->komhp;?>
                                </td>

                                <td>
                                    <?php echo $row->keterangan;?>
                                </td>

                            </tr>

                            <div class='modal hide fade' id='editagen<?php echo $no; ?>' role='dialog' tabindex='-3'>
                                <div class='modal-header'>
                                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                                    <h3>Ubah Data Agen</h3>
                                </div>
                                <form action="<?php echo site_url('agen/update_agen');?>" enctype="multipart/form-data"
                                    method="post" class="form-horizontal" />
                                <div class="modal-body">

                                    <input type="hidden" class="form-control" name="id_agen"
                                        value="<?php echo $row->id_agen; ?>">

                                    <div class="control-group">
                                        <label class="control-label">Pilih Group (kosong jika tidak ada grup)</label>
                                        <div class="controls">
                                            <select class="span10 " name="group" data-placeholder="Choose a Category"
                                                tabindex="1">
                                                <option value="<?php echo $row->kode_group;?>" />
                                                <?php echo $row->kode_group;?>
                                                <?php  foreach ($tampil_pilihan_group as $pilihan) { ?>
                                                <option value="<?php echo $pilihan->id_group;?>" />
                                                <?php echo $pilihan->nama;?>
                                                <?php
                                                                     } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Kode </label>
                                        <div class="controls">
                                            <input type="text" value="<?php echo $row->kode_agen;?>" name="kode"
                                                class="span10 popovers" data-trigger="hover"
                                                data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                data-original-title="Nama Sektor" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Nama </label>
                                        <div class="controls">
                                            <input type="text" name="nama" value="<?php echo $row->nama;?>"
                                                class="span10 popovers" data-trigger="hover"
                                                data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                data-original-title="Nama Sektor" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Nama Mandarin</label>
                                        <div class="controls">
                                            <input type="text" name="namamandarin"
                                                value="<?php echo $row->namamandarin;?>" class="span10 popovers"
                                                data-trigger="hover"
                                                data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                data-original-title="Nama Sektor" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">No Telpon </label>
                                        <div class="controls">
                                            <input type="text" name="notel" value="<?php echo $row->notel;?>"
                                                class="span10 popovers" data-trigger="hover"
                                                data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                data-original-title="Nama Sektor" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">No Fax </label>
                                        <div class="controls">
                                            <input type="text" name="nofax" value="<?php echo $row->nofax;?>"
                                                class="span10 popovers" data-trigger="hover"
                                                data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                data-original-title="Nama Sektor" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Nama Direktur </label>
                                        <div class="controls">
                                            <input type="text" name="direktur" value="<?php echo $row->direktur;?>"
                                                class="span10 popovers" data-trigger="hover"
                                                data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                data-original-title="Nama Sektor" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Nama Direktur (taiwan) </label>
                                        <div class="controls">
                                            <input type="text" name="direktur2" value="<?php echo $row->direktur2;?>"
                                                class="span10 popovers" data-trigger="hover"
                                                data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                data-original-title="Nama Sektor" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Jabatan Mandarin </label>
                                        <div class="controls">
                                            <input type="text" name="jabatan_man"
                                                value="<?php echo $row->jabatan_man;?>" class="span10 popovers"
                                                data-trigger="hover"
                                                data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                data-original-title="Nama Sektor" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Jabatan Indonesia </label>
                                        <div class="controls">
                                            <input type="text" name="jabatan_indo"
                                                value="<?php echo $row->jabatan_indo;?>" class="span10 popovers"
                                                data-trigger="hover"
                                                data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                data-original-title="Nama Sektor" />
                                        </div>
                                    </div>


                                    <div class="control-group">
                                        <label class="control-label">Nomor SIUP </label>
                                        <div class="controls">
                                            <input type="text" name="nosiup" value="<?php echo $row->nosiup;?>"
                                                class="span10 popovers" data-trigger="hover"
                                                data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                data-original-title="Nama Sektor" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Handphone </label>
                                        <div class="controls">
                                            <input type="text" name="hp" value="<?php echo $row->hp;?>"
                                                class="span10 popovers" data-trigger="hover"
                                                data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                data-original-title="Nama Sektor" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Email </label>
                                        <div class="controls">
                                            <input type="text" name="email" value="<?php echo $row->email;?>"
                                                class="span10 popovers" data-trigger="hover"
                                                data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                data-original-title="Nama Sektor" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Alamat </label>
                                        <div class="controls">
                                            <input type="text" name="alamat" value="<?php echo $row->alamat;?>"
                                                class="span10 popovers" data-trigger="hover"
                                                data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                data-original-title="Nama Sektor" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Alamat Mandarin</label>
                                        <div class="controls">
                                            <input type="text" name="alamatmandarin"
                                                value="<?php echo $row->alamatmandarin;?>" class="span10 popovers"
                                                data-trigger="hover"
                                                data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                data-original-title="Nama Sektor" />
                                        </div>
                                    </div>


                                    <div class="control-group">
                                        <label class="control-label"> Jenis Agreement ( 1 ) </label>
                                        <div class="controls">
                                            <select class="span7 " name="jenisagre" data-placeholder="Choose a Category"
                                                tabindex="1">
                                                <option value="<?php echo $row->jenisagre;?>" />
                                                <?php echo $row->jenisagre;?>
                                                <option value="" />
                                                <option value="informal caretaker" />INFORMAL CARETAKER
                                                <option value="formal pabrik" />FORMAL PABRIK
                                                <option value="formal panti" />FORMAL PANTI
                                                <option value="formal panti+pabrik" />FORMAL PANTI+PABRIK
                                            </select>
                                        </div>
                                    </div>


                                    <div class="control-group">
                                        <label
                                            class="controls">------------------------------------------------------------------</label>
                                    </div>

                                    <div class="control-group">
                                        <label class="controls">Diisi Jika Ada</label>
                                    </div>

                                    <div class="control-group">
                                        <label
                                            class="controls">------------------------------------------------------------------</label>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label"> Jenis Agreement ( 2 ) </label>
                                        <div class="controls">
                                            <select class="span7 " name="jenisagre2"
                                                data-placeholder="Choose a Category" tabindex="1">
                                                <option value="<?php echo $row->jenisagre2;?>" />
                                                <?php echo $row->jenisagre2;?>
                                                <option value="" />
                                                <option value="informal caretaker" />INFORMAL CARETAKER
                                                <option value="formal pabrik" />FORMAL PABRIK
                                                <option value="formal panti" />FORMAL PANTI
                                                <option value="formal panti+pabrik" />FORMAL PANTI+PABRIK
                                            </select>
                                        </div>
                                    </div>



                                    <div class="control-group">
                                        <label
                                            class="controls">------------------------------------------------------------------</label>
                                    </div>

                                    <div class="control-group">
                                        <label class="controls">Diisi Jika Ada</label>
                                    </div>

                                    <div class="control-group">
                                        <label
                                            class="controls">------------------------------------------------------------------</label>
                                    </div>


                                    <div class="control-group">
                                        <label class="control-label"> Jenis Agreement ( 3 ) </label>
                                        </br>
                                        <div class="controls">
                                            <select class="span7 " name="jenisagre3"
                                                data-placeholder="Choose a Category" tabindex="1">
                                                <option value="<?php echo $row->jenisagre3;?>" />
                                                <?php echo $row->jenisagre3;?>
                                                <option value="" />
                                                <option value="informal caretaker" />INFORMAL CARETAKER
                                                <option value="formal pabrik" />FORMAL PABRIK
                                                <option value="formal panti" />FORMAL PANTI
                                                <option value="formal panti+pabrik" />FORMAL PANTI+PABRIK
                                            </select>
                                        </div>
                                    </div>




                                    <div class="control-group">
                                        <label class="control-label">Komunikasi Nama </label>
                                        <div class="controls">
                                            <input type="text" name="komnama" class="span10 popovers"
                                                data-trigger="hover"
                                                data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                data-original-title="Nama Sektor" value="<?php echo $row->komnama;?>" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Komunikasi LINE </label>
                                        <div class="controls">
                                            <input type="text" name="komline" class="span10 popovers"
                                                data-trigger="hover"
                                                data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                data-original-title="Nama Sektor" value="<?php echo $row->komline;?>" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Komunikasi SKYPE </label>
                                        <div class="controls">
                                            <input type="text" name="komskype" class="span10 popovers"
                                                data-trigger="hover"
                                                data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                data-original-title="Nama Sektor"
                                                value="<?php echo $row->komskype;?>" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Komunikasi HP </label>
                                        <div class="controls">
                                            <input type="text" name="komhp" class="span10 popovers" data-trigger="hover"
                                                data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                data-original-title="Nama Sektor" value="<?php echo $row->komhp;?>" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Keterangan </label>
                                        <div class="controls">
                                            <input type="text" name="keterangan" class="span10 popovers"
                                                data-trigger="hover"
                                                data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                data-original-title="Nama Sektor"
                                                value="<?php echo $row->keterangan;?>" />
                                        </div>
                                    </div>





                                    <div class="control-group">
                                        <label class="control-label">username </label>
                                        <div class="controls">
                                            <input type="text" name="username" value="<?php echo $row->username;?>"
                                                class="span10 popovers" data-trigger="hover"
                                                data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                data-original-title="Nama Sektor" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">password </label>
                                        <div class="controls">
                                            <input type="text" name="password" value="<?php echo $row->password;?>"
                                                class="span10 popovers" data-trigger="hover"
                                                data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                                                data-original-title="Nama Sektor" />
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

            <div class="modal fade" id="hapusagen<?php echo $no; ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form class="form-horizontal" method="post" action="<?php echo site_url('agen/hapus_agen'); ?>">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                <h4 class="modal-title">Hapus Data Agen</h4>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" class="form-control" name="id_agen"
                                    value="<?php echo $row->id_agen; ?>">
                                <p>Apakah anda yakin akan menghapus data Agen ini? :
                                    <?php echo $row->id_agen; ?>
                                </p>
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
<div class='modal hide fade' id='tambahagen' role='dialog' tabindex='-2'>
    <div class='modal-header'>
        <button class='close' data-dismiss='modal' type='button'>&times;</button>
        <h3>Tambah Agen</h3>
    </div>
    <div class='modal-body'>
        <form action="<?php echo site_url('agen/simpan_data_agen');?>" enctype="multipart/form-data" method="post"
            class="form-horizontal" />
        <a class='btn btn-info btn-large' data-toggle='modal' href='#tambahgroup' role='button'>Tambah GROUP</a>

        <div class="control-group">
            <label class="control-label">Pilih Group</label>
            <div class="controls">
                <select class="span10 " name="group" data-placeholder="Choose a Category" tabindex="1">
                    <?php  foreach ($tampil_pilihan_group as $pilihan) { ?>
                    <option value="<?php echo $pilihan->id_group;?>" />
                    <?php echo $pilihan->nama;?>
                    <?php
                                                                     } ?>
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Kode </label>
            <div class="controls">
                <input type="text" name="kode" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Nama </label>
            <div class="controls">
                <input type="text" name="nama" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Nama Mandarin</label>
            <div class="controls">
                <input type="text" name="namamandarin" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">No Telpon </label>
            <div class="controls">
                <input type="text" name="notel" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">No Fax </label>
            <div class="controls">
                <input type="text" name="nofax" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Nama Direktur (Penanggung Jawab) </label>
            <div class="controls">
                <input type="text" name="direktur" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Nama Direktur (Penanggung Jawab) (Taiwan) </label>
            <div class="controls">
                <input type="text" name="direktur2" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Jabatan Mandarin </label>
            <div class="controls">
                <input type="text" name="jabatan_man" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Jabatan Indonesia </label>
            <div class="controls">
                <input type="text" name="jabatan_indo" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Nomor SIUP </label>
            <div class="controls">
                <input type="text" name="nosiup" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Handphone </label>
            <div class="controls">
                <input type="text" name="hp" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Email </label>
            <div class="controls">
                <input type="text" name="email" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Alamat </label>
            <div class="controls">
                <input type="text" name="alamat" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Alamat Mandarin</label>
            <div class="controls">
                <input type="text" name="alamatmandarin" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>



        <div class="control-group">
            <label class="control-label span4"> Jenis Agreement ( 1 ) </label>
            <div class="controls">
                <select class="span7 " name="jenisagre" data-placeholder="Choose a Category" tabindex="1">
                    <option value=" " />Pilih
                    <option value="informal caretaker" />INFORMAL CARETAKER
                    <option value="formal pabrik" />FORMAL PABRIK
                    <option value="formal panti" />FORMAL PANTI
                    <option value="formal panti+pabrik" />FORMAL PANTI+PABRIK
                </select>
            </div>
        </div>




        <div class="control-group">
            <label class="controls">------------------------------------------------------------------</label>
        </div>

        <div class="control-group">
            <label class="controls">Diisi Jika Ada</label>
        </div>

        <div class="control-group">
            <label class="controls">------------------------------------------------------------------</label>
        </div>

        <div class="control-group">
            <label class="control-label">No Agreement ( 2 )</label>
            <div class="controls">
                <input type="text" name="noagree2" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>

        <div class="control-group">
            <label class="control-label span4"> Jenis Agreement ( 2 ) </label>
            <div class="controls">
                <select class="span7 " name="jenisagre2" data-placeholder="Choose a Category" tabindex="1">
                    <option value=" " />Pilih
                    <option value="informal caretaker" />INFORMAL CARETAKER
                    <option value="formal pabrik" />FORMAL PABRIK
                    <option value="formal panti" />FORMAL PANTI
                    <option value="formal panti+pabrik" />FORMAL PANTI+PABRIK
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Tanggal AGREEMENT Berlaku ( 2 )</label>
            <div class="controls">
                <div class='datepicker input-append' id='datepicker'>
                    <input class='input-medium' data-format='dd/MM/yyyy' name="berlaku2" placeholder='Select datepicker'
                        type='text' />
                    <span class='add-on'>
                        <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                    </span>
                </div>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Tanggal AGREEMENT Selesai ( 2 )</label>
            <div class="controls">
                <div class='datepicker input-append' id='datepicker'>
                    <input class='input-medium' data-format='dd/MM/yyyy' name="selesai2" placeholder='Select datepicker'
                        type='text' />
                    <span class='add-on'>
                        <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                    </span>
                </div>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Tanggal Terima AGREEMENT ( 2 )</label>
            <div class="controls">
                <div class='datepicker input-append' id='datepicker'>
                    <input class='input-medium' data-format='dd/MM/yyyy' name="tgl_terimaagree2"
                        placeholder='Select datepicker' type='text' />
                    <span class='add-on'>
                        <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                    </span>
                </div>
            </div>
        </div>

        <div class="control-group">
            <label class="controls">------------------------------------------------------------------</label>
        </div>

        <div class="control-group">
            <label class="controls">Diisi Jika Ada</label>
        </div>

        <div class="control-group">
            <label class="controls">------------------------------------------------------------------</label>
        </div>

        <div class="control-group">
            <label class="control-label">No Agreement ( 3 )</label>
            <div class="controls">
                <input type="text" name="noagree3" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>


        <div class="control-group">
            <label class="control-label span4"> Jenis Agreement ( 3 ) </label>
            <div class="controls">
                <select class="span7 " name="jenisagre3" data-placeholder="Choose a Category" tabindex="1">
                    <option value=" " />Pilih
                    <option value="informal caretaker" />INFORMAL CARETAKER
                    <option value="formal pabrik" />FORMAL PABRIK
                    <option value="formal panti" />FORMAL PANTI
                    <option value="formal panti+pabrik" />FORMAL PANTI+PABRIK
                </select>
            </div>
        </div>


        <div class="control-group">
            <label class="control-label">Tanggal AGREEMENT Berlaku ( 3 )</label>
            <div class="controls">
                <div class='datepicker input-append' id='datepicker'>
                    <input class='input-medium' data-format='dd/MM/yyyy' name="berlaku3" placeholder='Select datepicker'
                        type='text' />
                    <span class='add-on'>
                        <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                    </span>
                </div>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Tanggal AGREEMENT Selesai ( 3 )</label>
            <div class="controls">
                <div class='datepicker input-append' id='datepicker'>
                    <input class='input-medium' data-format='dd/MM/yyyy' name="selesai3" placeholder='Select datepicker'
                        type='text' />
                    <span class='add-on'>
                        <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                    </span>
                </div>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Tanggal Terima AGREEMENT ( 3 )</label>
            <div class="controls">
                <div class='datepicker input-append' id='datepicker'>
                    <input class='input-medium' data-format='dd/MM/yyyy' name="tgl_terimaagree3"
                        placeholder='Select datepicker' type='text' />
                    <span class='add-on'>
                        <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                    </span>
                </div>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Komunikasi Nama </label>
            <div class="controls">
                <input type="text" name="komnama" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Komunikasi LINE </label>
            <div class="controls">
                <input type="text" name="komline" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Komunikasi SKYPE </label>
            <div class="controls">
                <input type="text" name="komskype" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Komunikasi HP </label>
            <div class="controls">
                <input type="text" name="komhp" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Keterangan </label>
            <div class="controls">
                <input type="text" name="keterangan" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>



        <div class="control-group">
            <label class="control-label">username </label>
            <div class="controls">
                <input type="text" name="username" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">password </label>
            <div class="controls">
                <input type="text" name="password" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>

        <div class='modal-footer'>
            <button class='btn' data-dismiss='modal'>Close</button>
            <button class='btn btn-primary'>Save changes</button>
        </div>
        </form>

    </div>
</div>

<div class='modal hide fade' id='tambahgroup' role='dialog' tabindex='-2'>
    <div class='modal-header'>
        <button class='close' data-dismiss='modal' type='button'>&times;</button>
        <h3>Form in modal</h3>
    </div>
    <div class='modal-body'>
        <form action="<?php echo site_url('agen/simpan_data_group');?>" enctype="multipart/form-data" method="post"
            class="form-horizontal" />

        <div class="control-group">
            <label class="control-label">Kode Grup </label>
            <div class="controls">
                <input type="text" name="kodegrup" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Nama Grup </label>
            <div class="controls">
                <input type="text" name="nama" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Nama Mandarin Grup </label>
            <div class="controls">
                <input type="text" name="namamandarin" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Alamat </label>
            <div class="controls">
                <input type="text" name="alamat" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Alamat Mandarin </label>
            <div class="controls">
                <input type="text" name="alamatmandarin" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Direktur </label>
            <div class="controls">
                <input type="text" name="direktur" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">No Telp </label>
            <div class="controls">
                <input type="text" name="notelp" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">No Fax </label>
            <div class="controls">
                <input type="text" name="nofax" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Nama Penanggung Jawab </label>
            <div class="controls">
                <input type="text" name="tanggungnama" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Line Penanggung Jawab </label>
            <div class="controls">
                <input type="text" name="tanggungline" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Komunikasi Nama </label>
            <div class="controls">
                <input type="text" name="komnama" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Komunikasi Line </label>
            <div class="controls">
                <input type="text" name="komline" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Komunikasi Skype </label>
            <div class="controls">
                <input type="text" name="komskype" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Komunikasi Hp </label>
            <div class="controls">
                <input type="text" name="komhp" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Agen Bergabung </label>
            <div class="controls">
                <input type="text" name="agenbergabung" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Keterangan </label>
            <div class="controls">
                <input type="text" name="keterangan" class="span10 popovers" data-trigger="hover"
                    data-content="Isi sesuai nama misal : Male Formal, Female Formal"
                    data-original-title="Nama Sektor" />
            </div>
        </div>
        <div class='modal-footer'>
            <button class='btn' data-dismiss='modal'>Close</button>
            <button class='btn btn-primary'>Save changes</button>
        </div>
        </form>
    </div>
</div>