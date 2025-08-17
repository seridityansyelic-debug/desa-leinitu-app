<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Status Laporan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
  <h2 class="mb-4">🔎 Cek Status Pengaduan</h2>
  <form method="GET" class="mb-4">
    <div class="input-group">
      <input type="email" name="email" class="form-control" placeholder="Masukkan email Anda">
      <button class="btn btn-success" type="submit">Cek</button>
    </div>
  </form>
<?php
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $q = mysqli_query($conn, "SELECT l.id, l.jenis, l.status 
                              FROM laporan l JOIN user u ON l.user_id=u.id 
                              WHERE u.email='$email'");
    if (mysqli_num_rows($q) > 0) {
        echo "<table class='table table-bordered'><tr><th>ID</th><th>Jenis</th><th>Status</th></tr>";
        while($d = mysqli_fetch_assoc($q)){
            echo "<tr>
                    <td>".$d['id']."</td>
                    <td>".$d['jenis']."</td>
                    <td><span class='badge bg-".($d['status']=='selesai'?'success':($d['status']=='diproses'?'warning':'secondary'))."'>".$d['status']."</span></td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<div class='alert alert-danger'>❌ Tidak ada laporan dengan email tersebut.</div>";
    }
}
?>
</div>
</body>
</html>