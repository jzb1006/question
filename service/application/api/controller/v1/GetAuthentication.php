<?php

namespace app\api\controller\v1;

use think\Controller;
use think\Request;

class GetAuthentication extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {

        //生成访问的密钥，需要用户的appid,uid,access_token
        $appid = "15889845442";
        $uid = "12";
        $accesstoken = "e5JWyI3BM4d23lzqmhEF76cnDiZP5s6H";
        $base = $appid.':'.$accesstoken.':'.$uid;
        $opt['authentication'] = $uid." ".base64_encode($base);
        var_dump($opt);
    }

}
