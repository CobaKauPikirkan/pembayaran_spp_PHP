<?php
require_once("require.php");
include 'koneksi.php';
include 'header.php';
$id = $_GET['id'];
$kelas = mysqli_query($db, "SELECT * FROM kelas WHERE id_kelas='$id'");
?>

<head>
    <meta charset="UTF-8">
    <title>Edit data Kelas</title>
</head>
<body>
<div class="wrapper">
    <div class="title">
          <h3>Edit data kelas</h3>
    </div>
<?php
while($row = mysqli_fetch_assoc($kelas)){?>

       <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $row['id_kelas']; ?>">
            <div class="form">

                <div class="inputfield">
                    <label>Nama Kelas</label>
                    <input type="text" class="input" name="nama" value="<?= $row['nama_kelas']; ?>">
                </div> 
                
                <div class="inputfield">
                    <label>Alamat</label>
                    <input type="text" class="input" name="kk" value="<?= $row['kompetensi_keahlian']; ?>">
                </div> 

                <div class="inputfield">
                    <input type="submit" name="simpan" value="ubah" class="btn">
                </div>
            </div> 
    </form>
<?php } ?>
    
    <!-- <table cellpadding="5">
            <input type="hidden" name="id" value="<?= $row['id_kelas']; ?>">
            <tr>
                <td>Nama Kelas :</td>
                <td><input type="text" name="nama" value="<?= $row['nama_kelas']; ?>"></td>
            </tr>
            <tr>
                <td>Kompetensi Keahlian :</td>
                <td><input type="text" name="kk" value="<?= $row['kompetensi_keahlian']; ?>"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="simpan">Simpan</button></td>
            </tr>
        </table> -->


<?php
// Proses update
if(isset($_POST['simpan'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kk = $_POST['kk'];
    $update = mysqli_query($db, "UPDATE kelas SET nama_kelas='$nama', kompetensi_keahlian='$kk'
                                 WHERE kelas.id_kelas='$id'");
        if($update){
            echo "
            <script>
            alert('data berhasil diedit');
            document.location.href = 'datakelas.php';
            </script>
            ";
        }else{
            echo "<script>alert('Gagal'); </script>";
        }
}
?>