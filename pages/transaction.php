<?php
require '../data.php';
$id = $_GET['id'] ?? null;

$nama = '';
$jenisKelamin = 'laki-laki';
$nomorIdentitas = '';
$type = $id;
$harga = $id ? $dataDummy[$id]['harga'] : '';
$tanggalPesan = '';
$durasi = 1;
$supir = false;
$total = 0;
$gambar = '../assets/' . ($id ? $dataDummy[$id]['gambar'] : '');

$diskon = 0;
$error = null;

if (isset($_POST['hitung'])) {
    $nama = $_POST['nama'];
    $jenisKelamin = $_POST['jenisKelamin'];
    $nomorIdentitas = $_POST['nomorIdentitas'];
    $type = $_POST['type'];
    $harga = (int) $_POST['harga'];
    $tanggalPesan = $_POST['tanggalPesan'];
    $durasi = (int) $_POST['durasi'];
    if (isset($_POST['supir'])) {
        $supir = true;
    }
    if ($durasi > 3) {
        $diskon = 10;
    }

    if (strlen($nomorIdentitas) < 16) {
        $error = 'nomor identitas salah..data harus 16 digit';
    }

    $total = $harga * $durasi;

    $total -= $total * ($diskon / 100);
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="display: flex; flex-direction: column; height: 100vh;" class="container">
    <?php require '../components/header.php' ?>
    <form style="flex: 1 1 auto;" method="post">
        <?php
        if ($error) {
        ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
        <?php
        }
        ?>
        <div class="mb-3 mt-2">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" value="<?= $nama ?>" placeholder="masukkan nama customer">
        </div>
        <div class="mb-3 mt-2">
            <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jenisKelamin" value="laki-laki" id="flexRadioDefault1" <?= $jenisKelamin == 'laki-laki' ? 'checked' : '' ?>>
                <label class="form-check-label" for="flexRadioDefault1">
                    Laki laki
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jenisKelamin" value="perempuan" id="flexRadioDefault2" <?= $jenisKelamin == 'perempuan' ? 'checked' : '' ?>>
                <label class="form-check-label" for="flexRadioDefault2">
                    Perempuan
                </label>
            </div>
        </div>
        <div class="mb-3 mt-2">
            <label for="nomorIdentitas" class="form-label">Nomor Identitas</label>
            <input type="number" class="form-control" name="nomorIdentitas" value="<?= $nomorIdentitas ?>" placeholder="masukkan nomor identitas customer">
        </div>
        <div class="mb-3 mt-2">
            <label for="type" class="form-label">Type</label>
            <select class="form-select" name="type" aria-label="pilih tipe mobil">
                <?php
                foreach ($dataDummy as $i => $data) {
                ?>
                    <option value="<?= $i ?>" <?= $type == $i ? 'selected' : '' ?>><?= $data['nama'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="mb-3 mt-2">
            <img src="../assets/creta.png" alt="" width="200" id="gambar">
        </div>
        <div class="mb-3 mt-2">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" readonly class="form-control" name="harga" value="<?= $harga ?>">
        </div>
        <div class="mb-3 mt-2">
            <label for="tanggalPesan" class="form-label">Tanggal Pesan</label>
            <input type="date" class="form-control" name="tanggalPesan" placeholder="masukkan tanggal pemesanan" value="<?= $tanggalPesan ?>">
        </div>
        <div class="mb-3 mt-2">
            <label for="durasi" class="form-label">Durasi pemakaian</label>
            <input type="number" class="form-control" name="durasi" placeholder="masukkan durasi pemakaian" value="<?= $durasi ?>">
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="supir" id="flexCheckDefault" <?= $supir ? 'checked' : '' ?>>
            <label class="form-check-label" for="flexCheckDefault">
                Supir (Rp 100.000,00)
            </label>
        </div>
        <div class="mb-3 mt-2">
            <label for="total" class="form-label">Total Pembayaran</label>
            <input type="total" class="form-control" name="total" readonly value="<?= $total ?>">
        </div>
        <div class="d-flex gap-3">
            <button type="submit" name="hitung" class="btn btn-secondary">Hitung Total</button>
            <button type="button" onclick="showModal()" name="simpan" class="btn btn-secondary">simpan</button>
            <button type="submit" name="cancel" class="btn btn-danger">Cancel</button>
        </div>
    </form>
    <?php require '../components/footer.php' ?>


    <div class="modal fade" id="nota" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Transaksi Berhasil</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table>
                        <tr>
                            <td>Nama Pemesan</td>
                            <td>:</td>
                            <td><?= $nama ?></td>
                        </tr>
                        <tr>
                            <td>Nomor Identitas</td>
                            <td>:</td>
                            <td><?= $nomorIdentitas ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td><?= $jenisKelamin ?></td>
                        </tr>
                        <tr>
                            <td>Mobil Yang Dipilih</td>
                            <td>:</td>
                            <td><?= $dataDummy[$type]['nama'] ?></td>
                        </tr>
                        <tr>
                            <td>Supir</td>
                            <td>:</td>
                            <td><?= $supir ? 'Ya' : 'tidak' ?></td>
                        </tr>
                        <tr>
                            <td>Durasi Sewa</td>
                            <td>:</td>
                            <td><?= $durasi ?> Hari</td>
                        </tr>
                        <tr>
                            <td>Diskon</td>
                            <td>:</td>
                            <td><?= $diskon ?> %</td>
                        </tr>
                        <tr>
                            <td>Total Bayar</td>
                            <td>:</td>
                            <td>Rp <?= number_format($total, 2, ',', '.') ?></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        const typeInput = document.querySelector('select[name=type]')
        const dataDummy = JSON.parse('<?= json_encode($dataDummy) ?>')
        const hargaInput = document.querySelector('input[name=harga]')
        const gambarEl = document.getElementById('gambar')

        typeInput.addEventListener('input', (e) => {
            const data = dataDummy[e.target.value] || undefined

            if (data) {
                hargaInput.value = data.harga
                gambar.src = "../assets/" + data.gambar
            }
        })

        const myModalAlternative = new bootstrap.Modal('#nota')

        function showModal() {
            myModalAlternative.show()
        }
    </script>
</body>

</html>