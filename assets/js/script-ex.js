(function($) {
    $('.checkbox input').iCheck({
        checkboxClass: 'icheckbox_flat',
        increaseArea: '20%'
    });
})(jQuery);

$(window).ready(function() {
    setTimeout(function() {
        var kkfades = $('.kk-fade-hide');
        if(kkfades.length) {
            kkfades.addClass('kk-fade-show');
        }
    }, 100);

    if($('#login-page,#register-page,#change-pass-page,#forgot-pass-page,#contact').length) {
        var pushFooter = $('.push-footer-wrapper');
        if(pushFooter.length) {
            var offsetHeight = 31;
            var navHeight = $('.navbar').height();
            var footHeight = $('footer').height();
            var pushHeight = pushFooter.height() + offsetHeight;
            var height = pushHeight - (navHeight + footHeight);

            pushFooter.css({
                'min-height': height,
                'height': height
            });
        }
    }

    $('#sharrre').sharrre({
        share: {
            googlePlus: true,
            facebook: true,
            twitter: true
        },
        buttons: {
            googlePlus: {size: 'tall', annotation:'bubble'},
            facebook: {layout: 'box_count'},
            twitter: {count: 'vertical', via: 'nangkakkak'}
        },
        enableHover: true,
        enableTracking: true,
        click: function(api, options) {
            var pn = $(api.element).find('.buttons');
            pn[pn.css('display') == 'none' ? 'show' : 'hide']();
        }
    });

    // fix youtube-player css
    var editedContentPlayer = $('.row-body > p > .youtube-player');
    if(editedContentPlayer.length) {
        editedContentPlayer.wrap('<div class="embed-youtube"></div>');
    }
});