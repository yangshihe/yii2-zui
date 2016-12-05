<?php
namespace yangshihe\zui\bootstrap;

/**
 * @package yangshihe.zui.bootstrap.ActiveForm
 * @copyright dy yangshihe
 * @version 2.0.0
 * @author yangshihe@qq.com
 * @since 2.0
 */
class ActiveForm extends \yii\bootstrap\ActiveForm
{
    public $fieldClass = 'yangshihe\zui\bootstrap\ActiveField';
    public $layout = 'horizontal';
    public $method = 'POST';
    public $errorCssClass = 'has-error';
    public $fieldConfig = [
        'template' => '{label}<div class="col-sm-5">{input}{error}{hint}</div>',
        'horizontalCssClasses' => [
            'wrapper' => 'col-sm-5',
        ],
        'labelOptions' => ['class' => ' col-sm-2 control-label'],
    ];
}
