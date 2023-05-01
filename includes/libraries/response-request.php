
 

<?php

function responseRequest($code, $message, $finishConnection = false,$data = []) 
    {
      http_response_code($code);
      echo json_encode(["status" => $code, "message" => $message,"data"=> (object) $data]);
      if($finishConnection)
        die();
    }