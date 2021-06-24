<?php
require_once "CreateRequest.php";

class Client
{

    public function getResponse($action, $data){

        $ch = curl_init(CreateRequest::getUrl($action));

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
            $data);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);

        curl_close ($ch);
echo $server_output;
        return json_decode($server_output);

    }


}