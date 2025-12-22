<h1>List Prodi</h1>

            <table class="table">
                <thead>
                    <tr>
                    <th scope="col" class="table-primary">ID</th>
                    <th scope="col" class="table-primary">Nama Prodi</th>
                    <th scope="col" class="table-primary">Jenjang
                    <th scope="col" class="table-primary">Keterangan</th>
                    <th scope="col" class="table-primary">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require 'connect_db.php';
                        $sql = $db->query('SELECT * FROM prodi');
                        //lOOPING Data tamu
                        $i=1;
                        while($data = $sql->fetch_assoc()) {
                    ?>
                        <tr>
                            <th class="table-secondary"><?= $data['id']?></th>
                            <td class="table-secondary"><?= $data['nama_prodi'] ?></td>
                            <td class="table-secondary"><?= $data['jenjang'] ?></td>
                            <td class="table-secondary"><?= $data['keterangan'] ?></td>
                            <td class="table-secondary"><a href="index.php?id=<?= $data['id'] ?>&page=editp" class="btn btn-warning btn-sm">EDIT</a>  
                            <a href="proses.php?id=<?= $data['id']; ?>" class="btn btn-danger btn-sm" 
                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                            DELETE
                            </a>
                        </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href='index.php?page=createp' class="btn btn-primary">Tambah Data</a>