<?php
/**
 * Author: dungang
 * Date: 2017/3/11
 * Time: 13:32
 */

namespace dungang\pinyin\controllers;


use Overtrue\Pinyin\Pinyin;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\Response;

class ConvertController extends Controller
{

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