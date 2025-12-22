<h1>Input Data Mahasiswa</h1>
<form method="POST" action="proses.php?aksi=insert">
    <div class="mb-3">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" class="form-control" id="nim" name="nim">
    </div>
    <div class="mb-3">
        <label for="nama_mhs" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama_mhs" name="nama_mhs">
    </div>
    <div class="mb-3">
        <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" id="alamat" name="alamat"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="index.php?page=mahasiswa" class="btn btn-secondary">Kembali</a>
</form>
