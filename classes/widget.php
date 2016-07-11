<?php

/**
 *  Open Table Widget
 *
 * @description: The Open Table Widget
 */
class Open_Table_Widget extends WP_Widget
{

    var $options; //Plugin Options from Options Panel

    /**
     * Register widget with WordPress.
     */
    public function __construct()
    {
        parent::__construct(
            'otw_widget', // Base ID
            'Open Table Widget', // Name
            array(
                'classname' => 'open-table-widget',
                'description' => __('Display an Open Table reservation form for your restaurant using an easy to use and intuitive widget', 'open-table-widget')
            )
        );

        $this->options = get_option('opentablewidget_options');

        add_action('wp_enqueue_scripts', array($this, 'frontend_widget_scripts'));
        add_action('admin_enqueue_scripts', array($this, 'admin_widget_scripts'));
        add_action('wp_ajax_open_table_api_action', array($this, 'request_open_table_api'));

    }

    /**
     * Load Widget JS Script ONLY on Widget page
     *
     * @param $hook
     */
    function admin_widget_scripts($hook)
    {

        $suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';

        if ($hook == 'widgets.php') {

            wp_enqueue_script('jquery-ui-autocomplete');
            wp_enqueue_script('otw_widget_admin_scripts', plugins_url('assets/js/admin-widget' . $suffix . '.js', dirname(__FILE__)), array('jquery'));
            // in javascript, object properties are accessed as ajax_object.ajax_url, ajax_object.we_value
            wp_localize_script('otw_widget_admin_scripts', 'ajax_object',
                array('ajax_url' => admin_url('admin-ajax.php')));

            wp_enqueue_style('otw_widget_admin_css', plugins_url('assets/css/admin-widget' . $suffix . '.css', dirname(__FILE__)));

        } else {
            return;
        }
    }

    /**
     * Open Table API Request
     */
    function request_open_table_api()
    {

        $restaurant = html_entity_decode(addslashes($_POST['restaurant']));
        // Send API Call using WP's HTTP API
        $data = wp_remote_get('https://opentable.herokuapp.com/api/restaurants?name=' . $restaurant);

        // Handle OTW response data
        echo $data["body"];
        die(); // this is required to return a proper result

    }


