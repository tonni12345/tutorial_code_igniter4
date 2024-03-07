<!DOCTYPE html>
<html lang="en">
<?php require_once APPPATH . 'Views\\Template\\head.php'; ?>

<body>


    <?php require_once APPPATH . 'Views\\Template\\nav.php'; ?>
    <?php
    if ($jenis == "buku") {
    ?>
        <div class="container">
            <form method="post" action="<?= base_url("admin") . "/create" ?>">
                <div class="form-group">
                    <label for="nama_buku">Nama Buku</label>
                    <input type="text" class="form-control" id="nama_buku" name="nama_buku" placeholder="Nama Buku">
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select id="kategori" class="form-select" name="kategori">
                        <option selected>Pilih Kategori</option>
                        <option value="Keilmuan">Keilmuan</option>
                        <option value="Bisnis">Bisnis</option>
                        <option value="Novel">Novel</option>

                    </select>
                </div>
                <div class="form-group">
                    <label for="id_penerbit">Penerbit</label>
                    <select id="id_penerbit" class="form-control" name="id_penerbit">
                        <?php foreach ($penerbit as $p) : ?>
                            <option value="<?= $p->id_penerbit ?>"><?= $p->nama ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" placeholder="Stok">
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga">
                </div>
                <input hidden name="buku" value="buku" />
                <div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    <?php
    } else {
    ?>
        <div class="container">
            <form method="post" action="<?= base_url("admin") . "/create" ?>">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Penerbit">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                </div>
                <div class="form-group">
                    <label for="kota">Kota</label>
                    <input type="text" class="form-control" id="kota" name="kota" placeholder="Kota">
                </div>
                <div class="form-group">
                    <label for="telepon">Telepon</label>
                    <input type="text" class="form-control" id="telepon" name="telepon" maxlength="20" placeholder="Nomor Telepon">
                </div>
                <input hidden name="penerbit" value="penerbit" />
                <div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    <?php
    }
    ?>
    <?php require_once APPPATH . 'Views\\Template\\footers.php'; ?>
</body>

</html>