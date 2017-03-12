<?php
/**
 * Author: dungang
 * Date: 2017/3/11
 * Time: 13:32
 */

namespace dungang\pinyin\controllers;


use Overtrue\Pinyin\Pinyin;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\Response;

class ConvertController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules'=>[
                    //否则，检查用户的访问权限
                    ['allow'=>true,'roles'=>['@']],
                ],
            ]
        ];
    }

    public function actionIndex($chinese)
    {
        $pinyin = new Pinyin('Overtrue\Pinyin\GeneratorFileDictLoader');
        \Yii::$app->response->format = Response::FORMAT_JSON;
        if ($py = $pinyin->convert($chinese)) {
            return Json::encode([
                'success'=>true,
                'data'=>$py,
            ]);
        }
        return Json::encode([
            'success'=>false,
            'data'=>$py,
        ]);
    }
}