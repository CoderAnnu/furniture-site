<div class="header-search-form closed">
    <div class="search-form-wrapper">
        <div class="container">
        <!--Search form Start-->
            <form class="search_global" role="search" method="get" id="searchform-global" action="<?php echo esc_url(site_url())?>" >
                <fieldset>
                <div class="row search-form-row">
                 <input type="text" class="searchinput" value="<?php echo esc_attr(get_search_query()); ?>" name="s" id="search-form-global" placeholder="<?php echo esc_attr__('Search keyword ...', 'empelza')?>" />
                </div>
                </fieldset>
                <div class="info-text"><?php echo esc_html(empelza_get_theme_mod('search_text')); ?></div>
            </form>
        <!--Search form End-->
        </div>
    </div>
</div>