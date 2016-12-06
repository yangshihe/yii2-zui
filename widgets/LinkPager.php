<?php

namespace yangshihe\zui\widgets;

use yii\data\Pagination;
use yii\helpers\Html;

class LinkPager extends \yii\widgets\LinkPager {


    public $options = ['class' => 'pager'];

    public $linkOptions = ['class' =>''];

    public $firstPageCssClass = 'previous';

    public $lastPageCssClass = 'last';

    public $prevPageCssClass = 'prev';

    public $nextPageCssClass = 'next';

    public $activePageCssClass = 'active';

    public $disabledPageCssClass = 'disabled';

    public $prevPageLabel = '<i class="icon icon-angle-left"></i>';

    public $nextPageLabel = '<i class="icon icon-angle-right"></i>';

    public $firstPageLabel = '<i class="icon icon-double-angle-left"></i>';

    public $lastPageLabel = '<i class="icon icon-double-angle-right"></i>';

    public $pageCssClass = '';


/*
<ul class="pager">
        <li class="previous"><a href="#">«</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li class="active"><a href="#">5</a></li>
        <li><a href="###" data-toggle="pager" data-placement="bottom">更多</a></li>
        <li><a href="#">12</a></li>
        <li class="next"><a href="#">»</a></li>
      </ul>*/


}
