hola
<script>
//Simple codigo para hacer la paginacion scroll
$(document).ready(function() {
	$('.scroll').jscroll({
    loadingHtml: '<img src="../assets/images/loader.gif" alt="Loading" />'
});
});


(function($) {

'use strict';

// Define the jscroll namespace and default settings
$.jscroll = {
    defaults: {
        debug: false,
        autoTrigger: true,
        autoTriggerUntil: false,
        loadingHtml: '<small>Loading...</small>',
        loadingFunction: false,
        padding: 0,
        nextSelector: 'a:last',
        contentSelector: '',
        pagingSelector: '',
        callback: false
    }
};

// Constructor
var jScroll = function($e, options) {

    // Private vars and methods
    var _data = $e.data('jscroll'),
        _userOptions = (typeof options === 'function') ? { callback: options } : options,
        _options = $.extend({}, $.jscroll.defaults, _userOptions, _data || {}),
        _isWindow = ($e.css('overflow-y') === 'visible'),
        _$next = $e.find(_options.nextSelector).first(),
        _$window = $(window),
        _$body = $('body'),
        _$scroll = _isWindow ? _$window : $e,
        _nextHref = $.trim(_$next.attr('href') + ' ' + _options.contentSelector),

        // Check if a loading image is defined and preload
        _preloadImage = function() {
            var src = $(_options.loadingHtml).filter('img').attr('src');
            if (src) {
                var image = new Image();
                image.src = src;
            }
        },

        // Wrap inner content, if it isn't already
        _wrapInnerContent = function() {
            if (!$e.find('.jscroll-inner').length) {
                $e.contents().wrapAll('<div class="jscroll-inner" />');
            }
        },

        // Find the next link's parent, or add one, and hide it
        _nextWrap = function($next) {
            var $parent;
            if (_options.pagingSelector) {
                $next.closest(_options.pagingSelector).hide();
            } else {
                $parent = $next.parent().not('.jscroll-inner,.jscroll-added').addClass('jscroll-next-parent').hide();
                if (!$parent.length) {
                    $next.wrap('<div class="jscroll-next-parent" />').parent().hide();
                }
            }
        },

        // Remove the jscroll behavior and data from an element
        _destroy = function() {
            return _$scroll.unbind('.jscroll')
                .removeData('jscroll')
                .find('.jscroll-inner').children().unwrap()
                .filter('.jscroll-added').children().unwrap();
        },

        // Observe the scroll event for when to trigger the next load
        _observe = function() {
            if ($e.is(':visible')) {
                _wrapInnerContent();
                var $inner = $e.find('div.jscroll-inner').first(),
                    data = $e.data('jscroll'),
                    borderTopWidth = parseInt($e.css('borderTopWidth'), 10),
                    borderTopWidthInt = isNaN(borderTopWidth) ? 0 : borderTopWidth,
                    iContainerTop = parseInt($e.css('paddingTop'), 10) + borderTopWidthInt,
                    iTopHeight = _isWindow ? _$scroll.scrollTop() : $e.offset().top,
                    innerTop = $inner.length ? $inner.offset().top : 0,
                    iTotalHeight = Math.ceil(iTopHeight - innerTop + _$scroll.height() + iContainerTop);

                if (!data.waiting && iTotalHeight + _options.padding >= $inner.outerHeight()) {
                    //data.nextHref = $.trim(data.nextHref + ' ' + _options.contentSelector);
                    _debug('info', 'jScroll:', $inner.outerHeight() - iTotalHeight, 'from bottom. Loading next request...');
                    return _load();
                }
            }
        },

        // Check if the href for the next set of content has been set
        _checkNextHref = function(data) {
            data = data || $e.data('jscroll');
            if (!data || !data.nextHref) {
                _debug('warn', 'jScroll: nextSelector not found - destroying');
                _destroy();
                return false;
            } else {
                _setBindings();
                return true;
            }
        },

        _setBindings = function() {
            var $next = $e.find(_options.nextSelector).first();
            if (!$next.length) {
                return;
            }
            if (_options.autoTrigger && (_options.autoTriggerUntil === false || _options.autoTriggerUntil > 0)) {
                _nextWrap($next);
                 var scrollingBodyHeight = _$body.height() - $e.offset().top,
                    scrollingHeight = ($e.height() < scrollingBodyHeight) ? $e.height() : scrollingBodyHeight,
                    windowHeight = ($e.offset().top - _$window.scrollTop() > 0) ? _$window.height() - ($e.offset().top - $(window).scrollTop()) : _$window.height();
                if (scrollingHeight <= windowHeight) {
                    _observe();
                }
                _$scroll.unbind('.jscroll').bind('scroll.jscroll', function() {
                    return _observe();
                });
                if (_options.autoTriggerUntil > 0) {
                    _options.autoTriggerUntil--;
                }
            } else {
                _$scroll.unbind('.jscroll');
                $next.bind('click.jscroll', function() {
                    _nextWrap($next);
                    _load();
                    return false;
                });
            }
        },

        // Load the next set of content, if available
        _load = function() {
            var $inner = $e.find('div.jscroll-inner').first(),
                data = $e.data('jscroll');

            data.waiting = true;
            $inner.append('<div class="jscroll-added" />')
                .children('.jscroll-added').last()
                .html('<div class="jscroll-loading" id="jscroll-loading">' + _options.loadingHtml + '</div>')
                .promise()
                .done(function(){
                    if (_options.loadingFunction) {
                        _options.loadingFunction();
                    }
                });

            return $e.animate({scrollTop: $inner.outerHeight()}, 0, function() {
                $inner.find('div.jscroll-added').last().load(data.nextHref, function(r, status) {
                    if (status === 'error') {
                        return _destroy();
                    }
                    var $next = $(this).find(_options.nextSelector).first();
                    data.waiting = false;
                    data.nextHref = $next.attr('href') ? $.trim($next.attr('href') + ' ' + _options.contentSelector) : false;
                    $('.jscroll-next-parent', $e).remove(); // Remove the previous next link now that we have a new one
                    _checkNextHref();
                    if (_options.callback) {
                        _options.callback.call(this);
                    }
                    _debug('dir', data);
                });
            });
        },

        // Safe console debug - http://klauzinski.com/javascript/safe-firebug-console-in-javascript
        _debug = function(m) {
            if (_options.debug && typeof console === 'object' && (typeof m === 'object' || typeof console[m] === 'function')) {
                if (typeof m === 'object') {
                    var args = [];
                    for (var sMethod in m) {
                        if (typeof console[sMethod] === 'function') {
                            args = (m[sMethod].length) ? m[sMethod] : [m[sMethod]];
                            console[sMethod].apply(console, args);
                        } else {
                            console.log.apply(console, args);
                        }
                    }
                } else {
                    console[m].apply(console, Array.prototype.slice.call(arguments, 1));
                }
            }
        };

    // Initialization
    $e.data('jscroll', $.extend({}, _data, {initialized: true, waiting: false, nextHref: _nextHref}));
    _wrapInnerContent();
    _preloadImage();
    _setBindings();

    // Expose API methods via the jQuery.jscroll namespace, e.g. $('sel').jscroll.method()
    $.extend($e.jscroll, {
        destroy: _destroy
    });
    return $e;
};

// Define the jscroll plugin method and loop
$.fn.jscroll = function(m) {
    return this.each(function() {
        var $this = $(this),
            data = $this.data('jscroll'), jscroll;

        // Instantiate jScroll on this element if it hasn't been already
        if (data && data.initialized) {
            return;
        }
        jscroll = new jScroll($this, m);
    });
};

})(jQuery);



