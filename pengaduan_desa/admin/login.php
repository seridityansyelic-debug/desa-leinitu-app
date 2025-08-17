<?php 
session_start();
include "../koneksi.php";

if(isset($_POST['login'])){
    $u = $_POST['username'];
    $p = $_POST['password'];
    $q = mysqli_query($conn, "SELECT * FROM admin WHERE username='$u' AND password='$p'");
    if(mysqli_num_rows($q) > 0){
        $_SESSION['admin'] = $u;
        header("Location: dashboard.php");
    } else {
        $error = "❌ Login gagal! Username atau password salah.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card p-4 shadow">
        <h3 class="text-center mb-3">🔐 Login Admin</h3>
        <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
        <form method="POST">
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
          </div>
          <button type="submit" name="login" class="btn btn-dark w-100">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>