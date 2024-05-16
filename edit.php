<?php
require 'const.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM orta WHERE id='$id'";
  $result = mysqli_query($conn, $sql);
  $data = mysqli_fetch_object($result);
}

if (isset($_POST['submit'])) {
  $id= $_POST['id'];
  $nim = $_POST['nim'];
  $nama = $_POST['nama'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $alamat = $_POST['alamat'];
  $email = $_POST['email'];
  $notelfon = $_POST['notelfon'];
  $agama = $_POST['agama'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $jurusan = $_POST['jurusan'];


  if ($_FILES['foto']['name'] != "") {
    $ekstensi = explode('.', $_FILES["foto"]["name"]);
    $foto = time() . '.' . end($ekstensi);

    $target_dir = "uploads/";
    $target_file = $target_dir . $foto;
    move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
    $sql = "UPDATE orta SET 
                nama='$nama', tgl_lahir='$tanggal_lahir', tempat_lahir='$tempat_lahir', alamat='$alamat', email='$email', no_telp='$notelfon', agama='$agama', jenis_kelamin='$jenis_kelamin', jurusan='$jurusan', foto='$foto' 
                WHERE id='$id'";
  } else {
    $sql = "UPDATE orta SET 
                nama='$nama', tgl_lahir='$tanggal_lahir', tempat_lahir='$tempat_lahir', alamat='$alamat', email='$email', no_telp='$notelfon', agama='$agama', jenis_kelamin='$jenis_kelamin', jurusan='$jurusan' 
                WHERE id='$id'";
  }
  $result = mysqli_query($conn, $sql);
  if (mysqli_affected_rows($conn) > 0) {
    echo "Data Berhasil diubah!";
    header('Location: index.php');
  } else {
    echo "Data Gagal diubah!";
  }
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Edit Data Mahasiswa</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <h1>Edit Data Mahasiswa</h1>
  <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $data->id; ?>">
    <input type="readonly" id="nim" name="nim" value="<?= $data->nim; ?>"><br>
    <label for="nama">Nama:</label><br>
    <input type="text" id="nama" name="nama" value="<?= $data->nama; ?>"><br>
    <label for="tanggal_lahir">Tanggal Lahir:</label><br>
    <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?= $data->tgl_lahir; ?>"><br>
    <label for="tempat_lahir">Tempat Lahir:</label><br>
    <input type="text" id="tempat_lahir" name="tempat_lahir" value="<?= $data->tempat_lahir; ?>"><br>
    <label for="alamat">Alamat:</label><br>
    <input type="text" id="alamat" name="alamat" value="<?= $data->alamat; ?>"><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" value="<?= $data->email; ?>"><br>
    <label for="notelfon">No Telepon:</label><br>
    <input type="text" id="notelfon" name="notelfon" value="<?= $data->no_telp; ?>"><br>
    <label for="agama">Agama:</label><br>
    <input type="text" id="agama" name="agama" value="<?= $data->agama; ?>"><br>
    <label for="jenis_kelamin">Jenis Kelamin:</label><br>
    <select id="jenis_kelamin" name="jenis_kelamin">
      <option value="Laki-laki" <?php if ($data->jenis_kelamin == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
      <option value="Perempuan" <?php if ($data->jenis_kelamin == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
    </select><br>
    <label for="jurusan">Jurusan:</label><br>
    <input type="text" id="jurusan" name="jurusan" value="<?= $data->jurusan; ?>"><br>
    <label for="foto">Foto:</label><br>
    <input type="file" id="foto" name="foto"><br><br>
    <button type="submit" name="submit">Ubah Data!</button>
  </form>
  <a href="index.php">Kembali</a>
</body>

</html>