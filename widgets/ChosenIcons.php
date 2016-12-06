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

echo $form->field($model, 'dateTime')->widget(\yangshihe\zui\widgets\Chosen::classname(),[]);

 */

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;

class ChosenIcons extends \yii\widgets\InputWidget
{

    public $multiple = false;

    public $pluginOptions = ['no_results_text' => '没有图标', 'allow_single_deselect' => true, 'search_contains' => true];

    public function init() {

        parent::init();

        $options['multiple'] = $this->multiple;

        $options['class'] = 'chosen-select form-control';

        $options['data-placeholder'] = '请选择...';

        $options['tabindex'] = '2';

        $this->options =  ArrayHelper::merge($options, $this->options);

        $this->pluginOptions = Json::encode($this->pluginOptions);

        ChosenIconsAsset::register($this->getView());

    }

    public function run()
    {
        parent::run();

        $this->createJs();

       echo Html::activeListBox($this->model, $this->attribute, [], $this->options);
    }

    public function createJs()
    {
        $id = Html::getInputId($this->model, $this->attribute);

        $script = '$("#' . $id . '").chosenIcons(' . $this->pluginOptions . ');';

        $this->view->registerJs($script, \yii\web\View::POS_READY);

    }


}
