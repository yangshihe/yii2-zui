<?php
namespace yangshihe\zui;

/**
 * @package yangshihe.zui.Breadcrumbs
 * @copyright dy <http://www.yangshihe.com/>
 * @version 1.0.0
 * @author yangshihe@qq.com
 * @since 1.0
 */

/**
 * example
 * ```php
 * // $this is the view object currently being used
 * echo Breadcrumbs::widget([
 *     'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
 *     'links' => [
 *         [
 *             'label' => 'Post Category',
 *             'url' => ['post-category/view', 'id' => 10],
 *             'template' => "<li><b>{link}</b></li>\n", // template for this link only
 *         ],
 *         ['label' => 'Sample Post', 'url' => ['post/edit', 'id' => 1]],
 *         'Edit',
 *     ],
 * ]);
 * ```
 *
 * Because breadcrumbs usually appears in nearly every page of a website, you may consider placing it in a layout view.
 * You can use a view parameter (e.g. `$this->params['breadcrumbs']`) to configure the links in different
 * views. In the layout view, you assign this view parameter to the [[links]] property like the following:
 *
 * ```php
 * // $this is the view object currently being used
 * echo Breadcrumbs::widget([
 *     'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
 * ]);
 * ```
 *
 */
class Breadcrumbs extends \yii\widgets\Breadcrumbs
{
    public $tag = 'div';

    public $homeLink;

    public $options = ['id' => 'crumbs'];

    public $itemTemplate = "&nbsp;<i class=\"icon-angle-right\"></i>{link}\n";

    public $activeItemTemplate = "&nbsp;<i class=\"icon-angle-right\"></i>{link}\n";


}
