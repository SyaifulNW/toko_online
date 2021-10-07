<?php
include'toko_online.php';
  session_start();
  if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
  }
  $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE id_admin = '".$_SESSION['id']."'");
  $d = mysqli_fetch_object($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tokodigital</title>
    <link rel='stylesheet' type="text/css" href="css/style.css">
 

</head>
<body>
    <!---Header-->
    <header>
      <div class="container">
        <h1><a href="dasboard.php">TokoDigital</a></h1>
         <ul>
           <li><a href="dasboard.php">Dashboard</a></li>
           <li><a href="profil.php">Profile</a></li>
            <li><a href="kategori.php">Kategori</a></li>
             <li><a href="produk.php">Produk</a></li>
             <li><a href="logout.php">Logout</a></li>
        
        </ul>
     </div>
</header>
<!--Content-->

  <div class="container">
    <h3>Profile</h3>
    <div class="box">
        <form action="" method="POST">
          <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $d->name_admin?>" required>
          <input type="text" name="user" placeholder="Username" class="input-control"  value="<?php echo $d->username?>"required>
          <input type="text" name="wa" placeholder="No. Whatsapp" class="input-control" value="<?php echo $d->telp_admin?>" required>
          <input type="email" name="email" placeholder="Email" class="input-control"  value="<?php echo $d->email_admin?>"required>
          <input type="text" name="alamat" placeholder="Alamat" class="input-control" value="<?php echo $d->addres_admin?>" required>
          <input type="submit" name="submit" value="Ubah Profil" class="btn">
        </form>
        <?php
            if(isset($_POST['submit'])){

              $nama    = $_POST['nama'];
              $user    = $_POST['user'];
              $wa      = $_POST['wa'];
              $email   = $_POST['email'];
              $alamat  = $_POST['alamat'];

              $update = mysqli_query($conn, "UPDATE tb_admin SET
                               name_admin = '".$nama."',
                                username = '".$user."',
                                telp_admin = '".$wa."',
                                email_admin = '".$email."',
                                addres_admin= '".$alamat."', 
                                WHERE id_admin = '".$d->id_admin."' ")
            }
        ?>
    </div>
  </div>

<!---footer-->
    <footer>
      <div class="container">
        <small>
          Copyright &copy; 2021 - TokoDigital.        </small>
      </div>
    </footer>
</body>
</html>
