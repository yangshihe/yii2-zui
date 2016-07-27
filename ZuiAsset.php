<?php
namespace yangshihe\zui;

use Yii;
use yii\web\AssetBundle;

/**
 * @author yangshihe@qq.com
 * @since 1.0
 */
class ZuiAsset extends AssetBundle {

	public $css = [
        'css/zui.min.css',
	];

	public $js = [
        'js/zui.min.js',
	];

    public $depends = [
        'yii\web\YiiAsset',
    ];

	public function init()
    {

        parent::init();

        $this->sourcePath = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets';

        $this->cssOptions = ['name' => 'zui'];

        $this->setTheme();
    }


    /*
    *   $this->setTheme();
    *  此主题不是Yii2 config['components']['view']['theme']['basePath']的视图路径,
    * 而是zui自身主题的切换
    */
    private function setTheme()
    {

        $theme = 'default';

        $themeName = Yii::$app->request->get('theme');

        $cookies = Yii::$app->request->cookies;

        if (!empty($themeName)) {

            $cssFile = realpath($this->sourcePath . '/css/zui-theme-' . $themeName . '.css');

            if(file_exists($cssFile)) $theme = $themeName;

        }elseif($cookies->has('theme')){

            $theme = $cookies['theme'];

        }

        $this->css[] = 'css/zui-theme-' . $theme . '.css';

        Yii::$app->response->cookies->add(new \yii\web\Cookie([
            'name' => 'theme',
            'value' => $theme,
        ]));
    }

}
