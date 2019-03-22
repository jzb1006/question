<?php
/**
 * Created by PhpStorm.
 * User: JIANG
 * Date: 2019/3/20
 * Time: 10:22
 */

namespace app\api\controller\v1;

use app\api\controller\Send;
use think\App;
use think\Controller;
use app\api\controller\v1\WxBizDataCrypt;
class Wechat extends Controller
{
    use Send;
    public static $loginUrl ;
    function __construct($code)
    {
       $url = config('wx.login_url');
       $url = sprintf($url,config('wx.appid'),config('wx.secret'),$code);
       self::$loginUrl = $url;
    }

    public static function loginWechat($encrypted,$iv){
        $token = curl_get(self::$loginUrl);
        $token = json_decode($token,true);
        if(!$token){
            return self::returnMsg(401,'登陆失败');
        }
        $userInfo = self::dataCrypy(config('wx.appid'),$token['session_key'],$encrypted,$iv);
        $userInfo= object_to_array(json_decode($userInfo));
        $session3rd = getRandChar(16);
        $userInfo['session3rd'] = $session3rd;
        cache($session3rd, config('wx.appid') . $token['session_key'],1*1000*60*5);
        return $userInfo;
    }

    //解密获得用户信息
    private static function dataCrypy($appid,$sessionKey,$encrypted,$iv){
        $pc = new WxBizDataCrypt($appid, $sessionKey);
        $errCode = $pc->decryptData($encrypted, $iv, $data);
        if ($errCode == 0) {
           return $data;
        } else {
            return self::returnMsg($errCode,'获取用户信息失败');
        }
    }

    //
}