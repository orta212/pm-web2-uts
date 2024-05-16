<?php
require 'const.php';

$sql = "SELECT * FROM orta";
$result = mysqli_query($conn, $sql);
$rows = [];
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_object($result)) $rows[] = $row;
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Data Mahasiswa</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <h1>Data Mahasiswa</h1>
  <a href="create.php">Tambah Data Mahasiswa</a>
  <table border="1" >
    <tr>
      <th>No.</th>
      <th>NIM</th>
      <th>Nama</th>
      <th>Tanggal Lahir</th>
      <th>Tempat Lahir</th>
      <th>Alamat</th>
      <th>Email</th>
      <th>No Telepon</th>
      <th>Agama</th>
      <th>Jenis Kelamin</th>
      <th>Jurusan</th>
      <th>Foto</th>
      <th>Aksi</th>
    </tr>
    <?php $no = 1;foreach ($rows as $mhs) : ?>
      <tr>
        <td><?= $no++;?></td>
        <td><?= $mhs->nim; ?></td>
        <td><?= $mhs->nama; ?></td>
        <td><?= $mhs->tgl_lahir; ?></td>
        <td><?= $mhs->tempat_lahir; ?></td>
        <td><?= $mhs->alamat; ?></td>
        <td><?= $mhs->email; ?></td>
        <td><?= $mhs->no_telp; ?></td>
        <td><?= $mhs->agama; ?></td>
        <td><?= $mhs->jenis_kelamin; ?></td>
        <td><?= $mhs->jurusan; ?></td>
        <!-- <td></td> -->
        <td><img src='uploads/<?= $mhs->foto; ?>' width='50' height='50'></td>
        <td>
          <a href='edit.php?id=<?= $mhs->id; ?>'>Edit</a> |
          <a href='delete.php?id=<?= $mhs->id; ?>' onclick='return confirm("Are you sure?")'>Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>