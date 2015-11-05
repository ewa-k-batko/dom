var mig = mig || {};
mig.ajax = function (window, confApp) {
    "use strict";
    var jQuery = window.$j, root, confDef, conf,
            int = function (s) {
                return parseInt(s, 10);
            };
    confDef = {
        root: '.js-a-request'
    };
    conf = jQuery.extend(confDef, confApp);
    var links = jQuery(conf.root),
            getUrl = function (url, el) {                
                el.html('<span>trwa ładowanie grafiki, proszę czekać...</span>');
               
                jQuery.ajax({
                    url: url
                }).done(function (content) {
                    content = JSON.parse(content);
                    el.html('');
                    el.html(content.html);
                    conf.callback();
                });
            };
    links.click(function (e) {
        e.stopPropagation();
        var el = jQuery('.' + jQuery(this).attr('data-box')),
            url = jQuery(this).attr('data-url');
            
            
        getUrl(url, el);
        links.each(function(){jQuery(this).parent().removeClass('active');});
        jQuery(this).parent().addClass('active');
        return false;
    });

};



