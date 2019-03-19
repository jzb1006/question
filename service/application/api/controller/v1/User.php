<?php

namespace app\api\controller\v1;

use think\Controller;
use think\Exception;
use think\Request;
use app\api\controller\Send;
use app\api\controller\Api;
use app\api\model\ApiuserModel;
use app\api\model\UserModel;
class User extends Api
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
    public function save(Request $request)
    {
//        dump($this->uid);
        try{
            $username = $request->post('username');
            $avatarUrl = $request->post('avatarUrl');
            $validate = new \app\api\validate\User;
            if(!$validate->check(input('')))
            {
                return self::returnMsg(401,$validate->getError());
            }
            $user = new User();
            $user->avatar_url = $avatarUrl;
            $user->user_name = $username;
            if($user->save()){
                return self::returnMsg(200,'添加成功');
            }


        }catch (Exception $e){
            echo $e;
        }

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
