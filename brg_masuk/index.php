<?php 
include_once '../include/header.html';
require_once '../init.php';

$query = mysqli_query($link,"SELECT * FROM brg_msk INNER JOIN barang ON brg_msk.id_brg = barang.id");
$i = 1;
?>
<h2 class="">Barang Masuk</h2>
<a href="create.php"><button>Tambah</button></a>
<a href="../data/index.php"><button>Kembali</button></a> <br> <br>
<table border="">
    <tr>
        <th>NO</th>
        <th>Nama Barang</th>
        <th>Tanggal</th>
        <th>jumlah</th>
        <th>penguna</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($query)) { ?>
    <tr>
        <td><?= $i++ ?></td>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['tanggal'] ?></td>
        <td><?= $row['stok_msk'] ?></td>
        <td><?= $row['penguna'] ?></td>
    </tr>
    <?php } ?>
</table>
<?php 
include_once '../include/footer.html';
?>