/**
 * Created by Lenovo on 2017/3/11.
 */

+function ($) {
    
    $.fn.pinyin = function (options) {
        var opts = $.extend({},$.fn.pinyin.Default,options);
        return this.each(function () {
            var _this = $(this);
            var _target = _this.data('pinyin-target');
            if (_target) {
                opts.target = _target;
            }
            var target = $(opts.target);
            var btn = _this.parent().find(opts.btnSelector);
            if (btn) {

                btn.css({
                    cursor:'pointer'
                }).click(function (e) {
                    e.preventDefault();
                    $.get(opts.url,{'chinese':target.val()},function (response) {
                        var rst = $.parseJSON(response);
                        if (rst.success){
                            _this.val(rst.data.join('-'));
                        }
                    })
                });
            }
        });
    };

    $.fn.pinyin.Default = {
        btnSelector: '.pinyin-button'
    };
}(jQuery);