<?= $this->include('template/admin_header'); ?>

<div class="card shadow-lg border-0">
    <div class="card-body p-4">

        <div class="d-flex justify-content-between mb-4">
            <h3>📋 Daftar Artikel</h3>
            <a href="/admin/artikel/add" class="btn btn-success">
                + Tambah Artikel
            </a>
        </div>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

            <?php if($artikel): foreach($artikel as $row): ?>
                <tr>
                    <td><?= $row['id'] ?></td>

                    <td>
                        <b><?= $row['judul'] ?></b><br>
                        <small><?= substr($row['isi'],0,50) ?>...</small>
                    </td>

                    <td>
                        <?= $row['status'] ? 
                        '<span class="badge bg-success">Publish</span>' : 
                        '<span class="badge bg-secondary">Draft</span>' ?>
                    </td>

                    <td>
                        <a href="/admin/artikel/edit/<?= $row['id'] ?>" 
                           class="btn btn-warning btn-sm">Edit</a>

                        <a href="/admin/artikel/delete/<?= $row['id'] ?>" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Yakin hapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; else: ?>
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data</td>
                </tr>
            <?php endif; ?>

            </tbody>
        </table>

    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?= $this->include('template/admin_footer'); ?>