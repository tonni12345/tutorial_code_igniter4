<!DOCTYPE html>
<html lang="en">
<?php require_once APPPATH . 'Views\\Template\\head.php'; ?>

<body>


    <?php require_once APPPATH . 'Views\\Template\\nav.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Selamat Datang di UniBookStore</h1>
                <h3 class="text-center"><?= $title ?></h3>
            </div>
        </div>
        <a href="<?= base_url() ?>/admin/create" class="btn btn-primary">Tambah Data</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Nama Buku</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($buku as $b) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></td>
                        <td><?= $b->kategori; ?></td>
                        <td><?= $b->nama_buku; ?></td>
                        <td><?= $b->harga; ?></td>
                        <td><?= $b->stok; ?></td>
                        <td><?= $b->nama; ?></td>
                        <td>
                            <a href="<?= base_url() ?>/admin/edit/<?= $b->id_buku; ?>" class="btn btn-warning">Edit</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="<?= $b->id_buku ?>">
                                Delete
                            </button>
                    </tr>
                <?php endforeach; ?>
        </table>
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center"><?= $title2 ?></h3>
            </div>
        </div>
        <a href="<?= base_url() ?>/admin/create/penerbit" class="btn btn-primary">Tambah Data</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Kota</th>
                    <th scope="col">Telepon</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($penerbit as $p) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></td>
                        <td><?= $p->nama; ?></td>
                        <td><?= $p->alamat; ?></td>
                        <td><?= $p->kota; ?></td>
                        <td><?= $p->telepon; ?></td>
                        <td>
                            <a href="<?= base_url() ?>/admin/edit/<?= $p->id_penerbit; ?>" class="btn btn-warning">Edit</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="<?= $p->id_penerbit ?>">
                                Delete
                            </button>
                    </tr>
                <?php endforeach; ?>
        </table>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteModalLabel">Hapus</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tidak</button>
                    <a href="<?= base_url() ?>/admin/delete/" class="btn btn-secondary">Ya</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        const deleteModal = document.getElementById('deleteModal')
        deleteModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget
            const id = button.getAttribute('data-bs-id')
            const modalBtnSec = deleteModal.querySelector('.btn-secondary')

            modalBtnSec.href = `<?= base_url() ?>/admin/delete/${id}`
        })
    </script>
    <?php require_once APPPATH . 'Views\\Template\\footers.php'; ?>
</body>

</html>