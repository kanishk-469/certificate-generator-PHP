<?php
$name1=$_POST['name'];
$ename=$_POST['email'];
$eventname=$_POST['eventname'];
$date1=$_POST['date'];
$rank1=$_POST['rank'];
$code1=$_POST['code'];
$email= strtolower($ename);

// PHP GD Library used for operations on image (fixing text on images)
header('content-type:image/jpeg');
$font="BRUSHSCI.TTF";
$image=imagecreatefromjpeg("cert_final.jpg");
$color=imagecolorallocate($image,19,21,22);
$code=$code1;
imagettftext($image,22,0,134,138,$color,$font,$code);
$name=$name1;
imagettftext($image,46,0,340,410,$color,$font,$name);
$event=$eventname;
imagettftext($image,35,0,843,461,$color,$font,$event);
$date=$date1;
imagettftext($image,22,0,90,555,$color,"BRUSHSCI.TTF",$date1); // AGENCYR.TTF
$rank=$rank1;
imagettftext($image,30,0,524,505,$color,"BRUSHSCI.TTF",$rank);

$file=time();
$file_path="certificate/".$file.".jpg";
$file_path_pdf="certificate/".$file.".pdf";
imagejpeg($image,$file_path);
imagedestroy($image);

/* convert jpeg to pdf start using fpdf php Library*/

	require('fpdf.php');
	$pdf=new FPDF();
	$pdf->AddPage();
	$pdf->Image($file_path,0,0,210,150);  /* x and y axis and width n height*/
	$pdf->Output($file_path_pdf,"F");
	
/* convert jpeg to pdf end*/


/*mail sending code... smtp ==> PHPMailer library used */
	require 'smtp/PHPMailerAutoload.php';
	$mail=new PHPMailer();
/*	$mail->isSMTP(); */
	$mail->Host='smtp.gmail.com';
	$mail->Port=587;
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	
	$mail->Username="kstechnology@gmail.com";
	$mail->Password="XY_987876545X";
	
	$mail->setFrom("kstechnology@gmail.com");
	$mail->addAddress($email);
	
	$mail->isHTML(true);
	$mail->Subject="Certificate Of Participation";
	$mail->Body="DEMO EVENT ORGANIZED BY DEMO SCHOOL/COLLEGE";
	$mail->addAttachment($file_path_pdf);
	$mail->SMTPOptions=array("ssl"=>array(
		"verify_peer"=>false,
		"verify_peer_name"=>false,
		"allow_self_signed"=>false,
	));
	
	if($mail->send()){
/*	echo "Certificate has been Sent to mail"; */
		header("Location: cert_form.php?msg_email=Certificate has been Sent to mail");
	}else{
		echo $mail->ErrorInfo;
	}

?>