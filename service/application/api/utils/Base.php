<?php
/**
 * Created by PhpStorm.
 * User: JIANG
 * Date: 2019/3/19
 * Time: 22:10
 */

namespace app\api\utils;


class Base
{
    public static function httpfun($url){
        $res = file_get_contents($url);
        $wxres = json_decode($res,true);
        return $wxres;
    }
}