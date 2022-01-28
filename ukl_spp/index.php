<?php include 'header.php'; ?>
	<div class="container">
		<div class="panel-body">
	
	<H5></H5>

</div>
</div>
<div class="container">
    <section class="home">
        <div class="panel-body">
	        <h4>Kirim Email kepada Seseorang</h4>
        <form action="" method="post">
	<table class="table">
		<tr>
			<td>Nama Anda</td>
			<td>:</td>
			<td>
				<input type="text" class="form-control" name="namaanda">
			</td>
		</tr>
		<tr>
			<td>Email Anda</td>
			<td>:</td>
			<td>
				<input type="text" class="form-control" name="emailanda">
			</td>
		</tr>
		<tr>
			<td>Nama Penerima</td>
			<td>:</td>
			<td>
				<input type="text" class="form-control" name="nama_penerima">
			</td>
		</tr>
		<tr>
			<td>Email Penerima</td>
			<td>:</td>
			<td>
				<input type="text" class="form-control" name="email_penerima">
			</td>
		</tr>
		<tr>
			<td>Pesan Anda</td>
			<td>:</td>
			<td>
				<input type="text" name="subjek" placeholder="Subjek email">
				<textarea name="Pesan" cols="14" rows="10" class="form-control"></textarea>
			</td>
		</tr>
		<tr>
			<td align="center">
				<div class="col-md4 col-md-offset-4">
				<button class="btn btn-primary btn-block" name="Kirim">KIRIM</button>
			</td>
			
		</tr>
	</table>
</form>
</div>
</div>
</section>
<?php 
if(isset($_POST['Kirim'])){
if(empty($_POST['namaanda'])){
	$_POST['namaanda'];
}
if(empty($_POST['emailanda'])){
	$_POST['emailanda'];
}
if(empty($_POST['nama_penerima'])){
	$_POST['nama_penerima'];
}
if(empty($_POST['email_penerima'])){
	$_POST['email_penerima'];
}

$nama = $_POST['namaanda'];
$Email = $_POST['emailanda'];
$Penerima = $_POST['nama_penerima'];
$email_penerima = $_POST['email_penerima'];
$Pesan = $_POST['Pesan']; 
$header =$_POST['emailanda'];
$subject = $_POST['subjek'];
if(mail($email_penerima, $subjek, $Pesan)){
	echo "
	<Script>
	alert('pesan berhasil terkirim');
	document.location.href ='index.php';
	</Script>
	";
}else{
	echo "
	<Script>
	alert('email gagal dikirimkan, silahkan coba lagi');
	document.location.href ='index.php';
	</Script>
	";
}
}


 ?>
