<?php 
/*
	Plugin Name: Kaswara Modern VC Addons
	Plugin URI: http://themeforest.net/user/sayenthemes
	Description: Fancy elements and shortcodes for visual composer page builder. Take your design to another level.
	Author: Templines
	Version: 2.7.1
	Author URI: http://themeforest.net/user/templines
*/

require 'plugin-update-checker/plugin-update-checker.php';
$MyUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'http://assets.templines.com//plugins/kaswara.json',
    __FILE__,
    'kaswara'
);


define( 'KASWARA_PLUGIN_VERSION', '2.1' );
define( 'KASWARA_PLUGIN_PATH', plugin_dir_path(__FILE__) );
define( 'KASWARA_PLUGIN_URL', plugin_dir_url(__FILE__) );
define( 'KASWARA_IMAGES', KASWARA_PLUGIN_URL . 'assets/images/' );
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

//importing files 
require_once(KASWARA_PLUGIN_PATH . 'includes/handlers/ajax_handler.php');
require_once(KASWARA_PLUGIN_PATH . 'includes/dashboard/dashboard.php');
require_once(KASWARA_PLUGIN_PATH . 'includes/dashboard/base/diverse.php');


//add_action( 'vc_after_init', 'kaswara_init_addons' ); 

add_action( 'after_setup_theme', 'kaswara_init_addons' ); 
function kaswara_init_addons(){
  if(defined('WPB_VC_VERSION')) {  
    require_once(KASWARA_PLUGIN_PATH . 'includes/params/params-bundle.php');
    require_once(KASWARA_PLUGIN_PATH . 'assets/font-icon/icons_array.php');
    require_once(KASWARA_PLUGIN_PATH . 'includes/elements/elements-bundle.php');
  }
}
add_action( 'init', 'kaswara_load_text_domain' );
function kaswara_load_text_domain() {
  load_plugin_textdomain( 'kaswara', false, basename( dirname( __FILE__ ) ) . '/languages' ); 
}

if(is_plugin_active('contact-form-7/wp-contact-form-7.php') && in_array('cf7',explode(',',kswr_get_enabled_shortcodes()))  ){
  require_once(KASWARA_PLUGIN_PATH . 'includes/dashboard/cf7-designer/fields/fields_bundle.php');
  require_once( KASWARA_PLUGIN_PATH. 'includes/dashboard/cf7-designer/kswr-cf7-designer.php');
}
if(in_array('replicasection',explode(',',kswr_get_enabled_shortcodes()))  ){
  require_once(KASWARA_PLUGIN_PATH . 'includes/dashboard/replica-section/replica-section.php');
}
require_once(ABSPATH . 'wp-admin/includes/file.php');
//Enqueue Scripts and Styles Back-End
function kaswara_core_ressources_backend_init(){
    //Admin & back end scripts
    if(is_admin()):   
      wp_enqueue_style( 'kswr-style',KASWARA_PLUGIN_URL.'assets/css/style.css' );     
      wp_enqueue_style( 'kswr-icons',KASWARA_PLUGIN_URL.'assets/font-icon/icons.css' );     
      wp_enqueue_script( 'kswr-script', KASWARA_PLUGIN_URL.'assets/js/script.js' , array( 'jquery' ));  
      wp_register_script('kswr-code-editor-script', KASWARA_PLUGIN_URL.'assets/js/code-editor.js', array('jquery'), null, false);     
      wp_register_script('kswr-gfont-manager', KASWARA_PLUGIN_URL.'assets/js/font-manager.js', array('jquery'), null, false);     
      wp_register_script('kswr-uploadfile-script', KASWARA_PLUGIN_URL.'assets/js/uploadfile.js', array('jquery'), null, false);     
      wp_enqueue_script("jquery-ui-draggable");
      $plugin_uri_admin = array( 
        'ajax_handler' => admin_url( 'admin-ajax.php' ), 
        'customCSSValue'=> stripcslashes(base64_decode(kaswara_get_single_option('customCSS'))), 
        'customJSValue'=> stripcslashes(base64_decode(kaswara_get_single_option('customJS'))),
        'gFontsCollection' => kaswara_get_single_option('gfonts')
      );
      wp_localize_script( 'kswr-script', 'plugindir', $plugin_uri_admin );
      wp_localize_script( 'kswr-uploadfile-script', 'plugindir', $plugin_uri_admin );
      wp_localize_script( 'kswr-code-editor-script', 'custom', $plugin_uri_admin ); 
      wp_localize_script( 'kswr-gfont-manager', 'thatajax', $plugin_uri_admin ); 
      $fonts_uri_admin = array(
        'gFontsList' => kswr_return_google_font_names(),
      );
      wp_localize_script( 'kswr-gfont-manager', 'gfonts', $fonts_uri_admin );    
    endif;


}
add_action('admin_enqueue_scripts', 'kaswara_core_ressources_backend_init');

