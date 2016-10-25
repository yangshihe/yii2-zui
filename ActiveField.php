<?php
namespace yangshihe\zui;


use yii\helpers\Html;

/**
 * @package yangshihe.zui.ActiveField
 * @copyright dy <http://www.yangshihe.com/>
 * @version 1.0.0
 * @author yangshihe@qq.com
 * @since 1.0
 */

class ActiveField extends \yii\bootstrap\ActiveField
{

    /**
     * 根据bootstrap3 form-control-static 设置一个form field 静态文本
     * A radio button list is like a checkbox list, except that it only allows single selection.
     * @param array $options options (name => config) for the radio button list.
     * @return $this the field object itself
     */
    public function staticInput($options = [])
    {
        if (!isset($options['value'])) {
            $value = Html::getAttributeValue($this->model, $this->attribute);
        } else {
            $value = $options['value'];
            unset($options['value']);
        }

        if(!isset($options['class'])) $options['class'] = 'form-control-static';

        $this->parts['{input}'] = Html::tag('p', $value, $options );

        return $this;
    }

}
