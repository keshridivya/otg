<?php
 
 // }
 
 function sendSMS($mobile,$dltId,$header="OTGCRS", $msg = "")
 {
    //  foreach ($mobile as $key => $value) {
    //    $m = $value;
    //  }
    
    //  if(!preg_match("/^[6-9]\d{9}$/",$mobile))
    //    return TRUE;
    if(empty($msg)){
      return FALSE;
    }
     $message  = urlencode($msg);
     $curl = curl_init();
     
     curl_setopt_array($curl, array(
       CURLOPT_URL => "https://api.msg91.com/api/sendhttp.php?mobiles=$mobile&authkey=289820AzrOFJoqOl61d7dbd9P1&route=4&sender=$header&message=$message&country=91&DLT_TE_ID=$dltId",
     
       // https://api.msg91.com/api/sendhttp.php?campaign=&response=&afterminutes=&schtime=&flash=&unicode=&mobiles=Mobile%20no.&authkey=%24authentication_key&route=4&sender=TESTIN&message=Hello!%20This%20is%20a%20test%20message&country=91
       CURLOPT_RETURNTRANSFER => true,
       CURLOPT_ENCODING => "",
       CURLOPT_MAXREDIRS => 10,
       CURLOPT_TIMEOUT => 30,
       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
       CURLOPT_CUSTOMREQUEST => "GET",
       CURLOPT_SSL_VERIFYHOST => 0,
       CURLOPT_SSL_VERIFYPEER => 0,
     ));
     
     $response = curl_exec($curl);
     $err = curl_error($curl);
     
     curl_close($curl);
     
     if ($err)
       return FALSE;
     return TRUE;
 }
 
 ?>