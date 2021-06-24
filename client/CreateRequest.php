<?php


class CreateRequest
{


    public function getUrl($action)
    {
        return $url = "http://localhost/testVkontakte/server/api/api.php?action=" . $action;

    }

    public function getBody($array){
        $str ='';

        foreach ($array as $key => $value){
           $str =  $str.$key.'='.$value.'&';
        }

        return $str;
    }

}