<?php 
/*------------------------------------------------
                POST GRID SHORTCODE
------------------------------------------------*/
function kswr_postgrid_shortcode() {
    vc_map( array(
        "name" => esc_html__( "Post Grid", "kaswara" ),
      	"category" => "Kaswara",                
        "description" => esc_html__("Blog Posts list in a grid layout", "kaswara"),         
        'icon' => KASWARA_IMAGES.'small/postgrid.jpg',  
        "base" => "kswr_postgrid",      
        "params" => array(                   
            array(
                'type' => 'dropdown',
                'heading' => esc_html__("Post Grid Type",'kaswara'),
                'group' => 'General',
                'param_name' => 'pg_gr_type',
                'value' => array(                    
                    esc_html__("List",'kaswara') => 'list',
                    esc_html__("Single",'kaswara')  => 'single'
                )            
            ),
             array(
                "type" => "kswr_search",          
                "heading" => esc_html__( "Search Post By Title", "kaswara" ),
                'group' => 'General',
                "param_name" => "pg_psingle_id",                
                "item_type" => "post",                
                "dependency" => Array("element" => "pg_gr_type","value" => array("single")),                
            ),
            array(
                "type" => "kswr_number",          
                "heading" => esc_html__( "Number of Posts to Show", "kaswara" ),
                'group' => 'General',
                "param_name" => "pg_number",
                "value" => 8,
                "dependency" => Array("element" => "pg_gr_type","value" => array("list")),                
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__("Columns Number",'kaswara'),
                'group' => 'General',
                'param_name' => 'pg_columns_number',
                "dependency" => Array("element" => "pg_gr_type","value" => array("list")),  
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
                'heading' => esc_html__("Post Grid Style",'kaswara'),
                'group' => 'General',
                'param_name' => 'pg_style',
                'value' => array(                    
                    esc_html__("Style 1",'kaswara') => 'style1',
                    esc_html__("Style 2",'kaswara')  => 'style2',
                    esc_html__("Style 3",'kaswara')  => 'style3',
                    esc_html__("Style 4",'kaswara')  => 'style4'
                )            
            ),

            array(
                "type" => "kswr_number",          
                "heading" => esc_html__( "Padding Left & Right", "kaswara" ),
                'group' => 'General',
                "param_name" => "pg_paddingleftright",
                "value" => 30,
                "dependency" => Array("element" => "pg_style","value" => array("style2","style3")),
            ),

            array(
                "type" => "kswr_number",          
                "heading" => esc_html__( "Padding Top & Bottom", "kaswara" ),
                'group' => 'General',
                "param_name" => "pg_paddingtopbottom",
                "value" => 30,
                "dependency" => Array("element" => "pg_style","value" => array("style2","style3")),
            ),

             array(
                "type" => "kswr_number",          
                "heading" => esc_html__( "Image Avatar Radius", "kaswara" ),
                'group' => 'General',
                "param_name" => "pg_usrbradius",
                "value" => 0,
                "dependency" => Array("element" => "pg_style","value" => array("style2","style3","style4")),
            ),

            array(
                "type" => "dropdown",            
                "heading" => esc_html__("Enable Gutter", "kaswara"),
                'group' => 'General',
                "param_name" => "pg_gutter",
                "value" => array(
                    esc_html__("Yes","kaswara") => 'true',
                    esc_html__("No","kaswara") => 'false',
                )
            ),

            array(
                "type" => "kswr_number",          
                "heading" => esc_html__( "Excerpt Char Number", "kaswara" ),
                'group' => 'General',
                "param_name" => "pg_excerpt_num",
                "value" => 150
            ),    

            array(
                "type" => "kswr_number",          
                "heading" => esc_html__( "Border Radius", "kaswara" ),
                'group' => 'General',
                "param_name" => "pg_border_radius",
                "dependency" => Array("element" => "pg_style","value" => array("style1","style2","style3")),
                "value" => 0
            ),    


            array(
                "type" => "colorpicker",
                "value" => "#fff",
                "group" => "Font & Colors", 
                "heading" => esc_html__( "Post Background Color", "kaswara" ),
                "param_name" => "pg_background"
            ),  

            array(
                "type" => "colorpicker",
                "value" => "#f1f1f1",
                "group" => "Font & Colors", 
                "heading" => esc_html__( "Post Container Border Color", "kaswara" ),
                "dependency" => Array("element" => "pg_style","value" => array("style1","style2","style3")),
                "param_name" => "pg_border"
            ),  
            array(
                "type" => "kswr_number",          
                "heading" => esc_html__( "Post Container Border Thickness", "kaswara" ),
                'group' => 'Font & Colors',
                "param_name" => "pg_border_thickness",
                "dependency" => Array("element" => "pg_style","value" => array("style1","style2","style3")),
                "value" => 1,
                "max" => 10
            ),


            array(
                "type" => "colorpicker",
                "value" => "#fafafa",
                "group" => "Font & Colors", 
                "heading" => esc_html__( "Post Border Inside Color", "kaswara" ),
                "dependency" => Array("element" => "pg_style","value" => array("style1","style2","style3")),
                "param_name" => "pg_border_inside"
            ), 
            array(
                "type" => "kswr_number",          
                "heading" => esc_html__( "Post Border Inside Thickness", "kaswara" ),
                'group' => 'Font & Colors',
                "param_name" => "pg_border_inside_thickness",
                "dependency" => Array("element" => "pg_style","value" => array("style1","style2","style3")),
                "value" => 1,
                "max" => 10
            ),
 

 			//Title Typography
           
             array(
	            "type" => "kswr_message",
	            "group" => "Font & Colors",
	            "title" => esc_html__( "Title Font Settings", "kaswara" ),       
	            "param_name" => "pg_title_font_sections",
	            "mtop" => "10px"
	         ),
	         array(
	            "type" => "kswr_fontsize",
	            "param_name" => "pg_title_size",
	            "group" => "Font & Colors",              
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
	            "param_name" => "pg_title_style",
	            "heading" => esc_html__( "Font Style", "kaswara" ),             
	            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
	            'elements'  => array(
	               esc_html__("Font Family","kaswara") => "font-family",
	               esc_html__("Font Weight","kaswara") => "font-weight",                
	               esc_html__("Font Style","kaswara") => "font-style",
	            ),
	            "group" => "Font & Colors",
	        ),

            array(
                "type" => "colorpicker",
                "value" => "#444",
                "group" => "Font & Colors", 
                "heading" => esc_html__( "Post Title Color", "kaswara" ),
                "param_name" => "pg_title_color"
            ),  

           //Excerpt Font Settings
             array(
				"type" => "kswr_message",
	            "group" => "Font & Colors",
	            "title" => esc_html__( "Excerpt Font Settings", "kaswara" ),       
	            "param_name" => "pg_excerpt_font_sections",
	            "mtop" => "10px"
	         ),
	         array(
	            "type" => "kswr_fontsize",
	            "param_name" => "pg_excerpt_size",
	            "group" => "Font & Colors",              
	            "heading" => esc_html__( "Font Size", "kaswara" ),      
	            "defaults"=> array("font-size" => "13px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
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
	            "param_name" => "pg_excerpt_style",
	            "heading" => esc_html__( "Font Style", "kaswara" ),             
	            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
	            'elements'  => array(
	               esc_html__("Font Family","kaswara") => "font-family",
	               esc_html__("Font Weight","kaswara") => "font-weight",                
	               esc_html__("Font Style","kaswara") => "font-style",
	            ),
	            "group" => "Font & Colors",
	        ),

            array(
                "type" => "colorpicker",
                "value" => "#777",
                "group" => "Font & Colors", 
                "heading" => esc_html__( "Excerpt Font Color", "kaswara" ),
                "param_name" => "pg_excerpt_color"
            ),            
            
             array(
                "type" => "dropdown",  
                "multiple" => 1,        
                "heading" => esc_html__( "Sort Order : ", "kaswara" ),
                'group' => 'Query Options',
                "param_name" => "pg_order",
                "dependency" => Array("element" => "pg_gr_type","value" => array("list")),  
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
                'param_name' => 'pg_order_by',
                "dependency" => Array("element" => "pg_gr_type","value" => array("list")),  
                'value' => array(
                    esc_html__( 'Date', 'kaswara' ) => 'date',
                    esc_html__( 'Order by post ID', 'kaswara' ) => 'ID',
                    esc_html__( 'Author', 'kaswara' ) => 'author',
                    esc_html__( 'Title', 'kaswara' ) => 'title',
                    esc_html__( 'Number of comments', 'kaswara' ) => 'comment_count'                   
                )               
            ),

        )
    ));
} 
add_action( 'init', 'kswr_postgrid_shortcode' );


?>