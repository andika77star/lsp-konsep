<?php 
include_once '../include/header.html';
require_once '../init.php';

$query = mysqli_query($link,"SELECT * FROM barang INNER JOIN kategori ON barang.id_kategori = kategori.id_kategori");
$i = 1;
?>
<h2 class="">Data Barang</h2> <a href="../logout.php"><button>log out</button></a>
<h4>selamat datang, <?= $_SESSION['lu'] ?></h4>
<a href="create.php"><button>Tambah</button></a>
<a href="../kategori/index.php"><button>Kategori</button></a> 
<a href="../brg_masuk/index.php"><button>barang Masuk</button></a>
<a href="../brg_keluar/index.php"><button>Barang Keluar</button></a> <br> <br>
<table border="">
    <tr>
        <th>NO</th>
        <th>Nama</th>
        <th>Gambar</th>
        <th>Kategori</th>
        <th>Stok</th>
        <th>Keterangan</th>
        <th>Aksi</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($query)) { ?>
    <tr align="center">
        <td><?= $i++ ?></td>
        <td><?= $row['nama'] ?></td>
        <td><img width="150px" src="../uploads/<?= $row['gambar'] ?>" alt="gambar"></td>
        <td><?= $row['nama_kategori'] ?></td>
        <td><?= $row['stok'] ?></td>
        <td><?= $row['info'] ?></td>
        <td> <a href="edit.php?id=<?= $row['id'] ?>"><button class="">Edit</button></a> |
            <a href="delete.php?id=<?= $row['id'] ?>"><button class="">Hapus</button></a>
        </td>
    </tr>
    <?php } ?>
</table>
<?php 
include_once '../include/footer.html';
?>