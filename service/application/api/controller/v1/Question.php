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
use think\Request;
use app\api\model\Question as QuestionModel;

class Question extends Controller
{
    use Send;

    public static function create(Request $request){
//        Cache('15889845442',["app_id"=>15889845442],100);
        $appid = checkLogin($request);
        echo $appid;
        var_dump(explode('+',$appid));
        $validate = new \app\api\validate\Question();
        if(!$validate->check(input(''))){
            return self::returnMsg(-1,$validate->getError());
        }
        $question = new QuestionModel();
        if($question->allowField(true)->save($_GET)){
            return self::returnMsg(200,'提问成功，等待他的回答吧！');
        }
        return self::returnMsg(-1,'提问失败');
    }
}