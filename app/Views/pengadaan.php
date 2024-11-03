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
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Buku</th>
                    <th scope="col">Penerbit</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($buku as $b) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></td>
                        <td><?= $b->nama_buku; ?></td>
                        <td><?= $b->nama; ?></td>
                    </tr>
                <?php endforeach; ?>
        </table>
    </div>
    <?php require_once APPPATH . 'Views\\Template\\footers.php'; ?>
</body>

</html>