<?php 
session_start();
if(!isset($_SESSION['admin'])) header("Location: login.php");
include "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
  <h2 class="mb-4">📋 Daftar Laporan Masuk</h2>
  <a href="logout.php" class="btn btn-danger mb-3">Logout</a>
  <table class="table table-bordered table-striped">
    <tr><th>ID</th><th>Jenis</th><th>Kronologi</th><th>Status</th><th>Aksi</th></tr>
<?php
$q = mysqli_query($conn, "SELECT * FROM laporan");
while($d = mysqli_fetch_assoc($q)){
    echo "<tr>
            <td>".$d['id']."</td>
            <td>".$d['jenis']."</td>
            <td>".$d['kronologi']."</td>
            <td>".$d['status']."</td>
            <td><a class='btn btn-sm btn-primary' href='tanggapi.php?id=".$d['id']."'>Tanggapi</a></td>
          </tr>";
}
?>
  </table>
</div>
</body>
</html>