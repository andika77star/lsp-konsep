<?php 
include_once '../include/header.html';
require_once '../init.php';

$query = mysqli_query($link,"SELECT * FROM barang");
$eror = '';

if (isset($_POST['submit'])) {
    $id_brg = $_POST['id'];
    $tanggal = $_POST['tanggal'];
    $stok = $_POST['stok'];
    $penguna = $_SESSION['lu'];

    $sql = "INSERT INTO brg_klr (tanggal, stok_klr, penguna, id_brg) VALUES ('$tanggal', '$stok', '$penguna','$id_brg')";

    if (mysqli_query($link,$sql)) {
        $stok_old = mysqli_query($link,"SELECT stok FROM barang WHERE id='$id_brg'");
        $pengarai = mysqli_fetch_assoc($stok_old);
        $stok_new = (int)$pengarai['stok'] - $stok;

        mysqli_query($link,"UPDATE barang SET stok='$stok_new' WHERE id='$id_brg'");
        header("location: index.php");
    }else{
        echo "Terjadi kesalahan: " . mysqli_error($link);
    }
}
?>

<form method="post">
    <h2 class="">Barang Keluar</h2>
    <?= $eror ?> <br>
        <label for="nm">Pilih Barang</label> <br>
        <select id="nm" name="id">
            <?php while ($row = mysqli_fetch_assoc($query) ) { ?>
                <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
           <?php } ?>
        </select> <br> <br>
        <label for="tg">Tanggal</label> <br>
        <input type="date" id="tg" name="tanggal"> <br> <br>
        <label for="st" class="">Stok</label> <br>
        <input type="number" id="st" name="stok" min="1" required class=""> <br> <br>
        <input type="submit" name="submit">
</form>
<br>
<a href="index.php"><button>Kembali</button></a>
<?php 
include_once '../include/footer.html';
?>