<?php 
include_once '../include/header.html';
require_once '../init.php';

//query untuk mengambil data kategori
$query = mysqli_query($link,"SELECT * FROM kategori");

//mengmbil data per id
$id = $_GET['id'];

if (isset($_GET['id'])) {
    $data = mysqli_query($link,"SELECT * FROM barang WHERE id=$id");
    while($lama = mysqli_fetch_assoc($data)){
        $nama_awal  = $lama['nama'];
        $kategori_awal  = $lama['id_kategori'];
        $stok_awal  = $lama['stok'];
        $info_awal = $lama['info'];
        $gambar_awal = $lama['gambar'];
    }
}

//jika form disubmit
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $stok = $_POST['stok'];
    $info = $_POST['info'];
    $gambar = $_FILES['gambar']['name'];
    $tmp_gambar = $_FILES['gambar']['tmp_name'];
    $lokasi_gambar = "../uploads/".$gambar;

    //jika ada file gambar yang diunggah
    if (!empty($gambar)) {
        //hapus gambar lama
        $lokasi_gambar_lama = "../uploads/".$gambar_awal;
        if (file_exists($lokasi_gambar_lama)) {
            unlink($lokasi_gambar_lama);
        }

        //pindahkan gambar baru ke folder uploads
        $lokasi_gambar = "../uploads/".$gambar;
        move_uploaded_file($tmp_gambar, $lokasi_gambar);
    } else {
        //tidak perlu menghapus gambar lama karena tidak ada gambar baru yang diunggah
        $gambar = $gambar_awal;
    }

    //query untuk menyimpan data ke database
    $sql = "UPDATE barang SET nama='$nama', gambar='$gambar', id_kategori='$kategori', stok='$stok', info='$info' WHERE id=$id";

    if (mysqli_query($link, $sql)) {
        header("location: index.php");
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($link);
    }
}
?>
<form method="post" enctype="multipart/form-data">
    <h2 class="">Edit Barang</h2>
        <label for="nm" class="">Nama</label> <br>
        <input type="text" id="nm" name="nama" required value="<?= $nama_awal ?>" class=""> <br> <br>
        <img width="150px" src="../uploads/<?= $gambar_awal ?>" alt="gambar"> <br> <br>
        <label for="gm" class="">Gambar</label> <br>
        <input type="file" id="gm" name="gambar" class=""> <br> <br>
        <label for="kt" class="">Kategori</label> <br>
        <select id="kt" name="kategori">
        <?php while ($row = mysqli_fetch_assoc($query)) { ?>
            <option value="<?= $row['id_kategori'] ?>" <?php if($row['id_kategori'] == $kategori_awal) echo "selected"; ?>><?= $row['nama_kategori'] ?></option>
        <?php } ?>
        </select> <br> <br>
        <label for="st" class="">Stok</label> <br>
        <input type="number" value="<?= $stok_awal ?>" min="0" id="st" name="stok" required class=""> <br> <br>
        <label for="if" class="">info</label> <br>
        <textarea style="resize: none;" name="info" id="if" cols="30" rows="10"><?= $info_awal ?></textarea> <br> <br>
        <input type="submit" name="submit" class=""> <br>
</form>
<?php include_once '../include/footer.html'; ?>