<?php
require 'connect_db.php';
//cek login 
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-4">
        <h1>Edit Pengguna</h1>
        <?php
        $email = $_SESSION['email'];
        $stmt = $db->prepare("SELECT nama FROM pengguna WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_assoc();
        if (!$data) {
            die("Data pengguna tidak ditemukan");
        }
        ?>
        <form method="POST" action="proses.php?aksi=updatepengguna">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($data['nama']); ?>">
            </div>
            <div class="mb-3">
                <label for="passwordlama" class="form-label">Password Lama</label>
                <input type="password" class="form-control" id="passwordlama" name="passwordlama" placeholder="Masukkan password lama">
            </div>
            <div class="mb-3">
                <label for="passwordbaru" class="form-label">Password Baru</label>
                <input type="password" class="form-control" id="passwordbaru" name="passwordbaru" placeholder="Masukkan password baru jika ingin mengganti">
            </div>
            <div class="mb-3">
                <label for="konfirmasipassword" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" id="konfirmasipassword" name="konfirmasipassword" placeholder="Konfirmasi password baru">
            </div>
            <button type="submit" name="submitpengguna" class="btn btn-success">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>