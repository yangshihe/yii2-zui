<?php
namespace yangshihe\zui;

use Yii;
use yii\web\AssetBundle;

/**
 * @author yangshihe@qq.com
 * @since 1.0
 */
class ZuiAsset extends AssetBundle
{

	public $css = [
		'//cdn.bootcss.com/zui/1.6.0/css/zui.min.css',
	];

	public $js = [
		'//cdn.bootcss.com/zui/1.6.0/js/zui.min.js',
		'js/public.js',
	];

	public $depends = [
        'yii\web\JqueryAsset',
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
    * $this->setTheme();
    * 此主题不是Yii2 config['components']['view']['theme']['basePath']的视图路径,
    * 而是zui自身主题的切换
	*/
	private function setTheme()
	{

		$theme = 'green';
		$themeName = Yii::$app->request->get('theme');
		$cookies = Yii::$app->request->cookies;
		if (!empty($themeName)) {
			$cssFile = realpath($this->sourcePath . '/css/theme/zui-theme-' . $themeName . '.css');
			if (file_exists($cssFile)) {
				$theme = $themeName;
			}
			if (Yii::$app->request->isAjax) {
                Yii::$app->response->cookies->remove('theme');
				$this->setThemeCookie($theme);
				Yii::$app->end();
			}

		}
        if ($cookies->has('theme')) {
            $theme = $cookies->getValue('theme');
		} else {
            $this->setThemeCookie($theme);
        }
		$this->css[] = 'css/theme/zui-theme-' . $theme . '.css';
		$this->css[] = 'css/theme/zui-app-' . $theme . '.css';
		$this->css[] = 'css/public.css';

	}

	public function setThemeCookie($theme) {
		Yii::$app->response->cookies->add(new \yii\web\Cookie([
			'name' => 'theme',
			'value' => $theme,
		]));
	}

}
