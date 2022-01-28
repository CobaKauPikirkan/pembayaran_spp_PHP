<?php 
include 'koneksi.php';
include 'header.php';
require_once("require.php");
?>
<div class="home">
    <div class="container">
        <div class="card">
            <br>
            <h3> Data Kelas</h3>
    
    <table cellspacing="0" border="1" cellpadding="5" class="content-table">
    <thead>
            <tr>
            <td>No. </td>
            <td>Nama Kelas</td>
            <td>Kompetensi Keahlian</td>
            <td>Aksi</td>
        </tr>
    </thead>  
        
<?php
// Kita Konfigurasi Pagging disini
// $totalDataHalaman = 5;
$data = mysqli_query($db, "SELECT * FROM kelas");
$hitung = mysqli_num_rows($data);
// $totalHalaman = ceil($hitung / $totalDataHalaman);
// $halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
// $dataAwal = ($totalDataHalaman * $halAktif) - $totalDataHalaman;
// Konfigurasi Selesai
// Kita panggil tabel kelas
$sql = mysqli_query($db, "SELECT * FROM kelas ORDER BY nama_kelas ");
$no = 1;
while($r = mysqli_fetch_assoc($sql)){ ?>
        <tbody>
            <tr>
            <td><?= $no ?></td>
            <td><?= $r['nama_kelas']; ?></td>
            <td><?= $r['kompetensi_keahlian']; ?></t0 d>
            <td><a href="?hapus&id=<?= $r['id_kelas']; ?>" class="button_hapus" >Hapus</a> | 
                <a href="edit_kelas.php?id=<?= $r['id_kelas']; ?>" class="button_edit">Edit</a</td>
        </tr>
        </tbody>
        
<?php $no++; } ?>
    </table>
    <a href="tambah_kelas.php" class="button-tambah">Tambah Data</a>
<!-- Tampilkan tombol halaman -->


<?php
// Tombol Hapus ditekan
if(isset($_GET['hapus'])){
    $id = $_GET['id'];
    $hapus = mysqli_query($db, "DELETE FROM kelas WHERE id_kelas='$id'");
    if($hapus){
        echo "
            <script>
            alert('data berhasil dihapus');
            document.location.href = 'datakelas.php';
            </script>
            ";
    }else{
        echo "<script>alert('Maaf, data tersebut masih terhubung dengan data yang lain');
        </script>";
    }
}
?>
        </div>
    </div>
</div>