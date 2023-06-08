(function ($) {
    "use strict";
    var body                            = $('body'),
        prodgress_bar_wrapper           = $('#fl-page--preloader'),
        prodgress_bar_wrapper_top       = $('.fl-top-background-preloader'),
        prodgress_bar_wrapper_bottom    = $('.fl-bottom-background-preloader'),
        top_progress_left               = $('.fl-loader_left'),
        top_progress_right              = $('.fl-loader_right'),
        preloader_perc                  = $('.fl--preloader-percent'),
        prodgress_bar                   = $('.fl--preloader-progress-bar'),
        img_preloader                   = $('img'),
        loadedCount                     = 0,
        imagesToLoad                    = img_preloader.length,
        loadingProgress                 = 0,
        tween                           = window.TweenMax;

    body.imagesLoaded({
            background: false
        }
    ).progress( function() {
        loadProgress();
    });

    function loadProgress()
    {
        loadedCount++;

        loadingProgress = (loadedCount/imagesToLoad);

        TweenLite.to(progressTimeline, 0.7, {progress:loadingProgress, ease:Linear.easeNone});

    }

    var progressTimeline = new TimelineMax({paused:true,onUpdate:progressUpdate,onComplete:loadComplete});
    progressTimeline
        .to($('.fl--preloader-progress-bar span'), 1, {width:100+ '%', ease:Linear.easeNone});

    function progressUpdate()
    {
        loadingProgress = Math.round(progressTimeline.progress() * 100);
        preloader_perc.text(loadingProgress + '%');
    }


    // Start animation Function
    tween.set(prodgress_bar, {
        opacity: 1,
        y: '0%',
        force3D: true
    });

    tween.set(preloader_perc, {
        opacity: 1,
        y: '0%',
        force3D: true
    });

    tween.set(prodgress_bar_wrapper_top, {
        opacity: 1,
        y: '0%',
        force3D: true
    });
    tween.set(prodgress_bar_wrapper_bottom, {
        opacity: 1,
        y: '0%',
        force3D: true
    });


    function loadComplete_animation() {
        tween.to(preloader_perc, 0.3, {
            opacity: 0,
            y: '300%'
        });
        tween.to(prodgress_bar, 0.3, {
            opacity: 0,
            y: '-300%'
        });
        tween.to(prodgress_bar_wrapper_top, 0.7, {
            y: '-100%',
            delay: 0.2
        }, 0.5);
        tween.to(prodgress_bar_wrapper_bottom, 0.7, {
            y: '100%',
            delay: 0.2
        }, 0.5);
        tween.to(top_progress_right, 0.4, {
            width:'100%',
            opacity: 0
        }, 0.2);
        tween.to(top_progress_left, 0.4, {
            width:'100%',
            opacity: 0
        }, 0.2);

        tween.to(prodgress_bar_wrapper, 0, {
            display: 'none',
            delay: 1
        }, 0.1);

    }

    function loadComplete() {
        loadComplete_animation();
    }

}(jQuery));