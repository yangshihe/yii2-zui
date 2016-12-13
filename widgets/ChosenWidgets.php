<?php
namespace yangshihe\zui\widgets;

/**
 * @package Chosen是用来增强单选列表和多选列表的更佳选择。
 * @copyright dy yangshihe@qq.com
 * @version 2.0.0
 * @author yangshihe@qq.com
 * @since 2.0
 * @see http://zui.sexy/#javascript/chosen
 */


/**

DEMO

form view:
use yangshihe\zui\widgets\ChosenWidgets;
echo ChosenWidgets::widget(['message' => 'Good morning']) ?>

 */

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\base\Widget;

class ChosenWidgets extends Widget
{

    public $multiple = true;

    public $name = null;

    public $selection = '';

    public $options = [];

    public $pluginOptions = ['no_results_text' => '没有找到', 'allow_single_deselect' => true, 'search_contains' => true];


    public function init() {

        if ($this->name === null ) {
            throw new InvalidConfigException("Either 'name' must be specified.");
        }

        if (!isset($this->options['id'])) {
            $this->options['id'] = 'chosen_' .  $this->getId();
        }

        parent::init();

        $options['multiple'] = $this->multiple;

        $options['class'] = 'chosen-select form-control';

        $options['data-placeholder'] = '请选择...';

        $options['tabindex'] = '2';

        $this->options =  ArrayHelper::merge($options, $this->options);

        $this->pluginOptions = Json::encode($this->pluginOptions);

        ChosenAsset::register($this->getView());

    }

    public function run()
    {
        parent::run();

        $this->createJs();

       echo Html::listBox($this->name, $this->selection, $this->items, $this->options);
    }

    public function createJs()
    {
        $id = $this->options['id'];

        $script = '$("#' . $id . '").chosen(' . $this->pluginOptions . ');';

        $this->view->registerJs($script, \yii\web\View::POS_READY);

    }


}
