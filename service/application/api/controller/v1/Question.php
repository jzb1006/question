<?php
/**
 * Created by PhpStorm.
 * User: JIANG
 * Date: 2019/3/22
 * Time: 9:39
 */

namespace app\api\controller\v1;
use app\api\controller\Send;

use think\Controller;
use think\db\Query;
use think\Request;
use app\api\model\Question as QuestionModel;

class Question extends Controller
{
    use Send;

    public  function create(Request $request){
        $uid = checkLogin($request);
        $validate = new \app\api\validate\Question();
        if(!$validate->check(input(''))){
            return self::returnMsg(-1,$validate->getError());
        }
        $question = new QuestionModel();
        $_GET['ques_user_id'] = $uid;
        if($question->allowField(true)->save($_GET)){
            return self::returnMsg(200,'提问成功，等待他的回答吧！');
        }
        return self::returnMsg(-1,'提问失败');
    }

    public function edit(Request $request,$id){
        $uid = checkLogin($request);
        $question = new QuestionModel();
        $validate = new \app\api\validate\Question();
        if(!$validate->check(input(''))){
            return self::returnMsg(-1,$validate->getError());
        }
        $update = $question->where('id',$id)->update([
            'content'=>$request->get('content'),
            'is_free'=>$request->get('is_free'),
            'price'=>$request->get('price'),
            'ques_user_id'=>$request->get('ques_user_id'),
            'be_asked_id'=>$request->get('be_asked_id'),
        ]);
        if($update){
            return self::returnMsg(200,'问题修改成功！');
        }
        return self::returnMsg(-1,'修改失败');

    }

    public function read($id){
        $question = new QuestionModel();
        $result = $question->get($id);
        if($result){
            return self::returnMsg(200,'',$result);
        }
        return self::returnMsg(-1,'你获取的数据不存在');
    }

    public function delete(Request $request,$id){
        $question = new QuestionModel();
        $result = $question->get($id);
        $uid = checkLogin($request);
        //软删除
        if($result){
            if($uid==$result->userInfo->id){
                $result->delete();
                if($result){
                    return self::returnMsg(200,'删除成功');
                }
            }
        }
        return self::returnMsg(-1,'删除失败');
    }
}