<?php

namespace app\api\controller\v1;

use think\Controller;
use think\Exception;
use think\Request;
use app\api\controller\Send;
use app\api\controller\Api;
use app\api\model\ApiuserModel;
use app\api\model\User as UserModel;
use app\api\utils\Base;
use think\facade\Config;
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
        try{
            $username = $request->post('username');
            $avatarUrl = $request->post('avatarUrl');
            $validate = new \app\api\validate\User;
            if(!$validate->check(input('')))
            {
                return self::returnMsg(401,$validate->getError());
            }
            $user = new UserModel();
            $user->avatar_url = $avatarUrl;
            $user->user_name = $username;
            if($user->save()){
                $user_info  = $user->find($user->id);
                return self::returnMsg(200,'添加成功',$user_info);
            }else{
                return self::returnMsg(401,"添加失败");
            }
        }catch (Exception $e){
            return self::returnMsg(401,$e);
        }

    }

    public function getWxAppid(Request $request){
        $validate = new \app\api\validate\User;
        if(!$validate->scene('code')->check(input('')))
        {
            return self::returnMsg(401,$validate->getError());
        }
        $code = $request->post('code');
//        $url = "https://api.weixin.qq.com/sns/jscode2session?appid=".Config::get('wx.appid')."&secret=SECRET&js_code=JSCODE&grant_type=authorization_code";
//        $result = Base::httpfun($url);
        return self::returnMsg(200,"",Config::get("wx"));
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
