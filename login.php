<?php
session_start();
if (isset($_SESSION['username'])) {
  header('Location: dashboard.php');
}
?>
<?php include 'templates/header.php' ?>

<title>BMS - Login</title>
<!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="css/custom_login.css">
<!-- bootstrap icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container-fluid">
      <div class="card py-5 px-4" style="width: 460px;">
        <?php if (isset($_SESSION['message'])): ?>
          <div class="alert alert-<?= $_SESSION['success'] ?> alert-dismissible fade show" role="alert">
           <?=$_SESSION['message']?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
        <h3 class="h2 text-primary text-center">Welcome Back!</h3>
        <p class="text-center text-secondary">Sign in to your account to continue</p>
        <form method="post" action="model/LoginModel.php">
          <div class="mb-3">
            <label class="form-label mb-0 text-gray-800">Username<sup class="text-danger fw-bolder">*</sup></label>
            <div class="input-container d-flex align-items-center border rounded">
               <div class="bg-gray-100 py-1 px-3"><i class="bi bi-person fs-5"></i></div>
               <input type="text" class="py-1 px-2 border-0 w-100" name="username" placeholder="Enter username" required>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label mb-0 text-gray-800">Password<sup class="text-danger fw-bolder">*</sup></label>
            <div class="input-container d-flex align-items-center border rounded">
              <div class="bg-gray-100 py-1 px-3"><i class="bi bi-lock fs-5"></i></div>
              <input type="password" class="py-1 px-2 border-0 w-100" name="password" placeholder="Enter password" required>
            </div>
          </div>
          <div class="form-action mb-3">
            <button type="submit" name="login_btn" class="w-100 btn btn-primary btn-rounded btn-login">Sign In</button>
          </div>
        </form>
      </div>
    </div>
</body>
</html>
