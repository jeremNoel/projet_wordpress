<?php
/*
    Plugin Name: Slider AJBJ
    Plugin URI: http://ajbj.org
    Description: Il s'agit d'un slider avec animation sympa
    Author: Groupe 8 - ESGI
    Author URI: http://groupe-8-esgi.com
    Version: 0.1
    License: CC
*/

add_action('wp_footer', 'slider_display');

function slider_display()
{
    echo "<p>Le slider sera chargé ici même !</p>";
}

class sliderProjectWordPress {
    public function __construct() {
        include_once plugin_dir_path(__FILE__).'/slider.php';
    }

}
new sliderProjectWordPress();
