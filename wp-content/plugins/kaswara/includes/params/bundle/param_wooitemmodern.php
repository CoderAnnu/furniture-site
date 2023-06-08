<?php 
/*------------------------------------------------
         WooCommerce Modern SHORTCODE
------------------------------------------------*/
if(is_plugin_active('woocommerce/woocommerce.php')){
function kswr_wooitemmodern_shortcode() {
     vc_map( array(
        "name" => esc_html__( "Woo Modern Products", "kaswara" ),
        
        "description" => esc_html__("WooCommerce Product items in modern design with cool effects", "kaswara"),         
        "base" => "kswr_wooitemmodern",      
        "params" => array(                   
            array(
                'type' => 'dropdown',
                'heading' => esc_html__("Products Type",'kaswara'),
                'group' => 'General',
                'param_name' => 'wooitem_type',
                'value' => array(                    
                    esc_html__("List",'kaswara') => 'list',
                    esc_html__("Single",'kaswara')  => 'single'
                )            
            ),
             array(
                "type" => "kswr_search",          
                "heading" => esc_html__( "Search Product By Name", "kaswara" ),
                'group' => 'General',
                "param_name" => "wooitem_psingle_id",                
                "item_type" => "product",                
                "dependency" => Array("element" => "wooitem_type","value" => array("single")),                
            ),
            array(
                "type" => "kswr_number",          
                "heading" => esc_html__( "Number of Products to Show", "kaswara" ),
                'group' => 'General',
                "param_name" => "wooitem_number",
                "value" => 8,
                "dependency" => Array("element" => "wooitem_type","value" => array("list")),                
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__("Columns Number",'kaswara'),
                'group' => 'General',
                'param_name' => 'wooitem_columns_number',
                "dependency" => Array("element" => "wooitem_type","value" => array("list")),  
                'value' => array(                    
                    esc_html__("4 Columns",'kaswara') => 'syp-item-4',
                    esc_html__("1 Column",'kaswara')  => 'syp-item-1',
                    esc_html__("2 Columns",'kaswara') => 'syp-item-2',
                    esc_html__("3 Columns",'kaswara') => 'syp-item-3',
                    esc_html__("5 Columns",'kaswara') => 'syp-item-5'
                )            
            ),

            array(
                'type' => 'dropdown',
                'heading' => esc_html__("Product Design Style",'kaswara'),
                'group' => 'General',
                'param_name' => 'wooitem_style',           
                'value' => array(                    
                    esc_html__("Style 1",'kaswara') => 'style1',
                    esc_html__("Style 2",'kaswara') => 'style2',
                )            
            ),

            array(
                'type' => 'dropdown',
                'heading' => esc_html__("Enable Gutter",'kaswara'),
                'group' => 'General',
                'param_name' => 'wooitem_gutter',           
                'value' => array(                    
                    esc_html__("Yes",'kaswara') => 'true',
                    esc_html__("No",'kaswara') => 'false',
                )            
            ),

            array(
                "type" => "colorpicker",
                "value" => "rgba(0,0,0,0.8)",
                "group" => "Styling", 
                "heading" => esc_html__( "Hover Overlay Background", "kaswara" ),
                "param_name" => "wooitem_overlay_background"
            ),  


            //Title Font
              array(
                "type" => "kswr_message",
                "group" => "Typography",
                "title" => esc_html__( "Produt Name Font Settings", "kaswara" ),       
                "param_name" => "wooitem_title_font_sections",
                "mtop" => "10px"
             ),
             array(
                "type" => "kswr_fontsize",
                "param_name" => "wooitem_title_size",
                "group" => "Typography",
                "heading" => esc_html__( "Font Size", "kaswara" ),      
                "defaults"=> array("font-size" => "19px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
                'elements'  => array(
                   esc_html__("Font Size","kaswara") => "font-size",
                   esc_html__("Line Height","kaswara") => "line-height",
                   esc_html__("Letter Spacing","kaswara") => "letter-spacing",                
                   esc_html__("Tablet Font Size","kaswara") => "--tablet-font-size",                
                   esc_html__("Phone Font Size","kaswara") => "--phone-font-size",                
                )
            ), 

             array(
                "type" => "kswr_fontstyle",
                "param_name" => "wooitem_title_style",
                "heading" => esc_html__( "Font Style", "kaswara" ),             
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Typography",
            ),   

            array(
                "type" => "colorpicker",
                "value" => "#fff",
                "group" => "Typography", 
                "heading" => esc_html__( "Title Font Color", "kaswara" ),
                "param_name" => "wooitem_title_color"
            ), 

            //SubTitle Font
              array(
                "type" => "kswr_message",
                "group" => "Typography",
                "title" => esc_html__( "Produt Cats Font Settings", "kaswara" ),       
                "param_name" => "wooitem_subtitle_font_sections",
                "mtop" => "10px"
             ),
             array(
                "type" => "kswr_fontsize",
                "param_name" => "wooitem_subtitle_size",
                "group" => "Typography",
                "heading" => esc_html__( "Font Size", "kaswara" ),      
                "defaults"=> array("font-size" => "14px", "line-height" => "", "letter-spacing" => ""),
                'elements'  => array(
                   esc_html__("Font Size","kaswara") => "font-size",
                   esc_html__("Line Height","kaswara") => "line-height",
                   esc_html__("Letter Spacing","kaswara") => "letter-spacing"               
                )
            ), 

             array(
                "type" => "kswr_fontstyle",
                "param_name" => "wooitem_subtitle_style",
                "heading" => esc_html__( "Font Style", "kaswara" ),             
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Typography",
            ),   


            array(
                "type" => "colorpicker",
                "value" => "#aaa",
                "group" => "Typography", 
                "heading" => esc_html__( "SubTitle Font Color", "kaswara" ),
                "param_name" => "wooitem_cats_color"
            ),   
            

            //Price Font
              array(
                "type" => "kswr_message",
                "group" => "Typography",
                "title" => esc_html__( "Price Font Settings", "kaswara" ),       
                "param_name" => "wooitem_price_font_sections",
                "mtop" => "10px"
             ),
             array(
                "type" => "kswr_fontsize",
                "param_name" => "wooitem_price_size",
                "group" => "Typography",
                "heading" => esc_html__( "Font Size", "kaswara" ),      
                "defaults"=> array("font-size" => "19px", "line-height" => "", "letter-spacing" => ""),
                'elements'  => array(
                   esc_html__("Font Size","kaswara") => "font-size",
                   esc_html__("Line Height","kaswara") => "line-height",
                   esc_html__("Letter Spacing","kaswara") => "letter-spacing"               
                )
            ), 

             array(
                "type" => "kswr_fontstyle",
                "param_name" => "wooitem_price_style",
                "heading" => esc_html__( "Font Style", "kaswara" ),             
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Typography",
            ),   

             array(
                "type" => "colorpicker",
                "value" => "#fff",
                "group" => "Typography", 
                "heading" => esc_html__( "Hover Border Color Effect", "kaswara" ),
                "param_name" => "wooitem_border_decoration"
            ),           
  
           
          
            array(
                "type" => "dropdown",  
                "multiple" => 1,        
                "heading" => esc_html__( "Sort Order : ", "kaswara" ),
                'group' => 'Query Options',
                "param_name" => "wooitem_order",
                "dependency" => Array("element" => "wooitem_type","value" => array("list")),  
                "default" => 'DESC',
                "value" => array(
                    esc_html__("Descending","kaswara") => 'DESC',
                    esc_html__("Ascending","kaswara") => 'ASC',
                )
            ),

            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Order by', 'kaswara' ),
                'group' => 'Query Options',
                'param_name' => 'wooitem_order_by',
                "dependency" => Array("element" => "wooitem_type","value" => array("list")),  
                'value' => array(
                    esc_html__( 'Date', 'kaswara' ) => 'date',
                    esc_html__( 'Order by product ID', 'kaswara' ) => 'ID',
                    esc_html__( 'Author', 'kaswara' ) => 'author',
                    esc_html__( 'Title', 'kaswara' ) => 'title',
                    esc_html__( 'Number of comments', 'kaswara' ) => 'comment_count'                   
                )               
            ),

        )
      )
    );
}

    add_action( 'init', 'sy_wooitemmodern_shortcode' );
}


?>