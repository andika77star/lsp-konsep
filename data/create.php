<?php 
include_once '../include/header.html';
require_once '../init.php';

//query untuk mengambil data kategori
$query = mysqli_query($link,"SELECT * FROM kategori");

//jika form disubmit
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $stok = $_POST['stok'];
    $info = $_POST['info'];
    $gambar = $_FILES['gambar']['name'];
    $tmp_gambar = $_FILES['gambar']['tmp_name'];
    $lokasi_gambar = "../uploads/".$gambar;

    //memindahkan gambar ke folder uploads
    move_uploaded_file($tmp_gambar, $lokasi_gambar);

    //query untuk menyimpan data ke database
    $sql = "INSERT INTO barang (nama, gambar, id_kategori, stok, info) VALUES ('$nama', '$gambar', '$kategori', '$stok', '$info')";

    if (mysqli_query($link, $sql)) {
        header("location: index.php");
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($link);
    }
}
?>
<form method="post" enctype="multipart/form-data">
    <h2 class="">Tambah Barang</h2>
        <label for="nm" class="">Nama</label> <br>
        <input type="text" id="nm" name="nama" required class=""> <br> <br>
        <label for="gm" class="">Gambar</label> <br>
        <input type="file" id="gm" name="gambar" class=""> <br> <br>
        <label for="kt" class="">Kategori</label> <br>
        <select id="kt" name="kategori">
        <?php while ($row = mysqli_fetch_assoc($query)) { ?>
            <option value="<?= $row['id_kategori'] ?>"><?= $row['nama_kategori']?></option>
        <?php } ?>
        </select> <br> <br>
        <label for="st" class="">Stok</label> <br>
        <input type="number" min="0" id="st" name="stok" required class=""> <br> <br>
        <label for="if" class="">info</label> <br>
        <textarea style="resize: none;" name="info" id="if" cols="30" rows="10"></textarea> <br> <br>
        <input type="submit" name="submit" class=""> <br>
</form>
<?php include_once '../include/footer.html'; ?>