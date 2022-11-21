<?php

   $accessToken = "qsIHlxHZwhrj9X7npIZ8BEfF88b8L84RT/RDuksoN8zOIonvVSiLuTGZmIyXNkkgCw+dUxzV+gd10o/WMvi+iU+PVYiO6pnFZur2IB4sfBjK2Qcavaq6SFmctcGwJATU9gJdiVLy37uCsVxyLlwNNgdB04t89/1O/w1cDnyilFU=";//copy ข้อความ Channel access token ตอนที่ตั้งค่า
   $content = file_get_contents('php://input');
   $arrayJson = json_decode($content, true);
   $arrayHeader = array();
   $arrayHeader[] = "Content-Type: application/json";
   $arrayHeader[] = "Authorization: Bearer {$accessToken}";
   //รับข้อความจากผู้ใช้
   $message = $arrayJson['events'][0]['message']['text'];
   //รับ id ของผู้ใช้
   $idu = $arrayJson['events'][0]['source']['userId'];
 $id = "bd9bd64d3965bf17a74f87ffa168e4b0";
   #ตัวอย่าง Message Type "Text + Sticker"


  // if($message == "test"){
  //      $arrayPostData['to'] = $idu;
  //     $arrayPostData['messages'][0]['type'] = "text";
  //     $arrayPostData['messages'][0]['text'] = " -- ทดสอบระบบ -- : uid :". $idu;
  //     /*$arrayPostData['messages'][1]['type'] = "sticker";
  //     $arrayPostData['messages'][1]['packageId'] = "2";
  //     $arrayPostData['messages'][1]['stickerId'] = "34"; */
  //     pushMsg($arrayHeader,$arrayPostData);
  //  }
  $messages = $message;
if(strpos($message,"ดี"))
{
  $messages = "ดี";
}
if(strpos($message,"ถาม"))
{
  $messages = "ถาม";
}
if(strpos($message,"ปรึกษา"))
{
  $messages = "ถาม";
}
   switch ($messages) {
    case 'test':
      $arrayPostData['to'] = $idu;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = " -- ทดสอบระบบ -- : uid :". $idu;
      /*$arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "34"; */
      pushMsg($arrayHeader,$arrayPostData);

      break;
       case "ดี":
      $arrayPostData['to'] = $idu;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = " สวัสดีครับ ผมระบบตอบโต้อัตโนมัติ " ;
      /*$arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "34"; */
      pushMsg($arrayHeader,$arrayPostData);

      break;
      case "ถาม":
        $arrayPostData['to'] = $idu;
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "ระบบตอบโต้..อัตโนมัติ  สงสัยอะไรสอบถามมาได้เลยครับ เดี๋ยวมาตอบครับให้เร็วที่สุดครับ " ;
        /*$arrayPostData['messages'][1]['type'] = "sticker";
        $arrayPostData['messages'][1]['packageId'] = "2";
        $arrayPostData['messages'][1]['stickerId'] = "34"; */
        pushMsg($arrayHeader,$arrayPostData);
  
        break;
    default:
    
    $arrayPostData['to'] = $idu;
    $arrayPostData['messages'][0]['type'] = "text";
    $arrayPostData['messages'][0]['text'] = "สวัสดี ขอขอบคุณที่ติดต่อเรา ตอนนี้ผู้ดูแลไม่อยู่นะครับ ผู้ที่ตอบคือระบบตอบโต้..อัตโนมัติ เดี๋ยวมาตอบครับให้เร็วที่สุดครับ";
    /*$arrayPostData['messages'][1]['type'] = "sticker";
    $arrayPostData['messages'][1]['packageId'] = "2";
    $arrayPostData['messages'][1]['stickerId'] = "34"; */
    pushMsg($arrayHeader,$arrayPostData);

      break;
   }
  
   $arrayPostData['to'] = "U1cb2ab4f8755c78cdee903db3a79f548";
   $arrayPostData['messages'][0]['type'] = "text";
   $arrayPostData['messages'][0]['text'] = " ข้อความ >:" . $message ;
   /*$arrayPostData['messages'][1]['type'] = "sticker";
   $arrayPostData['messages'][1]['packageId'] = "2";
   $arrayPostData['messages'][1]['stickerId'] = "34"; */
   pushMsg($arrayHeader,$arrayPostData);

  //    if($message == "ขอid"){
  //     //  $arrayPostData['to'] = $idu;
  //     // $arrayPostData['messages'][0]['type'] = "text";
  //     // $arrayPostData['messages'][0]['text'] = "idของคุณคือ ...";
  //     //   $arrayPostData['messages'][1]['type'] = "text";
  //     // $arrayPostData['messages'][1]['text'] =  $idu;

  //     // pushMsg($arrayHeader,$arrayPostData);
  //  }

   function pushMsg($arrayHeader,$arrayPostData){
      $strUrl = "https://api.line.me/v2/bot/message/push";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$strUrl);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $result = curl_exec($ch);
      curl_close ($ch);
   }
   exit;
?>
