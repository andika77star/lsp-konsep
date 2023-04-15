<?php
include_once './include/header.html';
require_once 'init.php';

    ini_set('display_errors', 0);
    
    if ( isset($_SESSION['lu'])) {
            header("location: data/index.php");
        } else {
        $eror = '';
        if ($_POST['submit']) {
            $nama = $_POST['nama'];
            $pass = $_POST['password'];

            $query = mysqli_query($link,"SELECT * FROM penguna WHERE nama='$nama' AND password='$pass'");
            $cek =  mysqli_num_rows($query);
            
            if ($cek > 0) {
                $_SESSION['lu'] = $nama;
                header("location: data/index.php");
            }else{
                $eror = 'Gagal';
            }
        }
    }
?>
    <form method="post">
    <h2 class="">Login</h2>
    <?= $eror ?>
        <label for="nm" class="">Nama</label> <br>
        <input type="text" id="nm" name="nama" class=""> <br> <br>
        <label for="pw" class="">Password</label> <br>
        <input type="password" id="pw" name="password" class=""> <br> <br>
        <input type="submit" name="submit" class=""> <br>
    </form>
    
<?php
    include_once './include/footer.html';
?>