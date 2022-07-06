<?php
include 'koneksi.php';

$id = $_GET['detailid'];

$sqlTampilRecord = "select * from akun where id = $id";
$hasil = mysqli_query($koneksi,$sqlTampilRecord);
$baris = mysqli_fetch_array($hasil);

$nama = $baris['nama'];
$email = $baris['email'];
$jnsKel = $baris['jnsKel'];
$mobile = $baris['mobile'];
$password = $baris['password'];
$hobi2 = explode(', ',$baris['hobi']);
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
    <h1 class="text-center">Detail Data Peserta</h1>
    <h2 class="text-center text-decoration-underline">DIKDAS 2021</h2>
    <form method="post">
        <div class="row mb-3">
            <label class="col-sm-2 form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" value="<?php echo $nama; ?>" disabled class="form-control">
            </div>

        </div>
        <div class="row mb-3">
            <label class="col-sm-2 form-label">Jenis Kelamin</label>
            <div class="col-sm-10">
                <input type="text" value="<?php echo ($baris['jnsKel']) == '1' ? 'Pria' : 'Wanita'; ?>" disabled class="form-control">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">E-mail</label>
            <div class="col-sm-10">
                <input type="email" value="<?php echo $email; ?>" disabled  class="form-control">
            </div>

        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Mobile</label>
            <div class="col-sm-10">
                <input type="tel" value="<?php echo $mobile;?>" disabled class="form-control">
            </div>

        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" value="<?php echo  $password;?>" disabled class="form-control">
            </div>

        </div>
        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Hobi</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input
                        <?php if (in_array("Bermain game", $hobi2)) echo "checked"; ?>
                        type="checkbox" name="hobi[]" value="Bermain game" class="form-check-input" disabled>
                    <label class="form-check-label">Bermain game</label>
                </div>
                <div class="form-check">
                    <input
                        <?php if (in_array("Menonton film", $hobi2)) echo "checked"; ?>
                        type="checkbox" name="hobi[]" value="Menonton film" class="form-check-input" disabled>
                    <label class="form-check-label">Menonton film</label>
                </div>
                <div class="form-check disabled">
                    <input
                        <?php if (in_array("Berjalan-jalan", $hobi2)) echo "checked"; ?>
                        type="checkbox" name="hobi[]" value="Berjalan-jalan" class="form-check-input" disabled>
                    <label class="form-check-label">Berjalan-jalan</label>
                </div>


            </div>
        </fieldset>
        <button type="submit" class="btn btn-primary" name="perbaiki">
            <a href="daftar.php" class="text-light text-decoration-none">
                Kembali
            </a>
        </button>
    </form>

</div>
</body>

</html>