!function(a){"use strict";a.jscroll={defaults:{debug:!1,autoTrigger:!0,autoTriggerUntil:!1,loadingHtml:"<small>Loading...</small>",loadingFunction:!1,padding:0,nextSelector:"a:last",contentSelector:"",pagingSelector:"",callback:!1}};var b=function(b,c){var d=b.data("jscroll"),e="function"==typeof c?{callback:c}:c,f=a.extend({},a.jscroll.defaults,e,d||{}),g="visible"===b.css("overflow-y"),h=b.find(f.nextSelector).first(),i=a(window),j=a("body"),k=g?i:b,l=a.trim(h.attr("href")+" "+f.contentSelector),m=function(){var b=a(f.loadingHtml).filter("img").attr("src");if(b){var c=new Image;c.src=b}},n=function(){b.find(".jscroll-inner").length||b.contents().wrapAll('<div class="jscroll-inner" />')},o=function(a){var b;f.pagingSelector?a.closest(f.pagingSelector).hide():(b=a.parent().not(".jscroll-inner,.jscroll-added").addClass("jscroll-next-parent").hide(),b.length||a.wrap('<div class="jscroll-next-parent" />').parent().hide())},p=function(){return k.unbind(".jscroll").removeData("jscroll").find(".jscroll-inner").children().unwrap().filter(".jscroll-added").children().unwrap()},q=function(){if(b.is(":visible")){n();var a=b.find("div.jscroll-inner").first(),c=b.data("jscroll"),d=parseInt(b.css("borderTopWidth"),10),e=isNaN(d)?0:d,h=parseInt(b.css("paddingTop"),10)+e,i=g?k.scrollTop():b.offset().top,j=a.length?a.offset().top:0,l=Math.ceil(i-j+k.height()+h);if(!c.waiting&&l+f.padding>=a.outerHeight())return u("info","jScroll:",a.outerHeight()-l,"from bottom. Loading next request..."),t()}},r=function(a){return a=a||b.data("jscroll"),a&&a.nextHref?(s(),!0):(u("warn","jScroll: nextSelector not found - destroying"),p(),!1)},s=function(){var c=b.find(f.nextSelector).first();if(c.length)if(f.autoTrigger&&(f.autoTriggerUntil===!1||f.autoTriggerUntil>0)){o(c);var d=j.height()-b.offset().top,e=b.height()<d?b.height():d,g=b.offset().top-i.scrollTop()>0?i.height()-(b.offset().top-a(window).scrollTop()):i.height();g>=e&&q(),k.unbind(".jscroll").bind("scroll.jscroll",function(){return q()}),f.autoTriggerUntil>0&&f.autoTriggerUntil--}else k.unbind(".jscroll"),c.bind("click.jscroll",function(){return o(c),t(),!1})},t=function(){var c=b.find("div.jscroll-inner").first(),d=b.data("jscroll");return d.waiting=!0,c.append('<div class="jscroll-added" />').children(".jscroll-added").last().html('<div class="jscroll-loading" id="jscroll-loading">'+f.loadingHtml+"</div>").promise().done(function(){f.loadingFunction&&f.loadingFunction()}),b.animate({scrollTop:c.outerHeight()},0,function(){c.find("div.jscroll-added").last().load(d.nextHref,function(c,e){if("error"===e)return p();var g=a(this).find(f.nextSelector).first();d.waiting=!1,d.nextHref=g.attr("href")?a.trim(g.attr("href")+" "+f.contentSelector):!1,a(".jscroll-next-parent",b).remove(),r(),f.callback&&f.callback.call(this),u("dir",d)})})},u=function(a){if(f.debug&&"object"==typeof console&&("object"==typeof a||"function"==typeof console[a]))if("object"==typeof a){var b=[];for(var c in a)"function"==typeof console[c]?(b=a[c].length?a[c]:[a[c]],console[c].apply(console,b)):console.log.apply(console,b)}else console[a].apply(console,Array.prototype.slice.call(arguments,1))};return b.data("jscroll",a.extend({},d,{initialized:!0,waiting:!1,nextHref:l})),n(),m(),s(),a.extend(b.jscroll,{destroy:p}),b};a.fn.jscroll=function(c){return this.each(function(){var d,e=a(this),f=e.data("jscroll");f&&f.initialized||(d=new b(e,c))})}}(jQuery);
</script>