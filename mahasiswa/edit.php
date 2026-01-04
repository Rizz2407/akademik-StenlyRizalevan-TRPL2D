<?php
include 'connect_db.php';

if (!isset($_GET['nim'])) {
    die("Akses tidak valid. NIM tidak ditemukan.");
}

$nim = $_GET['nim'];
$query = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
$result = $db->query($query);
$data = mysqli_fetch_assoc($result);
$prodi = $db->query("SELECT prodi_id, nama_prodi, jenjang FROM prodi");
if (!$data) {
    die("Data mahasiswa tidak ditemukan.");
}
?>
<h1>Edit Mahasiswa</h1>
<form method="POST" action="proses.php?aksi=update">
    <input type="hidden" name="nim_lama" value="<?= $data['nim'] ?>">
    <div class="mb-3">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" class="form-control" id="nim" name="nim" value="<?= $data['nim'] ?>">
    </div>
    <div class="mb-3">
        <label for="nama_mhs" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" value="<?= $data['nama_mhs'] ?>">
    </div>
    <div class="mb-3">
        <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
        <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $data['tgl_lahir'] ?>">
    </div>
    <div class="mb-3">
        <select name="prodi_id" class="form-control" required>
            <option value="">-- Pilih Program Studi --</option>
            <?php while ($row = $prodi->fetch_assoc()) { ?>
                <option value="<?= $row['prodi_id']; ?>" <?= $row['prodi_id'] == $data['prodi_id'] ? 'selected' : '' ?>>
                    <?= $row['nama_prodi']; ?> (<?= $row['jenjang']; ?>)
                </option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" id="alamat" name="alamat"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="index.php?page=mahasiswa" class="btn btn-secondary">Kembali</a>
</form>