    /**
     * Frontend Scripts
     *
     * @description: Registers Open Table Widget Stylesheets. Enqueing is done conditionally based on plugins settings in the widget() function
     */
    function frontend_widget_scripts()
    {

        //Determine whether to display minified scripts/css or not (debugging true sets it)
        $suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG == false ? '' : '.min';

        $otw_css = plugins_url('assets/css/open-table-widget' . $suffix . '.css', dirname(__FILE__));

        $otw_datepicker = plugins_url('assets/js/datepicker' . $suffix . '.js', dirname(__FILE__));

        //Register All Styles/Scripts
        wp_register_style('otw_widget', $otw_css, null, OTW_PLUGIN_VERSION);
        wp_register_style('otw_selectric_css', plugins_url('assets/css/selectric' . $suffix . '.css', dirname(__FILE__) ), null, OTW_PLUGIN_VERSION);
        wp_register_style('otw_datepicker_css', plugins_url('assets/css/otw-datepicker' . $suffix . '.css', dirname(__FILE__) ), null, OTW_PLUGIN_VERSION);

        wp_register_script('otw_select_js', plugins_url('assets/js/jquery.selectric' . $suffix . '.js', dirname(__FILE__)), array('jquery'), OTW_PLUGIN_VERSION );
        wp_register_script('otw_widget_js', plugins_url('assets/js/open-table-widget' . $suffix . '.js', dirname(__FILE__), array('jquery')));
        wp_register_script('otw_datepicker_js', $otw_datepicker, array('jquery', 'otw_widget_js'), OTW_PLUGIN_VERSION);

    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args Widget arguments.
     * @param array $instance Saved values from database.
     */
    function widget($args, $instance)
    {
        extract($args);
        if (isset($instance['title'])) {
            $title = apply_filters('widget_title', $instance['title']);
        }
        $displayOption = !isset($instance['display_option']) ? '' : $instance['display_option'];
        $widgetStyle = empty($instance['widget_style']) ? '' : $instance['widget_style'];
        $restaurantName = empty($instance['restaurant_name']) ? '' : $instance['restaurant_name'];
        $restaurantID = empty($instance['restaurant_id']) ? '' : $instance['restaurant_id'];
        $hideLabels = empty($instance['hide_labels']) ? '' : $instance['hide_labels'];
        $preContent = empty($instance['pre_content']) ? '' : $instance['pre_content'];
        $postContent = empty($instance['post_content']) ? '' : $instance['post_content'];
        $labelDate = empty($instance['label_date']) ? '' : $instance['label_date'];
        $labelTime = empty($instance['label_time']) ? '' : $instance['label_time'];
        $labelParty = empty($instance['label_party']) ? '' : $instance['label_party'];

        /*
         * Output Widget Content
         */

        // Conditionally Enqueue Styles/Scripts based on Plugin Settings

        //Open Table Widget Specific Scripts
        wp_enqueue_script('otw_widget_js');

        $jsParams = array(
            'restaurant_id' => ''
        );
        wp_localize_script('otw-widget-js', 'otwParams', $jsParams);

        //Datepicker
        wp_enqueue_script('otw_datepicker_js');
        wp_enqueue_style('otw_datepicker_css');

        // Only enqueue Widget styles if setting is NOT "on"
        if ($this->options["disable_css"] !== "on") {
            wp_enqueue_style('otw_widget');
        }

        // Only enqueue the selectric dropdown if the setting is NOT "on"
        $selectric = $this->options["disable_bootstrap_select"];

        if ( $selectric !== "on") {
            wp_enqueue_script('otw_select_js');
            wp_enqueue_style('otw_selectric_css'); ?>

            <script>
                jQuery(function($){
                    $('.otw-wrapper select').selectric();
                });
            </script>
        <?php }

        //Widget Style
        $style = "otw-" . sanitize_title($widgetStyle) . "-style";
        ?>

        <?php
        /* Add the width from $widget_width to the class from the $before widget
        http://wordpress.stackexchange.com/questions/18942/add-class-to-before-widget-from-within-a-custom-widget
        */
        // no 'class' attribute - add one with the value of width
        if (strpos($before_widget, 'class') === false) {
            $before_widget = str_replace('>', 'class="' . $style . '"', $before_widget);
        } // there is 'class' attribute - append width value to it
        else {
            $before_widget = str_replace('class="', 'class="' . $style . ' ', $before_widget);
        }

        /* Before widget */
        echo $before_widget;

        // if the title is set & the user hasn't disabled title output
        if (!empty($title)) {
            /* Add class to before_widget from within a custom widget
         http://wordpress.stackexchange.com/questions/18942/add-class-to-before-widget-from-within-a-custom-widget
         */
            // no 'class' attribute - add one with the value of width
            if (!empty($before_title) && strpos($before_title, 'class') === false) {
                $before_title = str_replace('>', ' class="otw-widget-title">', $before_title);
            } //widget title has 'class' attribute
            elseif (!empty($before_title) && strpos($before_title, 'class') !== false) {
                $before_title = str_replace('class="', 'class="otw-widget-title ', $before_title);
            } //no 'title' at all so wrap widget with div
            else {
                $before_title = '<h3 class="">';
                $before_title = str_replace('class="', 'class="otw-widget-title ', $before_title);
            }
            $after_title = empty($after_title) ? '</h3>' : $after_title;

            echo $before_title . $title . $after_title;
        }
        ?>

        <div class="otw-<?php echo sanitize_title($widgetStyle); ?>">

            <?php include(OTW_PLUGIN_PATH . '/inc/widget-frontend.php'); ?>

        </div>
        <?php

        if (isset($after_widget)) {
            echo $after_widget;
        }

    }


    /**
     * @DESC: Saves the widget options
     * @SEE WP_Widget::update
     */
    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['display_option'] = strip_tags($new_instance['display_option']);
        $instance['widget_style'] = strip_tags($new_instance['widget_style']);
        $instance['restaurant_name'] = strip_tags($new_instance['restaurant_name']);
        $instance['restaurant_id'] = strip_tags($new_instance['restaurant_id']);
        $instance['hide_labels'] = strip_tags($new_instance['hide_labels']);
        $instance['pre_content'] = strip_tags($new_instance['pre_content']);
        $instance['post_content'] = strip_tags($new_instance['post_content']);
        $instance['label_date'] = strip_tags($new_instance['label_date']);
        $instance['label_time'] = strip_tags($new_instance['label_time']);
        $instance['label_party'] = strip_tags($new_instance['label_party']);

        return $instance;
    }


    /**
     * Back-end widget form.
     * @see WP_Widget::form()
     */
    function form($instance)
    {
        $title = empty($instance['title']) ? '' : esc_attr($instance['title']);
        $displayOption = !isset($instance['display_option']) ? '' : $instance['display_option'];
        $widgetStyle = empty($instance['widget_style']) ? '' : esc_attr($instance['widget_style']);
        $restaurantName = empty($instance['restaurant_name']) ? '' : esc_attr($instance['restaurant_name']);
        $restaurantID = empty($instance['restaurant_id']) ? '' : esc_attr($instance['restaurant_id']);
        $hideLabels = empty($instance['hide_labels']) ? '' : esc_attr($instance['hide_labels']);
        $preContent = empty($instance['pre_content']) ? '' : esc_attr($instance['pre_content']);
        $postContent = empty($instance['post_content']) ? '' : esc_attr($instance['post_content']);
        $labelDate = empty($instance['label_date']) ? '' : esc_attr($instance['label_date']);
        $labelTime = empty($instance['label_time']) ? '' : esc_attr($instance['label_time']);
        $labelParty = empty($instance['label_party']) ? '' : esc_attr($instance['label_party']);

        //Get the widget form
        $widgetPath = OTW_PLUGIN_PATH . '/inc/widget-form.php';
        if (file_exists($widgetPath)) {
            include($widgetPath);
        }


    } //end form function


} //end Open_Table_Widget Class
