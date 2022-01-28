<?php
include 'koneksi.php';
include 'header.php';
require_once("require.php");
$id = $_GET['id'];
$petugas = mysqli_query($db, "SELECT * FROM petugas WHERE id_petugas='$id'");
?>
<div class="wrapper">
    <div class="title">
          <h3>Edit data petugas</h3>
    </div>
<?php
while($row = mysqli_fetch_assoc($petugas)){?>

       <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $row['id_petugas']; ?>">
            <div class="form">

                <div class="inputfield">
                    <label>username</label>
                    <input type="text" class="input" name="user" value="<?= $row['username']; ?>">
                </div> 
                
                <div class="inputfield">
                    <label>password</label>
                    <input type="password" class="input" name="pass" value="<?= $row['password']; ?>">
                </div> 

                <div class="inputfield">
                    <label>Nama Petugas</label>
                    <input type="text" class="input" name="nama" value="<?= $row['nama_petugas']; ?>">
                </div> 

                <div class="inputfield">
                    <input type="submit" name="simpan" value="ubah" class="btn">
                </div>
            </div> 
    </form>
<?php } ?>

<?php
// Proses update
if(isset($_POST['simpan'])){
    $id = $_POST['id'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $nama = $_POST['nama'];
    $update = mysqli_query($db, "UPDATE petugas SET username='$user',
                                 password='$pass', nama_petugas='$nama'
                                 WHERE petugas.id_petugas='$id'");
        if($update){
             echo "
            <script>
            alert('data berhasil diedit');
            document.location.href = 'petugas.php';
            </script>
            ";
        }else{
            echo "<script>alert('Gagal'); </script>";
        }
}
?>
