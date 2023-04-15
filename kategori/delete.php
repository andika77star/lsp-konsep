<?php
require_once '../init.php';
if(isset($_GET['id_kategori'])){
    $id = $_GET['id_kategori'];
    mysqli_query($link,"DELETE FROM kategori WHERE id_kategori = $id");
    header('Location: index.php');
}