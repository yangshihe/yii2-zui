<?php
namespace yangshihe\zui\widgets;

/**
 * @package 日期 & 时间空间
 * @copyright dy yangshihe@qq.com
 * @version 2.0.0
 * @author yangshihe@qq.com
 * @since 2.0
 * @see http://zui.sexy/#javascript/datetimepicker
 */


/**

DEMO

form view:

echo $form->field($model, 'dateTime')->widget(\yangshihe\zui\widgets\DateTimePicker::classname(),[]);


 */
use Yii;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;

class DateTimePicker extends \yii\widgets\InputWidget
{

    // 符合我个人习惯的配置, 3种
    public $format = null; //yyyy-mm-dd ,hh:ii, yyyy-mm-dd hh:ii
    //是否需要 选择器
    public $addon = true;
    public $pluginOptions = [];
    //简易设置,是否允许输入,你可以通过 options['readonly'] = 'readonly'了哦设置
    public $readonly = false;
    private $_inputId;
    public function init() {
        parent::init();
        $options['class'] = 'form-control';
        if ($this->readonly != false) {
            $options['readonly'] = 'readonly' ;
        }
        $this->_inputId = Html::getInputId($this->model, $this->attribute);
        $this->options = ArrayHelper::merge($options, $this->options);
        $this->renderConfig();
        DateTimePickerAsset::register($this->getView());
        $this->view->registerJs($this->createJs(), \yii\web\View::POS_READY);

    }

    public function run()
    {
        echo $this->renderInput();
    }

    //参数配置 我只配了常用的三种 就是官网的三种,其他的我不管了,自己传参数吧
    private function renderConfig()
    {
        $this->format = $this->format ?? 'yyyy-mm-dd';
        $o = [];
        if ($this->format == 'yyyy-mm-dd hh:ii') {
            $o = [
               'weekStart' => 1,
               'todayBtn' => 1,
               'todayHighlight' => 1,
               'autoclose' => 1,
               'startView' => 2,
               'forceParse' => 0,
               'showMeridian' => 1
            ];
        }
        if ($this->format == 'yyyy-mm-dd') {
           $o = [
                'weekStart' => 1,
                'todayBtn' => 1,
                'autoclose' => 1,
                'todayHighlight' => 1,
                'startView' => 2,
                'minView' => 2,
                'forceParse' => 0
            ];
        }
        if ($this->format == 'hh:ii') {
            $o = [
                'weekStart' => 1,
                'todayBtn' => 1,
                'autoclose' => 1,
                'todayHighlight' => 1,
                'startView' => 1,
                'minView' => 0,
                'maxView' => 1,
                'forceParse' => 0
            ];
        }
        $o['format'] = $this->format;
        $o['language'] = Yii::$app->language;
        $o['pickerPosition'] = 'bottom-left';
        $this->pluginOptions = ArrayHelper::merge($o, $this->pluginOptions);
    }

    private function renderInput()
    {
        $content = Html::activeInput('text', $this->model, $this->attribute, $this->options);
        if ($this->addon === true ) {
            $content .= '<span class="input-group-addon"><i class="icon icon-remove"></i></span>';
            $content .= '<span class="input-group-addon"><i class="icon-calendar"></i></span>';
        }
        return Html::tag('div', $content, ['class' => 'input-group date form-date', 'id' => $this->_inputId]);
    }

    private function createJs()
    {
        return '$("#'. $this->_inputId . '").datetimepicker(' . Json::encode($this->pluginOptions) .');';
    }


}
