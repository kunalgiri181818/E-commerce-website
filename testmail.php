<?php
$subject = 'aaa';
$message = 'bbbbbbb';

$headers = "From: Bengal Mart<info@rajtutorialgroup.com>" . "\r\n" .
"Reply-To: info@rajtutorialgroup.com" . "\r\n" .
"X-Mailer: PHP/" . phpversion();
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
if(mail("saptarashi.mailme@gmail.com",$subject,$message,$headers))
{
	echo 'succ';
}
else
{
	echo 'fail';
}
?>