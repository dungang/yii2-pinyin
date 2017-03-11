<?php
/**
 * Author: dungang
 * Date: 2017/3/11
 * Time: 19:48
 */

namespace dungang\pinyin\assets;


use yii\web\AssetBundle;

class PinYinAsset extends AssetBundle
{
    public $js = ['pinyin.js'];

    public function init()
    {
        $this->sourcePath = __DIR__ . '/pinyin/';
    }
}