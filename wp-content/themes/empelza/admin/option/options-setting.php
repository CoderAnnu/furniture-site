<?php
/**
 * Wrapper for calling a Kirki and save default option values
 *
 */

if(!class_exists('EMPELZA_Options')):
    class EMPELZA_Options {
        /**
         * The single class instance.
         *
         * @since 1.0.0
         * @access private
         *
         * @var object
         */
        private static $default_options = array();

        /**
         * Main Instance
         * Ensures only one instance of this class exists in memory at any one time.
         *
         */
        public static function add_field ($args) {
            if(isset($args) && is_array($args)){
                if(class_exists('Kirki')){
                    Kirki::add_field('empelza', $args);
                }
                if(isset($args['settings']) && isset($args['default'])){
                    self::$default_options[$args['settings']] = $args['default'];
                }
            }
        }

        public static function add_config($args){
            if(class_exists('Kirki') && isset($args) && is_array($args)){
                Kirki::add_config('empelza', $args);
            }
        }

        public static function add_panel($name, $args){
            if(class_exists('Kirki') && isset($args) && is_array($args)){
                Kirki::add_panel($name, $args);
            }
        }

        public static function add_section($name, $args){
            if(class_exists('Kirki') && isset($args) && is_array($args)){
                Kirki::add_section($name, $args);
            }
        }


        public static function get_option($name) {

            $value = get_theme_mod($name, null);

            if ($value === null) {

                $value = isset(self::$default_options[$name]) ? self::$default_options[$name] : null;

            }

            if($value === 'on'){
                $value = true;
            } elseif ($value === 'off'){
                $value = false;
            }

            return $value;
        }
    }
endif;