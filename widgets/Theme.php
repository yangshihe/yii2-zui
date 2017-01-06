<?php
namespace yangshihe\zui\widgets;

/**
 * @package 主题挂件
 * @copyright dy yangshihe@qq.com
 * @version 2.0.0
 * @author yangshihe@qq.com
 * @since 2.0
 */
/**
<div class="dropdown">
    <a href="#" data-toggle="dropdown">主题设置 <span class="caret"></span></a>
        <ul class="dropdown-menu pull-left" id="selectTheme" role="menu">
            <li data-theme="default"><a href="javascript:;">默认</a></li>
            <li data-theme="blue"><a href="javascript:;">蓝色</a></li>
            <li data-theme="red"><a href="javascript:;">红色</a></li>
            <li data-theme="green"><a href="javascript:;">绿色</a></li>
            <li data-theme="purple"><a href="javascript:;">紫色</a></li>
            <li data-theme="brown"><a href="javascript:;">棕色</a></li>
            <li data-theme="yellow"><a href="javascript:;">黄色</a></li>
            <li data-theme="indigo"><a href="javascript:;">靛蓝</a></li>
            <li data-theme="bluegrey"><a href="javascript:;">蓝灰</a></li>
            <li data-theme="black"><a href="javascript:;">黑色</a></li>
        </ul>
</div>
 */
use yii\helpers\Html;
use yii\base\Widget;

class Theme extends Widget
{
    public $label = '主题';
    public $labelIcon = ' <span class="caret"></span>';
    public $labelOptions =  ['data-toggle' => 'dropdown'];
    public $options = ['class' => 'dropdown'];
    public $menuOptions = [
        'class' => 'dropdown-menu pull-left',
        'role' => 'menu',
        'id' => 'selectTheme'
    ];
    public $themes = [
        'green' => '绿色',
        'blue' => '蓝色',
        'red' => '红色',
        'purple' => '紫色',
        'brown' => '棕色',
        'yellow' => '黄色',
        'indigo' => '靛蓝',
        'bluegrey' => '蓝灰',
        'black' => '黑色'
    ];

    public function init() {
        parent::init();
        if (!isset($this->menuOptions['id'])) {
            $this->menuOptions['id'] = 'selectTheme_' . range(100, 200);
        }
        $this->view->registerJs($this->getScript(), \yii\web\View::POS_READY);
    }

    public function run()
    {
        foreach ($this->themes as $key => $value) {
            $links[] = '<li data-theme="' . $key . '"><a href="javascript:;">' . $value . '</a></li>';
        }
        $ul= Html::tag('ul', implode('', $links), $this->menuOptions);
        $a = Html::a($this->label . $this->labelIcon, 'javascript:;', $this->labelOptions);
        //$label, $link['url'], $options
        echo Html::tag('div', $a . $ul, $this->options);

    }
    private function getScript()
    {
        $id = $this->menuOptions['id'];
        $script = '
        var themeName = "default",
            themeLinks = $("head").find("link"),
            url, linkPath, themeHandle, themeAppHandle,
            themeReg = /zui-theme-([a-z])+\.css/i,
            themeRegApp = /zui-app-([a-z])+\.css/i;
        themeLinks.each(function(index) {
            url = $(this).attr("href");
            if (themeReg.exec(url)) {
                themeHandle = $(this);
                linkPath = themeReg.exec(url).input.substr(0, themeReg.exec(url).index);
                themeName = themeReg.exec(url)[0].replace("zui-theme-", "").replace(".css", "");
                $("#selectTheme li[data-theme=" + themeName + "]").addClass("active");
            }
            if (themeRegApp.exec(url)) {
                themeAppHandle = $(this);
            }
        });
        $(document).on("click", "#' . $id .' li", function(event) {
            event.preventDefault();
            $(this).siblings("li").removeClass("active");
            $(this).addClass("active");
            if ($(this).data("theme") == themeName) return;
            themeName = $(this).data("theme");
            themeHandle.after(\'<link rel="stylesheet" href="\' + linkPath + \'zui-theme-\' + themeName + \'.css\' + \'">\');
            themeAppHandle.after(\'<link rel="stylesheet" href="\' + linkPath + \'zui-app-\' + themeName + \'.css\' + \'">\');
            $.ajax({
                    url: "",
                    cache: true,
                    type: "GET",
                    data: { theme: themeName }
                })
                .done(function() {
                    setTimeout(function() {
                        var oldTheme = themeHandle;
                        var oldThemeAppHandle = themeAppHandle;
                        themeHandle = oldTheme.next();
                        themeAppHandle = oldThemeAppHandle.next();
                        oldTheme.remove();
                        oldThemeAppHandle.remove();
                    }, 1000);
                });
        });';
        return $script;
    }
}
