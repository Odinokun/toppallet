<?php

$email_to       = "avpallet@gmail.com";
//$email_to_2     = "avpallet@gmail.com";
$email_from     = "avpallet@gmail.com";
$email_subject  = "Заказ обратного звонка с сайта toppallet.com.ua";
$date = new DateTime('now', new DateTimeZone('Europe/Kiev') );

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['mail'];
$message = $_POST['message'];

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}


function clean_string($string) {
  $bad = array("content-type","bcc:","to:","cc:","href");
  return str_replace($bad,"",$string);
}

$email_message = "Заказ обратного звонка с сайта toppallet.com.ua:\n\n";
$email_message .= "Имя: ".clean_string($name)."\n";
$email_message .= "Телефон: ".clean_string($phone)."\n";
$email_message .= "----------------------------\n\n";
$email_message .= "IP: ".clean_string($ip)."\n";
$email_message .= "Дата: ".$date->format('Y-m-d H:i:s')."\n";

$headers = 'From: '.$name."\r\n";
$headers .= 'Reply-To: '.$email."\r\n";
//$headers .= 'Reply-To: '.$email_from."\r\n";

$headers .= 'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
//@mail($email_to_2, $email_subject, $email_message, $headers);

// Save to file
$file = 'data.txt';
$current = file_get_contents($file);
$current .= $name.';'.$phone.';'.$email.';'.$date->format('Y-m-d H:i:s').';'.PHP_EOL;
file_put_contents($file, $current);