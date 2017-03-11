<?php
/**
 * Author: dungang
 * Date: 2017/3/11
 * Time: 13:33
 */

namespace dungang\pinyin\widgets;

use yii\bootstrap\Html;
use yii\bootstrap\InputWidget;

class PinYin extends InputWidget
{
    public $title = '转换拼音';

    public function init()
    {
        parent::init();
        $this->options['class'] = 'form-control';
    }

    public function run()
    {
        $btn = "<span class='input-group-addon'>@example.com</span>";
        if ($this->hasModel()) {
            $input =  Html::activeTextInput($this->model, $this->attribute, $this->options);
        } else {
            $input =  Html::textInput($this->id, $this->value, $this->options);
        }
        return "<div class=\"input-group\">$input $btn</div>";
    }
}