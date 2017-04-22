<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OES | Password Reset</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="icon" href="../dist/img/icon.png">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="./"><b>OES</b> Version 3.0</a>
	
  </div>
<?php
if(isset($_GET['error'])) {
	$error = $_GET['error'];
	print '<center><b style="color:red;">';
	echo"$error";
	print '</b></center>';
}

if(isset($_GET['message'])) {
	$error = $_GET['message'];
	print '<center><b style="color:green;">';
	echo"$error";
	print '</b></center>';
}
?>
  <div class="login-box-body">
    <p class="login-box-msg">Please enter your email or registration ID</p>

    <form action="accfind.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Email or registration ID" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
 
        </div>
        <div class="col-xs-4">
          <button type="submit" name="reset_pass" class="btn btn-primary btn-block btn-flat">Next</button>
        </div>
      </div>
    </form>

    <a href="../">Sign In</a><br>
   

  </div>
</div>

<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
