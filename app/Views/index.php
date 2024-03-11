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
        <div class="row">
            <div class="col-md-12">
                <form action="<?= base_url() . "/search" ?>" method="post">
                    <div class="form-group">
                        <label for="query_buku">Cari berdasarkan Nama Buku</label>
                        <input type="text" class="form-control" id="query_buku" name="query_buku" placeholder="Nama Buku" value="<?php echo isset($query)  ? $query : "" ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Cari</button>
                    <a class="btn btn-secondary" href="<?= base_url() ?>">Reset</a>

                </form>
            </div>
        </div>
        <table class="table" id="table-buku">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Nama Buku</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Penerbit</th>
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
                    </tr>
                <?php endforeach; ?>
        </table>
    </div>

    <?php require_once APPPATH . 'Views\\Template\\footers.php'; ?>
</body>

</html>