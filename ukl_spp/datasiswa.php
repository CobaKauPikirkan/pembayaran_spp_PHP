<?php 
include 'koneksi.php';
include 'header.php';
require_once("require.php");
?>
<div class="home">
    <div class="container">
        <div class="card">
    <br>
    <h3>Data Siswa</h3>
    <a href="tambahSW.php" class="button-tambah">Tambah Data</a>
    <table cellspacing="0" border="1" cellpadding="5" class="content-table">
    <thead>
        <tr>
            <td>No. </td>
            <td>NISN</td>
            <td>NIS</td>
            <td>Nama Siswa</td>
            <td>Kelas</td>
            <td>Alamat</td>
            <td>No. Telp</td>
            <td>Aksi</td>
        </tr>
    </thead>
<?php
// Kita Konfigurasi Pagging disini
        // $totalDataHalaman = 5;
        $data = mysqli_query($db, "SELECT * FROM siswa");
        $hitung = mysqli_num_rows($data);
        // $totalHalaman = ceil($hitung / $totalDataHalaman);
        // $halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
        // $dataAwal = ($totalDataHalaman * $halAktif) - $totalDataHalaman;
// Konfigurasi Selesai
// Kita panggil tabel siswa
// Setelah kita panggil, JOIN tabel yang ter relasi ke tabel siswa
        $sql = mysqli_query($db, "SELECT * FROM siswa
        JOIN kelas ON siswa.id_kelas = kelas.id_kelas
        ORDER BY nama");
        $no = 1;
        while($r = mysqli_fetch_assoc($sql)){ ?>
        <tbody>
        <tr>
            <td><?= $no ?></td>
            <td><?= $r['nisn']; ?></td>
            <td><?= $r['nis']; ?></td>
            <td><?= $r['nama']; ?></td>
            <td><?= $r['nama_kelas'] . " | " . $r['kompetensi_keahlian']; ?></td>
            <td><?= $r['alamat']; ?></td>
            <td><?= $r['no_telp']; ?></td>
            <td><a href="?hapus&nisn=<?= $r['nisn']; ?>" class="button_hapus" >Hapus</a> | 
                <a href="edit_siswa.php?nisn=<?= $r['nisn']; ?>" class="button_edit">Edit</a</td>
        </tr>
        </tbody>
<?php $no++; } ?>
    </table>
    
<!-- Tampilkan tombol halaman -->
<!-- <?php for($i=1; $i <= $totalHalaman; $i++): ?>
        <a href="?hal=<?= $i; ?>"><?= $i; ?></a>
<?php endfor; ?> -->
<!-- Selesai -->

<?php
// Tombol Hapus ditekan
if(isset($_GET['hapus'])){
    $nisn = $_GET['nisn'];
    $hapus = mysqli_query($db, "DELETE FROM siswa WHERE nisn='$nisn'");
    if($hapus){
        echo "
            <script>
            alert('data berhasil diedit');
            document.location.href = 'datasiswa.php';
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