<?php
/**
 * Created by PhpStorm.
 * User: JIANG
 * Date: 2019/3/22
 * Time: 15:56
 */

namespace app\api\model;


use think\Model;
use think\model\concern\SoftDelete;

class Question extends Model
{
    protected $hidden =['delete_time','update_time','create_time'];
    protected $autoWriteTimestamp = 'datetime';
    use SoftDelete;
    protected $deleteTime = 'delete_time';

    //关联User模型
    public function userInfo(){
        return $this->belongsTo('User','ques_user_id','id');
    }

}