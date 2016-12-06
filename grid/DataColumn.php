<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yangshihe\zui\grid;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class DataColumn extends \yii\grid\DataColumn
{


   public $defaultfilterCss = 'input-sm'; //加强对过滤的 input 大小统一约束

    public function init()
    {
        parent::init();

        Html::addCssClass($this->filterInputOptions, $this->defaultfilterCss);

        if ($this->attribute == 'id' && !isset($this->headerOptions['style'])) {

            $this->headerOptions['style'] = 'width:80px';

        }
    }

}
