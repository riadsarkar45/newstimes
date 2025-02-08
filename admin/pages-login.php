<?php
session_start();
include('functions/user-controller.php');

$userController = new UserController();

if (isset($_POST['login'])) {
  $userController->setUserEmail($_POST['email']);
  $userController->setUserPassword($_POST['password']);

  $email = $userController->getUserEmail();
  $password = $userController->getUserPassword();

  $checkUserFoundOrNot =  $userController->checkDataExistOrNot('users', 'email', $email);
  if (is_array($checkUserFoundOrNot) && count($checkUserFoundOrNot) > 0) {
    if (md5($_POST['password']) === $checkUserFoundOrNot['password']) {
      $_SESSION['id'] = $checkUserFoundOrNot['id'];
      $_SESSION['username'] = $checkUserFoundOrNot['userName'];
      $_SESSION['email'] = $checkUserFoundOrNot['email'];
      $_SESSION['role'] = $checkUserFoundOrNot['role'];
      header('location: index.php');
      exit();
    } else {
      echo 'Incorrect password.';
    }
  } else {
    echo 'User not found.';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Niche Admin - Powerful Bootstrap 4 Dashboard and Admin Template</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />

  <!-- v4.0.0-alpha.6 -->
  <link rel="stylesheet" href="dist/bootstrap/css/bootstrap.min.css">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/style.css">
  <link rel="stylesheet" href="dist/css/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="dist/css/et-line-font/et-line-font.css">
  <link rel="stylesheet" href="dist/css/themify-icons/themify-icons.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-box-body">
      <h3 class="login-box-msg">Sign In</h3>
      <form action="pages-login.php" method="post">
        <div class="form-group has-feedback">
          <input name="email" type="email" class="form-control sty1" placeholder="User">
        </div>
        <div class="form-group has-feedback">
          <input name="password" type="password" class="form-control sty1" placeholder="Password">
        </div>
        <div>
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox">
                Remember Me </label>
              <a href="pages-recover-password.html" class="pull-right"><i class="fa fa-lock"></i> Forgot pwd?</a>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4 m-t-1">
            <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="m-t-2">Don't have an account? <a href="pages-register.html" class="text-center">Sign Up</a></div>
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery 3 -->
  <script src="dist/js/jquery.min.js"></script>

  <!-- v4.0.0-alpha.6 -->
  <script src="dist/bootstrap/js/bootstrap.min.js"></script>

  <!-- template -->
  <script src="dist/js/niche.js"></script>
</body>

</html>