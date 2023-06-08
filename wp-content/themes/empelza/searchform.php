<form class="search" role="search" method="get" id="searchform" action="<?php echo site_url()?>" >
    <fieldset>
        <input type="text" class="searchinput" value="<?php echo get_search_query(); ?>" name="s" id="search-form" placeholder="<?php echo esc_attr__('Search...', 'empelza')?>" />
        <div class="searchsubmit">
        <input  type="submit" id="searchsubmit" class="submit-btn" value=" "/>
            <i class="fl-custom-icon-loupe"></i>
        </div>
    </fieldset>
</form>