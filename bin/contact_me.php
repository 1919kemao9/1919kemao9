<?php
// check if fields passed are empty
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
	
// create email body and send it	
$to = 'info@1919kemao9.com'; // PUT YOUR EMAIL ADDRESS HERE
$email_subject = "【ケマオ9%】ホームページよりお問い合わせ"; // EDIT THE EMAIL SUBJECT LINE HERE
$email_body = "ホームページからお問い合わせがありました。\n内容は以下の通りです。\n\n[お名前]:\n $name\n\n[お問い合わせ内容]:\n $message\n\n[Email]:\n $email_address\n\n--------------------------------------------\nケマオ9% / KEMAO COOPERCENT\n\n";
$headers = "From: info@1919kemao9.com\n";
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);
return true;			
?>