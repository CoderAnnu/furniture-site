<?php 
//Kaswara Contact Form7 Designer
if(is_plugin_active('contact-form-7/wp-contact-form-7.php') ){
//Add Submenu Page For The Contact Form7 Designer
add_action( 'admin_menu', 'kaswara_dashboard_add_cf7' );
function kaswara_dashboard_add_cf7(){
    add_submenu_page(
        'kaswara-framework',
        'CF7 Designer',
        'CF7 Designer',
        'manage_options',
        'kaswara-cf7-designer',
        'kaswara_cf7_designer'
    );  
}

function kaswara_cf7_designer(){
    ?>  
        <?php kaswara_dashboard_maker('cf7-designer'); ?>                      
        <div class="kswr-dash-content" style="padding: 0px; ">                         
        <?php include_once(KASWARA_PLUGIN_PATH.'includes/dashboard/sections/cf7-designer.php'); ?>
    </div>   
<?php
}


function kaswara_cf7_submit_handler( $tag ) {
  $tag = new WPCF7_FormTag( $tag );

  $class = wpcf7_form_controls_class( $tag->type );

  $atts = array();

  $atts['class'] = $tag->get_class_option( $class );
  $atts['class'] .= ' km_cf7-button ';
  $atts['id'] = $tag->get_id_option();
  $atts['tabindex'] = $tag->get_option( 'tabindex', 'int', true );

  $value = isset( $tag->values[0] ) ? $tag->values[0] : '';

  if ( empty( $value ) )
    $value = __( 'Send', 'contact-form-7' );

  $atts['type'] = 'submit';
  $atts['value'] = $value;

  $atts = wpcf7_format_atts( $atts );

  $html = sprintf( '<div class="km_cf7-submit-container">
        <div class="km_cf7-submit-insider">
          <div class="km_cf7-submit-btn-txt km_cf7-btn-txt-r">'.$value.'</div>
          <div class="km_cf7-submit-btn-txt km_cf7-btn-txt-h">'.$value.'</div>
          <div class="km_cf7-btn-bg-r"></div><div class="km_cf7-btn-bg-h"></div>
          <input %1$s />
        </div>
      </div>', $atts );

  return $html;
}




function kaswara_cf7_styletypes(){
    return array(
        'qaswara' => array(
            'color' => '#444',
            'defaultStyle' => '--qaswara-input-height:50px;--qaswara-input-margin-top:15px;--qaswara-input-margin-bottom:15px;--qaswara-input-font-size:15px;  --qaswara-input-color: #888;    --qaswara-color: #bbb;     --qaswara-font-size:15px;--qaswara-border-width: 1px;  --qaswara-border-color:#eee;--qaswara-border-active-color:#269AD6;--qaswara-textarea-height:250px;',
            'styleBuilder' => kaswara_cf7_get_form_array('qaswara')
        ),
        'haruki' => array(
            'color' => '#444',
            'defaultStyle' => '--haruki-font-size:15px;--haruki-input-font-size:15px;--haruki-input-height:45px;--haruki-textarea-height:250px;--haruki-input-margin-top:15px;--haruki-input-margin-bottom:15px;--haruki-input-background:#fff ;--haruki-color: #888;--haruki-input-color: #888;--haruki-active-color: #6a7989;--haruki-border-width: 1px;--haruki-border-color: #eee;--haruki-active-border-width: 3px;--haruki-active-border-color: #6a7989;',
            'styleBuilder' => kaswara_cf7_get_form_array('haruki')
        ),
        'hoshi' => array(
            'color' => '#444',
            'defaultStyle' => '--hoshi-input-height:50px;--hoshi-input-margin-top:15px;--hoshi-input-margin-bottom:15px;--hoshi-font-size:11px;--hoshi-input-font-size:11px;--hoshi-color: #888;--hoshi-input-color: #6a7989;--hoshi-border-width: 1px;--hoshi-border-color: #B9C1CA;--hoshi-border-active-width: 4px;--hoshi-border-active-color: #6a7989;--hoshi-textarea-height:250px;',
            'styleBuilder' => kaswara_cf7_get_form_array('hoshi')
        ),
        'kuro' => array(
            'color' => '#444',
            'defaultStyle' => '--kuro-input-height:50px;--kuro-input-margin-top:10px;--kuro-input-margin-bottom:25px;--kuro-font-size:15px;--kuro-input-font-size:15px;--kuro-color: #888;--kuro-input-color: #888;--kuro-border-width: 1px;--kuro-border-color: #B9C1CA;--kuro-border-active-color: #B9C1CA;--kuro-textarea-height:250px;',
            'styleBuilder' => kaswara_cf7_get_form_array('kuro')
        ),
        'jiro' => array(
            'color' => '#444',
            'defaultStyle' => '--jiro-input-height:50px;--jiro-input-margin-top:10px;--jiro-input-margin-bottom:25px;--jiro-font-size:15px;--jiro-input-font-size:15px;--jiro-color: #888;--jiro-input-color: #888;--jiro-border-width: 2px;--jiro-border-color: #6a7989;--jiro-bg-color: #6a7989;--jiro-textarea-height:250px;',
            'styleBuilder' => kaswara_cf7_get_form_array('jiro')
        ),
        'minoru' => array(
            'color' => '#444',
            'defaultStyle' => '--minoru-input-height:50px;--minoru-input-margin-top:15px;--minoru-input-margin-bottom:15px;--minoru-input-font-size:15px;--minoru-input-bg-color:#fafafa;--minoru-font-size:15px;     --minoru-color: #888;--minoru-color-scheme: #eca29b;  --minoru-textarea-height:250px;',
            'styleBuilder' => kaswara_cf7_get_form_array('minoru')
        ),
        'yoko' => array(
            'color' => '#444',
            'defaultStyle' => '--yoko-input-height:50px;--yoko-input-margin-top:10px;--yoko-input-margin-bottom:25px;--yoko-input-font-size:15px;--yoko-input-color: #f5f5f5;--yoko-color-scheme: #b04b40;  --yoko-border-width:2px; --yoko-font-size:15px;--yoko-textarea-height:250px; ',
            'styleBuilder' => kaswara_cf7_get_form_array('yoko')
        ),
        'akira' => array(
            'color' => '#444',
            'defaultStyle' => '--akira-input-height:50px;--akira-input-margin-top:10px;--akira-input-margin-bottom:25px;--akira-input-font-size:15px;--akira-input-color: #666;--akira-color: #888;      --akira-input-bg: #fff;  --akira-border-color: #aaa;  --akira-border-width: 2px;  --akira-border-active-width: 1px; --akira-font-size:15px;--akira-textarea-height:250px;',
            'styleBuilder' => kaswara_cf7_get_form_array('akira')
        ),
        'ichiro' => array(
            'color' => '#444',
            'defaultStyle' => '--ichiro-input-height:50px;--ichiro-input-margin-top:25px;--ichiro-input-margin-bottom:25px;--ichiro-input-font-size:15px;--ichiro-input-color: #7F8994;--ichiro-input-bg: #fff;  --ichiro-element-bg: #f0f0f0;  --ichiro-color: #888;      --ichiro-font-size:15px;       --ichiro-textarea-height:250px;',
            'styleBuilder' => kaswara_cf7_get_form_array('ichiro')
        ),
        'juro' => array(
            'color' => '#444',
            'defaultStyle' => '--juro-input-height:50px;--juro-input-margin-top:25px;--juro-input-margin-bottom:25px;--juro-input-font-size:15px;  --juro-input-color: #1784cd;--juro-input-bg: #fff;  --juro-element-bg: #f0f0f0;--juro-color: #888;--juro-active-color: #444;--juro-font-size:15px; --juro-textarea-height:250px;',
            'styleBuilder' => kaswara_cf7_get_form_array('juro')
        ),
        'madoka' => array(
            'color' => '#444',
            'defaultStyle' => '--madoka-input-height:50px;--madoka-input-margin-top:25px;--madoka-input-margin-bottom:25px;--madoka-input-font-size:15px;  --madoka-input-color: #7A7593;--madoka-border-color: #888;--madoka-color: #888;--madoka-font-size:15px;--madoka-textarea-height:250px; ',
            'styleBuilder' => kaswara_cf7_get_form_array('madoka')
        ),
        'kaede' => array(
            'color' => '#444',
            'defaultStyle' => '--kaede-input-height:50px;--kaede-input-margin-top:25px;--kaede-input-margin-bottom:25px;--kaede-input-font-size:15px;  --kaede-input-color: #555;--kaede-input-bg: #fafafa;--kaede-bg-bg: #EFEEEE;--kaede-color: #888; --kaede-font-size:15px;--kaede-textarea-height:250px;',
            'styleBuilder' => kaswara_cf7_get_form_array('kaede')
        ),
        'isao' => array(
            'color' => '#444',
            'defaultStyle' => '--isao-input-height:35px;--isao-input-margin-top:0px;--isao-input-margin-bottom:25px;--isao-input-font-size:15px;  --isao-input-color: #afb3b8;  --isao-color: #888; --isao-color-scheme: #da7071;--isao-font-size:15px;--isao-textarea-height:250px; --isao-border-width:4px;',
            'styleBuilder' => kaswara_cf7_get_form_array('isao')
        ),
        'manami' => array(
            'color' => '#444',
            'defaultStyle' => '--manami-input-height:50px;--manami-input-margin-top:15px;--manami-input-margin-bottom:15px; --manami-input-font-size:15px;  --manami-input-color: #fff;  --manami-color: #888;--manami-active-color: #cbc4c6; --manami-font-size:15px; --manami-textarea-height:250px; --manami-input-bg : #A8A8A8; --manami-border-width:2px;--manami-border-color:#A8A8A8;',
            'styleBuilder' => kaswara_cf7_get_form_array('manami')
        ),
        'nariko' => array(
            'color' => '#444',
            'defaultStyle' => '--nariko-input-height:50px;--nariko-input-margin-top:15px;--nariko-input-margin-bottom:15px;--nariko-input-font-size:15px;  --nariko-input-color: #8E9191;--nariko-color: #8E9191;--nariko-active-color: #6B6E6E;          --nariko-font-size:15px;--nariko-input-bg : #fafafa;--nariko-border-width:3px;--nariko-border-color:#9B9F9F;--nariko-textarea-height:250px;',
            'styleBuilder' => kaswara_cf7_get_form_array('nariko')
        ),
        'yoshiko' => array(
            'color' => '#444',
            'defaultStyle' => '--yoshiko-input-height:50px;--yoshiko-input-margin-top:15px;--yoshiko-input-margin-bottom:15px; --yoshiko-input-font-size:15px;  --yoshiko-input-color: #8E9191; --yoshiko-color: #8B8C8B; --yoshiko-color-scheme: #ff5200;--yoshiko-border-width: 2px;--yoshiko-font-size:15px; --yoshiko-input-bg : #d0d1d0; --yoshiko-textarea-height:250px;',
            'styleBuilder' => kaswara_cf7_get_form_array('yoshiko')
        ),
        'chisato' => array(
            'color' => '#444',
            'defaultStyle' => '--chisato-input-height:50px;--chisato-input-margin-top:15px;--chisato-input-margin-bottom:15px;--chisato-input-font-size:15px;  --chisato-input-color: #b5b5b5;--chisato-color: #8B8C8B;--chisato-color-scheme: #da6484;--chisato-border-width: 2px;--chisato-font-size:15px;--chisato-input-bg : transparent;--chisato-textarea-height:250px;',
            'styleBuilder' => kaswara_cf7_get_form_array('chisato')
        ),
        'ruri' => array(
            'color' => '#444',
            'defaultStyle' => '--ruri-input-height:50px;--ruri-input-margin-top:15px;--ruri-input-margin-bottom:15px;--ruri-input-font-size:15px;--ruri-input-color: #b5b5b5;--ruri-color: #8B8C8B;--ruri-font-size:15px;--ruri-border-width: 6px;--ruri-border-active-width: 2px;--ruri-border-color:#B7C3AC;--ruri-border-active-color:#a3d39c;--ruri-textarea-height:250px;',
            'styleBuilder' => kaswara_cf7_get_form_array('ruri')
        ),
        'shoko' => array(
            'color' => '#444',
            'defaultStyle' => '--shoko-input-height:60px;--shoko-input-margin-top:15px;--shoko-input-margin-bottom:15px; --shoko-input-font-size:15px;  --shoko-input-color: #888;--shoko-color: #A09C9C; --shoko-font-size:15px; --shoko-border-width: 1px; --shoko-border-active-width: 2px; --shoko-border-color:#eee;--shoko-border-active-color:#a3d39c;--shoko-textarea-height:250px;',
            'styleBuilder' => kaswara_cf7_get_form_array('shoko')
        ),
        


    );
} 


function kaswara_cf7_formcreator($eleArray){
    $elementsArray = array();
    switch ($eleArray['type']) {
        //ColorPicker
        case 'colorpicker':
            array_push($elementsArray,array(
                    'type' => 'colorpicker',
                    'values' => array(                              
                        'cssName' => $eleArray['cssName'],                                                        
                        'cssSufix' => $eleArray['cssSufix'],                                                        
                        'value' => $eleArray['value'],
                        'title' => $eleArray['title'],
                        'description' => $eleArray['description'],
                    )
                )
            );
        break;  
        //Slider Input
        case 'slider':
            array_push($elementsArray,array(
                    'type' => 'slider',
                    'values' => array(              
                        'cssName' => $eleArray['cssName'],                                                        
                        'cssSufix' => $eleArray['cssSufix'],                                                        
                        'value' => $eleArray['value'],
                        'title' => $eleArray['title'],
                        'description' => $eleArray['description'],
                        'default' => $eleArray['default'],
                        'min' => $eleArray['min'],
                        'max' => $eleArray['max'],       
                    )
                )
            );
        break;                       
    }
    $formSection = new kswr_cf7_global_section(
                    $values =  array('id' => '','class' => '',),
                    $elements =  $elementsArray
    );
    $formSection->render();
}

function kaswara_cf7_buttontypes(){
    return array(
        'qaswara' => array(
            'color' => '#444',
            'name'  => 'Qaswara'
        ),
        'pushleft' => array(
            'color' => '#444',
            'name'  => 'Push Left'
        ),
        'pushright' => array(
            'color' => '#444',
            'name'  => 'Push Right'
        ),
        'pushtop' => array(
            'color' => '#444',
            'name'  => 'Push Top'
        ),
        'pushbottom' => array(
            'color' => '#444',
            'name'  => 'Push bottom'
        ),
        'fillleft' => array(
            'color' => '#444',
            'name'  => 'Fill Left'
        ),
        'fillright' => array(
            'color' => '#444',
            'name'  => 'Fill Right'
        ),
        'filltop' => array(
            'color' => '#444',
            'name'  => 'Fill Top'
        ),
        'fillbottom' => array(
            'color' => '#444',
            'name'  => 'Fill Bottom'
        ),
        'scaledown' => array(
            'color' => '#444',
            'name'  => 'Scale Down'
        ),
        'scaleup' => array(
            'color' => '#444',
            'name'  => 'Scale Up'
        ),
        'rotateleft' => array(
            'color' => '#444',
            'name'  => 'Rotate Left'
        ),
        'rotateright' => array(
            'color' => '#444',
            'name'  => 'rotateright'
        ),
        'rotatebottom' => array(
            'color' => '#444',
            'name'  => 'Rotate Bottom'
        ),
        'rotatetop' => array(
            'color' => '#444',
            'name'  => 'Rotate Top'
        )
    );
} 

 
//Function To Return The kmcf7 Array 
function kaswara_cf7_get_form_array($styleName){
    switch ($styleName) {
        case 'qaswara':
            return array(
                array(
                    'type'          => 'slider', 'cssName' => '--qaswara-input-height',
                    'cssSufix'      => 'px', 'value' => 50, 'default' => 50, 'min' => 35, 'max' => 100,
                    'title'         => esc_html__('Input Height','kaswara'), 'description' => esc_html__('Input height(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--qaswara-textarea-height',
                    'cssSufix'      => 'px', 'value' => 250, 'default' => 250, 'min' => 100, 'max' => 700,
                    'title'         => esc_html__('Textarea Height','kaswara'), 'description'   => esc_html__('Textarea Height (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--qaswara-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Font Size','kaswara'), 'description' => esc_html__('Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--qaswara-input-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Input Font Size','kaswara'), 'description' => esc_html__('Input Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--qaswara-input-margin-top',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Top','kaswara'), 'description'   => esc_html__('Input Margin Top(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--qaswara-input-margin-bottom',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Bottom','kaswara'), 'description'   => esc_html__('Input Margin Bottom(px)','kaswara')                
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--qaswara-color',
                    'cssSufix'      => '', 'value' => '#bbb',
                    'title'         => esc_html__('Text Color','kaswara'), 'description'   => esc_html__('Element text color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--qaswara-input-color',
                    'cssSufix'      => '', 'value' => '#888',
                    'title'         => esc_html__('Input Color','kaswara'), 'description'   => esc_html__('Input text color','kaswara') 
                ),                
                array(
                    'type'          => 'slider', 'cssName' => '--qaswara-border-width',
                    'cssSufix'      => 'px', 'value' => 1, 'default' => 1, 'min' => 0, 'max' => 15,
                    'title'         => esc_html__('Border Width','kaswara'), 'description'   => esc_html__('Border Width(px)','kaswara')                
                ),               
                array(
                    'type'          => 'colorpicker', 'cssName' => '--qaswara-border-color',
                    'cssSufix'      => '', 'value' => '#eee',
                    'title'         => esc_html__('Border Color','kaswara'), 'description'   => esc_html__('Element Border Color','kaswara') 
                ), 
                array(
                    'type'          => 'colorpicker', 'cssName' => '--qaswara-border-active-color',
                    'cssSufix'      => '', 'value' => '#269AD6',
                    'title'         => esc_html__('Border Color (A)','kaswara'), 'description'   => esc_html__('Active Element Border Color','kaswara') 
                ),  
            );  
        break;
        case 'haruki':
            return array(
                array(
                    'type'          => 'slider', 'cssName' => '--haruki-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Font Size','kaswara'), 'description' => esc_html__('Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--haruki-input-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Input Font Size','kaswara'), 'description' => esc_html__('Input Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--haruki-input-height',
                    'cssSufix'      => 'px', 'value' => 45, 'default' => 55, 'min' => 30, 'max' => 100,
                    'title'         => esc_html__('Input Height','kaswara'), 'description'   => esc_html__('Input Height (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--haruki-textarea-height',
                    'cssSufix'      => 'px', 'value' => 250, 'default' => 250, 'min' => 100, 'max' => 700,
                    'title'         => esc_html__('Textarea Height','kaswara'), 'description'   => esc_html__('Textarea Height (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--haruki-input-margin-top',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Top','kaswara'), 'description'   => esc_html__('Input Margin Top(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--haruki-input-margin-bottom',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Bottom','kaswara'), 'description'   => esc_html__('Input Margin Bottom(px)','kaswara')                
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--haruki-input-background',
                    'cssSufix'      => '', 'value' => '#fff',
                    'title'         => esc_html__('Input Background','kaswara'), 'description'   => esc_html__('Input background color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--haruki-color',
                    'cssSufix'      => '', 'value' => '#888',
                    'title'         => esc_html__('Text Color','kaswara'), 'description'   => esc_html__('Element name color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--haruki-active-color',
                    'cssSufix'      => '', 'value'         => '#6a7989',
                    'title'         => esc_html__('Text active color','kaswara'), 'description'   => esc_html__('Text active color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--haruki-input-color',
                    'cssSufix'      => '', 'value' => '#888',
                    'title'         => esc_html__('Input Color','kaswara'),'description'   => esc_html__('Input text color','kaswara') 
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--haruki-border-width',
                    'cssSufix'      => 'px','value' => 1, 'default' => 1, 'min' => 0, 'max' => 8,
                    'title'         => esc_html__('Border Width','kaswara'),'description'   => esc_html__('Input border width(px)','kaswara')                
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--haruki-border-color',
                    'cssSufix'      => '', 'value' => '#eee',
                    'title'         => esc_html__('Border Color','kaswara'), 'description' => esc_html__('Input border color','kaswara') 
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--haruki-active-border-width',
                    'cssSufix'      => 'px', 'value' => 3, 'default' => 3, 'min' => 0, 'max' => 10,
                    'title'         => esc_html__('Border Width (A)','kaswara'), 'description' => esc_html__('Input border width(px)','kaswara')                
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--haruki-active-border-color',
                    'cssSufix'      => '', 'value' => '#6a7989',
                    'title'         => esc_html__('Border Color (A)','kaswara'), 'description'   => esc_html__('Input border color','kaswara') 
                )
            );  
        break;     
        case 'hoshi':
            return array(
                array(
                    'type'          => 'slider', 'cssName' => '--hoshi-input-height',
                    'cssSufix'      => 'px', 'value' => 50, 'default' => 50, 'min' => 35, 'max' => 100,
                    'title'         => esc_html__('Input Height','kaswara'), 'description' => esc_html__('Input height(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--hoshi-textarea-height',
                    'cssSufix'      => 'px', 'value' => 250, 'default' => 250, 'min' => 100, 'max' => 700,
                    'title'         => esc_html__('Textarea Height','kaswara'), 'description'   => esc_html__('Textarea Height (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--hoshi-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Font Size','kaswara'), 'description' => esc_html__('Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--hoshi-input-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Input Font Size','kaswara'), 'description' => esc_html__('Input Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--hoshi-input-margin-top',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Top','kaswara'), 'description'   => esc_html__('Input Margin Top(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--hoshi-input-margin-bottom',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Bottom','kaswara'), 'description'   => esc_html__('Input Margin Bottom(px)','kaswara')                
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--hoshi-color',
                    'cssSufix'      => '', 'value' => '#888',
                    'title'         => esc_html__('Text Color','kaswara'), 'description'   => esc_html__('Element name color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--hoshi-input-color',
                    'cssSufix'      => '', 'value' => '#888',
                    'title'         => esc_html__('Input Color','kaswara'),'description'   => esc_html__('Input text color','kaswara') 
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--hoshi-border-width',
                    'cssSufix'      => 'px','value' => 1, 'default' => 1, 'min' => 0, 'max' => 8,
                    'title'         => esc_html__('Border Width','kaswara'),'description'   => esc_html__('Input border width(px)','kaswara')                
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--hoshi-border-color',
                    'cssSufix'      => '', 'value' => '#B9C1CA',
                    'title'         => esc_html__('Border Color','kaswara'), 'description' => esc_html__('Input border color','kaswara') 
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--hoshi-border-active-width',
                    'cssSufix'      => 'px', 'value' => 4, 'default' => 4, 'min' => 0, 'max' => 10,
                    'title'         => esc_html__('Border Width (A)','kaswara'), 'description' => esc_html__('Input border width(px)','kaswara')                
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--hoshi-border-active-color',
                    'cssSufix'      => '', 'value' => '#6a7989',
                    'title'         => esc_html__('Border Color (A)','kaswara'), 'description'   => esc_html__('Input border color','kaswara') 
                )

            );  
        break; 
        case 'kuro':
            return array(
                array(
                    'type'          => 'slider', 'cssName' => '--kuro-input-height',
                    'cssSufix'      => 'px', 'value' => 50, 'default' => 50, 'min' => 35, 'max' => 100,
                    'title'         => esc_html__('Input Height','kaswara'), 'description' => esc_html__('Input height(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--kuro-textarea-height',
                    'cssSufix'      => 'px', 'value' => 250, 'default' => 250, 'min' => 100, 'max' => 700,
                    'title'         => esc_html__('Textarea Height','kaswara'), 'description'   => esc_html__('Textarea Height (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--kuro-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Font Size','kaswara'), 'description' => esc_html__('Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--kuro-input-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Input Font Size','kaswara'), 'description' => esc_html__('Input Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--kuro-input-margin-top',
                    'cssSufix'      => 'px', 'value' => 10, 'default' => 10, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Top','kaswara'), 'description'   => esc_html__('Input Margin Top(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--kuro-input-margin-bottom',
                    'cssSufix'      => 'px', 'value' => 25, 'default' => 25, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Bottom','kaswara'), 'description'   => esc_html__('Input Margin Bottom(px)','kaswara')                
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--kuro-color',
                    'cssSufix'      => '', 'value' => '#888',
                    'title'         => esc_html__('Text Color','kaswara'), 'description'   => esc_html__('Element name color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--kuro-input-color',
                    'cssSufix'      => '', 'value' => '#888',
                    'title'         => esc_html__('Input Color','kaswara'),'description'   => esc_html__('Input text color','kaswara') 
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--kuro-border-width',
                    'cssSufix'      => 'px','value' => 1, 'default' => 1, 'min' => 0, 'max' => 8,
                    'title'         => esc_html__('Border Width','kaswara'),'description'   => esc_html__('Input border width(px)','kaswara')                
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--kuro-border-color',
                    'cssSufix'      => '', 'value' => '#B9C1CA',
                    'title'         => esc_html__('Border Color','kaswara'), 'description' => esc_html__('Input border color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--kuro-border-active-color',
                    'cssSufix'      => '', 'value' => '#6a7989',
                    'title'         => esc_html__('Border Color (A)','kaswara'), 'description'   => esc_html__('Input border color','kaswara') 
                )

            );  
        break;
        case 'jiro':
            return array(
                array(
                    'type'          => 'slider', 'cssName' => '--jiro-input-height',
                    'cssSufix'      => 'px', 'value' => 50, 'default' => 50, 'min' => 35, 'max' => 100,
                    'title'         => esc_html__('Input Height','kaswara'), 'description' => esc_html__('Input height(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--jiro-textarea-height',
                    'cssSufix'      => 'px', 'value' => 250, 'default' => 250, 'min' => 100, 'max' => 700,
                    'title'         => esc_html__('Textarea Height','kaswara'), 'description'   => esc_html__('Textarea Height (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--jiro-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Font Size','kaswara'), 'description' => esc_html__('Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--jiro-input-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Input Font Size','kaswara'), 'description' => esc_html__('Input Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--jiro-input-margin-top',
                    'cssSufix'      => 'px', 'value' => 10, 'default' => 10, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Top','kaswara'), 'description'   => esc_html__('Input Margin Top(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--jiro-input-margin-bottom',
                    'cssSufix'      => 'px', 'value' => 25, 'default' => 25, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Bottom','kaswara'), 'description'   => esc_html__('Input Margin Bottom(px)','kaswara')                
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--jiro-bg-color',
                    'cssSufix'      => '', 'value' => '#6a7989',
                    'title'         => esc_html__('Background Color','kaswara'), 'description'   => esc_html__('Background color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--jiro-color',
                    'cssSufix'      => '', 'value' => '#888',
                    'title'         => esc_html__('Text Color','kaswara'), 'description'   => esc_html__('Element name color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--jiro-input-color',
                    'cssSufix'      => '', 'value' => '#888',
                    'title'         => esc_html__('Input Color','kaswara'),'description'   => esc_html__('Input text color','kaswara') 
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--jiro-border-width',
                    'cssSufix'      => 'px','value' => 2, 'default' => 2, 'min' => 0, 'max' => 8,
                    'title'         => esc_html__('Border Width','kaswara'),'description'   => esc_html__('Input border width(px)','kaswara')                
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--jiro-border-color',
                    'cssSufix'      => '', 'value' => '#6a7989',
                    'title'         => esc_html__('Border Color','kaswara'), 'description' => esc_html__('Input border color','kaswara') 
                ),

            );  
        break; 
        case 'minoru':
            return array(
                array(
                    'type'          => 'slider', 'cssName' => '--minoru-input-height',
                    'cssSufix'      => 'px', 'value' => 50, 'default' => 50, 'min' => 35, 'max' => 100,
                    'title'         => esc_html__('Input Height','kaswara'), 'description' => esc_html__('Input height(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--minoru-textarea-height',
                    'cssSufix'      => 'px', 'value' => 250, 'default' => 250, 'min' => 100, 'max' => 700,
                    'title'         => esc_html__('Textarea Height','kaswara'), 'description'   => esc_html__('Textarea Height (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--minoru-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Font Size','kaswara'), 'description' => esc_html__('Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--minoru-input-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Input Font Size','kaswara'), 'description' => esc_html__('Input Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--minoru-input-margin-top',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Top','kaswara'), 'description'   => esc_html__('Input Margin Top(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--minoru-input-margin-bottom',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Bottom','kaswara'), 'description'   => esc_html__('Input Margin Bottom(px)','kaswara')                
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--minoru-input-bg-color',
                    'cssSufix'      => '', 'value' => '#fafafa',
                    'title'         => esc_html__('Background Color','kaswara'), 'description'   => esc_html__('Background color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--minoru-color',
                    'cssSufix'      => '', 'value' => '#888',
                    'title'         => esc_html__('Text Color','kaswara'), 'description'   => esc_html__('Element name color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--minoru-color-scheme',
                    'cssSufix'      => '', 'value' => '#eca29b',
                    'title'         => esc_html__('Color Scheme','kaswara'),'description'   => esc_html__('Elements color scheme','kaswara') 
                )
            );  
        break;
        case 'yoko':
            return array(
                array(
                    'type'          => 'slider', 'cssName' => '--yoko-input-height',
                    'cssSufix'      => 'px', 'value' => 50, 'default' => 50, 'min' => 35, 'max' => 100,
                    'title'         => esc_html__('Input Height','kaswara'), 'description' => esc_html__('Input height(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--yoko-textarea-height',
                    'cssSufix'      => 'px', 'value' => 250, 'default' => 250, 'min' => 100, 'max' => 700,
                    'title'         => esc_html__('Textarea Height','kaswara'), 'description'   => esc_html__('Textarea Height (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--yoko-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Font Size','kaswara'), 'description' => esc_html__('Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--yoko-input-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Input Font Size','kaswara'), 'description' => esc_html__('Input Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--yoko-input-margin-top',
                    'cssSufix'      => 'px', 'value' => 10, 'default' => 10, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Top','kaswara'), 'description'   => esc_html__('Input Margin Top(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--yoko-input-margin-bottom',
                    'cssSufix'      => 'px', 'value' => 25, 'default' => 25, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Bottom','kaswara'), 'description'   => esc_html__('Input Margin Bottom(px)','kaswara')                
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--yoko-input-bg-color',
                    'cssSufix'      => '', 'value' => '#fafafa',
                    'title'         => esc_html__('Background Color','kaswara'), 'description'   => esc_html__('Background color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--yoko-input-color',
                    'cssSufix'      => '', 'value' => '#f5f5f5',
                    'title'         => esc_html__('Input Color','kaswara'), 'description'   => esc_html__('Input text color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--yoko-color-scheme',
                    'cssSufix'      => '', 'value' => '#b04b40',
                    'title'         => esc_html__('Color Scheme','kaswara'),'description'   => esc_html__('Elements color scheme','kaswara') 
                ),
                array(
                    'type'          => 'slider', 'cssName' => 'yoko-border-width',
                    'cssSufix'      => 'px', 'value' => 2, 'default' => 2, 'min' => 0, 'max' => 10,
                    'title'         => esc_html__('Border Width','kaswara'), 'description'   => esc_html__('Border Width(px)','kaswara')                
                )
            );  
        break; 
        case 'akira':
            return array(
                array(
                    'type'          => 'slider', 'cssName' => '--akira-input-height',
                    'cssSufix'      => 'px', 'value' => 50, 'default' => 50, 'min' => 35, 'max' => 100,
                    'title'         => esc_html__('Input Height','kaswara'), 'description' => esc_html__('Input height(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--akira-textarea-height',
                    'cssSufix'      => 'px', 'value' => 250, 'default' => 250, 'min' => 100, 'max' => 700,
                    'title'         => esc_html__('Textarea Height','kaswara'), 'description'   => esc_html__('Textarea Height (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--akira-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Font Size','kaswara'), 'description' => esc_html__('Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--akira-input-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Input Font Size','kaswara'), 'description' => esc_html__('Input Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--akira-input-margin-top',
                    'cssSufix'      => 'px', 'value' => 10, 'default' => 10, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Top','kaswara'), 'description'   => esc_html__('Input Margin Top(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--akira-input-margin-bottom',
                    'cssSufix'      => 'px', 'value' => 25, 'default' => 25, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Bottom','kaswara'), 'description'   => esc_html__('Input Margin Bottom(px)','kaswara')                
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--akira-color',
                    'cssSufix'      => '', 'value' => '#888',
                    'title'         => esc_html__('Text Color','kaswara'), 'description'   => esc_html__('Element name color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--akira-input-color',
                    'cssSufix'      => '', 'value' => '#666',
                    'title'         => esc_html__('Input Color','kaswara'),'description'   => esc_html__('Input text color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--akira-input-bg',
                    'cssSufix'      => '', 'value' => '#fff',
                    'title'         => esc_html__('Background Color','kaswara'), 'description'   => esc_html__('Element background color','kaswara') 
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--akira-border-width',
                    'cssSufix'      => 'px','value' => 2, 'default' => 2, 'min' => 0, 'max' => 8,
                    'title'         => esc_html__('Border Width','kaswara'),'description'   => esc_html__('Input border width(px)','kaswara')                
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--akira-border-color',
                    'cssSufix'      => '', 'value' => '#aaa',
                    'title'         => esc_html__('Border Color','kaswara'), 'description' => esc_html__('Input border color','kaswara') 
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--akira-border-active-width',
                    'cssSufix'      => 'px', 'value' => 1, 'default' => 1, 'min' => 0, 'max' => 10,
                    'title'         => esc_html__('Border Width (A)','kaswara'), 'description' => esc_html__('Input border width(px)','kaswara')                
                )

            );  
        break; 
        case 'ichiro':
            return array(
                array(
                    'type'          => 'slider', 'cssName' => '--ichiro-input-height',
                    'cssSufix'      => 'px', 'value' => 50, 'default' => 50, 'min' => 35, 'max' => 100,
                    'title'         => esc_html__('Input Height','kaswara'), 'description' => esc_html__('Input height(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--ichiro-textarea-height',
                    'cssSufix'      => 'px', 'value' => 250, 'default' => 250, 'min' => 100, 'max' => 700,
                    'title'         => esc_html__('Textarea Height','kaswara'), 'description'   => esc_html__('Textarea Height (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--ichiro-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Font Size','kaswara'), 'description' => esc_html__('Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--ichiro-input-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Input Font Size','kaswara'), 'description' => esc_html__('Input Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--ichiro-input-margin-top',
                    'cssSufix'      => 'px', 'value' => 25, 'default' => 25, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Top','kaswara'), 'description'   => esc_html__('Input Margin Top(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--ichiro-input-margin-bottom',
                    'cssSufix'      => 'px', 'value' => 25, 'default' => 25, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Bottom','kaswara'), 'description'   => esc_html__('Input Margin Bottom(px)','kaswara')                
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--ichiro-color',
                    'cssSufix'      => '', 'value' => '#888',
                    'title'         => esc_html__('Text Color','kaswara'), 'description'   => esc_html__('Element name color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--ichiro-input-color',
                    'cssSufix'      => '', 'value' => '#7F8994',
                    'title'         => esc_html__('Input Color','kaswara'),'description'   => esc_html__('Input text color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--ichiro-input-bg',
                    'cssSufix'      => '', 'value' => '#fff',
                    'title'         => esc_html__('Input bg Color','kaswara'), 'description'   => esc_html__('Input background color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--ichiro-element-bg',
                    'cssSufix'      => '', 'value' => '#f0f0f0',
                    'title'         => esc_html__('Element bg Color','kaswara'), 'description'   => esc_html__('Element background color','kaswara') 
                )

            );  
        break;  
        case 'juro':
            return array(
                array(
                    'type'          => 'slider', 'cssName' => '--juro-input-height',
                    'cssSufix'      => 'px', 'value' => 50, 'default' => 50, 'min' => 35, 'max' => 100,
                    'title'         => esc_html__('Input Height','kaswara'), 'description' => esc_html__('Input height(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--juro-textarea-height',
                    'cssSufix'      => 'px', 'value' => 250, 'default' => 250, 'min' => 100, 'max' => 700,
                    'title'         => esc_html__('Textarea Height','kaswara'), 'description'   => esc_html__('Textarea Height (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--juro-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Font Size','kaswara'), 'description' => esc_html__('Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--juro-input-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Input Font Size','kaswara'), 'description' => esc_html__('Input Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--juro-input-margin-top',
                    'cssSufix'      => 'px', 'value' => 25, 'default' => 25, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Top','kaswara'), 'description'   => esc_html__('Input Margin Top(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--juro-input-margin-bottom',
                    'cssSufix'      => 'px', 'value' => 25, 'default' => 25, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Bottom','kaswara'), 'description'   => esc_html__('Input Margin Bottom(px)','kaswara')                
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--juro-color',
                    'cssSufix'      => '', 'value' => '#888',
                    'title'         => esc_html__('Text Color','kaswara'), 'description'   => esc_html__('Element name color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--juro-input-color',
                    'cssSufix'      => '', 'value' => '#1784cd',
                    'title'         => esc_html__('Input Color','kaswara'),'description'   => esc_html__('Input text color','kaswara') 
                ),
                 array(
                    'type'          => 'colorpicker', 'cssName' => '--juro-active-color',
                    'cssSufix'      => '', 'value' => '#444',
                    'title'         => esc_html__('Text Color (A) ','kaswara'),'description'   => esc_html__('Active text color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--juro-input-bg',
                    'cssSufix'      => '', 'value' => '#fff',
                    'title'         => esc_html__('Input bg Color','kaswara'), 'description'   => esc_html__('Input background color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--juro-element-bg',
                    'cssSufix'      => '', 'value' => '#f0f0f0',
                    'title'         => esc_html__('Element bg Color','kaswara'), 'description'   => esc_html__('Element background color','kaswara') 
                )

            );  
        break; 
        case 'madoka':
            return array(
                array(
                    'type'          => 'slider', 'cssName' => '--madoka-input-height',
                    'cssSufix'      => 'px', 'value' => 50, 'default' => 50, 'min' => 35, 'max' => 100,
                    'title'         => esc_html__('Input Height','kaswara'), 'description' => esc_html__('Input height(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--madoka-textarea-height',
                    'cssSufix'      => 'px', 'value' => 250, 'default' => 250, 'min' => 100, 'max' => 700,
                    'title'         => esc_html__('Textarea Height','kaswara'), 'description'   => esc_html__('Textarea Height (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--madoka-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Font Size','kaswara'), 'description' => esc_html__('Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--madoka-input-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Input Font Size','kaswara'), 'description' => esc_html__('Input Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--madoka-input-margin-top',
                    'cssSufix'      => 'px', 'value' => 25, 'default' => 25, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Top','kaswara'), 'description'   => esc_html__('Input Margin Top(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--madoka-input-margin-bottom',
                    'cssSufix'      => 'px', 'value' => 25, 'default' => 25, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Bottom','kaswara'), 'description'   => esc_html__('Input Margin Bottom(px)','kaswara')                
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--madoka-color',
                    'cssSufix'      => '', 'value' => '#888',
                    'title'         => esc_html__('Text Color','kaswara'), 'description'   => esc_html__('Element name color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--madoka-input-color',
                    'cssSufix'      => '', 'value' => '#7A7593',
                    'title'         => esc_html__('Input Color','kaswara'),'description'   => esc_html__('Input text color','kaswara') 
                ),
                 array(
                    'type'          => 'colorpicker', 'cssName' => '--madoka-border-color',
                    'cssSufix'      => '', 'value' => '#888',
                    'title'         => esc_html__('Border Color','kaswara'),'description'   => esc_html__('Border color','kaswara') 
                )
            );  
        break; 
        case 'kaede':
            return array(
                array(
                    'type'          => 'slider', 'cssName' => '--kaede-input-height',
                    'cssSufix'      => 'px', 'value' => 50, 'default' => 50, 'min' => 35, 'max' => 100,
                    'title'         => esc_html__('Input Height','kaswara'), 'description' => esc_html__('Input height(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--kaede-textarea-height',
                    'cssSufix'      => 'px', 'value' => 250, 'default' => 250, 'min' => 100, 'max' => 700,
                    'title'         => esc_html__('Textarea Height','kaswara'), 'description'   => esc_html__('Textarea Height (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--kaede-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Font Size','kaswara'), 'description' => esc_html__('Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--kaede-input-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Input Font Size','kaswara'), 'description' => esc_html__('Input Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--kaede-input-margin-top',
                    'cssSufix'      => 'px', 'value' => 25, 'default' => 25, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Top','kaswara'), 'description'   => esc_html__('Input Margin Top(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--kaede-input-margin-bottom',
                    'cssSufix'      => 'px', 'value' => 25, 'default' => 25, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Bottom','kaswara'), 'description'   => esc_html__('Input Margin Bottom(px)','kaswara')                
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--kaede-color',
                    'cssSufix'      => '', 'value' => '#888',
                    'title'         => esc_html__('Text Color','kaswara'), 'description'   => esc_html__('Element name color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--kaede-input-color',
                    'cssSufix'      => '', 'value' => '#555',
                    'title'         => esc_html__('Input Color','kaswara'),'description'   => esc_html__('Input text color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--kaede-input-bg',
                    'cssSufix'      => '', 'value' => '#fafafa',
                    'title'         => esc_html__('Input background','kaswara'),'description'   => esc_html__('Input background color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--kaede-bg-bg',
                    'cssSufix'      => '', 'value' => '#EFEEEE',
                    'title'         => esc_html__('Element background','kaswara'),'description'   => esc_html__('Element background color','kaswara') 
                )
            );  
        break;
        case 'isao':
            return array(
                array(
                    'type'          => 'slider', 'cssName' => '--isao-input-height',
                    'cssSufix'      => 'px', 'value' => 35, 'default' => 35, 'min' => 35, 'max' => 100,
                    'title'         => esc_html__('Input Height','kaswara'), 'description' => esc_html__('Input height(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--isao-textarea-height',
                    'cssSufix'      => 'px', 'value' => 250, 'default' => 250, 'min' => 100, 'max' => 700,
                    'title'         => esc_html__('Textarea Height','kaswara'), 'description'   => esc_html__('Textarea Height (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--isao-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Font Size','kaswara'), 'description' => esc_html__('Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--isao-input-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Input Font Size','kaswara'), 'description' => esc_html__('Input Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--isao-input-margin-top',
                    'cssSufix'      => 'px', 'value' => 0, 'default' => 0, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Top','kaswara'), 'description'   => esc_html__('Input Margin Top(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--isao-input-margin-bottom',
                    'cssSufix'      => 'px', 'value' => 25, 'default' => 25, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Bottom','kaswara'), 'description'   => esc_html__('Input Margin Bottom(px)','kaswara')                
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--isao-color',
                    'cssSufix'      => '', 'value' => '#888',
                    'title'         => esc_html__('Text Color','kaswara'), 'description'   => esc_html__('Element name color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--isao-input-color',
                    'cssSufix'      => '', 'value' => '#afb3b8',
                    'title'         => esc_html__('Input Color','kaswara'),'description'   => esc_html__('Input text color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--isao-color-scheme',
                    'cssSufix'      => '', 'value' => '#da7071',
                    'title'         => esc_html__('Color Scheme','kaswara'),'description'   => esc_html__('Style Color Scheme','kaswara') 
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--isao-border-width',
                    'cssSufix'      => 'px', 'value' => 4, 'default' => 4, 'min' => 1, 'max' => 10,
                    'title'         => esc_html__('Border Width','kaswara'), 'description'   => esc_html__('Border Width(px)','kaswara')                
                ),
            );  
        break; 
        case 'manami':
            return array(
                array(
                    'type'          => 'slider', 'cssName' => '--manami-input-height',
                    'cssSufix'      => 'px', 'value' => 50, 'default' => 50, 'min' => 35, 'max' => 100,
                    'title'         => esc_html__('Input Height','kaswara'), 'description' => esc_html__('Input height(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--manami-textarea-height',
                    'cssSufix'      => 'px', 'value' => 250, 'default' => 250, 'min' => 100, 'max' => 700,
                    'title'         => esc_html__('Textarea Height','kaswara'), 'description'   => esc_html__('Textarea Height (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--manami-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Font Size','kaswara'), 'description' => esc_html__('Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--manami-input-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Input Font Size','kaswara'), 'description' => esc_html__('Input Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--manami-input-margin-top',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Top','kaswara'), 'description'   => esc_html__('Input Margin Top(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--manami-input-margin-bottom',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Bottom','kaswara'), 'description'   => esc_html__('Input Margin Bottom(px)','kaswara')                
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--manami-color',
                    'cssSufix'      => '', 'value' => '#888',
                    'title'         => esc_html__('Text Color','kaswara'), 'description'   => esc_html__('Element text color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--manami-active-color',
                    'cssSufix'      => '', 'value' => '#cbc4c6',
                    'title'         => esc_html__('Text Color (A)','kaswara'), 'description'   => esc_html__('Element active text color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--manami-input-color',
                    'cssSufix'      => '', 'value' => '#fff',
                    'title'         => esc_html__('Input Color','kaswara'), 'description'   => esc_html__('Input text color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--manami-input-bg',
                    'cssSufix'      => '', 'value' => '#A8A8A8',
                    'title'         => esc_html__('Input Background','kaswara'),'description'   => esc_html__('Input background color','kaswara') 
                ),
                 array(
                    'type'          => 'slider', 'cssName' => '--manami-border-width',
                    'cssSufix'      => 'px', 'value' => 2, 'default' => 2, 'min' => 0, 'max' => 10,
                    'title'         => esc_html__('Border Width','kaswara'), 'description'   => esc_html__('Border Width(px)','kaswara')                
                ),
                 array(
                    'type'          => 'colorpicker', 'cssName' => '--manami-border-color',
                    'cssSufix'      => '', 'value' => '#A8A8A8',
                    'title'         => esc_html__('Border color','kaswara'),'description'   => esc_html__('Elements border color','kaswara') 
                ),
            );  
        break; 
        case 'nariko':
            return array(
                array(
                    'type'          => 'slider', 'cssName' => '--nariko-input-height',
                    'cssSufix'      => 'px', 'value' => 50, 'default' => 50, 'min' => 35, 'max' => 100,
                    'title'         => esc_html__('Input Height','kaswara'), 'description' => esc_html__('Input height(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--nariko-textarea-height',
                    'cssSufix'      => 'px', 'value' => 250, 'default' => 250, 'min' => 100, 'max' => 700,
                    'title'         => esc_html__('Textarea Height','kaswara'), 'description'   => esc_html__('Textarea Height (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--nariko-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Font Size','kaswara'), 'description' => esc_html__('Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--nariko-input-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Input Font Size','kaswara'), 'description' => esc_html__('Input Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--nariko-input-margin-top',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Top','kaswara'), 'description'   => esc_html__('Input Margin Top(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--nariko-input-margin-bottom',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Bottom','kaswara'), 'description'   => esc_html__('Input Margin Bottom(px)','kaswara')                
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--nariko-color',
                    'cssSufix'      => '', 'value' => '#8E9191',
                    'title'         => esc_html__('Text Color','kaswara'), 'description'   => esc_html__('Element text color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--nariko-active-color',
                    'cssSufix'      => '', 'value' => '#6B6E6E',
                    'title'         => esc_html__('Text Color (A)','kaswara'), 'description'   => esc_html__('Element active text color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--nariko-input-color',
                    'cssSufix'      => '', 'value' => '#8E9191',
                    'title'         => esc_html__('Input Color','kaswara'), 'description'   => esc_html__('Input text color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--nariko-input-bg',
                    'cssSufix'      => '', 'value' => '#fafafa',
                    'title'         => esc_html__('Input Background','kaswara'),'description'   => esc_html__('Input background color','kaswara') 
                ),
                 array(
                    'type'          => 'slider', 'cssName' => '--nariko-border-width',
                    'cssSufix'      => 'px', 'value' => 3, 'default' => 3, 'min' => 0, 'max' => 10,
                    'title'         => esc_html__('Border Width','kaswara'), 'description'   => esc_html__('Border Width(px)','kaswara')                
                ),
                 array(
                    'type'          => 'colorpicker', 'cssName' => '--nariko-border-color',
                    'cssSufix'      => '', 'value' => '#9B9F9F',
                    'title'         => esc_html__('Border color','kaswara'),'description'   => esc_html__('Elements border color','kaswara') 
                ),
            );  
        break;   
        case 'yoshiko':
            return array(
                array(
                    'type'          => 'slider', 'cssName' => '--yoshiko-input-height',
                    'cssSufix'      => 'px', 'value' => 50, 'default' => 50, 'min' => 35, 'max' => 100,
                    'title'         => esc_html__('Input Height','kaswara'), 'description' => esc_html__('Input height(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--yoshiko-textarea-height',
                    'cssSufix'      => 'px', 'value' => 250, 'default' => 250, 'min' => 100, 'max' => 700,
                    'title'         => esc_html__('Textarea Height','kaswara'), 'description'   => esc_html__('Textarea Height (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--yoshiko-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Font Size','kaswara'), 'description' => esc_html__('Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--yoshiko-input-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Input Font Size','kaswara'), 'description' => esc_html__('Input Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--yoshiko-input-margin-top',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Top','kaswara'), 'description'   => esc_html__('Input Margin Top(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--yoshiko-input-margin-bottom',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Bottom','kaswara'), 'description'   => esc_html__('Input Margin Bottom(px)','kaswara')                
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--yoshiko-color-scheme',
                    'cssSufix'      => '', 'value' => '#ff5200',
                    'title'         => esc_html__('Color Scheme','kaswara'), 'description'   => esc_html__('Style Color Scheme','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--yoshiko-color',
                    'cssSufix'      => '', 'value' => '#8B8C8B',
                    'title'         => esc_html__('Text Color','kaswara'), 'description'   => esc_html__('Element text color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--yoshiko-input-color',
                    'cssSufix'      => '', 'value' => '#8E9191',
                    'title'         => esc_html__('Input Color','kaswara'), 'description'   => esc_html__('Input text color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--yoshiko-input-bg',
                    'cssSufix'      => '', 'value' => '#d0d1d0',
                    'title'         => esc_html__('Input Background','kaswara'),'description'   => esc_html__('Input background color','kaswara') 
                ),
                 array(
                    'type'          => 'slider', 'cssName' => '--yoshiko-border-width',
                    'cssSufix'      => 'px', 'value' => 2, 'default' => 2, 'min' => 0, 'max' => 10,
                    'title'         => esc_html__('Border Width','kaswara'), 'description'   => esc_html__('Border Width(px)','kaswara')                
                )
            );  
        break;  
        case 'chisato':
            return array(
                array(
                    'type'          => 'slider', 'cssName' => '--chisato-input-height',
                    'cssSufix'      => 'px', 'value' => 50, 'default' => 50, 'min' => 35, 'max' => 100,
                    'title'         => esc_html__('Input Height','kaswara'), 'description' => esc_html__('Input height(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--chisato-textarea-height',
                    'cssSufix'      => 'px', 'value' => 250, 'default' => 250, 'min' => 100, 'max' => 700,
                    'title'         => esc_html__('Textarea Height','kaswara'), 'description'   => esc_html__('Textarea Height (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--chisato-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Font Size','kaswara'), 'description' => esc_html__('Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--chisato-input-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Input Font Size','kaswara'), 'description' => esc_html__('Input Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--chisato-input-margin-top',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Top','kaswara'), 'description'   => esc_html__('Input Margin Top(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--chisato-input-margin-bottom',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Bottom','kaswara'), 'description'   => esc_html__('Input Margin Bottom(px)','kaswara')                
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--chisato-color-scheme',
                    'cssSufix'      => '', 'value' => '#da6484',
                    'title'         => esc_html__('Color Scheme','kaswara'), 'description'   => esc_html__('Style Color Scheme','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--chisato-color',
                    'cssSufix'      => '', 'value' => '#8B8C8B',
                    'title'         => esc_html__('Text Color','kaswara'), 'description'   => esc_html__('Element text color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--chisato-input-color',
                    'cssSufix'      => '', 'value' => '#b5b5b5',
                    'title'         => esc_html__('Input Color','kaswara'), 'description'   => esc_html__('Input text color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--chisato-input-bg',
                    'cssSufix'      => '', 'value' => 'transparent',
                    'title'         => esc_html__('Input Background','kaswara'),'description'   => esc_html__('Input background color','kaswara') 
                ),
                 array(
                    'type'          => 'slider', 'cssName' => '--chisato-border-width',
                    'cssSufix'      => 'px', 'value' => 2, 'default' => 2, 'min' => 0, 'max' => 10,
                    'title'         => esc_html__('Border Width','kaswara'), 'description'   => esc_html__('Border Width(px)','kaswara')                
                )
            );  
        break;
        case 'ruri':
            return array(
                array(
                    'type'          => 'slider', 'cssName' => '--ruri-input-height',
                    'cssSufix'      => 'px', 'value' => 50, 'default' => 50, 'min' => 35, 'max' => 100,
                    'title'         => esc_html__('Input Height','kaswara'), 'description' => esc_html__('Input height(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--ruri-textarea-height',
                    'cssSufix'      => 'px', 'value' => 250, 'default' => 250, 'min' => 100, 'max' => 700,
                    'title'         => esc_html__('Textarea Height','kaswara'), 'description'   => esc_html__('Textarea Height (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--ruri-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Font Size','kaswara'), 'description' => esc_html__('Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--ruri-input-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Input Font Size','kaswara'), 'description' => esc_html__('Input Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--ruri-input-margin-top',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Top','kaswara'), 'description'   => esc_html__('Input Margin Top(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--ruri-input-margin-bottom',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Bottom','kaswara'), 'description'   => esc_html__('Input Margin Bottom(px)','kaswara')                
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--ruri-color',
                    'cssSufix'      => '', 'value' => '#8B8C8B',
                    'title'         => esc_html__('Text Color','kaswara'), 'description'   => esc_html__('Element text color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--ruri-input-color',
                    'cssSufix'      => '', 'value' => '#b5b5b5',
                    'title'         => esc_html__('Input Color','kaswara'), 'description'   => esc_html__('Input text color','kaswara') 
                ),                
                array(
                    'type'          => 'slider', 'cssName' => '--ruri-border-width',
                    'cssSufix'      => 'px', 'value' => 6, 'default' => 6, 'min' => 0, 'max' => 15,
                    'title'         => esc_html__('Border Width','kaswara'), 'description'   => esc_html__('Border Width(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--ruri-border-active-width',
                    'cssSufix'      => 'px', 'value' => 2, 'default' => 2, 'min' => 0, 'max' => 10,
                    'title'         => esc_html__('Border Width (A)','kaswara'), 'description'   => esc_html__('Border Width active(px)','kaswara')                
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--ruri-border-color',
                    'cssSufix'      => '', 'value' => '#B7C3AC',
                    'title'         => esc_html__('Border Color','kaswara'), 'description'   => esc_html__('Element Border Color','kaswara') 
                ), 
                array(
                    'type'          => 'colorpicker', 'cssName' => '--ruri-border-active-color',
                    'cssSufix'      => '', 'value' => '#a3d39c',
                    'title'         => esc_html__('Border Color (A)','kaswara'), 'description'   => esc_html__('Active Element Border Color','kaswara') 
                ),  
            );  
        break;          
        case 'shoko':
            return array(
                array(
                    'type'          => 'slider', 'cssName' => '--shoko-input-height',
                    'cssSufix'      => 'px', 'value' => 60, 'default' => 60, 'min' => 35, 'max' => 100,
                    'title'         => esc_html__('Input Height','kaswara'), 'description' => esc_html__('Input height(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--shoko-textarea-height',
                    'cssSufix'      => 'px', 'value' => 250, 'default' => 250, 'min' => 100, 'max' => 700,
                    'title'         => esc_html__('Textarea Height','kaswara'), 'description'   => esc_html__('Textarea Height (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--shoko-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Font Size','kaswara'), 'description' => esc_html__('Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--shoko-input-font-size',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 5, 'max' => 35,
                    'title'         => esc_html__('Input Font Size','kaswara'), 'description' => esc_html__('Input Font Size (px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--shoko-input-margin-top',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Top','kaswara'), 'description'   => esc_html__('Input Margin Top(px)','kaswara')                
                ),
                array(
                    'type'          => 'slider', 'cssName' => '--shoko-input-margin-bottom',
                    'cssSufix'      => 'px', 'value' => 15, 'default' => 15, 'min' => 0, 'max' => 150,
                    'title'         => esc_html__('Margin Bottom','kaswara'), 'description'   => esc_html__('Input Margin Bottom(px)','kaswara')                
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--shoko-color',
                    'cssSufix'      => '', 'value' => '#A09C9C',
                    'title'         => esc_html__('Text Color','kaswara'), 'description'   => esc_html__('Element text color','kaswara') 
                ),
                array(
                    'type'          => 'colorpicker', 'cssName' => '--shoko-input-color',
                    'cssSufix'      => '', 'value' => '#888',
                    'title'         => esc_html__('Input Color','kaswara'), 'description'   => esc_html__('Input text color','kaswara') 
                ),                
                array(
                    'type'          => 'slider', 'cssName' => '--shoko-border-width',
                    'cssSufix'      => 'px', 'value' => 1, 'default' => 1, 'min' => 0, 'max' => 15,
                    'title'         => esc_html__('Border Width','kaswara'), 'description'   => esc_html__('Border Width(px)','kaswara')                
                ),   
                array(
                    'type'          => 'slider', 'cssName' => '--shoko-border-active-width',
                    'cssSufix'      => 'px', 'value' => 2, 'default' => 2, 'min' => 0, 'max' => 15,
                    'title'         => esc_html__('Border Width (A)','kaswara'), 'description'   => esc_html__('Active Border Width(px)','kaswara')                
                ),               
                array(
                    'type'          => 'colorpicker', 'cssName' => '--shoko-border-color',
                    'cssSufix'      => '', 'value' => '#eee',
                    'title'         => esc_html__('Border Color','kaswara'), 'description'   => esc_html__('Element Border Color','kaswara') 
                ), 
                array(
                    'type'          => 'colorpicker', 'cssName' => '--shoko-border-active-color',
                    'cssSufix'      => '', 'value' => '#a3d39c',
                    'title'         => esc_html__('Border Color (A)','kaswara'), 'description'   => esc_html__('Active Element Border Color','kaswara') 
                ),  
            );  
        break;        
    }
}
 

function kswrcf7_buttonStylerSection(){
    $buttonStylerSection = new kswr_cf7_global_section(
                        $values =  array('id' => '','class' => '',),
                        $elements = array(
                            array(
                                'type' => 'slider',
                                'values' => array(              
                                    'cssName' => '--kmcf7-btn-width',
                                    'cssSufix' => '%',
                                    'elementType' => 'button',
                                    'title' => esc_html__('Button Width (%)','kaswara'),
                                    'description' => esc_html__('Button width in %','kaswara'),
                                    'value' => 50,
                                    'default' => 50,
                                    'min' => 20,
                                    'max' => 100,       
                                )
                            ),
                            array(
                                'type' => 'slider',
                                'values' => array(              
                                    'cssName' => '--kmcf7-btn-fontsize',
                                    'cssSufix' => 'px',
                                    'elementType' => 'button',
                                    'title' => esc_html__('Font Size','kaswara'),
                                    'description' => esc_html__('Button text font size','kaswara'),
                                    'value' => 16,
                                    'default' => 16,
                                    'min' => 0,
                                    'max' => 45,        
                                )
                            ),
                            array(
                                'type' => 'slider',
                                'values' => array(              
                                    'cssName' => '--kmcf7-btn-letterspacing',
                                    'cssSufix' => 'px',
                                    'elementType' => 'button',
                                    'title' => esc_html__('Letter Spacing','kaswara'),
                                    'cssSufix' => 'px',
                                    'description' => esc_html__('Button text letter spacing','kaswara'),
                                    'value' => 1,
                                    'default' => 1,
                                    'min' => 0,
                                    'max' => 15,        
                                )
                            ),

                            array(
                                'type' => 'slider',
                                'values' => array(              
                                    'cssName' => '--kmcf7-btn-height',
                                    'cssSufix' => 'px',
                                    'elementType' => 'button',
                                    'title' => esc_html__('Button Height','kaswara'),
                                    'description' => esc_html__('Button height in (px)','kaswara'),
                                    'value' => 45,
                                    'default' => 45,
                                    'min' => 25,
                                    'max' => 100,       
                                )
                            ),

                            array(
                                'type' => 'slider',
                                'values' => array(              
                                    'cssName' => '--kmcf7-btn-mgtop',
                                    'cssSufix' => 'px',
                                    'elementType' => 'button',
                                    'title' => esc_html__('Margin Top','kaswara'),
                                    'description' => esc_html__('Apply button margin top','kaswara'),
                                    'value' => 15,
                                    'default' => 15,
                                    'min' => 0,
                                    'max' => 100,       
                                )
                            ),
                            array(
                                'type' => 'slider',
                                'values' => array(              
                                    'cssName' => '--kmcf7-btn-mgbottom',
                                    'cssSufix' => 'px',
                                    'elementType' => 'button',
                                    'title' => esc_html__('Margin Bottom','kaswara'),
                                    'description' => esc_html__('Apply button margin bottom','kaswara'),
                                    'value' => 15,
                                    'default' => 15,
                                    'min' => 0,
                                    'max' => 100,       
                                )
                            ),
                            array(
                                'type' => 'colorpicker',
                                'values' => array(                              
                                    'cssName' => '--kmcf7-btn-color',                                           
                                    'cssSufix' => '',
                                    'value' => '#eee',
                                    'elementType' => 'button',
                                    'title' => esc_html__('Text Color','kaswara'),
                                    'description' => esc_html__('Button text color','kaswara'),
                                )
                            ),

                            array(
                                'type' => 'colorpicker',
                                'values' => array(                              
                                    'cssName' => '--kmcf7-btn-color-hover',                                         
                                    'cssSufix' => '',
                                    'value' => '#fff',
                                    'elementType' => 'button',
                                    'title' => esc_html__('Text Color (H)','kaswara'),
                                    'description' => esc_html__('Text color onHover','kaswara'),
                                )
                            ),

                            array(
                                'type' => 'colorpicker',
                                'values' => array(                              
                                    'cssName' => '--kmcf7-btn-bg-color',                                            
                                    'cssSufix' => '',
                                    'value' => '#222',
                                    'elementType' => 'button',
                                    'title' => esc_html__('Background','kaswara'),
                                    'description' => esc_html__('Button background color','kaswara'),
                                )
                            ),
                            array(
                                'type' => 'colorpicker',
                                'values' => array(                              
                                    'cssName' => '--kmcf7-btn-bg-color-hover',                                          
                                    'cssSufix' => '',
                                    'value' => '#269AD6',
                                    'elementType' => 'button',
                                    'title' => esc_html__('Background (H)','kaswara'),
                                    'description' => esc_html__('background color onhover','kaswara'),
                                )
                            ),
                            array(
                            'type' => 'select',
                                'values' => array(                                                                                              
                                    'value' => 'center',    
                                    'cssName' => '--kmcf7-btn-align',                   
                                    'cssSufix' => '',
                                    'default' => 'center',
                                    'elementType' => 'button',
                                    'title' => esc_html__('Button Align','kaswara'),
                                    'description' => esc_html__('Choose the butotn aligment!','kaswara'),
                                    'options' => array(
                                        'left' => 'Left', 
                                        'center' => 'Center',
                                        'right' => 'Right'
                                    ) 
                                )
                            ),
                            
                            array(
                                'type' => 'message',
                                'values' => array(
                                    'title' => esc_html__('Border Style','kaswara'),                               
                                )
                            ),
                            array(
                                'type' => 'slider',
                                'values' => array(              
                                    'cssName' => '--kmcf7-btn-border-radius',
                                    'cssSufix' => 'px',
                                    'elementType' => 'button',
                                    'title' => esc_html__('Border Radius','kaswara'),
                                    'description' => esc_html__('button border radius (px)','kaswara'),
                                    'value' => 0,
                                    'default' => 0,
                                    'min' => 0,
                                    'max' => 500,       
                                )
                            ),
                            array(
                                'type' => 'slider',
                                'values' => array(              
                                    'cssName' => '--kmcf7-btn-border-width',
                                    'cssSufix' => 'px',
                                    'elementType' => 'button',
                                    'title' => esc_html__('Border Width','kaswara'),
                                    'description' => esc_html__('Apply button border width','kaswara'),
                                    'value' => 0,
                                    'default' => 0,
                                    'min' => 0,
                                    'max' => 8,     
                                )
                            ),
                            array(
                                'type' => 'colorpicker',
                                'values' => array(                              
                                    'cssName' => '--kmcf7-btn-border-color',                                            
                                    'value' => '#1a1a1a',
                                    'cssSufix' => '',
                                    'elementType' => 'button',
                                    'title' => esc_html__('Border Color','kaswara'),
                                    'description' => esc_html__('Apply button border color','kaswara'),
                                )
                            ),
                            array(
                                'type' => 'colorpicker',
                                'values' => array(                              
                                    'cssName' => '--kmcf7-btn-border-color-hover',                                      
                                    'cssSufix' => '',
                                    'value' => '#2492CA',
                                    'elementType' => 'button',
                                    'title' => esc_html__('Border Color (H)','kaswara'),
                                    'description' => esc_html__('button border color onHover','kaswara'),
                                )
                            ),

                            


                        )
                    );
                    $buttonStylerSection->render();
}  




//Kameleon CF7 Handlers 
add_action( 'init', 'kaswara_cf7_designer_add_shortcode_handlers' );
add_action( 'after_setup_theme', 'kaswara_cf7_designer_add_shortcode_handlers' );
function kaswara_cf7_designer_add_shortcode_handlers(){
    wpcf7_add_form_tag(array( 'text', 'text*', 'email', 'email*', 'url', 'url*', 'tel', 'tel*' , 'number', 'number*', 'date', 'date*' ),'kaswara_cf7_text_handler', true ); 
    wpcf7_add_form_tag( array( 'textarea', 'textarea*' ), 'kaswara_cf7_textarea_handler', true );
    wpcf7_add_form_tag( 'submit', 'kaswara_cf7_submit_handler' );
}

//functions to change the output of the shortcodes
function kaswara_cf7_text_handler($tag){
 $tag = new WPCF7_FormTag( $tag );
  if ( empty( $tag->name ) )
    return '';

  $validation_error = wpcf7_get_validation_error( $tag->name );

  $class = wpcf7_form_controls_class( $tag->type, 'wpcf7-text' );

  if ( in_array( $tag->basetype, array( 'email', 'url', 'tel' ) ) )
    $class .= ' wpcf7-validates-as-' . $tag->basetype;

  if ( $validation_error )
    $class .= ' wpcf7-not-valid';

  $atts = array();

  $atts['size'] = $tag->get_size_option( '40' );
  $atts['maxlength'] = $tag->get_maxlength_option();
  $atts['minlength'] = $tag->get_minlength_option();

  if ( $atts['maxlength'] && $atts['minlength'] && $atts['maxlength'] < $atts['minlength'] ) {
    unset( $atts['maxlength'], $atts['minlength'] );
  }

  $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  $id_key = substr(str_shuffle($chars),0,8);

  $atts['class'] = $tag->get_class_option( $class );  
  $input_half = ''; 
  if( strpos($atts['class'], 'cf7-input-half') !== false)
    $input_half = 'cf7-input-half';

  $atts['class'] .= ' km_cf7-input '; 
  $atts['id'] = $tag->get_id_option();
  $for_id = $tag->get_id_option();
  $atts['tabindex'] = $tag->get_option( 'tabindex', 'int', true );

  if(trim($atts['id']) == "" || empty($atts['id'])){
    $atts['id'] = 'kmcf7-'.$tag->name.''.$id_key;    
    $for_id = 'kmcf7-'.$tag->name.''.$id_key;
  }

  if ( $tag->has_option( 'readonly' ) )
    $atts['readonly'] = 'readonly';

  if ( $tag->is_required() )
    $atts['aria-required'] = 'true';

  $atts['aria-invalid'] = $validation_error ? 'true' : 'false';

  $value = (string) reset( $tag->values );
  $placeholder = '';  
  if($tag->has_option( 'watermark' )  || $tag->has_option( 'placeholder' )){
    $placeholder = $value;
    $value ='';     
  }
   else{
    $placeholder = str_replace("-"," ",$tag->name);
    $value =''; 
   }



  $value = $tag->get_default_option( $value );

  $value = wpcf7_get_hangover( $tag->name, $value );

  $atts['value'] = $value;

  if ( wpcf7_support_html5() ) {
    $atts['type'] = $tag->basetype;
  } else {
    $atts['type'] = 'text';
  }

  $atts['name'] = $tag->name;

  $atts = wpcf7_format_atts( $atts );

  $html = sprintf(
    '<span class="wpcf7-form-control-wrap %1$s km_cf7-input-container '.$input_half.'">     
      <input %2$s onfocus="km_cf7_designer_focus(this)" onblur="km_cf7_designer_blur()"/>
      <label class="km_cf7-label" for="'.$for_id.'" data-content="'.$placeholder.'">
        <span class="km_cf7_label-content" data-content="'.$placeholder.'">'.$placeholder.'</span>
      </label>
      %3$s
    </span>',
    sanitize_html_class( $tag->name ), $atts, $validation_error );
  return $html;
  //<span class="wpcf7-form-control-wrap %1$s"><input %2$s />%3$s</span>
} 




function kaswara_cf7_textarea_handler( $tag ) {
  $tag = new WPCF7_FormTag( $tag );

  if ( empty( $tag->name ) )
    return '';

  $validation_error = wpcf7_get_validation_error( $tag->name );

  $class = wpcf7_form_controls_class( $tag->type );
  $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  $id_key = substr(str_shuffle($chars),0,8);

  if ( $validation_error )
    $class .= ' wpcf7-not-valid';

  $atts = array();

  $atts['cols'] = $tag->get_cols_option( '40' );
  $atts['rows'] = $tag->get_rows_option( '10' );
  $atts['maxlength'] = $tag->get_maxlength_option();
  $atts['minlength'] = $tag->get_minlength_option();

  if ( $atts['maxlength'] && $atts['minlength'] && $atts['maxlength'] < $atts['minlength'] ) {
    unset( $atts['maxlength'], $atts['minlength'] );
  }

  $atts['class'] = $tag->get_class_option( $class );
  $atts['class'] .= ' km_cf7-input km_cf7-textarea '; 
  $atts['id'] = $tag->get_id_option();
  $atts['tabindex'] = $tag->get_option( 'tabindex', 'int', true );
  $for_id = $tag->get_id_option();
  if(trim($atts['id']) == "" || empty($atts['id'])){
    $atts['id'] = 'kmcf7-'.$tag->name.''.$id_key;    
    $for_id = 'kmcf7-'.$tag->name.''.$id_key;
  }
  
  if ( $tag->has_option( 'readonly' ) ) {
    $atts['readonly'] = 'readonly';
  }

  if ( $tag->is_required() ) {
    $atts['aria-required'] = 'true';
  }

  $atts['aria-invalid'] = $validation_error ? 'true' : 'false';

  $value = empty( $tag->content )
    ? (string) reset( $tag->values )
    : $tag->content;

  $placeholder = '';  
  if($tag->has_option( 'watermark' )  || $tag->has_option( 'placeholder' )){
    $placeholder = $value;
    $value ='';     
  }
   else{
    $placeholder = str_replace("-"," ",$tag->name);
    $value =''; 
   }

  $value = $tag->get_default_option( $value );

  $value = wpcf7_get_hangover( $tag->name, $value );

  $atts['name'] = $tag->name;

  $atts = wpcf7_format_atts( $atts );
  $html = sprintf(
    '<span class="wpcf7-form-control-wrap km_cf7-input-container %1$s km_cf7-textarea-container">
      <textarea %2$s onfocus="km_cf7_designer_focus(this)" onblur="km_cf7_designer_blur()">%3$s</textarea>
      <label class="km_cf7-label" for="'.$for_id.'" data-content="'.$placeholder.'">
        <span class="km_cf7_label-content" data-content="'.$placeholder.'">'.$placeholder.'</span>
      </label>
      %4$s
    </span>',
    sanitize_html_class( $tag->name ), $atts,
    esc_textarea( $value ), $validation_error );

  return $html;
}

}

?>