<?php
/**
 * Created by PhpStorm.
 * User: JIANG
 * Date: 2019/3/22
 * Time: 15:47
 */

namespace app\api\validate;


use think\Validate;

class Question extends Validate
{
    protected $rule = [
        'content'       =>  'require',
        'is_free'      =>  'require',
        'price'      =>  'require',
//        'ques_user_id'      =>  'require',
        'be_asked_id'      =>  'require',
    ];
    protected $message  =   [
        'content.require'    => '提问内容不能为空',
        'is_free.require'    => '是否免费不能为空',
        'price.require'    => '提问价格不能为空',
//        'ques_user_id.require'    => '提问用户不能为空',
        'be_asked_id.require'    => '被提问用户不能为空',
    ];
}