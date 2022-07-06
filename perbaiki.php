<?php
//mengimport file yang berisi konfigurasi untuk melakukan koneksi ke database
include 'koneksi.php';

//mengambil parameter perbaikiid yang ada di URL
$id = $_GET['perbaikiid'];

//query untuk mengambil data dari database berdasarkan id yang ada di parameter di URL
$sqlTampilRecord = "select * from akun where id = $id";

//menyimpan data yang diambil dari database ke variabel hasil
$hasil = mysqli_query($koneksi, $sqlTampilRecord);

//melakukan pengambilan data per-baris dari tabel akun di database
$baris = mysqli_fetch_assoc($hasil);

//memasukkan nilai yang sudah diambil dari database kemudian disimpan di variabel yang sesuai
$nama = $baris['nama'];
$jnsKel = $baris['jnsKel'];
$email = $baris['email'];
$mobile = $baris['mobile'];
$password = $baris['password'];
//mengubah string menjadi array
$hobi2 = explode(', ', $baris['hobi']);

//action yang akan dilakukan saat user submit data baru di form
if (isset($_POST['perbaiki'])) {
	//menyimpan nilai yang didapat dari inputan user ke variabel
	$nama = $_POST['nama'];
	$jnsKel = $_POST['jnsKel'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$password = $_POST['password'];
	$hobi2 = $_POST['hobi'];
	//mengubah array menjadi string
	$semuaHobi = implode(', ', $hobi2);

	//syntax SQL untuk melakukan update atau pembaruan data ke database berdasarkan inputan user
	$sqlPerbaikan = "update akun set id = '$id', nama = '$nama',jnsKel = '$jnsKel', email = '$email', mobile = '$mobile', password = '$password', hobi = '$semuaHobi' where id = '$id'";
	$hasil = mysqli_query($koneksi, $sqlPerbaikan);

	//jika proses update data berhasil, user akan dialihkan ke halaman daftar.php
	if ($hasil) header('location:daftar.php');
	//jika proses update data gagal,maka program akan berhenti dan menampilkan pesan 'Record gagal diperbaiki'
	else die('Record gagal diperbaiki');
}
// }	
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
		<h1 class="text-center">Perbaiki Data Peserta</h1>
		<h2 class="text-center text-decoration-underline">DIKDAS 2021</h2>
		<form method="post">
			<div class="form-group mb-3">
				<label class="form-label">Nama</label>
				<input type="text" name="nama" placeholder="Masukkan nama" autocomplete='off' class="form-control" value="<?php echo $nama; ?>">
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 form-label">Jenis Kelamin</label>
				<div class="col-md-4">
					<select name="jnsKel" class="form-control form-select">
						<option selected disabled><?php echo ($baris['jnsKel'] == '1' ? 'Pria' : 'Wanita'); ?></option>
						<option value="1">Pria</option>
						<option value="0">Wanita</option>
					</select>
				</div>
			</div>
			<div class="mb-3 form-group">
				<label class="form-label">E-mail</label>
				<input type="text" name="email" placeholder="Masukkan email" autocomplete='off' class="form-control" value="<?php echo $email; ?>">
			</div>
			<div class="mb-3 form-group">
				<label class="form-label">Mobile</label>
				<input type="tel" name="mobile" autocomplete='off' placeholder="Masukkan nomor hp" class="form-control" value="<?php echo $mobile ?>">
			</div>
			<div class="mb-3 form-group">
				<label class="form-label">Password</label>
				<input type="password" name="password" autocomplete='off' placeholder="Masukkan password" class="form-control" value="<?php echo $password; ?>">
			</div>
			<fieldset class="row mb-3">
				<legend class="col-form-label col-sm-2 pt-0">Hobi</legend>
				<div class="col-sm-10">
					<div class="form-check">
						<input type="checkbox" name="hobi[]" value="Bermain game" class="form-check-input" <?php if (in_array('Bermain game', $hobi2)) echo 'checked'; ?>>
						<label class="form-check-label">Bermain game</label>
					</div>
					<div class="form-check">
						<input type="checkbox" name="hobi[]" value="Menonton film" class="form-check-input" <?php if (in_array('Menonton film', $hobi2)) echo 'checked'; ?>>
						<label class="form-check-label">Menonton film</label>
					</div>
					<div class="form-check disabled">
						<input type="checkbox" name="hobi[]" value="Berjalan-jalan" class="form-check-input" <?php if (in_array('Berjalan-jalan', $hobi2)) echo 'checked'; ?>>
						<label class="form-check-label">Berjalan-jalan</label>
					</div>


				</div>
			</fieldset>
			<button type="submit" class="btn btn-primary" name="perbaiki">Perbaiki</button>
		</form>

	</div>
</body>

</html>