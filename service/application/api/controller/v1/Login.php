<?php
/**
 * Created by PhpStorm.
 * User: JIANG
 * Date: 2019/3/22
 * Time: 16:33
 */

namespace app\api\controller\v1;
use app\api\controller\PublicApi;

use think\facade\Cache;
use think\Request;

class Login extends PublicApi
{

//    public static function checkLogin(Request $request){
//        $session = $request->header('3rd-session');
//        if(!$session){
//            return self::returnMsg(401,'用户没有登陆');
//        }
//        $appid = Cache::get($session);
//        if($appid){
//            return $appid;
//        }
//          return self::returnMsg(401,'用户没有登陆');
//    }
}