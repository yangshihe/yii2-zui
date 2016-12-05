/*!
 * 全局js
 *
 */

$(document).ready(function() {
    /*
     *  动态加载 theme css
     */
    var themeName = 'default',
        themeLinks = $('head').find('link[name="zui"]'),
        url, linkPath, themeHandle,themeAppHandle,
        themeReg = /zui-theme-([a-z])+\.css/i,
        themeRegApp = /zui-app-([a-z])+\.css/i;
    themeLinks.each(function(index) {
        url = $(this).attr('href');
        if (themeReg.exec(url)) {
            themeHandle = $(this);
            linkPath = themeReg.exec(url).input.substr(0, themeReg.exec(url).index);
            themeName = themeReg.exec(url)[0].replace('zui-theme-', '').replace('.css', '');
            $('#selectTheme li[data-theme=' + themeName + ']').addClass('active');
        }
        if (themeRegApp.exec(url)) {
            themeAppHandle = $(this);
        }
    });

    $(document).on('click', '#selectTheme li', function(event) {
        event.preventDefault();
        $(this).siblings('li').removeClass('active');
        $(this).addClass('active');
        if ($(this).data('theme') == themeName) return;
        themeName = $(this).data('theme');
        themeHandle.after('<link rel="stylesheet" href="' + linkPath + 'zui-theme-' + themeName + '.css' + '">');
        themeAppHandle.after('<link rel="stylesheet" href="' + linkPath + 'zui-app-' + themeName + '.css' + '">');
        $.ajax({
                url: '',
                cache: false,
                type: 'GET',
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
    });

    var showLoadingOption = {
        showHeader: false,
        remote: '',
        waittime: 0,
        position: 'center',
        backdrop: 'static',
        keyboard: false,
        size: 'sm',
        width: '0px',
        id: 'loading',
        loadingIcon: 'icon-spinner'
    };
    var showLoading = new $.zui.ModalTrigger(showLoadingOption);
    var isShowLoading = false;
    //ajax 提交 后面要是不集成 可以使用 global: false,来决定
    $.ajaxSetup({
        beforeSend: function(xhr, event) {
            if (event.url.indexOf('captcha') == -1) {
               $('[type=submit]').attr('disabled', true).addClass('disabled');
                showLoading.show();
                isShowLoading = true;
            }
        },
        complete: function() {
            $('[type=submit]').attr('disabled', false).removeClass('disabled');
            isShowLoading ? showLoading.close() : null;
        }
    });
    //普通表单防止多次提交
    $('form').on('submit', function(e) {
        $('[type=submit]').attr('disabled', true).addClass('disabled');
        var that = $(this);
        setTimeout(function() {
            var issend = 1;
            that.find('.form-group').each(function(index, el) {
                if ($(this).hasClass('has-error')) {
                    //showLoading.close();
                    $('[type=submit]').attr('disabled', false).removeClass('disabled');
                    issend = 0;
                    return;
                }
            });
            if (issend) showLoading.show();
        },1000);

    });




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
    $(document).on('click', '[data-modal-group]', function() {
        var group = $(this).data('group'),
            data = $(this).data('data');
        $('[data-group="' + group + '"]').each(function() {
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
