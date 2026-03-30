<?= $this->include('template/admin_header'); ?>

<div class="card shadow p-4">
    <h3>Edit Artikel</h3>

    <form method="post" enctype="multipart/form-data">

        <label>Judul</label>
        <input type="text" name="judul" class="form-control mb-3"
               value="<?= $data['judul'] ?>">

        <label>Isi</label>
        <textarea name="isi" class="form-control mb-3" rows="5"><?= $data['isi'] ?></textarea>

        <label>Gambar Saat Ini</label><br>
        <?php if($data['gambar']): ?>
            <img src="/gambar/<?= $data['gambar'] ?>" width="150" class="mb-3">
        <?php else: ?>
            <p class="text-muted">Tidak ada gambar</p>
        <?php endif; ?>

        <label>Ganti Gambar</label>
        <input type="file" name="gambar" class="form-control mb-3">

        <button class="btn btn-primary">Update</button>
        <a href="/admin/artikel" class="btn btn-secondary">Kembali</a>

    </form>
</div>

<?= $this->include('template/admin_footer'); ?>