<?php

namespace app\api\controller\v1;

use think\Controller;
use think\Request;
use app\api\controller\Send;
class GetAuthentication extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    use Send;

    public function index(Request $request)
    {
        //生成访问的密钥，需要用户的appid,uid,access_token
        //参数验证
        $validate = new \app\api\validate\GetAuthentication;
        if(!$validate->check(input(''))){
            return self::returnMsg(401,$validate->getError());
        }
        $appid =$request->post('appid');
        $uid = $request->post('uid');
        $accesstoken = $request->post('accesstoken');
        $base = $appid.':'.$accesstoken.':'.$uid;
        $opt['authentication'] = $uid." ".base64_encode($base);
        self::returnMsg(200,'success',['authentication'=>$opt['authentication']]);
    }

}
