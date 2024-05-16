<?php
require 'const.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "DELETE FROM orta WHERE id='$id'";
  mysqli_query($conn, $sql);
  if (mysqli_affected_rows($conn) > 0) {
    header("Location: index.php");
  } else {
    echo "Data Berhasil Dihapus";
  }
}
