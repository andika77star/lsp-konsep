<?php
require_once '../init.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];

    // Query untuk mengambil data gambar yang akan dihapus
    $sql = "SELECT gambar FROM barang WHERE id=$id";
    $result = mysqli_query($link, $sql);
    $data = mysqli_fetch_assoc($result);

    // Hapus gambar terkait dari direktori
    unlink('../uploads/' . $data['gambar']);

    // Query untuk menghapus data dari database
    $sql = "DELETE FROM barang WHERE id=$id";

    if (mysqli_query($link, $sql)) {
        header('Location: index.php');
    } else {
    echo "Terjadi kesalahan: " . mysqli_error($link);
    }
}