//Enqueue Scripts and Styles Front-End
function kaswara_core_ressources_frontend_init(){
    //front end scripts
    wp_enqueue_style( 'kswr-front-icons',KASWARA_PLUGIN_URL.'assets/font-icon/icons.css' );     
    wp_enqueue_style( 'kswr-front-style',KASWARA_PLUGIN_URL.'front/assets/css/style.css' );    
    wp_enqueue_script( 'kswr-front-script', KASWARA_PLUGIN_URL.'front/assets/js/script.js' , array( 'jquery' ));  
    wp_register_script("kswr_cf7-script",KASWARA_PLUGIN_URL.'front/assets/js/cf7-script.js',null,null,false);

    if( isset($post) &&  stripos( $post->post_content, '[kswr_cf7') ) wp_enqueue_script('kswr_cf7-script');
}
add_action('wp_enqueue_scripts', 'kaswara_core_ressources_frontend_init');



//Function to Return the plugin options slug  
function kaswara_get_options_slug_plugin(){
  $opt_name = "kaswara";
  if(is_multisite()){
    $opt_name = "kaswara".get_current_blog_id();
  }
  return $opt_name;
}

//Function To Get Single Option Name
function kaswara_get_single_option($optionName){
  if(get_option(kaswara_get_options_slug_plugin().'-'.$optionName))    
   return get_option(kaswara_get_options_slug_plugin().'-'.$optionName);
 return '';
}

//Function To Create A new or Update An Options
function kaswara_save_option($optionName, $optionValue){
   if(get_option($optionName) )
         update_option($optionName, $optionValue);       
    else {
      add_option($optionName, $optionValue);
      update_option($optionName, $optionValue);            
    }
}
//Check if options exist if not give it a default value.
function kaswara_check_option($optionName, $optionValue){
   if(!get_option($optionName) ){
      add_option($optionName, $optionValue);
      update_option($optionName, $optionValue);            
    }
}

//function to get the shortcode list active
function kswr_get_enabled_shortcodes(){
  $shortcodeList =  get_option('kswr_shortcode_list');
  if($shortcodeList)
    return $shortcodeList;
  return kswr_get_shortcodes();
}

function kswr_get_shortcodes(){
  return 'skillbar,radialprogress,socialshare,findus,videomodal,modalwindow,button,alertbox,bfimage,teammate,lineseparator,iconseparator,iconboxaction,interactiveiconbox,postgrid,hoverimage,sidebyside,filterimages,twopichover,dropcaps,heading,singleicon,iconbundle,iconboxinfo,infolist,counter,pricingplan,cardflip,3dcardflip,verticalskillbar,modernflipbox,imagebanner,hoverinfobox,spacer,fancytext,testimonial,animationblock,modalanything,cardslider,pricebox,carousel,countdown,cf7,replicasection,kswr_rows_columns,pilingsection,googlemaps,layeredimages,animatedheading,modernimage,pricelisting,customgallery,hotspot';
}




function kaswara_get_options_name_plugin(){
  $opt_name = "kaswara";
  if(is_multisite()){
    $opt_name = "kaswara".get_current_blog_id();
  }
  return get_option($opt_name);
}


//Get Contact Form Styles
function kaswara_cf7_styles(){
  $kmcf7_styles = kaswara_get_single_option('kmcf7_styles');
  $cf7_styles = array('Default' => 'default');
 if(!empty($kmcf7_styles)){
    foreach($kmcf7_styles as $myStyleID => $myStyle): 
      if($myStyleID != ''){
        $cf7_styles[$myStyle['styleName']] = $myStyleID;
      }
    endforeach;                  
 }
  return $cf7_styles;
}

function kaswara_cf7_forms(){
  $cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
  $contact_forms = array();
  if ( $cf7 ) {
    foreach ( $cf7 as $cform ) {
      $contact_forms[ $cform->post_title ] = $cform->ID;
      }
  } else 
     $contact_forms[ __( 'No contact forms found', 'kaswara' ) ] = 0;

  return $contact_forms;   
}

function kswr_replica_section_list(){
  $replica_section = get_posts( 'post_type="replica_section"&numberposts=-1' );
  $result = array();
    $result['None'] = 'none';
  if ( $replica_section ) {
       foreach ( $replica_section as $replica ) {
            $result[ $replica->post_title ] = $replica->ID;
        }
  }

  return $result;   
}

function fix_kaswara_font_styles(&$style, &$additional_font_style = false){
    $head_title_fstyle_fixed = explode(";", $style);    
	foreach($head_title_fstyle_fixed as $h_index => $h_style){
        if (!strlen($h_style))
            continue;
        list($h_type,$h_val) = explode(":", $h_style);        
        
        if (strtolower($h_val) == 'inherit' || strtolower($h_val) == 'theme font' || strtolower($h_val) == 'title font'){        
            unset($head_title_fstyle_fixed[$h_index]);            
        }
        
        if ( strtolower($h_val) == 'theme font'){
            $additional_font_style = 'tmpl-theme-font';
        }
        
        if (strtolower($h_val) == 'title font'){        
            $additional_font_style = 'tmpl-title-font';
        }
        
	}

    $style = implode(";", $head_title_fstyle_fixed);
    return $style;
}


?>
