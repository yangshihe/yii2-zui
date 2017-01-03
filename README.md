# Yii2 ZUI #

----------

**版本2还尚未发布**
一个基于Yii2 + Bootstrap => ZUI 定制开源前端实践.

***第二次规划, 放弃第一版的更新***;

ZUI项目网站： http://zui.sexy/ 。

## 描述 ##

- 轻量级整合；
- 易于定制，有多个版本供选择，主要版本包含大部分特性，额外的内容按需加载。

### 安装
Either run

```
$ composer require yangshihe/yii2-zui
```

or add

```
"yangshihe/yii2-zui": "^1.5"
```

to the ```require``` section of your `composer.json` file.


### 配置相关
```php

app/AppAsset.php;

class AppAsset extends AssetBundle {

    public $depends = [
		'yangshihe\zui\ZuiAsset',
	];
}
```
控制器 取消原生态的 BootstrapAsset
```php
    public function init()
    {

        parent::init();

        Yii::$app->assetManager->bundles = [
            'yii\bootstrap\BootstrapAsset' => [
                'css' => [],
            ],
            'yii\bootstrap\BootstrapPluginAsset' => [
                'js' => [],
            ],
            'yii\bootstrap\BootstrapThemeAsset' => [
                'css' => [],
            ]
        ];

    }
```
## Demo
暂无

### 其他
等待下一次更新,更多的在挂件目录,头部一般含有使用方式