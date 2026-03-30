<?= $this->include('template/header'); ?>

<div class="card shadow p-4">

    <h2 class="mb-3"><?= $artikel['judul'] ?></h2>

    <?php if($artikel['gambar']): ?>
        <img src="/gambar/<?= $artikel['gambar'] ?>" 
             class="img-fluid rounded mb-4"
             style="max-height:400px; object-fit:cover; width:100%;">
    <?php endif; ?>

    <p style="line-height:1.8;">
        <?= $artikel['isi'] ?>
    </p>

    <a href="/artikel" class="btn btn-secondary mt-3">
        ⬅ Kembali
    </a>

</div>

<?= $this->include('template/footer'); ?>