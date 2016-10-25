<?php
namespace yangshihe\zui;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

class DateTimePicker extends \kartik\datetime\DateTimePicker
{

    const CALENDAR_ICON = '<i class="icon icon-calendar"></i>';

    protected function renderAddon(&$options, $type = 'picker')
    {
        if ($options === false) {
            return '';
        }
        if (is_string($options)) {
            return $options;
        }
        $icon = ($type === 'picker') ? 'calendar' : 'remove';
        Html::addCssClass($options, 'input-group-addon kv-date-' . $icon);
        $icon = '<i class="icon icon-' . ArrayHelper::remove($options, 'icon', $icon) . '"></i>';
        $title = ArrayHelper::getValue($options, 'title', '');
        if ($title !== false && empty($title)) {
            $options['title'] = '选择时间';
        }
        return Html::tag('span', $icon, $options);
    }




}
