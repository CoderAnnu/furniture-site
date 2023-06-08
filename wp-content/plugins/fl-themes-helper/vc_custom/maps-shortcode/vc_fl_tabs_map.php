<?php
    if (function_exists('vc_map')) {
        $tab_id_1 = time() . '-1-' . rand( 0, 100 );
        $tab_id_2 = time() . '-2-' . rand( 0, 100 );
        vc_map( array(
            'name'                      => esc_html__( 'Tabs', 'fl-themes-helper' ),
            'base'                      => 'vc_tabs',
            'category'                  => esc_html__('Empelza', 'fl-themes-helper'),
            'show_settings_on_create'   => false,
            'is_container'              => true,
            'icon'                      => 'fl-icon icon-fl-vc-icon',
            'description'               => esc_html__( 'Place tabbed content', 'fl-themes-helper' ),
            'weight'                    => 900,
            'params' => array_merge(array(), fl_helping_get_animation_option(), fl_helping_get_animation_delay_option(), fl_helping_get_design_tab()),
            'custom_markup' => '<div class="wpb_tabs_holder wpb_holder vc_container_for_children">
                      <ul class="tabs_controls">
                      </ul>
                      %content%
                      </div>',
            'default_content' => '[vc_tab title="' . esc_html__( 'Tab 1', 'fl-themes-helper' ) . '" tab_id="' . $tab_id_1 . '"][/vc_tab]
                                  [vc_tab title="' . esc_html__( 'Tab 2', 'fl-themes-helper' ) . '" tab_id="' . $tab_id_2 . '"][/vc_tab]',
            'js_view' => 'VcTabsView'
        ) );

        vc_map( array(
            'name' => esc_html__( 'Tab Item', 'fl-themes-helper' ),
            'base' => 'vc_tab',
            'category'  => esc_html__('Empelza', 'fl-themes-helper'),
            'allowed_container_element' => 'vc_row',
            'is_container' => true,
            'content_element' => false,
            'params' => array(
                array(
                    'type'          => 'tab_id',
                    'heading'       => esc_html__( 'ID', 'fl-themes-helper' ),
                    'param_name'    => 'tab_id'
                ),
                array(
                    'type'              => 'textarea',
                    'heading'           => esc_html__( 'Title text', 'fl-themes-helper' ),
                    'param_name'        => 'title',
                    'value'             => 'Tab',
                    'std'               => 'Tab',
                    "description"       => esc_html__("Enter your text.", "fl-themes-helper")
                ),

            ),
            'js_view' => 'VcTabView'
        ) );
    }