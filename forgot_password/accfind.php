<?php
include '../db_config/connection.php';

$sql = "SELECT * FROM school_mail";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
       $mserver = $row['servername'];
	   $musername = $row['username'];
	   $mpassword = $row['password'];
	   $mport = $ow['port'];
    }
} else {
 
}

$sql = "SELECT * FROM school_info";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $school_name = $row['name'];
	  $school_mail = $row['email'];
    }
} else {
 
}



$user_id = $_POST['username'];
include '../db_config/connection.php';

$sql = "SELECT * FROM user_info where user_id='$user_id' or email='$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
    while($row = $result->fetch_assoc()) {
		$user_fullname = $row['full_name'];
		$regid = $row['user_id'];
		$user_email = $row['email'];
		
$d=date ("d");
$m=date ("m");
$y=date ("Y");
$t=time();
$dmt=$d+$m+$y+$t;    
$ran= rand(0,10000000);
$dmtran= $dmt+$ran;
$un=  uniqid();
$dmtun = $dmt.$un;
$mdun = md5($dmtran.$un);
$sort=substr($mdun, 16);

include '../db_config/connection.php';
$sql = "DELETE FROM tokens WHERE user='$regid'";

if ($conn->query($sql) === TRUE) {

} else {

}


$serverurl = $_SERVER['SERVER_NAME'];
$fullurl = "$serverurl/forgot_password/new_password.php?token=$mdun";

include '../db_config/connection.php';

$sql = "INSERT INTO tokens (token,user)
VALUES ('$mdun', '$regid')";

if ($conn->query($sql) === TRUE) {
  
  
  require '../mail/PHPMailerAutoload.php';
  
$messagetosent = "Hellow! $user_fullname <br>Did you request a new password for your <b>Online Examination System</b> Account ? <br> if yes then click <a href='$fullurl'>Here</a>";

$mail = new PHPMailer;
$mail->isSMTP();                              
$mail->Host = $mserver;
$mail->SMTPAuth = true;                          
$mail->Username = $musername;             
$mail->Password = $mpassword;                       
$mail->SMTPSecure = 'tls';                           
$mail->Port = $mport;                                   

$mail->setFrom($musername, $school_name);
$mail->addAddress($user_email, $user_fullname);     
$mail->addReplyTo($school_mail, 'Reply');
$mail->addCC($school_mail);
$mail->addBCC($school_mail);

$mail->isHTML(true);                                 

$mail->Subject = 'Password Recover';
$mail->Body    = $messagetosent;
$mail->AltBody = 'you need HTML mail to view this content';

if(!$mail->send()) {
   header("location:./?error=Could not send email");
} else {
    header("location:./?message=Open $user_email for more information");
}
  
  
  
} else {
      header("location:./?error=Could not create token");
}

    }
} else {
  header("location:./?error=We could not found email $user_email in our database");
}
$conn->close();

?>