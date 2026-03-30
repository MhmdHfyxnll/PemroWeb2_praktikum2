<?= $this->include('template/header'); ?>

<h2 class="mb-4 text-center"><?= $title ?></h2>

<div class="row">
<?php foreach($artikel as $row): ?>
    <div class="col-md-4 mb-4">
        <div class="card shadow h-100">

            <?php if($row['gambar']): ?>
                <img src="/gambar/<?= $row['gambar'] ?>" class="card-img-top img-artikel">
            <?php endif; ?>

            <div class="card-body d-flex flex-column">
                <h5><?= $row['judul'] ?></h5>

                <p class="text-muted flex-grow-1">
                    <?= substr($row['isi'],0,100) ?>...
                </p>

                <a href="/artikel/<?= $row['slug'] ?>" class="btn btn-dark mt-auto">
                     Baca Novel
                </a>
            </div>

        </div>
    </div>
<?php endforeach; ?>
</div>

<?= $this->include('template/footer'); ?>