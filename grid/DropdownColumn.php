<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yangshihe\zui\grid;

use yii\base\Model;
use yii\helpers\Html;

class DropdownColumn extends \yangshihe\zui\grid\DataColumn
{
    /*

    必须配置对应 模型
    $model->findAttrArray()[$attribute] = [];
    如:
    public function findAttrArray()
    {
        return [
            'display' => [1 => '显示', 0 => '不显示'],
            'status' => [1 => '正常', 0 => '禁用'],
            'delete' => [0 => '正常', 1 => '删除'],

        ];
    }

    */
    public $prompt = '- 不限 -';

	public function init() {

        $attribute = $this->attribute;

        $model = $this->grid->filterModel;

        if(!$this->filter) {

            $class = get_parent_class($model);

            $this->filter = (new $class)->findAttrArray()[$attribute];

            $this->filterInputOptions =  ['prompt' => $this->prompt, 'class' => 'form-control input-sm'];
        }

        parent::init();

	}


    public function getDataCellValue($model, $key, $index)
    {
        $value = parent::getDataCellValue($model, $key, $index);

        if ($value !== null) {

            $attribute = $this->attribute;

            if(isset($model->findAttrArray()[$attribute][$value])) {

                return $model->findAttrArray()[$attribute][$value];

            }
            return $value;
        }
        return '';
    }



}
