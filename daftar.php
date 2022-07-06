<?php
include 'koneksi.php';
$sqlDaftar = 'select * from akun';
$hasil = mysqli_query($koneksi, $sqlDaftar);
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
		<h1 class="text-center">Daftar Record Peserta</h1>
		<h2 class="text-center text-decoration-underline">DIKDAS 2021</h2>
		<button class="btn btn-primary my-5">
			<a href="masukan.php" class="text-light text-decoration-none">+ Record</a>
		</button>
		<table class="table">
			<thead>
				<tr>
					<th class="text-center" scope='col'>Identitas</th>
					<th class="text-center" scope='col'>Nama</th>

					<th class="text-center" scope='col'>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if ($hasil) {
					while ($baris = mysqli_fetch_assoc($hasil)) {
						echo "<tr>
				<th scope='row' class='text-center'>" . $baris['id'] . "</th>
				<td class='text-center'> <a title='Klik untuk detail ".$baris['nama']."' href='detail.php?detailid=" . $baris['id'] . "'>".$baris['nama']."</a></td>	
				
				<td class='text-center'>
					<button class='btn btn-secondary'>
						<a href='perbaiki.php?perbaikiid=" . $baris['id'] . "' class='text-light text-decoration-none'>Perbaikan</a>
					</button>
					<button class='btn btn-danger'>
						<a href='hapus.php?hapusid=" . $baris['id'] . "' class='text-light text-decoration-underline'>Hapus</a>
					</button>
				</td>
			</tr>";
					};
				}
				?>
			</tbody>
		</table>
	</div>
</body>

</html>