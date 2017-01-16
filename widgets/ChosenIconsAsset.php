<?php
namespace yangshihe\zui\widgets;

use yii\web\AssetBundle;

/**
 * 日期控件提供的 js and css
 * @author yangshihe
 * @since 2.0
 */
class ChosenIconsAsset extends AssetBundle {

	public $css = [
        '//cdn.bootcss.com/zui/1.5.0/lib/chosenicons/zui.chosenicons.min.css'
	];

	public $js = [
        '//cdn.bootcss.com/zui/1.5.0/lib/chosenicons/zui.chosenicons.min.js'
	];

    public $depends = [
        'yangshihe\zui\widgets\ChosenAsset',
    ];




}
