<?php
require 'const.php';
if (isset($_POST['submit'])) {
  // var_dump($_POST);
  // var_dump($_FILES);
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
  $ekstensi = explode('.', $_FILES["foto"]["name"]);
  $foto = time() . '.' . end($ekstensi);

  $target_dir = "uploads/";
  $target_file = $target_dir . $foto;
  move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);

  $sql = "INSERT INTO orta
            VALUES ('', '$nim', '$nama', '$tanggal_lahir', '$tempat_lahir', '$alamat', '$email', '$notelfon', '$agama', '$jenis_kelamin', '$jurusan', '$foto')";
  $result = mysqli_query($conn, $sql);
  // var_dump($result);
  // var_dump(mysqli_affected_rows($conn));
  if (mysqli_affected_rows($conn) > 0) {
    echo "Data Berhasil ditambah!";
    // header('Location: index.php');
  } else {
    echo "Data Gagal ditambah!";
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Tambah Data Mahasiswa</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <h1>Tambah Data Mahasiswa</h1>
  <form action="" method="post" enctype="multipart/form-data">
    <label for="nim">NIM:</label><br>
    <input required type="number" id="nim" name="nim"><br>
    <label for="nama">Nama:</label><br>
    <input required type="text" id="nama" name="nama"><br>
    <label for="tanggal_lahir">Tanggal Lahir:</label><br>
    <input required type="date" id="tanggal_lahir" name="tanggal_lahir"><br>
    <label for="tempat_lahir">Tempat Lahir:</label><br>
    <textarea required id="tempat_lahir" name="tempat_lahir"></textarea><br>
    <label for="alamat">Alamat:</label><br>
    <input required type="text" id="alamat" name="alamat"><br>
    <label for="email">Email:</label><br>
    <input required type="email" id="email" name="email"><br>
    <label for="notelfon">No Telepon:</label><br>
    <input required type="text" id="notelfon" name="notelfon"><br>
    <label for="agama">Agama:</label><br>
    <input required type="text" id="agama" name="agama"><br>
    <label for="jenis_kelamin">Jenis Kelamin:</label><br>
    <select id="jenis_kelamin" name="jenis_kelamin">
      <option value="Laki-laki">Laki-laki</option>
      <option value="Perempuan">Perempuan</option>
    </select><br>
    <label for="jurusan">Jurusan:</label><br>
    <input required type="text" id="jurusan" name="jurusan"><br>
    <label for="foto">Foto:</label><br>
    <input required type="file" id="foto" name="foto"><br><br>
    <button type="submit" name="submit">Kirim</button>
  </form>
  <a href="index.php">Kembali</a>
</body>

</html>