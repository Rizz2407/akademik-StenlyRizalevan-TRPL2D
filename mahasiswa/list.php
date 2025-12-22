<h1 style="color: #ffff; text-align: center;">list data Buku Tamu</h1>

            <table class="table">
                <thead>
                    <tr>
                    <th scope="col" class="table-primary">NIM</th>
                    <th scope="col" class="table-primary">Nama</th>
                    <th scope="col" class="table-primary">Tanggal Lahir</th>
                    <th scope="col" class="table-primary">Alamat</th>
                    <th scope="col" class="table-primary">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require 'connect_db.php';
                        $sql = $db->query('SELECT * FROM mahasiswa');
                        //lOOPING Data tamu
                        $i=1;
                        while($data = $sql->fetch_assoc()) {
                    ?>
                        <tr>
                            <th class="table-secondary"><?= $data['nim']?></th>
                            <td class="table-secondary"><?= $data['nama_mhs'] ?></td>
                            <td class="table-secondary"><?= $data['tgl_lahir'] ?></td>
                            <td class="table-secondary"><?= $data['alamat'] ?></td>
                            <td class="table-secondary"><a href="index.php?nim=<?= $data['nim'] ?>&page=edit" class="btn btn-warning btn-sm">EDIT</a>  
                            <a href="proses.php?nim=<?= $data['nim']; ?>" class="btn btn-danger btn-sm" 
                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                            DELETE
                            </a>
                        </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href='index.php?page=create' class="btn btn-primary">Tambah Data</a>