jQuery(function($){
    "use strict";

    var button = $('.fl-load-more-vc-enable'),
            page = 2,
            loading = false;
        $('body').on('click', '.fl-load-more-vc-enable', function () {
            button.addClass('loading');
            button.find('span').text(portfolioloadmorevc.button_loading);
            let post_per_page       = $(this).attr('data-post-per-page'),
                portfolio_style     = $(this).attr('data-portfolio-style');

            if (!loading) {
                loading = true;
                let data = {
                    action:             'portfolio_ajax_load_more_vc',
                    post_per_page:       post_per_page,
                    portfolio_style:     portfolio_style,
                    nonce:               portfolioloadmorevc.nonce,
                    page:                page,
                    query:               portfolioloadmorevc.query,
                };
                $.post(portfolioloadmorevc.url, data, function (res) {

                    if (res.success) {
                        let $content = $(res.data);
                        $content.imagesLoaded(function () {
                            $('.fl--portfolio-vc-content-wrap').append($content).isotope('appended', $content);
                        });
                        fl_theme.initVcCustomFunction();
                        //Hide the Load More button if no more posts to load
                        if (page == portfolioloadmorevc.maxpage) {
                            button.find('span').text(portfolioloadmorevc.button_text_no_post);
                            button.removeClass('fl-load-more-vc-enable');
                        } else {
                            button.find('span').text(portfolioloadmorevc.button_text);
                        }
                        page = page + 1;

                        loading = false;
                        button.removeClass('loading');
                    } else {
                        console.log(res);

                    }
                }).fail(function (xhr, textStatus, e) {
                    // console.log(xhr.responseText);
                });
            }
        });

});