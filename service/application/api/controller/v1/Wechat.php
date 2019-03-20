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

    public static function loginWechat(){
        $token = curl_get(self::$loginUrl);
        $token = json_decode($token,true);
        if(!$token){
            return self::returnMsg(401,'登陆失败');
        }
        return $token;
    }
}