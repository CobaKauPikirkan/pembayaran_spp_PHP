<?php
include 'koneksi.php';
include 'header.php';
require_once("require.php");
$id = $_GET['id'];
$spp = mysqli_query($db, "SELECT * FROM spp WHERE id_spp='$id'");
?>
<div class="wrapper">
    <div class="tittle">
        <h3>Edit data siswa</h3>
    </div>
<?php
while($row = mysqli_fetch_assoc($spp)){?>

       <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $row['id_spp']; ?>">
            <div class="form">

                <div class="inputfield">
                    <label>Tahun</label>
                    <input type="text" class="input" name="tahun" value="<?= $row['tahun']; ?>">
                </div> 
            
                <div class="inputfield">
                    <label>Nominal</label>
                    <input type="text" class="input" name="nominal" value="<?= $row['nominal']; ?>">
                </div> 

                <div class="inputfield">
                    <input type="submit" name="simpan" value="ubah" class="btn">
                </div>
            </div> 
    </form>
<?php } ?>
</div>

<?php
// Proses update
if(isset($_POST['simpan'])){
    $id = $_POST['id'];
    $tahun = $_POST['tahun'];
    $nominal = $_POST['nominal'];
    $update = mysqli_query($db, "UPDATE spp SET tahun='$tahun', nominal='$nominal'
                                 WHERE spp.id_spp='$id'");
        if($update){
            header("location: spp.php");
        }else{
            echo "<script>alert('Gagal'); </script>";
        }
}
?>