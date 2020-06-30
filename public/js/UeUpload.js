/**
 * 基于ueditor自定义上传组件
 * 需要在ueditor.all.js文件me.execCommand('insertHtml', html);之后增加：me.fireEvent('afterUpfile', filelist);
 */

(function($) {
    $.fn.ueditor_upload = function(options) {
        // 默认参数
        var defaults = {
            editorId: null,        // 百度编辑器容器
            uploadType: 0,         // 0 图片 1 文件
            title: '选择文件...',  // 选择文件对话框的标题
            success: function() {} // 上传完成后的回调函数
        };

        // 初始化ueditor，并隐藏之
        function getEditor(editorId, tool) {
            return UE.getEditor(editorId, {
                isShow: false,
                focus: false,
                enableAutoSave: false,
                autoSyncData: false,
                autoFloatEnabled: false,
                wordCount: false,
                sourceEditor: null,
                scaleEnabled: true,
                toolbars: [
                    [tool]
                ]
            });
        }

        var o = $.extend(defaults, options || {});
        var me = null; // 当前被点击的对象
        if (o.uploadType === 0) { // 上传图片
            var listener = 'beforeInsertImage';
            var dialogtype = 'insertimage';
            var tool = 'insertimage';
        } else { // 上传文件
            var listener = 'afterUpfile';
            var dialogtype = 'attachment';
            var tool = 'attachment';
        }

        // 初始化编辑器
        var editor = getEditor(o.editorId, tool);

        // 根据上传类型注册监听事件
        editor.ready(function() {
            editor.addListener(listener, function(t, args) {
                if (typeof(o.success) == 'function') {
                    o.success(me, args); // 回调函数
                }
            });
        });

        // 点击对象弹出上传对话框
        $(this).click(function(event) {
            me = $(this); // 获取被点击的对象，作为回调函数的参数
            var dialog = editor.getDialog(dialogtype);
            dialog.title = o.title;
            dialog.render();
            dialog.open();
        });
    }
})(jQuery);