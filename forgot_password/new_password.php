<?php
$token = $_GET['token'];

include '../db_config/connection.php';

$sql = "SELECT * FROM tokens where token='$token'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        $current_user = $row['user'];
    }
} else {
 header("location:./?error=Token has expired");
}
?>
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
    <p class="login-box-msg">Please enter your new password</p>

    <form action="reset_pass.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" value="<?php echo"$current_user"; ?>" readonly required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	        <div class="form-group has-feedback">
        <input type="password" name="password1" id="password" class="form-control"  placeholder="Enter new password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
	        <div class="form-group has-feedback">
        <input type="password" name="password2" id="confirm_password" class="form-control" placeholder="Confirm new password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		              						<script>
	var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
      </div>
      <div class="row">
        <div class="col-xs-8">
 
        </div>
        <div class="col-xs-4">
          <button type="submit" name="reset_pass" class="btn btn-primary btn-block btn-flat">Next</button>
        </div>
      </div>
    </form>

   

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
