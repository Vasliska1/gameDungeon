<?php


class CreateRequest
{


    public function getUrl($action)
    {
        return $url = "http://localhost/testVkontakte/server/api/api.php?action=" . $action;

    }

}