<?php
namespace app\api\validate;

use think\Validate;
/**
 * 生成token参数验证器
 */
class User extends Validate
{

    protected $rule = [
        'username'       =>  'require',
        'code'=>'require'
    ];
    protected $message  =   [
        'username.require'    => '用户名不能为空',
        'code.require'    => 'code不能为空',
    ];

    protected $scene = [
        'code'  =>  ['code'],
        'username'  =>  ['username'],
    ];
}