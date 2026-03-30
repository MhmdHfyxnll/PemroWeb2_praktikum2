<?= $this->include('template/admin_header'); ?>

<div class="card shadow p-4">
    <h3>Tambah Artikel</h3>

    <form method="post" enctype="multipart/form-data">

        <input type="text" name="judul" class="form-control mb-3" placeholder="Judul">

        <textarea name="isi" class="form-control mb-3" rows="5" placeholder="Isi"></textarea>

        <input type="file" name="gambar" class="form-control mb-3">

        <button class="btn btn-success">Simpan</button>
        <a href="/admin/artikel" class="btn btn-secondary">Kembali</a>

    </form>
</div>

<?= $this->include('template/admin_footer'); ?>