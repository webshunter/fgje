<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Setting Data</h1>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <?php foreach($datamenu as $menu) : ?>
            <a href="<?= $menu['link'] ?>" style="padding: 10px; width: 180px" class="btn btn-app bg-secondary">
                <i class="<?= $menu['icon'] ?>"></i> 
                <span style="white-space: nowrap; display:block; width: 160px"> <?= $menu['title'] ?> </span>
            </a>
        <?php endforeach ?>
    </div>
</section>