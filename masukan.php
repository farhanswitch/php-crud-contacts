<?php
include 'koneksi.php';
if (isset($_POST['kirim'])) {
	$nama = $_POST['nama'];
	$jnsKel = $_POST['jnsKel'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$password = $_POST['password'];
	$hobi2 = $_POST['hobi'];
	$semuaHobi = implode(", ", $hobi2);

	$sqlMasukan = "insert into akun (nama,jnsKel,email,mobile,password,hobi) values('$nama','$jnsKel','$email','$mobile','$password','$semuaHobi')";
	$hasil = mysqli_query($koneksi, $sqlMasukan);

	if ($hasil) {
		header('location:daftar.php');
	} else {
		die('Record gagal ditambahkan');
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dikdas 2021</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
	<div class="container my-5">
		<h1 class="text-center">Input Data Peserta</h1>
		<h2 class="text-center text-decoration-underline">DIKDAS 2021</h2>
		<form method="post">
			<div class="form-group mb-3">
				<label class="form-label">Nama</label>
				<input type="text" name="nama" placeholder="Masukkan nama" autocomplete='off' class="form-control">
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 form-label">Jenis Kelamin</label>
				<div class="col-md-4">
					<select name="jnsKel" class="form-select form-control">
						<option selected disabled>Pilih...</option>
						<option value="1">Pria</option>
						<option value="0">Wanita</option>
					</select>
				</div>
			</div>
			<div class="mb-3 form-group">
				<label class="form-label">E-mail</label>
				<input type="email" name="email" placeholder="Masukkan email" autocomplete='off' class="form-control">
			</div>
			<div class="mb-3 form-group">
				<label class="form-label">Mobile</label>
				<input type="tel" name="mobile" autocomplete='off' placeholder="Masukkan nomor hp" class="form-control">
			</div>
			<div class="mb-3 form-group">
				<label class="form-label">Password</label>
				<input type="password" name="password" autocomplete='off' placeholder="Masukkan password" class="form-control">
			</div>
			<fieldset class="row mb-3">
				<legend class="col-form-label col-sm-2 pt-0">Hobi</legend>
				<div class="col-sm-10">
					<div class="form-check">
						<input type="checkbox" name="hobi[]" value="Bermain game" class="form-check-input">
						<label class="form-check-label">Bermain game</label>
					</div>
					<div class="form-check">
						<input type="checkbox" name="hobi[]" value="Menonton film" class="form-check-input">
						<label class="form-check-label">Menonton film</label>
					</div>
					<div class="form-check disabled">
						<input type="checkbox" name="hobi[]" value="Berjalan-jalan" class="form-check-input">
						<label class="form-check-label">Berjalan-jalan</label>
					</div>


				</div>
			</fieldset>
			<button type="submit" class="btn btn-primary" name="kirim">Kirim</button>
		</form>

	</div>
</body>

</html>