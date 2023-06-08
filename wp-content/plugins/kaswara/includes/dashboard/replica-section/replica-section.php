<?php 

add_action( 'init', 'kswr_create_replica_section', 0 );
function kswr_create_replica_section() {
	register_post_type( 'replica_section',
	    array(
	      'labels' => array(
	        'name' => esc_html__( 'Replica sections' ,'kaswara'),
	        'singular_name' => esc_html__( 'Replica sections' ,'kaswara'),
	        'add_new'            => esc_html__( 'Add New' ,'kaswara'),
		    'add_new_item'       => esc_html__( 'Add New Replica Section' ,'kaswara'),
		    'edit_item'          => esc_html__( 'Edit Replica Section' ,'kaswara'),
		    'new_item'           => esc_html__( 'New Replica Section' ,'kaswara'),
		    'all_items'          => esc_html__( 'All Replica sections' ,'kaswara'),
		    'view_item'          => esc_html__( 'View Replica Section' ,'kaswara'),
		    'search_items'       => esc_html__( 'Search Replica Section' ,'kaswara'),
		    'not_found'          => esc_html__( 'No Replica Section found' ,'kaswara'),
		    'not_found_in_trash' => esc_html__( 'No Replica sections found in the Trash' ,'kaswara'), 
		    'parent_item_colon'  => '',
		    'menu_name'          => 'Replica Section'
	      ),

	    'public' => true,
	    'menu_icon'   => 'dashicons-images-alt',
	    'has_archive' => false,
	    'publicly_queryable' => false,	    
	  	'show_ui' => true,
	    'show_in_menu' => true,
	    'query_var' => true,
	    'rewrite' => array( 
	    	'slug' => 'replica_section',
	    	'with_front' => true,
	    	'feeds' => true,
	    	'pages' => true
	    ),  
	    'can_export' => true,
	    'supports' => array(
	      	'title',
	        'editor',	      
	       )	
	    )
	);
	

}

//Replica Section Metabox
function kaswara_replicasection_metabox(){
    add_meta_box( 
        'kaswara_replicasection_meta', 
        esc_html__('Replica Section',"kaswara"), 
        'kaswara_replicasection_metabox_display', 
        'page', 
        'normal',
        'high'
    );
}
add_action('add_meta_boxes','kaswara_replicasection_metabox');
function kaswara_replicasection_metabox_display( $post ){
    $options = '';
    foreach (kswr_replica_section_list() as $key => $value) {
        $options .= '<option value="'.$value.'">'.$key.'</option>';        
    }
    kaswara_loading_area();
?>
<script type="text/javascript">
	jQuery(document).ready(function(){
    	setTimeout(function(){jQuery('.composer-switch').append('<div class="ksw-replcia-btn" onclick="kswr_replica_show()">Replica Section</div>');},1000);		
	});
</script>
<div class="kswr-replica-popup">
    <div class="kswr-replica-popup-top">
        <span class="kswr-replica-popup-title"><?php echo esc_html__('Replica Section','kaswara'); ?></span>
        <div class="kswr-replica-popup-closer"  onclick="kswr_replica_closer();">x</div>
    </div>
    <div class="kswr-replica-popup-center">
        <span><?php echo esc_html__('Add an alterable Replica Section','kaswara'); ?></span>
        <div><select id="kswr-replica-select"><?php echo $options; ?></select></div>
        <span><?php echo esc_html__('Add Section to ','kaswara'); ?></span>
        <div>
            <select id="kswr-replicaposition-select">
                <option value="bottom"><?php echo esc_html__('Bottom','kaswara'); ?></option>
                <option value="top"><?php echo esc_html__('Top','kaswara'); ?></option>
            </select>
        </div>
    </div>
    <div class="kswr-replica-popup-bottom">
        <div class="kswr-replica-popup-add" onclick="kswr_replica_add_section()"><?php echo esc_html__('Add Section','kaswara'); ?></div>
        <div class="kswr-replica-popup-close" onclick="kswr_replica_closer();"><?php echo esc_html__('Close','kaswara'); ?></div>
    </div>
</div>

<?php 
}

?>