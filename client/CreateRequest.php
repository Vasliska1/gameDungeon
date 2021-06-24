<?php


class CreateRequest
{


    public function getUrl($action)
    {
        return $url = "http://localhost:80/testVkontakte/server/api/api.php?action=" . $action;

    }

}