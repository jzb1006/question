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
        $uid = "1";
        $accesstoken = "wruV2axJb3GN72Y0AE6Z3s6qB4mIyHpL";
        $base = $appid.':'.$accesstoken.':'.$uid;
        $opt['authentication'] = $uid." ".base64_encode($base);
        var_dump($opt);
    }

}
