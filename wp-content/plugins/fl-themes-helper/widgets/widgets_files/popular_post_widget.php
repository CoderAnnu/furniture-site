<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class FL_THEME_HELPER_Popular_Post extends SB_WP_Widget {
	protected $widget_base_id = 'FL_THEME_HELPER_Popular_Post';
	protected $widget_name = 'Custom : Popular Posts';
	
	protected $options;

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
		$this->options = array(
			array(
				'title', 'text', 'Popular Posts',
				'label'		=> esc_html__('Title', 'fl-themes-helper'),
				'input'		=> 'text',
				'filters'	=> 'widget_title',
				'on_update'	=> 'esc_attr'
			),
            array(
                'post_per_page', 'int', 3,
                'label'		=> esc_html__('Limit', 'fl-themes-helper'),
                'input'		=> 'select',
                'values'	=> array('range', 'from'=>1, 'to'=>6),
                'on_update'	=> 'esc_attr'
            ),
		);
		
        parent::__construct();
    }
	
    /**
     * Display widget
     */
    function widget( $args, $instance ) {
        $archive_year  = get_the_time('Y');
        $archive_month = get_the_time('m');
        $archive_day   = get_the_time('d');
		$el_class = '';
		
        extract( $args );
		$this->setInstances($instance, 'filter');
		
        echo wp_kses($before_widget, array(
				'div' => array('id' => array(), 'class' => array()),
				'section' => array('id' => array(), 'class' => array())
			));
		
		$title = $this->getInstance('title');
        $post_per_page = $this->getInstance('post_per_page');

		echo (!empty($title)) ? $before_title . $title . $after_title : '';

        $query = new WP_Query(array(
            'posts_per_page'		=> $post_per_page,
            'ignore_sticky_posts'	=> 1,
            'orderby'               => 'comment_count',
            'order'                 => 'DESC'
        ));

        global $post; if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

        ?>
            <article class="fl--last-post" id="last-post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">
                <div class="fl-last-post-img">
                    <?php if ( has_post_thumbnail()) { ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php  echo get_the_post_thumbnail($post->ID, 'empelza_size_size_80x80_crop'); ?>
                        </a>
                    <?php } ?>
                </div>
                <div class="fl-last-post-info">
                    <?php if(get_the_title() == false ){ ?>
                        <h5 class="fl-post-title"><a href="<?php echo esc_url(the_permalink()); ?>"><?php esc_html_e('No Title','fl-themes-helper'); ?></a></h5>
                    <?php } ?>
                    <div class="fl-text-medium-style">
                        <h5 class="fl-post-title"><a href="<?php esc_url(the_permalink()); ?>"><?php esc_attr(the_title()); ?></a></h5>
                    </div>
                    <div class="post-date">
                        <a class="fl-secondary-color-hv" href="<?php echo esc_url(get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_attr(get_the_date());?></a>
                    </div>
                </div>
            </article>
        <?php
        endwhile; endif; wp_reset_query();

        echo wp_kses($after_widget, array(
				'div' => array('id' => array(), 'class' => array()),
				'section' => array('id' => array(), 'class' => array())
			));
    }
}