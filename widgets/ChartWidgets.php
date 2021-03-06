<?php
namespace yangshihe\zui\widgets;

/**
 * @package Chart 目前提供曲线图、饼图和柱状图的实现。
 * @copyright dy yangshihe@qq.com
 * @version 2.0.0
 * @author yangshihe@qq.com
 * @since 2.0
 * @see http://zui.sexy/#view/chart
 */


/**
 目前不支持IE浏览器9以下浏览器
 且 zui 官网开Demo 几个 就支持几个

DEMO

form view:
use yangshihe\zui\widgets\ChartWidgets;
$data = json_encode(array(......));
echo ChartWidgets::widget(['type' => 'lineChart', 'data' => $data]);

 */

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\base\Widget;
use yii\base\InvalidCallException;

class ChartWidgets extends Widget
{
    public $type = 'lineChart'; // lineChart, pieChart doughnutChart, barChart; pieChart default lineChart
    public $data = [];
    public $options = ['width' => '400', 'height' => '300'];
    public $pluginOptions = [];

    //默认配置
    private $_pluginOptions = [];


    public function init() {

        if (!isset($this->options['id'])) {
            $this->options['id'] = 'chart' .  $this->getId();
        }
        if (!in_array($this->type, ['lineChart', 'pieChart', 'doughnutChart', 'barChart'])) {
            throw new InvalidConfigException("type must in: lineChart, doughnutChart, barChart");
        }
        parent::init();
        call_user_func([$this, $this->type]);
        $this->pluginOptions =  ArrayHelper::merge($this->_pluginOptions, $this->pluginOptions);
        $this->pluginOptions = Json::encode($this->pluginOptions);
        $this->data = Json::encode($this->data);
        ChartAsset::register($this->getView());

    }

    public function run()
    {
        parent::run();
        echo Html::tag('canvas','', $this->options);
        $this->createJs();

    }

    public function createJs()
    {
        $id = $this->options['id'];
        $wd = '';
        if (isset($this->options['width']) && is_numeric($this->options['width']) && $this->options['width'] > 0) {
            $wd = 'if (width > ' . $this->options['width']. ') obj.attr("width", width);';
        }

        //使用函数加参数调用////
        $script = '(function(obj){
            var width = obj.parent().width();
            '. $wd .'
            obj.' . $this->type . '( ' . $this->data . ', ' . $this->pluginOptions . ');
        })($("#' . $id . '"));';

        $this->view->registerJs($script, \yii\web\View::POS_READY);
    }

    private function lineChart()
    {
        $this->_pluginOptions = [];
    }

    private function pieChart()
    {
        $this->_pluginOptions = ['scaleShowLabels' => true];
    }

    private function doughnutChart()
    {
        $this->_pluginOptions = ['segmentShowStroke' => false];
    }

    private function barChart()
    {
        $this->_pluginOptions = ['responsive' => false];

    }

}
