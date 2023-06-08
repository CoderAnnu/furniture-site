<?php 
//kaswara Demo Importer Dashboard
add_action( 'admin_menu', 'kaswara_dashboard_menu' );
function kaswara_dashboard_menu(){
    //Add Admin Menu Page
    add_menu_page(
        'kaswara',     
        'kaswara',    
        'manage_options',  
        'kaswara-framework',    
        'kaswara_dashboard_render',
        KASWARA_PLUGIN_URL.'/assets/images/kswr-logo-small.png'
    );

    //Add Submenu Page For The Shortcode Styling
    add_submenu_page(
        'kaswara-framework',
        esc_html__('Shortcode Styling','kaswara'),
        esc_html__('Shortcode Styling','kaswara'),
        'manage_options',
        'kaswara-shortcode-styling',
        'kaswara_shortcode_styling_render'
    );

    //Add Submenu Page For The Google Fonts
    add_submenu_page(
        'kaswara-framework',
        esc_html__('Google Fonts','kaswara'),
        esc_html__('Google Fonts','kaswara'),
        'manage_options',
        'kaswara-google-fonts',
        'kaswara_google_fonts_render'
    );

    //Add Submenu Page For The Shortcode Manager
    add_submenu_page(
        'kaswara-framework',
        esc_html__('Shortcode Manager','kaswara'),
        esc_html__('Shortcode Manager','kaswara'),
        'manage_options',
        'kaswara-shortcode-manager',
        'kaswara_shortcode_manager_render'
    );





}

function kaswara_dashboard_render(){
	?>
<?php kaswara_dashboard_maker('dashboard'); ?>
<div class="kswr-dash-content" style="background: #23282d; padding: 0px; padding-right: 20px; padding-top: 10px;">
    <?php include_once(KASWARA_PLUGIN_PATH.'includes/dashboard/sections/welcome.php'); ?>
</div>
<?php 
}
function kaswara_google_fonts_render(){
    ?>
<?php kaswara_dashboard_maker('google-fonts'); ?>
<div class="kswr-dash-content" style="background: #23282d; padding: 0px; padding-bottom: 30px;">
    <?php include_once(KASWARA_PLUGIN_PATH.'includes/dashboard/sections/google-fonts.php'); ?>
</div>
<?php 
}


function kaswara_custom_settings_render(){
    ?>
<?php kaswara_dashboard_maker('customsettings'); ?>
<div class="kswr-dash-content" style="background: #23282d; padding: 0px; padding-right: 20px; padding-top: 10px;">
    <?php include_once(KASWARA_PLUGIN_PATH.'includes/dashboard/sections/custom-settings.php'); ?>
</div>
<?php 
}


function kaswara_shortcode_manager_render(){
    ?>
<?php kaswara_dashboard_maker('shortcode-manager'); ?>
<div class="kswr-dash-content" style="padding: 0px;">
    <?php include_once(KASWARA_PLUGIN_PATH.'includes/dashboard/sections/shortcode-manager.php'); ?>
</div>
<?php 
}

function kaswara_shortcode_styling_render(){
     ?>
<?php kaswara_dashboard_maker('shortcode-styling'); ?>
<div class="kswr-dash-content" style="padding: 0px;">
    <?php include_once(KASWARA_PLUGIN_PATH.'includes/dashboard/sections/shortcode-styling.php'); ?>
</div>
<?php 
}

function kaswara_demo_importer_render(){
    ?>
<?php kaswara_dashboard_maker('demo-importer'); ?>
<div class="kswr-dash-content" style="background: #23282d; padding: 0px;">
    <?php include_once(KASWARA_PLUGIN_PATH.'includes/dashboard/sections/demo-importer.php'); ?>
</div>
<?php 
}





function kaswara_dashboard_maker($active){
    $elementsArray = array(
        'dashboard' => array(
            'id' => 'dashboard',
            'name' => esc_html__('Dashboard','kaswara'),
            'img' => KASWARA_IMAGES.'dash-icons/dash.png',
            'link' => admin_url('admin.php?page=kaswara-framework'),                        
        ),
        'shortcode-styling' => array(
            'id' => 'shortcode-styling',
            'name' => esc_html__('Shortcode Styling','kaswara'),
            'img' => KASWARA_IMAGES.'dash-icons/shortcode-styling.png',
            'link' => admin_url('admin.php?page=kaswara-shortcode-styling'),                        
        ),
         'shortcode-manager' => array(
            'id' => 'shortcode-manager',
            'name' => esc_html__('Shortcode Manager','kaswara'),
            'img' => KASWARA_IMAGES.'dash-icons/cube.png',
            'link' => admin_url('admin.php?page=kaswara-shortcode-manager'),                        
        ), 
        'cf7-designer' => array(
            'id' => 'cf7-designer',
            'name' => esc_html__('Contact Form 7 Designer','kaswara'),    
            'img' => KASWARA_IMAGES.'dash-icons/cf7.png',
            'link' => admin_url('admin.php?page=kaswara-cf7-designer'),                        
        ),
        'google-fonts' => array(
            'id' => 'google-fonts',
            'name' => esc_html__('Google Fonts','kaswara'),
            'img' => KASWARA_IMAGES.'dash-icons/font.png',
            'link' => admin_url('admin.php?page=kaswara-google-fonts'),                        
        ),
        'demo-importer' => array(
            'id' => 'demo-importer',
            'name' => esc_html__('Demo Importer','kaswara'),
            'img' => KASWARA_IMAGES.'dash-icons/import.png',
            'link' => admin_url('admin.php?page=kaswara-demo-importer'),                        
        ),
        'customsettings' => array(
            'id' => 'customsettings',
            'name' => esc_html__('Custom Settings','kaswara'),
            'img' => KASWARA_IMAGES.'dash-icons/code.png',
            'link' => admin_url('admin.php?page=kaswara-code-editor'),                        
        ),  
        'icon-manager' => array(
            'id' => 'icon-manager',
            'name' => esc_html__('Icon Manager','kaswara'),
            'img' => KASWARA_IMAGES.'dash-icons/iconmanager.png',
            'link' => admin_url('admin.php?page=kaswara-icon-manager'),                        
        ),                
        /*'support' => array(
            'id' => 'support',
            'name' => esc_html__('Support','kaswara'),
            'img' =>  KASWARA_IMAGES.'dash-icons/sup.png',
            'link' => 'https://sayenthemes.ticksy.com/',                        
        ),*/
        'documentation' => array(
            'id' => 'documentation',
            'name' => esc_html__('Documentation','kaswara'),
            'img' =>  KASWARA_IMAGES.'dash-icons/docs.png',
            'link' => 'http://docs.kameleonwp.com/kaswara-doc/',                        
        ),
    );
    kaswara_loading_area();
?>
<style type="text/css">
    #wpcontent,
    #wpbody-content {
        padding-left: 0px !important;
        padding-bottom: 0px !important;
        height: 100%;
        overflow: visible;
    }

    #wpfooter {
        display: none;
    }

