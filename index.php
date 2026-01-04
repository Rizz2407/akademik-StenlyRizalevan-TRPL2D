<?php
// session
session_start();
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
    <title>List Data Akademik</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
        <a class="navbar-brand" href="#">Akademik</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav">
                <a class="nav-link" href="index.php?page=home">Home</a>
                <a class="nav-link" href="index.php?page=datamahasiswa">Data Mahasiswa</a>
                <a class="nav-link" href="index.php?page=dataprodi">Data Prodi</a>
                <a class="nav-link active" href="index.php">Data Akademik</a>
            </div>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="logout.php">Logout</a>
        </div>
    </div>
</nav>

<div class="container my-4">
<?php
    $page = $_GET['page'] ?? 'home';

    if ($page == 'home') include 'home.php';
    if ($page == 'datamahasiswa') include 'mahasiswa/list.php';
    if ($page == 'create') include 'mahasiswa/create.php';
    if ($page == 'edit') include 'mahasiswa/edit.php';
    if ($page == 'dataprodi') include 'prodi/listp.php';
    if ($page == 'createp') include 'prodi/createp.php';
    if ($page == 'editp') include 'prodi/editp.php';
?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
