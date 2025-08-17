<?php 
session_start();
if(!isset($_SESSION['admin'])) header("Location: login.php");
include "../koneksi.php";
$id = $_GET['id'];
if(isset($_POST['simpan'])){
    $tanggapan = $_POST['tanggapan'];
    $status = $_POST['status'];
    mysqli_query($conn, "INSERT INTO tanggapan (laporan_id, tanggapan) VALUES ('$id','$tanggapan')");
    mysqli_query($conn, "UPDATE laporan SET status='$status' WHERE id=$id");
    echo "<div class='alert alert-success'>✅ Tanggapan disimpan!</div>";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tanggapi Laporan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
  <h2 class="mb-4">✍️ Tanggapi Laporan #<?php echo $id; ?></h2>
  <form method="POST" class="card p-4 shadow-sm bg-white">
    <div class="mb-3">
      <label class="form-label">Tanggapan</label>
      <textarea name="tanggapan" class="form-control"></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Ubah Status</label>
      <select name="status" class="form-select">
        <option value="baru">Baru</option>
        <option value="diproses">Diproses</option>
        <option value="selesai">Selesai</option>
      </select>
    </div>
    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
  </form>
</div>
</body>
</html>