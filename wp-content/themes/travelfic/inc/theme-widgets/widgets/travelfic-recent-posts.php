<?php
// Creating the widget 
class Travelfic_recent_posts_widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(

            // Base ID of your widget
            'travelfic_recent_posts_widget',

            // Widget name will appear in UI
            __('Travelfic Recent Posts', 'travelfic'),

            // Widget description
            array('description' => __('Travelfic Recent Posts', 'travelfic'),)
        );
    }

    // Creating widget front-end
    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
    ?>
    <div class="tft-footer-section widget_travelfic_recent_posts_widget">
        <?php 
        if(!empty($title)){ ?>
        <h2 class="tft-widget-title"><?php echo esc_html( $title ); ?></h2>
        <?php } ?>
        <div class="tft-sidebar-widget">
        <?php
            $recent_args = array(
                'post_type' => 'post',
                'posts_per_page' => 4,
                'orderby'        => 'date',
                'order'          => 'DESC'
            );
            $recent_posts = new WP_Query($recent_args);
            if ($recent_posts->have_posts()) {
                while ($recent_posts->have_posts()) : $recent_posts->the_post();  ?>
                <div class="tft-single-post">
                    <a class="tft-link tft-block" href="<?php the_permalink(); ?>">
                        <div class="tft-single-post-inner">
                            <div class="post_img">
                                <?php 
                                    
                                    if( ! has_post_thumbnail() ){ ?>
                                        <img src="<?php echo esc_url( get_template_directory_uri().'/assets/img/default.png' ); ?>" alt="">
                                    <?php }else{
                                        the_post_thumbnail();
                                    }
                                ?>

                            </div>
                            <div class="tft-post-details">
                                <h6><?php the_title(); ?></h6>
                                <p><?php the_time('F j, Y'); ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endwhile;
            } else {
                echo "There is no posts";
            }
            wp_reset_postdata();   ?>
        </div>
    </div>

<?php 
} // Widget Backend 

    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('Recent Posts', 'travelfic');
        } // Widget admin form 
    ?>
<p>
    <label for="<?php echo esc_html( $this->get_field_id('title') ); ?>"><?php __('Title:', 'travelfic'); ?></label>
    <input class="widefat" id="<?php echo esc_html( $this->get_field_id('title') ); ?>"
        name="<?php echo esc_html( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
</p>
<?php
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }

    // Class travelfic_recent_posts_widget ends here
}

// Register and load the widget
function travelfic_load_widget()
{
    register_widget('travelfic_recent_posts_widget');
}
add_action('widgets_init', 'travelfic_load_widget');