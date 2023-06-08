<?php 
/*------------------------------------------------
         WooCommerce List  SHORTCODE
------------------------------------------------*/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
function kswr_wooitemlist_shortcode() {
     vc_map( array(
        "name" => esc_html__( "Woo Products List", "kaswara" ),
        "description" => esc_html__("WooCommerce Product items list", "kaswara"),         
     	 "category" => "Kaswara",              
        "base" => "kswr_wooitemlist",      
        "params" => array(                   
            array(
                'type' => 'dropdown',
                'heading' => esc_html__("Products Type",'kaswara'),
                'group' => 'General',
                'param_name' => 'wooitemlist_type',
                'value' => array(                    
                    esc_html__("List",'kaswara') => 'list',
                    esc_html__("Single",'kaswara')  => 'single'
                )            
            ),
             array(
                "type" => "kswr_search",          
                "heading" => esc_html__( "Search Product By Name", "kaswara" ),
                'group' => 'General',
                "param_name" => "wooitemlist_psingle_id",                
                "item_type" => "product",                
                "dependency" => Array("element" => "wooitemlist_type","value" => array("single")),                
            ),
            array(
                "type" => "number",          
                "heading" => esc_html__( "Number of Products to Show", "kaswara" ),
                'group' => 'General',
                "param_name" => "wooitemlist_number",
                "value" => 8,
                "dependency" => Array("element" => "wooitemlist_type","value" => array("list")),                
            ),

            array(
                'type' => 'dropdown',
                'heading' => esc_html__("Columns Number",'kaswara'),
                'group' => 'General',
                'param_name' => 'wooitemlist_columns_number',
                "dependency" => Array("element" => "wooitemlist_type","value" => array("list")),  
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
                'heading' => esc_html__("Enable Gutter",'kaswara'),
                'group' => 'General',
                'param_name' => 'wooitemlist_gutter',           
                'value' => array(                    
                    esc_html__("Yes",'kaswara') => 'true',
                    esc_html__("No",'kaswara') => 'false',
                )            
            ),
            array(
                "type" => "colorpicker",
                "value" => "#111",
                "group" => "Styling", 
                "heading" => esc_html__( "Color Scheme", "kaswara" ),
                "param_name" => "wooitemlist_color_scheme"
            ), 
            array(
                "type" => "colorpicker",
                "value" => "#fff",
                "group" => "Styling", 
                "heading" => esc_html__( "Font Color", "kaswara" ),
                "param_name" => "wooitemlist_font_color"
            ), 
            array(
                "type" => "dropdown",  
                "multiple" => 1,        
                "heading" => esc_html__( "Sort Order : ", "kaswara" ),
                'group' => 'Query Options',
                "param_name" => "wooitemlist_order",
                "dependency" => Array("element" => "wooitemlist_type","value" => array("list")),  
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
                'param_name' => 'wooitemlist_order_by',
                "dependency" => Array("element" => "wooitemlist_type","value" => array("list")),  
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
    add_action( 'init', 'kswr_wooitemlist_shortcode' );
}

?>