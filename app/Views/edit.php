<!DOCTYPE html>
<html lang="en">
<?php require_once APPPATH . 'Views\\Template\\head.php'; ?>

<body>


    <?php require_once APPPATH . 'Views\\Template\\nav.php'; ?>
    <?php
    if ($jenis == "Buku") {
    ?>
        <div class="container">
            <form method="post" action="<?= base_url("admin") . "/edit" . "/" . $buku->id_buku ?>">
                <div class="form-group">
                    <label for="id_buku">Id Buku</label>
                    <input type="text" class="form-control" id="id_buku" name="id_buku" value="<?= $buku->id_buku ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nama_buku">Nama Buku</label>
                    <input type="text" class="form-control" id="nama_buku" name="nama_buku" value="<?= $buku->nama_buku ?>">
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select id="kategori" class="form-select" name="kategori">
                        <option>Pilih Kategori</option>
                        <option value="Keilmuan" <?php echo $buku->kategori == "Keilmuan" ?   "selected" : "" ?>>Keilmuan</option>
                        <option value="Bisnis" <?php echo $buku->kategori == "Bisnis" ?   "selected" : "" ?>>Bisnis</option>
                        <option value="Novel" <?php echo $buku->kategori == "Novel" ?   "selected" : "" ?>>Novel</option>

                    </select>
                </div>
                <div>
                    <label for="penerbit">Penerbit</label>
                    <select id="id_penerbit" class="form-select" name="id_penerbit">
                        <option>Pilih Penerbit</option>
                        <?php foreach ($penerbit as $p) : ?>
                            <option value="<?= $p->id_penerbit ?>" <?php echo $buku->id_penerbit == $p->id_penerbit ?   "selected" : "" ?>><?= $p->nama ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" value="<?= $buku->stok ?>">
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="<?= $buku->harga ?>">
                </div>
                <input type="hidden" name="buku" value="buku">
                <div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    <?php } else {
    ?>

        <div class="container">
            <form method="post" action="<?= base_url("admin") . "/edit" . "/" . $penerbit->id_penerbit ?>">
                <div class="form-group">
                    <label for="id_penerbit">Id Penerbit</label>
                    <input type="text" class="form-control" id="id_penerbit" name="id_penerbit" value="<?= $penerbit->id_penerbit ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $penerbit->nama ?>">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $penerbit->alamat ?>">
                </div>
                <div class="form-group">
                    <label for="kota">Kota</label>
                    <input type="text" class="form-control" id="kota" name="kota" value="<?= $penerbit->kota ?>">
                </div>
                <div class="form-group">
                    <label for="telepon">Telepon</label>
                    <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $penerbit->telepon ?>">
                </div>
                <input type="hidden" name="penerbit" value="penerbit">
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