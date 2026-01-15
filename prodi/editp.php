<?php
require 'connect_db.php';
$id = $_GET['id'] ?? '';
$sql = $db->query("SELECT * FROM prodi WHERE prodi_id = '$id'");
$data = $sql->fetch_assoc();
?>
<body>
    <div class="container my-4">
        <form method="POST" action="proses.php?aksi=updatep">
            <h1>Edit Data Prodi</h1>
            <input type="hidden" name="id_lama" value="<?= $data['prodi_id'] ?>">
            <div class="mb-3">
                <label for="nama_prodi" class="form-label">Nama Prodi</label>
                <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" value="<?= $data['nama_prodi'] ?>">
            </div>
            <div class="mb-3">
                <label for="jenjang" class="form-label">Jenjang</label>
                <select class="form-control" name="jenjang" id="jenjang" required>
                    <option value="">-- Pilih Jenjang --</option>
                    <option value="D2" <?= $data['jenjang'] == 'D2' ? 'selected' : '' ?>>D2</option>
                    <option value="D3" <?= $data['jenjang'] == 'D3' ? 'selected' : '' ?>>D3</option>
                    <option value="D4" <?= $data['jenjang'] == 'D4' ? 'selected' : '' ?>>D4</option>
                    <option value="S2" <?= $data['jenjang'] == 'S2' ? 'selected' : '' ?>>S2</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan" rows="3"><?= $data['keterangan'] ?></textarea>
            </div>
            <div>
                <button type="submit" name="submitp" class="btn btn-success">Update</button>
                <a href="index.php?page=dataprodi" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
</body>