<?php

/**
 * Icon 选择器 基于 bootstrap 3.x
 *
 *@package common\widgets
 *@author yuzhiyang <yangshihe@qq.com>
 *@copyright dy <http://www.yangshihe.com/>
 *@version 1.0.0
 *@since 2016年6月20日
 *@todo 基于 fontawesome 图标
 */

namespace yangshihe\zui\widgets;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
/*
form view:

$form->field($model, 'icon')->widget(\yangshihe\zui\widgets\ChosenSelect::classname(),['multiple' => true ]);

 */

class ChosenSelect extends \yii\widgets\InputWidget
{

    public $multiple = true;

    public $items = [];

    public $pluginOptions = ['no_results_text' => '没有找到', 'allow_single_deselect' => true, 'search_contains' => true];

	public function init() {


        parent::init();

        $options['multiple'] = $this->multiple;

        $options['class'] = 'chosen-select form-control';

        $options['data-placeholder'] = '请选择...';

        $options['tabindex'] = '2';

		$this->options =  ArrayHelper::merge($options, $this->options);

        $this->pluginOptions = Json::encode($this->pluginOptions);

		\yangshihe\zui\ChosenAsset::register($this->getView());

	}

    public function run()
    {
        parent::run();

        $this->createJs();

       echo Html::activeListBox($this->model, $this->attribute, $this->items, $this->options);
    }

    public function createJs()
    {
        $ID = Html::getInputId($this->model, $this->attribute);

        $script = '
            if ($.fn.chosen) {
                $("#' . $ID . '").chosen(' . $this->pluginOptions . ');
            }
        ';

        $this->view->registerJs($script, \yii\web\View::POS_READY);

    }


}
