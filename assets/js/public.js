/*!
 * 全局js
 *
 */
$(document).ready(function() {
    /*
     *	动态加载 theme css
     */
    var themeName = 'default',
        themeLinks = $('head').find('link[name="zui"]'),
        url, linkPath, themeHandle,
        themeReg = /zui-theme-([a-z])+\.css/i;
    themeLinks.each(function(index) {
        url = $(this).attr('href');
        if (themeReg.exec(url)) {
            themeHandle = $(this);
            linkPath = themeReg.exec(url).input.substr(0, themeReg.exec(url).index);
            themeName = themeReg.exec(url)[0].replace('zui-theme-', '').replace('.css', '');
            $('#selectTheme li[data-theme=' + themeName + ']').addClass('active');
        }
    });

    $(document).on('click', '#selectTheme li', function(event) {
        event.preventDefault();
        $(this).siblings('li').removeClass('active');
        $(this).addClass('active');
        themeName = $(this).data('theme');
        themeHandle.after('<link rel="stylesheet" href="' + linkPath + 'zui-theme-' + themeName + '.css' + '">');

        $.ajax({
                url: '',
                cache: false,
                type: 'GET',
                data: { theme: themeName }
            })
            .done(function() {
                setTimeout(function() {
                    var oldTheme = themeHandle;
                    themeHandle = oldTheme.next();
                    oldTheme.remove();
                }, 1000);
            });
    });

    //表单防止多次提交
    $('form').on('beforeSubmit', function (e) {
        $(':submit').attr('disabled', true).addClass('disabled');
    });
    //ajax 提交完成后解锁
    $('body').on('ajaxComplete', 'form', function(){
        $(':submit').attr('disabled', false).removeClass('disabled');
    });

    (new $.zui.ModalTrigger({showHeader: false, custom:'<i class="icon icon-4x icon-spin icon-spinner"></i>'})).show();

    /**
     * 超级模态框数据回调
     * @param  {[type]} ) {
     * var that [description]
     */
    /*
    设置触发
	    A
    	<button data-remote="url?group=modal_group1" data-toggle="modal">click</button>
    设置接收
    		data-name =指定要被回调的单元名称,
    		data-text 设置此项表示回调的值写入到DOM的文字部分 不设置将写入 value部分,如input
    	<input type="text" data-group="modal_group1" data-name="userid" value="">
    	<span data-group="modal_group1" data-name="username" data-text="text"></span>
    远程模态框 body下的回调按钮
    	<button data-group="<?php echo $_GET['group']?>" data-data='{"userid":1,"username":"小明"}' data-modal-group="callback">回调按钮</button>
	接收的DOM 的最终结果
    	<input type="text" data-group="modal_group1" data-name="userid" value="1">
    	<span data-group="modal_group1" data-name="username" data-text="text">小明</span>
     */
    $(document).on('click', '[data-modal-group]', function () {
        var group = $(this).data('group'),
            data = $(this).data('data');
        $('[data-group="' + group + '"]').each(function () {
            var name = $(this).data('name');
            var text = $(this).data('text'); // text // val default val
            if (text === 'text') {
                $(this).html(eval('data.' + name));
            } else {
                $(this).val(eval('data.' + name));
            }
        });
        $(this).parents(".modal").modal('hide');
    });

});
