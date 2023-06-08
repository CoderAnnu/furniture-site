
<?php if ( is_active_sidebar( 'header-sidebar-1' ) or is_active_sidebar( 'header-sidebar-2' )) { ?>
    <div class="top-header-content">
        <div class="fl-header-sidebar container">
            <?php if ( is_active_sidebar( 'header-sidebar-1' ) ) { ?>
                <div class="header-sidebar-left-content header-sidebar-content">
                    <?php dynamic_sidebar( 'header-sidebar-1' ); ?>
                </div>
            <?php } ?>
            <?php if ( is_active_sidebar( 'header-sidebar-2' ) ) { ?>
                <div class="header-sidebar-right-content header-sidebar-content">
                    <?php dynamic_sidebar( 'header-sidebar-2' ); ?>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>
