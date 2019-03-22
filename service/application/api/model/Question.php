<?php
/**
 * Created by PhpStorm.
 * User: JIANG
 * Date: 2019/3/22
 * Time: 15:56
 */

namespace app\api\model;


use think\Model;

class Question extends Model
{
    protected $autoWriteTimestamp = 'datetime';
    protected $deleteTime = 'delete_time';
}