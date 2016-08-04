<?php
namespace yangshihe\zui;

use Yii;
use yii\web\AssetBundle;

/**
 * @author yangshihe@qq.com
 * @since 1.0
 */
class ChosenAsset extends AssetBundle {

	public $css = [
        'lib/chosen/chosen.min.css',
        'lib/chosen/chosen.icons.min.css',
	];

	public $js = [
        'lib/chosen/chosen.min.js',
        'lib/chosen/chosen.icons.min.js',
	];

    public $depends = [
        'yangshihe\zui\ZuiAsset',
    ];

	public function init()
    {

        parent::init();

        $this->sourcePath = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets';


    }


}
