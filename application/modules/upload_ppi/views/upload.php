

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dropzone.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/basic.min.css') ?>">

<script type="text/javascript" src="<?php echo base_url('assets/jquery.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/dropzone.min.js') ?>"></script>

<style type="text/css">

body{
    background-color: #E8E9EC;
}

.dropzone {
    margin-top: 100px;
    border: 2px dashed #0087F7;
}

</style>

</head>
<body>

<div class="dropzone">
<a type="button" class="btn" href="<?php echo base_url()."index.php/upload_ppi/"?>"><i class=" icon-remove"></i> Kembali </a>

  <div class="dz-message">
   <h3> Klik atau Drop gambar disini</h3>
  </div>

</div>



<script type="text/javascript">

Dropzone.autoDiscover = false;

var foto_upload= new Dropzone(".dropzone",{
url: "<?php echo base_url('index.php/upload_ppi/proses_upload') ?>",
maxFilesize: 2,
method:"post",
acceptedFiles:"image/*,application/*",
paramName:"userfile",
dictInvalidFileType:"Type file ini tidak dizinkan",
addRemoveLinks:true,
});


//Event ketika Memulai mengupload
foto_upload.on("sending",function(a,b,c){
    a.token=Math.random();
    c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
});


//Event ketika foto dihapus
foto_upload.on("removedfile",function(a){
    var token=a.token;
    $.ajax({
        type:"post",
        data:{token:token},
        url:"<?php echo base_url('index.php/upload_ppi/remove_foto') ?>",
        cache:false,
        dataType: 'json',
        success: function(){
            console.log("Foto terhapus");
        },
        error: function(){
            console.log("Error");

        }
    });
});


</script>

</body>
