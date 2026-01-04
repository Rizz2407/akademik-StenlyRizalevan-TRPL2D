<?php 
//include,require
require 'connect_db.php';
$aksi = $_GET['aksi'] ?? '';
if ($aksi == 'insert') {
    $nim = $_POST['nim'];
    $nama_mhs = $_POST['nama_mhs'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $prodi_id = $_POST['prodi_id'];

    $query = "INSERT INTO mahasiswa(nim,nama_mhs,tgl_lahir,alamat,prodi_id)
            VALUES($nim,'$nama_mhs','$tgl_lahir','$alamat','$prodi_id')";
    $sql = $db->query($query); //eksekusi query

    if ($sql){
        echo " Berhasil menyimpan Data";
        echo "<a href='index.php'>Lihat Data</a>";
    }else{
        echo "Gagal Menyimpan Data";
    }
}elseif ($aksi == "update") {

    $nim_lama = $_POST['nim_lama'];
    $nim = $_POST['nim'];       
    $nama_mhs = $_POST['nama_mhs'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];

    $query = "UPDATE mahasiswa SET 
                nim='$nim',
                nama_mhs = '$nama_mhs',
                tgl_lahir = '$tgl_lahir',
                alamat = '$alamat'
                WHERE nim = '$nim_lama'";
    $sql = $db->query($query); //eksekusi query

    if ($sql) {
        echo "<a href='index.php'>Berhasil Mengubah data</a>";
    } else {
        echo "Gagal Mengubah data";
    }
}elseif ($aksi == "delete") {
    if (isset($_GET['nim'])) {
        $nim = $_GET['nim'];
        $query = "DELETE FROM mahasiswa WHERE nim = '$nim'";
        $sql = $db->query($query);
        if ($sql) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error deleting record: " . mysqli_error($db);
        }
    } else {
        echo "ID not provided.";
    }
}elseif ($aksi == "insertp") {
    $nama_prodi = $_POST['nama_prodi'];
    $jenjang = $_POST['jenjang'];
    $keterangan = $_POST['keterangan'];

    $query = "INSERT INTO prodi(nama_prodi,jenjang,keterangan)
            VALUES('$nama_prodi','$jenjang','$keterangan')";
    $sql = $db->query($query); //eksekusi query

    if ($sql){
        echo " Berhasil menyimpan Data";
        echo "<a href='index.php'>Lihat Data</a>";
    }else{
        echo "Gagal Menyimpan Data";
    }
}elseif ($aksi == "updatep") {
    $id_lama = $_POST['id_lama'];
    $nama_prodi = $_POST['nama_prodi'];
    $jenjang = $_POST['jenjang'];
    $keterangan = $_POST['keterangan'];

    $query = "UPDATE prodi SET 
                nama_prodi = '$nama_prodi',
                jenjang = '$jenjang',
                keterangan = '$keterangan'
                WHERE prodi_id = '$id_lama'";

    $sql = $db->query($query); //eksekusi query

    if ($sql) {
        echo "<a href='index.php'>Berhasil Mengubah data</a>";
    } else {
        echo "Gagal Mengubah data";
    }
}elseif ($aksi == "deletep") {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM prodi WHERE prodi_id = '$id'";
        $sql = $db->query($query);
        if ($sql) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error deleting record: " . mysqli_error($db);
        }
    } else {
        echo "ID not provided.";
    }
}else {
    echo "Aksi tidak dikenali.";
}