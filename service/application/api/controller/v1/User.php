<?php

namespace app\api\controller\v1;

use app\api\controller\PublicApi;
use think\Controller;
use think\Exception;
use think\Request;
use app\api\controller\Send;
use app\api\controller\Api;
use app\api\model\ApiuserModel;
use app\api\model\User as UserModel;
use app\api\utils\Base;
use app\api\controller\v1\Wechat;
class User extends PublicApi
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
//        $userInfo = ApiuserModel::get(1);
//        var_dump($userInfo);
        echo 'index';
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create(Request $request)
    {
//        echo $request->param('name');
//        echo "create";
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function saveUserInfo($data=[])
    {
          if(empty($data)){
              return false;
          }
            $user = new UserModel();
          $openId = $data['openId'];
          $userInfo = $user->where('open_id',$openId)->find();
          if($userInfo){
              $userInfo['session'] = $data['session3rd'];
              return $userInfo;
          }
          $user::create([
              "avatar_url"=>$data['avatarUrl'],
              "user_name"=>$data['nickName'],
              "open_id"=>$data['openId'],
              "gender"=>$data['gender'],
          ]);
         $userInfo = $user->where('open_id',$openId)->find();
         $userInfo['session'] = $data['session3rd'];
          return $userInfo;
    }

    public function login(Request $request){
        //参数验证
        $validate = new \app\api\validate\User();
        $code = $request->post('code');
        $encrypted = $request->post('encryptedData');
        $iv = $request->post('iv');
        if(!$validate->scene('login')->check(input(''))){
            return self::returnMsg(401,$validate->getError());
        }
        if(empty($code) || empty($encrypted) ||empty($iv)){
            return self::returnMsg(401,"请确认传递的参数是否正确");
        }
        $wechat = new Wechat($code);
        $userInfo = $wechat::loginWechat($encrypted,$iv);
        $userInfo = $this->saveUserInfo($userInfo);
        return self::returnMsg(0,"",$userInfo);
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        echo "read";
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        echo "edit";
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        echo "update";
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        echo "delete";
    }


    public function address($id)
    {
        echo "address-";
        echo $id;
    }
}