</style>
<div class="kswr-dash-top" data-menu="hidden">
    <div class="kswr-dash-logo" data-situation="normal">
        <div class="kswr-dash-logo-loading">
            <div class="kswr-backend-loader"></div>
        </div>
        <img src="<?php echo KASWARA_IMAGES.'kswr-logo.png' ?>">
        <div class="kswr-dash-info">
            <div class="kswr-dash-name">Kaswara</div>
            <div class="kswr-dash-version"><?php echo KASWARA_PLUGIN_VERSION; ?></div>
        </div>
    </div>
    <div class="kswr-dash-title"><?php echo $elementsArray[$active]['name'] ?>.</div>
    <div class="kswr-menu-show-button" onclick="kswr_show_menu_popup(this);"><span></span><span></span><span></span></div>
    <div class="kswr-dash-popupmenu">
        <div class="kswr-menu-closer" onclick="kswr_close_menu_popup();">x</div>
        <div class="kswr-menu-title"><?php echo esc_html__('MENU','kaswara'); ?></div>
        <div class="kswr-dash-nav">
            <div class="kswr-dash-nav-insider">
                <?php foreach ($elementsArray as $element) { $dataActvive = 'none'; if($active == $element['id'])  $dataActvive = 'active'; ?>
                <div class="kswr-dash-nav-item" data-situation="<?php echo esc_attr($dataActvive); ?>" data-id="<?php echo esc_attr($element['id']); ?>">
                    <div class="kswr-dash-nav-img"><img src="<?php echo esc_url($element['img']); ?>"></div>
                    <div class="kswr-dash-nav-name"><?php echo $element['name']; ?></div>
                    <a href="<?php echo esc_url($element['link']); ?>"></a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<div class="kswr-back-popup" id="kswr-back-notif" style="height:110px;" data-situation="hidden">
    <div class="kswr-back-popup-closer" onclick="kswr_close_dash_notification();">x</div>
    <div class="kswr-back-popup-title" id="kswr-back-ntf-title"></div>
    <div class="kswr-dash-notification-info" id="kswr-back-ntf-info"></div>
    <div class="kswr-dash-notification-buttons">
        <div class="kswr-dash-notification-btn thatred" id="kswr-notif-no"><?php echo esc_html__('Cancel','kaswara'); ?></div>
        <div class="kswr-dash-notification-btn thatgreen" id="kswr-notif-yes"><?php echo esc_html__('Proceed','kaswara'); ?></div>
    </div>
</div>

<a href="https://sayenthemes.ticksy.com/" target="_blank" class="kswr-back-support-link" title="<?php echo esc_html__('Contact Support','kaswara') ?>">
    <i class="km-icon-uniEC8A"></i>
</a>

<div class="kswr-flow-menuicon" onclick="kswr_show_menu_popup(this);">
    <div class="kswr-flow-menuicon-insider"><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span></div>
</div>
<?php 

}

function kaswara_loading_area(){
    ?>
<div class="kswr-dash-success"><i class="km-icon-done_all"></i><span><?php echo esc_html__('Kaswara Operation Done!','kaswara'); ?></span></div>
<div class="kswr-dash-loading-small"><i class="km-icon-spinner9"></i><span><?php echo esc_html__('Kaswara Operation loading!','kaswara'); ?></span></div>
<div class="kswr-dash-loading">
    <div class="kswr-backend-loader-container">
        <div class="kswr-backend-loader-img" style="background-image:url(<?php echo KASWARA_IMAGES.'kswr-logo.png' ?>);">
            <div class="kswr-backend-loader"></div>
        </div>
    </div>
    <div class="kswr-backend-loader-message"><?php echo esc_html__('Stand up and stretch a little, while processing the data!','kaswara'); ?></div>
</div>
<?php 
}

function kaswara_loading_area_insider(){
    ?>
<div class="kswr-dash-loading-insider">
    <div class="kswr-backend-loader-container">
        <div class="kswr-backend-loader-img" style="background-image:url(<?php echo KASWARA_IMAGES.'kswr-logo.png' ?>);">
            <div class="kswr-backend-loader"></div>
        </div>
    </div>
    <div class="kswr-backend-loader-message"><?php echo esc_html__('Stand up and stretch a little, while processing the data!','kaswara'); ?></div>
</div>
<?php 
}


?>
