<?php 
include_once '../include/header.html';
require_once '../init.php';

$eror = '';
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        mysqli_query($link,"INSERT INTO kategori (nama_kategori) value ('$nama')");
        header('Location: index.php');
    }else{
        $eror = 'ada masalah';
    }
?>

<form method="post">
    <h2 class="">Tambah Kategori</h2>
    <?= $eror ?>
        <label for="nm" class="">Nama</label> <br>
        <input type="text" id="nm" name="nama" required class=""> <br> <br>
        <input type="submit" name="submit">
</form>
<br>
<a href="index.php"><button>Kembali</button></a>
<?php 
include_once '../include/footer.html';
?>