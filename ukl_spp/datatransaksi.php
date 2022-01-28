<?php 
include 'koneksi.php';
include 'header.php';
require_once("require.php");
?>
<div class="home">
    <div class="container">
        <div class="card">
            <h3>Transaksi</h3>
    <a class="button-tambah"href="tambah_transaksi.php">Tambah Data</a>
    <table cellspacing="0" border="1" cellpadding="5" class="content-table">
    <thead>    
        <tr>
            <td>No. </td>
            <td>Nama Petugas</td>
            <td>Nama Siswa</td>
            <td>Tgl/Bulan/Tahun dibayar</td>
            <td>Tahun / Nominal harus dibayar</td>
            <td>Jumlah yang dibayar</td>
            <td>Status</td>
            <td>Aksi</td>
        </tr>
    </thead>
<?php
$totalDataHalaman = 5;
$data = mysqli_query($db, "SELECT * FROM pembayaran");
$hitung = mysqli_num_rows($data);
// $totalHalaman = ceil($hitung / $totalDataHalaman);
// $halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
// $dataAwal = ($totalDataHalaman * $halAktif) - $totalDataHalaman;
// Kita panggil tabel pembayaran
// Setelah kita panggil, JOIN tabel yang ter relasi ke tabel pembayaran
$sql = mysqli_query($db, "SELECT * FROM pembayaran
JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas 
JOIN siswa ON pembayaran.nisn = siswa.nisn
JOIN spp ON pembayaran.id_spp = spp.id_spp
ORDER BY tgl_bayar");
$no = 1;
while($r = mysqli_fetch_assoc($sql)){ ?>
    <tbody>   
        <tr>
            <td><?= $no ?></td>
            <td><?= $r['nama_petugas']; ?></td>
            <td><?= $r['nama']; ?></td>
            <td><?= $r['tgl_bayar'] . "/" . $r['bulan_dibayar'] . "/" . $r['tahun_dibayar']; ?></td>
            <td><?= $r['tahun'] . " | Rp. " . $r['nominal']; ?></td>
            <td><?= $r['jumlah_bayar']; ?></td>
            <td>
<?php
// Jika jumlah bayar sesuai dengan yang harus dibayar maka Status LUNAS
if($r['jumlah_bayar'] == $r['nominal']){ ?>
                <font style="color: darkgreen; font-weight: bold;">LUNAS</font>
<?php }else{ ?>                             BELUM LUNAS <?php } ?> </td>
            <td>
    <?php
    // Jika siswa ingin membayar lunas sisa pembayaran
    if($r['jumlah_bayar'] == $r['nominal']){ echo "-";
    }else{ 
    ?>
        <a href="?lunas&id=<?= $r['id_pembayaran']; ?>">BAYAR LUNAS</a>
    <?php } ?>  </td>
            </tr>
        </tbody> 
    <?php $no++; } ?>
        </table>
<!-- Tampilkan tombol halaman -->

<!-- Selesai -->

<?php
// Ada siswa yang ingin membayar sisa pembayaran
if(isset($_GET['lunas'])){
    $id = $_GET['id'];
    $ambilData = mysqli_query($db, "SELECT * FROM pembayaran JOIN spp ON pembayaran.id_spp=spp.id_spp 
                                    WHERE id_pembayaran = '$id'");
    $row = mysqli_fetch_assoc($ambilData);
    $sisa = $row['nominal'] - $row['jumlah_bayar'];
    $hasil = $row['jumlah_bayar'] + $sisa;
    $update = mysqli_query($db, "UPDATE pembayaran SET jumlah_bayar='$hasil' WHERE id_pembayaran='$id'");
    if($update){
        header("location: transaksi.php");
    }
}
?>
        </div>
    </div>
</div>