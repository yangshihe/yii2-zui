<?php
// use yangshihe\zui\bootstrap\Alert;
// 拷贝这个文件到你的控制器下面的视图文件

/**
 需要修改
 如下文件内添加:
    /assets/APPAsset.php
    public $depends = [
        'yangshihe\zui\ZuiAsset' // ←这行
    ];
    然后你就可以测试了,丰富其他的 就看你自己了
 */
use yii\helpers\Html;
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">

<head>
    <meta charset="<?php echo Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="format-detection" content="email=no" />
    <meta name="format-detection" content="telephone=no" />
    <?php echo Html::csrfMetaTags() ?>
    <title>
        <?php echo Html::encode($this->title) ?>
    </title>
    <?php $this->head()?>
    <?php //echo Alert::widget(); ?>
</head>

<body>
    <?php $this->beginBody()?>
    <header id="header" class="bg-primary">
        <div id="topbar">
            <div class="pull-right" id="topnav">
                <div class="dropdown" id="userMenu">
                    <a href="#" data-toggle="dropdown"><i class="icon-user"></i> 管理员 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-submenu"><a href="javascript:;">主题</a>
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
                        </li>
                    </ul>
                </div><a href="/login/logout">退出</a>
                <div class="dropdown"><a href="#" data-toggle="dropdown">帮助 <span class="caret"></span></a>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="#" class="open-help-tab">手册</a>
                        </li>
                        <li><a href="#" class="iframe" data-width="800" data-headerless="true">新手教程</a>
                        </li>
                        <li><a href="#" class="iframe" data-width="800" data-headerless="true">修改日志</a>
                        </li>
                    </ul>
                </div><a href="#" class="about iframe" data-width="900" data-headerless="true" data-class="modal-about">关于</a>
            </div>
            <h5 id="companyname">系统</h5>
        </div>
        <nav id="mainmenu">
            <ul class="nav">
                <li class="active"><a class="active" href="/." data-name="控制台" data-route="site/index">控制台</a></li>
                <li><a href="#" data-name="商城" data-route="goods/index">商城</a></li>
                <li><a href="#" data-name="用户" data-route="admin/index">用户</a></li>
                <li><a href="#" data-name="系统" data-route="system/index">系统</a></li>
            </ul>
            <div class="input-group input-group-sm hidden hidde" id="searchbox">
                <div class="input-group-btn" id="typeSelector">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><span id="searchTypeName">需求</span> <span class="caret"></span></button>
                    <input type="hidden" name="searchType" id="searchType" value="story">
                    <ul class="dropdown-menu">
                        <li><a href="#" data-value="bug">Bug</a></li>
                        <li><a href="#" data-value="story">需求</a></li>
                        <li><a href="#" data-value="task">任务</a></li>
                        <li><a href="#" data-value="testcase">用例</a></li>
                        <li><a href="#" data-value="project">项目</a></li>
                        <li><a href="#" data-value="product">产品</a></li>
                        <li><a href="#" data-value="user">用户</a></li>
                        <li><a href="#" data-value="build">版本</a></li>
                        <li><a href="#" data-value="release">发布</a></li>
                        <li><a href="#" data-value="productplan">产品计划</a></li>
                        <li><a href="#" data-value="testtask">测试版本</a></li>
                        <li><a href="#" data-value="doc">文档</a></li>
                    </ul>
                </div>
                <input type="text" name="searchQuery" id="searchQuery" value="" onclick="this.value=&quot;&quot;" onkeydown="if(event.keyCode==13) shortcut()" class="form-control" placeholder="----">
                <div id="objectSwitcher" class="input-group-btn"><a href="#" class="btn">GO! </a></div>
            </div>
        </nav>
        <nav id="modulemenu">
            <ul class="nav">
                <li class="active"><a class="active" href="/goods/index" data-name="商品" data-route="goods/index">商品</a></li>
                <li><a href="/order/index" data-name="订单" data-route="order/index">订单</a></li>
                <li><a href="/batch/index" data-name="商品批号" data-route="batch/index">商品批号</a></li>
            </ul>
        </nav>
    </header>
    <div id="wrap">
        <div class="outer">
            <div id="featurebar">
                <ul class="nav">
                    <li>
                        <div class="label-angle">所有模块</div>
                    </li>
                    <li class="active"><a class="active" href="javascript:;">商品列表</a></li>
                    <li><a href="/goods/tree">商品分类管理</a></li>
                </ul>
                <div class="actions">
                    <div class="btn-group">
                        <a class="btn btn-link" href="/goods/create"><i class="icon icon-plus"></i> 新增商品</a> </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div id="w0" data-pjax-container="" data-pjax-push-state="" data-pjax-timeout="1000">
                        <div id="w1" class="grid-view">
                            <table class="table datatable table-hover table-condensed table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th style="width:80px"><a class="asc" href="/goods/index?sort=-id" data-sort="-id">ID</a></th>
                                        <th><a href="/goods/index?sort=admin_id" data-sort="admin_id">用户ID</a></th>
                                        <th><a href="/goods/index?sort=tree_id" data-sort="tree_id">分类ID</a></th>
                                        <th><a href="/goods/index?sort=sn" data-sort="sn">商品编码</a></th>
                                        <th><a href="/goods/index?sort=display" data-sort="display">显示</a></th>
                                        <th><a href="/goods/index?sort=status" data-sort="status">状态</a></th>
                                        <th><a href="/goods/index?sort=add_time" data-sort="add_time">添加时间</a></th>
                                        <th class="action-column" style="min-width:100px">动作</th>
                                    </tr>
                                    <tr id="w1-filters" class="filters">
                                        <td>&nbsp;</td>
                                        <td>
                                            <input type="text" class="form-control input-sm" name="GoodsSearch[id]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control input-sm" name="GoodsSearch[admin_id]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control input-sm" name="GoodsSearch[tree_id]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control input-sm" name="GoodsSearch[sn]">
                                        </td>

                                        <td>
                                            <select id="goodssearch-display" class="form-control input-sm" name="GoodsSearch[display]">
                                                <option value="">- 不限 -</option>
                                                <option value="1">显示</option>
                                                <option value="0">不显示</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select id="goodssearch-status" class="form-control input-sm" name="GoodsSearch[status]">
                                                <option value="">- 不限 -</option>
                                                <option value="1">正常</option>
                                                <option value="0">禁用</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" id="goodssearch-add_time" class="form-control input-sm" name="GoodsSearch[add_time]" data-krajee-daterangepicker="daterangepicker_1ef3124d">
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="footer">
        <div id="crumbs"><a href="/.">首页</a>&nbsp;&nbsp;<i class="icon-angle-right"></i><a href="/goods/index">商城</a> &nbsp;
            <i class="icon-angle-right"></i><a href="/goods/index">商品</a> &nbsp;
            <i class="icon-angle-right"></i>商品列表
        </div>
        <div id="poweredby">
            <a href="#" class="text-primary">软件系统</a> &nbsp;
        </div>
    </div>
    <?php $this->endBody()?>
</body>

</html>
<?php $this->endPage()?>
