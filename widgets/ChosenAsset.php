<?php
namespace yangshihe\zui\widgets;

use yii\web\AssetBundle;

/**
 * 日期控件提供的 js and css
 * @author yangshihe
 * @since 2.0
 */
class ChosenAsset extends AssetBundle {

	public $css = [
        '//cdn.bootcss.com/zui/1.5.0/lib/chosen/chosen.min.css'
	];

	public $js = [
        '//cdn.bootcss.com/zui/1.5.0/lib/chosen/chosen.min.js'
	];

    public $depends = [
        'yii\web\JqueryAsset',
        'yangshihe\zui\ZuiAsset'
    ];




}
