<?php 
include_once '../include/header.html';
require_once '../init.php';

$query = mysqli_query($link,"SELECT * FROM kategori");
$i = 1;
?>
<h2 class="">Kategori</h2>
<a href="create.php"><button>Tambah</button></a>
<a href="../data/index.php"><button>Kembali</button></a> <br> <br>
<table border="">
    <tr>
        <th>NO</th>
        <th>Nama</th>
        <th>Aksi</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($query)) { ?>
    <tr>
        <td><?= $i++ ?></td>
        <td><?= $row['nama_kategori'] ?></td>
        <td> 
            <a href="delete.php?id_kategori=<?= $row['id_kategori'] ?>"><button class="action-btn delete-btn">Hapus</button></a>
        </td>
    </tr>
    <?php } ?>
</table>
<?php 
include_once '../include/footer.html';
?>