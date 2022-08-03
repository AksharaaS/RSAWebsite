<?php 

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Content-Type");

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['number'])) {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email']; 
	$number = $_POST['number']; 
	$subject = "has sent an enquiry";
	$company_website = $_POST['company_website'];
	$company_size = $_POST['company_size'];
	$message = $_POST['message'];
	

	require_once "PHPMailer/PHPMailer.php";
	require_once "PHPMailer/SMTP.php";
	require_once "PHPMailer/Exception.php";

	$mail= new PHPMailer(true);

	$mail->isSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPAuth = true;
	$mail->Username = "info@rsalesarm.com";
	$mail->Password = "Subbu12345^";
	$mail->Port=465;
	$mail->SMTPSecure="ssl";

	// email settings
	$mail->isHTML(true);
	$mail->setFrom($email,$name);
	$mail->setAddress("info@rsalesarm.com");
	$mail->Subject = ($email ($subject));
	$mail->Body= $fname;

	if ($mail->send()) {

		$status="success";
		$response = "Email is sent!";
	}
	else {
		$status="failed";
		$response = "Something is wrong: <br>" . $mail->ErrorInfo;
	}
	exit(json_encode(array("status"=>$status, "response"=>$response)));

}



?>
