<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="login-ui/css/util.css">
	<link rel="stylesheet" type="text/css" href="login-ui/css/main.css">
</head>
<?php
include('connection.php');
if(isset($_REQUEST['pwdrst']))
{
  $email = $_REQUEST['email'];
  $check_email = mysqli_query($connection,"select exmne_email,status from examinee_tbl where exmne_email='$email'");
  $res = mysqli_num_rows($check_email);
  $row = $check_email -> fetch_assoc();
  if($res>0)
  {
  	if($row['status']==0){
    $message = '<div>
     <p><b>Hello!</b></p>
     <p>You are recieving this email because we recieved a password creation request for your account.</p>
     <br>
     <p><button class="btn btn-primary"><a href="http://localhost/uquiz/studentmailpass.php?secret='.base64_encode($email).'">Reset Password</a></button></p>
     <br>
     <p>If you did not request a password reset, no further action is required.</p>
    </div>';

include_once("PHPMailer/class.phpmailer.php");
include_once("PHPMailer/class.smtp.php");
$email = $email; 
$mail = new PHPMailer;
$mail->IsSMTP();
$mail->SMTPAuth = true;                 
$mail->SMTPSecure = "tls";      
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587; 
$mail->Username = "quizuwebsite@gmail.com";   //Enter your username/emailid
$mail->Password = "ivptblfistbzwjwc";   //Enter your password
$mail->FromName = "quizuwebsite";
$mail->AddAddress($email);
$mail->Subject = "Reset Password";
$mail->isHTML( TRUE );
$mail->Body =$message;
if($mail->send())
{
  $msg = "We have e-mailed your password creation link!";
}
else
{
  $msg = "We can't find a user with that email address";
}
}
else{
echo "<script>window.location.href='index.php';</script>";
}
}
}
?>
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(login-ui/images/bg-01.jpg);">
					<span class="login100-form-title-1">
				WELCOME TO U-QUIZ
					</span>
				</div>

				<form method="post"  class="login100-form validate-form">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Email</span>
						<input class="input100" name="email" id="email" placeholder="Enter Email" required data-parsley-type="email">
						<span class="focus-input100"></span>
					</div>
					<div class="container-login100-form-btn" align="right">
						<button type="submit" class="login100-form-btn" id="login" name="pwdrst" value="SEND PASSWORD CREATION LINK">
							LOGIN
						</button>
						
					</div>
					<p class="error"><?php if(!empty($msg)){ echo $msg; } ?></p>
				</form>
			</div>
		</div>
	</div></html>