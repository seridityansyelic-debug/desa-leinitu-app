<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kirim Pengaduan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
  <h2 class="mb-4">📢 Form Pengaduan</h2>
  <form method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm bg-white">
    <div class="mb-3">
      <label class="form-label">Nama</label>
      <input type="text" name="nama" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">Alamat</label>
      <input type="text" name="alamat" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">Jenis Pengaduan</label>
      <input type="text" name="jenis" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">Kronologi</label>
      <textarea name="kronologi" class="form-control"></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Upload Bukti</label>
      <input type="file" name="bukti" class="form-control">
    </div>
    <button type="submit" name="kirim" class="btn btn-primary">Kirim Pengaduan</button>
  </form>

<?php
if (isset($_POST['kirim'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $jenis = $_POST['jenis'];
    $kronologi = $_POST['kronologi'];

    mysqli_query($conn, "INSERT INTO user (nama, alamat, email) VALUES ('$nama','$alamat','$email')");
    $user_id = mysqli_insert_id($conn);

    $filename = $_FILES['bukti']['name'];
    $tmp = $_FILES['bukti']['tmp_name'];
    move_uploaded_file($tmp, "uploads/".$filename);

    mysqli_query($conn, "INSERT INTO laporan (user_id, jenis, kronologi, bukti, status) 
        VALUES ('$user_id','$jenis','$kronologi','$filename','baru')");

    echo "<div class='alert alert-success mt-3'>✅ Pengaduan berhasil dikirim!</div>";
}
?>
</div>
</body>
</html>