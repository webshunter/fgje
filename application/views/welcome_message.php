<?php
	$this->load->view("template/header");
	$this->load->view("template/navbar");
?>
<style>

	#hero{
		background-image: url('<?=base_url(cek(Perusahaans::get(),'bg'))?>');
		min-height: 100vh;
		background-repeat: no-repeat;
		background-position: center center; 
	}

	.img-x{
		width: 100% !important;
		float: left;
		margin: 10px;
	}


</style>
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

	<div class="container">
		<div class="row">
			<div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
				<h1><?= cek(Perusahaans::get(),'nama')?></h1>
				<h2>
					System management PJTKI
					<br><a style="width: 150px;" href="<?= site_url('login'); ?>" class="btn btn-primary mt-3">Masuk Aplikasi</a>
				</h2>
			</div>
			<div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
				<img src="<?= base_url(cek(Perusahaans::get(),'bg-icon')) ?>" alt="">
			</div>
		</div>
	</div>

</section><!-- End Hero -->

<?php
$this->load->view("template/footer.php")
?>
