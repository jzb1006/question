<?php
namespace app\api\model;
use think\Model;

class User extends Model{
    protected $hidden =['id', 'delete_time', 'open_id','update_time','create_time'];
    protected $autoWriteTimestamp = 'datetime';
    protected $deleteTime = 'delete_time';
}