<?php
include_once plugin_dir_path(__FILE__).'/slider-widget.php';

class Ma_Newsletter
{

    public function __construct()
    {
        add_action('widgets_init', function(){register_widget('SliderWidgetAJBJ');});
    }
}
new Ma_Newsletter();