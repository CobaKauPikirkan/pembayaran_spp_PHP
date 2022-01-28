<?php
include 'koneksi.php';
include 'header.php';
require_once("require.php");
$nisnSiswa = $_GET['nisn'];
$siswa = mysqli_query($db, "SELECT * FROM siswa WHERE nisn='$nisnSiswa'");
?>
    <!-- Konten -->
<div class="wrapper">
    <div class="title">
          <h3>Edit data Siswa</h3>
    </div>
<?php
while($row = mysqli_fetch_assoc($siswa)){?>

       <form action="" method="POST">
            <input type="hidden" name="nisn" value="<?= $row['nisn']; ?>">
            <div class="form">

                <div class="inputfield">
                    <label>Nama</label>
                    <input type="text" class="input" name="nama" value="<?= $row['nama']; ?>">
                </div> 

                <div class="inputfield">
                <label>Kelas</label>
                <div class="custom_select">
                    <select name="kelas">
                    <?php
                    $kelas = mysqli_query($db, "SELECT * FROM kelas");
                    while($r = mysqli_fetch_assoc($kelas)){ ?>
                 <option value="<?= $r['id_kelas']; ?>"><?= $r['nama_kelas'] . " | " 
                                        . $r['kompetensi_keahlian']; ?></option>
                    <?php } ?>    
                    </select>
                </div>
                </div> 
                
                <div class="inputfield">
                    <label>Alamat</label>
                    <input type="text" class="input" name="alamat" value="<?= $row['alamat']; ?>">
                </div> 

                <div class="inputfield">
                    <label>No Telp</label>
                    <input type="text" class="input" name="no" value="<?= $row['no_telp']; ?>">
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
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $no = $_POST['no'];
    $update = mysqli_query($db, "UPDATE siswa SET nama='$nama',
                                 id_kelas='$kelas', alamat='$alamat', no_telp='$no' 
                                 WHERE siswa.nisn='$nisn'");
        if($update){
            echo "
            <script>
            alert('data berhasil diedit');
            document.location.href = 'datasiswa.php';
            </script>
            ";
        }else{
            echo "<script>alert('Gagal'); </script>";
        }
}?>
</div> 