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
            _this.find(opts.btnSelector).click(function (e) {
                e.preventDefault();
                $.get(opts.url,{'chinese':target.val()},function (response) {
                    if (response.success){
                        _this.val(response.data);
                    }
                })
            });
        });
    };

    $.fn.pinyin.Default = {
        btnSelector: '.pinyin-button'
    };
}(jQuery);