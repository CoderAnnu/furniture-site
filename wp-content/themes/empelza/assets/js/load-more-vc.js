jQuery.noConflict()(function($) {

    "use strict";

    var initLoadMoreFunctionVc = function() {
        var body = $('body');
        var page_num = parseInt(empelza_vc_pagination_data.startPage) + 1;
        var max_pages = parseInt(empelza_vc_pagination_data.maxPages);
        var next_link = empelza_vc_pagination_data.nextLink;

        var container = empelza_vc_pagination_data.container;
        var $container = $(container);
        var container_has_isotope = false;


        var last_btn_text = empelza_vc_pagination_data.button_text_no_post;

        var $button = $('#fl-ajax-load-more-pagination-vc');


        if (page_num > max_pages) {
            $button.addClass('load_more_disable').text(last_btn_text);
        }




        $button.on('click', function(e) {
            e.preventDefault();
            if (!$(this).hasClass('loading') && !$(this).hasClass('load_more_disable') && page_num <= max_pages) {
                $.ajax({
                    type: 'GET',
                    url: next_link,
                    dataType: 'html',
                    beforeSend: function() {
                        $button.addClass('loading');
                        $button.text(empelza_vc_pagination_data.button_loading);
                    },
                    complete: function(content) {
                        $button.text(empelza_vc_pagination_data.button_text);
                        $button.removeClass('loading');

                        if (content.status == 200 && content.responseText != '') {
                            page_num++;

                            var link = next_link.substring(0,next_link.indexOf("page"));
                            link += 'page/';

                            var extraLink = next_link.substring(link.length);
                            if(extraLink.indexOf('/') != -1) {
                                extraLink = extraLink.substring(extraLink.indexOf('/'));
                            } else {
                                extraLink = '';
                            }

                            next_link = link + page_num + extraLink;

                            if (page_num > max_pages) {

                                $button.addClass('load_more_disable').text(last_btn_text);

                            }

                            if ($(content.responseText).find(container).length > 0) {
                                container_has_isotope = ($container.hasClass('fl-isotope-wrapper'));
                                $(content.responseText).find(container).children().each(function() {
                                    if (!container_has_isotope) {
                                        $container.append( $(this));
                                        initVelocityAnimation();

                                    } else {
                                        initVelocityAnimation();
                                        var $content = $(this);
                                        $content.imagesLoaded(function () {
                                            $container.append($content).isotope('appended', $content);
                                        });

                                    }
                                });
                                $('body').trigger('post-load');
                            }
                        }
                    }
                });
            }
        });
    };
    $(document).ready(function(){
        // Load More
        initLoadMoreFunctionVc();
    });

});