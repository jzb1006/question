<?php
/**
 * Created by PhpStorm.
 * User: JIANG
 * Date: 2019/3/20
 * Time: 15:12
 */

namespace app\api\validate;


use think\Validate;

class GetAuthentication extends Validate
{
    protected $rule = [
        'appid'       =>  'require',
        'uid'      =>  'require',
        'accesstoken'      =>  'require',
    ];
    protected $message  =   [
        'appid.require'    => 'appid不能为空',
        'uid.mobile'    => 'uid不能为空',
        'accesstoken.require'    => 'accesstoken不能为空',
    ];

}