jQuery.noConflict()(function($) {

    "use strict";
var body = $('body');
    var initWPMLDemoClickLink = function(){

        body.on('click', '.demo-language-selector.inline-style-changer a', function (e) {

            alert('The language switcher requires WPML plugin to be installed and activated.');

            e.preventDefault();
        });
    };

    var initWPMLListClickLink = function(){

        body.on('click', '.language-selector.list-style-changer >a', function (e) {
            var $this = $(this),
                parent_ul = $this.parent().find('ul');

            if(!parent_ul.hasClass('opened')){
                parent_ul.addClass('opened')
            }else{
                parent_ul.removeClass('opened')
            }
            e.preventDefault();
        });
    };

    var initWPMLDemoClickLinkList = function(){

        body.on('click', '.demo-language-selector.list-style-changer a', function (e) {

            var $this = $(this),
                parent_ul = $this.parent().find('ul');

            if(!parent_ul.hasClass('opened')){
                parent_ul.addClass('opened')
            } else {
                parent_ul.removeClass('opened');
            }
            //alert('The language switcher requires WPML plugin to be installed and activated.');

            e.preventDefault();
        });

        body.on('click', '.demo-language-selector.list-style-changer ul.opened li a', function (e) {
            var $this = $(this);
            $this.parent().parent().removeClass('opened');
            alert('The language switcher requires WPML plugin to be installed and activated.');
            e.preventDefault();
        });
    };
    // Click Сurrency Demo
    var initDemoСurrencyClick = function(){

        body.on('click', '.demo-currency-selector a', function (e) {
            var $this = $(this),
                parent_ul = $this.parent().find('ul');
            if(!parent_ul.hasClass('opened')){
                parent_ul.addClass('opened')
            } else {
                parent_ul.removeClass('opened');
            }
            //alert('The language switcher requires WPML plugin to be installed and activated.');

            e.preventDefault();
        });

        body.on('click', '.demo-currency-selector ul.opened li a', function (e) {
            var $this = $(this);
            $this.parent().parent().removeClass('opened');
            e.preventDefault();
        });
    };

    //  WPML Demo Click Link
    initWPMLDemoClickLink();
    //  WPML Link Click List Style
    initWPMLListClickLink();
    //  WPML Demo Click Link List Style
    initWPMLDemoClickLinkList();
    // Click Сurrency Demo
    initDemoСurrencyClick();

});