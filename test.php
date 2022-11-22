<?php
$type = "text";
$message ="ทดสอบ"; 
$messages = $message;
 
if(is_numeric(strrpos($message,"ดี")))
{
  $messages = 1;
}
if(is_numeric(strrpos($message,"ถาม")))
{
  $messages = 2;
}
if(is_numeric(strrpos($message,"ปรึกษา")))
{
  $messages = 2;
}
if($type=="sticker")
{
  $messages = 3;
}
echo $messages;
?>