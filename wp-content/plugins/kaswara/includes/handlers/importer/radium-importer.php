<?php

/**
 * Class Radium_Theme_Importer
 *
 * This class provides the capability to import demo content as well as import widgets and WordPress menus
 *
 * @since 2.2.0
 *
 * @category RadiumFramework
 * @package  NewsCore WP
 * @author   Franklin M Gitonga
 * @link     http://radiumthemes.com/
 *
 *
 * Modified to work with Reduxframework/Wbc_importer extension
 *
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// Don't duplicate me!
if ( !class_exists( 'Radium_Theme_Importer' ) ) {

class Radium_Theme_Importer {

    /**
     * Holds a copy of the object for easy reference.
     *
     * @since 2.2.0
     *
     * @var object
     */
    public $theme_options_file;

    /**
     * Holds a copy of the object for easy reference.
     *
     * @since 2.2.0
     *
     * @var object
     */
    public $widgets;

    /**
     * Holds a copy of the object for easy reference.
     *
     * @since 2.2.0
     *
     * @var object
     */
    public $content_demo;
    public $demo_files_path;
    /**
     * Flag imported to prevent duplicates
     *
     * @since 2.2.0
     *
     * @var object
     */
    public $flag_as_imported = array();

    /**
     * Holds a copy of the object for easy reference.
     *
     * @since 2.2.0
     *
     * @var object
     */
    private static $instance;

    /**
     * Constructor. Hooks all interactions to initialize the class.
     *
     * @since 2.2.0
     */
    public function start_importing() {      
      self::$instance = $this;
      //$this->widgets            = $this->widgets_file_name;
      $this->demo_files_path = $this->content_demo;
      add_filter( 'add_post_metadata', array( $this, 'check_previous_meta' ), 10, 5 );

      add_action( 'import_end', array( $this, 'after_wp_importer' ) );

      $this->process_imports();

    }

    /**
     * Avoids adding duplicate meta causing arrays in arrays from WP_importer
     *
     * @param null    $continue
     * @param unknown $post_id
     * @param unknown $meta_key
     * @param unknown $meta_value
     * @param unknown $unique
     * @return
     */
    public function check_previous_meta( $continue, $post_id, $meta_key, $meta_value, $unique ) {

      $old_value = get_metadata( 'post', $post_id, $meta_key );

      if ( count( $old_value ) == 1 ) {
        if ( $old_value[0] === $meta_value ) {
          return false;
        }elseif ( $old_value[0] !== $meta_value ) {
          update_post_meta( $post_id, $meta_key, $meta_value );
          return false;
        }
      }

      return null;
    }

    public function after_wp_importer() {

      $imported_demos = get_option( 'wbc_imported_demos' );

      $this->active_import[$this->active_import_id]['imported'] = 'imported';

      if ( empty( $imported_demos ) ) {
        $imported_demos = $this->active_import;
      }else {
        $imported_demos = array_merge( $imported_demos , $this->active_import );
      }

      do_action( 'wbc_importer_after_content_import', $this->active_import, $this->demo_files_path );

      update_option( 'wbc_imported_demos', $imported_demos );
    }


    public function process_imports() {

      if ( !empty( $this->content_demo ) ) {
        $this->set_demo_data( $this->content_demo );
      }

      if ( !empty( $this->theme_options_file ) ) {
        $this->set_demo_theme_options( $this->theme_options_file );
      }


      if ( !empty( $this->widgets )  ) {
        $this->process_widget_import_file( $this->widgets );
      }
      $this->set_demo_menus();

    }

    /**
     * add_widget_to_sidebar Import sidebars
     *
     * @param string  $sidebar_slug    Sidebar slug to add widget
     * @param string  $widget_slug     Widget slug
     * @param string  $count_mod       position in sidebar
     * @param array   $widget_settings widget settings
     *
     * @since 2.2.0
     *
     * @return null
     */
    public function add_widget_to_sidebar( $sidebar_slug, $widget_slug, $count_mod, $widget_settings = array() ) {

      $sidebars_widgets = get_option( 'sidebars_widgets' );

      if ( !isset( $sidebars_widgets[$sidebar_slug] ) )
        $sidebars_widgets[$sidebar_slug] = array( '_multiwidget' => 1 );

      $newWidget = get_option( 'widget_'.$widget_slug );

      if ( !is_array( $newWidget ) )
        $newWidget = array();

      $count = count( $newWidget )+1+$count_mod;
      $sidebars_widgets[$sidebar_slug][] = $widget_slug.'-'.$count;

      $newWidget[$count] = $widget_settings;

      update_option( 'sidebars_widgets', $sidebars_widgets );
      update_option( 'widget_'.$widget_slug, $newWidget );

    }

    public function set_demo_data( $file ) {

      if ( !defined( 'WP_LOAD_IMPORTERS' ) ) define( 'WP_LOAD_IMPORTERS', true );

      require_once ABSPATH . 'wp-admin/includes/import.php';

      $importer_error = false;

      if ( !class_exists( 'WP_Importer' ) ) {

        $class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';

        if ( file_exists( $class_wp_importer ) ) {

          require_once $class_wp_importer;

        } else {

          $importer_error = true;

        }

      }

      if ( !class_exists( 'WP_Import' ) ) {

        $class_wp_import = dirname( __FILE__ ) .'/wordpress-importer.php';

        if ( file_exists( $class_wp_import ) )
          require_once $class_wp_import;
        else
          $importer_error = true;

      }

      if ( $importer_error ) {

        die( "Error on import" );

      } else {
          $wp_import = new WP_Import();
          $wp_import->fetch_attachments = true;
          $wp_import->import( $file );

      }

    }

    public function set_demo_menus() {}

    public function set_demo_theme_options( $file ) {
     
      // Get file contents and decode
      $data = file_get_contents( $file );
      $data = json_decode( $data, true );
      $data = maybe_unserialize( $data );


      // Only if there is data
      if ( !empty( $data ) || is_array( $data ) ) {                  
          // Hook before import
          $data = apply_filters( 'radium_theme_import_theme_options', $data );


          update_option( $this->theme_option_name, $data );
      }

      do_action( 'wbc_importer_after_theme_options_import', $this->active_import, $this->demo_files_path );

    }

    /**
     * Available widgets
     *
     * Gather site's widgets into array with ID base, name, etc.
     * Used by export and import functions.
     *
     * @since 2.2.0
     *
     * @global array $wp_registered_widget_updates
     * @return array Widget information
     */
    function available_widgets() {

      global $wp_registered_widget_controls;

      $widget_controls = $wp_registered_widget_controls;

      $available_widgets = array();

      foreach ( $widget_controls as $widget ) {

        if ( ! empty( $widget['id_base'] ) && ! isset( $available_widgets[$widget['id_base']] ) ) { // no dupes

          $available_widgets[$widget['id_base']]['id_base'] = $widget['id_base'];
          $available_widgets[$widget['id_base']]['name'] = $widget['name'];

        }

      }

      return apply_filters( 'radium_theme_import_widget_available_widgets', $available_widgets );

    }


    /**
     * Process import file
     *
     * This parses a file and triggers importation of its widgets.
     *
     * @since 2.2.0
     *
     * @param string  $file Path to .wie file uploaded
     * @global string $widget_import_results
     */
    function process_widget_import_file( $file ) {    
      $data = file_get_contents( $file );
      $data = json_decode( $data , true);
      $this->widget_import_results = $this->import_widgets( $data );
    }


 
 
 function import_widgets( $data ) {
   global $wp_registered_sidebars;
  // Hook before import
  do_action( 'wie_before_import' );
  $data = apply_filters( 'wie_import_data', $data );

  // Get all available widgets site supports
  $available_widgets = $this->available_widgets();

  // Get all existing widget instances
  $widget_instances = array();
  foreach ( $available_widgets as $widget_data ) {
    $widget_instances[$widget_data['id_base']] = get_option( 'widget_' . $widget_data['id_base'] );
  }

  // Begin results
  $results = array(); 
  // Loop import data's sidebars
  foreach ( $data as $sidebar_id => $widgets ) {

    // Check if sidebar is available on this site
    // Otherwise add widgets to inactive, and say so
    if ( isset( $wp_registered_sidebars[$sidebar_id] ) ) {
      $sidebar_available = true;
      $use_sidebar_id = $sidebar_id;
      $sidebar_message_type = 'success';
      $sidebar_message = '';
    } else {
      $sidebar_available = false;
      $use_sidebar_id = 'wp_inactive_widgets'; // add to inactive if sidebar does not exist in theme
      $sidebar_message_type = 'error';
      $sidebar_message = __( 'Sidebar does not exist in theme (using Inactive)', 'widget-importer-exporter' );
    }

    // Result for sidebar
    $results[$sidebar_id]['name'] = ! empty( $wp_registered_sidebars[$sidebar_id]['name'] ) ? $wp_registered_sidebars[$sidebar_id]['name'] : $sidebar_id; // sidebar name if theme supports it; otherwise ID
    $results[$sidebar_id]['message_type'] = $sidebar_message_type;
    $results[$sidebar_id]['message'] = $sidebar_message;
    $results[$sidebar_id]['widgets'] = array();

    // Loop widgets
    foreach ( $widgets as $widget_instance_id => $widget ) {

      $fail = false;

      // Get id_base (remove -# from end) and instance ID number
      $id_base = preg_replace( '/-[0-9]+$/', '', $widget_instance_id );
      $instance_id_number = str_replace( $id_base . '-', '', $widget_instance_id );

      // Does site support this widget?
      if ( ! $fail && ! isset( $available_widgets[$id_base] ) ) {
        $fail = true;
        $widget_message_type = 'error';
        $widget_message = __( 'Site does not support widget', 'widget-importer-exporter' ); // explain why widget not imported
      }    
      $widget = apply_filters( 'wie_widget_settings', $widget ); // object

      $widget = json_decode( json_encode( $widget ), true );

      $widget = apply_filters( 'wie_widget_settings_array', $widget );

      // Does widget with identical settings already exist in same sidebar?
      if ( ! $fail && isset( $widget_instances[$id_base] ) ) {

        // Get existing widgets in this sidebar
        $sidebars_widgets = get_option( 'sidebars_widgets' );
        $sidebar_widgets = isset( $sidebars_widgets[$use_sidebar_id] ) ? $sidebars_widgets[$use_sidebar_id] : array(); // check Inactive if that's where will go

        // Loop widgets with ID base
        $single_widget_instances = ! empty( $widget_instances[$id_base] ) ? $widget_instances[$id_base] : array();
        foreach ( $single_widget_instances as $check_id => $check_widget ) {

          // Is widget in same sidebar and has identical settings?
          if ( in_array( "$id_base-$check_id", $sidebar_widgets ) && (array) $widget == $check_widget ) {

            $fail = true;
            $widget_message_type = 'warning';
            $widget_message = __( 'Widget already exists', 'widget-importer-exporter' ); // explain why widget not imported

            break;

          }

        }

      }

      // No failure
      if ( ! $fail ) {

        // Add widget instance
        $single_widget_instances = get_option( 'widget_' . $id_base ); // all instances for that widget ID base, get fresh every time
        $single_widget_instances = ! empty( $single_widget_instances ) ? $single_widget_instances : array( '_multiwidget' => 1 ); // start fresh if have to
        $single_widget_instances[] = $widget; // add it

          // Get the key it was given
          end( $single_widget_instances );
          $new_instance_id_number = key( $single_widget_instances );

          // If key is 0, make it 1
          // When 0, an issue can occur where adding a widget causes data from other widget to load, and the widget doesn't stick (reload wipes it)
          if ( '0' === strval( $new_instance_id_number ) ) {
            $new_instance_id_number = 1;
            $single_widget_instances[$new_instance_id_number] = $single_widget_instances[0];
            unset( $single_widget_instances[0] );
          }

          // Move _multiwidget to end of array for uniformity
          if ( isset( $single_widget_instances['_multiwidget'] ) ) {
            $multiwidget = $single_widget_instances['_multiwidget'];
            unset( $single_widget_instances['_multiwidget'] );
            $single_widget_instances['_multiwidget'] = $multiwidget;
          }

          // Update option with new widget
          update_option( 'widget_' . $id_base, $single_widget_instances );

        // Assign widget instance to sidebar
        $sidebars_widgets = get_option( 'sidebars_widgets' ); // which sidebars have which widgets, get fresh every time
        $new_instance_id = $id_base . '-' . $new_instance_id_number; // use ID number from new widget instance
        $sidebars_widgets[$use_sidebar_id][] = $new_instance_id; // add new instance to sidebar
        update_option( 'sidebars_widgets', $sidebars_widgets ); // save the amended data

        // After widget import action
        $after_widget_import = array(
          'sidebar'           => $use_sidebar_id,
          'sidebar_old'       => $sidebar_id,
          'widget'            => $widget,
          'widget_type'       => $id_base,
          'widget_id'         => $new_instance_id,
          'widget_id_old'     => $widget_instance_id,
          'widget_id_num'     => $new_instance_id_number,
          'widget_id_num_old' => $instance_id_number
        );
        do_action( 'wie_after_widget_import', $after_widget_import );

       

      }

     

    }

  }
  

  
  
    }

  }//class
}//function_exists
?>