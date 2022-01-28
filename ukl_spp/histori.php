<?php
include 'koneksi.php';
include 'header.php';
?>
<div class="home">
    <div class="container">
        <div class="card">
            <h3>History Pembayaran Siswa</h3>
        <div class="wrapper">
            <div class="form">
                <div class="inputfield">
                    <form action="" method="POST" autocomplete="off">
                    <label>Cari siswa</label>
                    <input class="input" type="text" name="nisn" placeholder="Cari berdasarkan NISN" autofocus>
                    <button class="button-tambah" type="submit" name="cari">Cari</button>
                    </form>
                </div>
            </div>
        </div>
            
            <!-- <form action="" method="POST" autocomplete="off">
             <input class="inputfield" type="text" name="nisn" placeholder="Cari berdasarkan NISN" autofocus>
                <button class="button-tambah" type="submit" name="cari">Cari</button>
            </form> -->

<?php
// Kita lakukan proses pencariannya disini
if(isset($_POST['cari'])){
    $nisn = $_POST['nisn'];
    // Kita panggil table siswa
    $biodataSiswa = mysqli_query($db, "SELECT * FROM siswa 
                    JOIN kelas ON siswa.id_kelas=kelas.id_kelas 
                    WHERE nisn='$nisn'");
    // Table pembayaran wajib kita panggil
    $historyPembayaran = mysqli_query($db, "SELECT * FROM pembayaran
                         JOIN petugas ON pembayaran.id_petugas=petugas.id_petugas
                         JOIN spp ON pembayaran.id_spp=spp.id_spp
                         WHERE nisn='$nisn'
                         ORDER BY tgl_bayar");
    $r_siswa = mysqli_fetch_assoc($biodataSiswa);
?>
    <hr />
    <!-- Kita tampilkan Biodata Siswa -->
        <h3>Biodata Siswa</h3>
        <table cellpadding="5" class="content-table">
            <tr>
                <td>NISN</td>
                <td>:</td>
                <td><?= $r_siswa['nisn']; ?></td>
            </tr>
            <tr>
                <td>NIS</td>
                <td>:</td>
                <td><?= $r_siswa['nis']; ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?= $r_siswa['nama']; ?></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td><?= $r_siswa['nama_kelas'] . " | " . $r_siswa['kompetensi_keahlian']; ?></td>
            </tr>
        </table>
        <hr />
        <!-- Sekarang kita tampilkan history pembayarannya -->
        <table cellpadding="5" cellspacing="0" border="1" class="content-table">
        <thead>
            <tr>
                <td>No. </td>
                <td>Tanggal Pembayaran</td>
                <td>Pembayaran Melalui</td>
                <td>Tahun SPP | Nominal yang harus dibayar</td>
                <td>Jumlah yang sudah dibayar</td>
                <td>Status</td>
                <td>Aksi</td>
            </tr>
        </thead>    
            
<?php 
$no=1;
while($r_trx = mysqli_fetch_assoc($historyPembayaran)){ ?>
        <tbody>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $r_trx['tgl_bayar'] . " " . $r_trx['bulan_dibayar'] . " " .
                        $r_trx['tahun_dibayar']; ?></td>
                <td><?= $r_trx['nama_petugas']; ?></td>
                <td><?= $r_trx['tahun'] . " | Rp. " . $r_trx['nominal']; ?></td>
                <td><?= "Rp. " . $r_trx['jumlah_bayar']; ?></td>
               
               <?php
                if($r_trx['jumlah_bayar'] == $r_trx['nominal']){ ?>
                                <td><font style="color: darkgreen; font-weight: bold;">LUNAS</font></td>
                                <td>-</td>
                <?php }else{ ?> <td>BELUM LUNAS</td>
                                <td><a href="transaksi.php?lunas&id=<?= $r_trx['id_pembayaran']; ?>">
                                BAYAR LUNAS</a></td>
                <?php } ?>
            </tr>
        </tbody> 
            
<?php $no++; }?>
        </table>
<?php } ?>
        </div>
    </div>
</div>
	