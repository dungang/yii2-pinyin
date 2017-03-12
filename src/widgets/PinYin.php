<?php
/**
 * Author: dungang
 * Date: 2017/3/11
 * Time: 13:33
 */

namespace dungang\pinyin\widgets;

use dungang\pinyin\assets\PinYinAsset;
use yii\bootstrap\Html;
use yii\bootstrap\InputWidget;
use yii\helpers\Url;

class PinYin extends InputWidget
{
    public $title = '转换拼音';

    public $target;

    public function init()
    {
        parent::init();
        $this->options['class'] = 'form-control';
        $this->clientOptions['target'] = $this->target;
        $this->clientOptions['url']= Url::to(['/pinyin/convert']);
    }

    public function run()
    {
        PinYinAsset::register($this->getView());
        $this->registerPlugin('pinyin');
        $btn = "<span class='input-group-addon pinyin-button'>$this->title</span>";
        if ($this->hasModel()) {
            $input =  Html::activeTextInput($this->model, $this->attribute, $this->options);
        } else {
            $input =  Html::textInput($this->id, $this->value, $this->options);
        }
        return "<div class=\"input-group\">$input $btn</div>";
    }
}