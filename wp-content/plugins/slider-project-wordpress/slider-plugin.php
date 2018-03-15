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
        register_activation_hook(__FILE__, array('sliderProjectWordPress', 'install'));
        register_uninstall_hook(__FILE__, array('sliderProjectWordPress', 'uninstall'));
        add_action('wp_loaded', array($this, 'save_email'));
        add_action('admin_enqueue_scripts', array ($this, 'mfc_assets'));
    }

    public static function install() {
        global $wpdb;
        $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}ma_newsletter_list (id INT AUTO_INCREMENT PRIMARY KEY, email VARCHAR(255) NOT NULL);");
    }

    public static function uninstall() {
        global $wpdb;
        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}ma_newsletter_list;");
    }

    public function save_email() {
        if (isset($_POST['ma_newsletter_email']) && !empty($_POST['ma_newsletter_email'])) {
            global $wpdb;
            $email = $_POST['ma_newsletter_email'];
            $row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}ma_newsletter_list WHERE email = '$email'");
            if (is_null($row)) {
                $wpdb->insert("{$wpdb->prefix}ma_newsletter_list", array('email' => $email));
            }
        }
    }

    public function mfc_assets(){
        wp_enqueue_script('media_upload');
        wp_enqueue_script('thickbox');
        wp_enqueue_script('mcf-media-upload', plugin_dir_url(__FILE__). 'mfc-media-upload.js', array('jquery'));
        wp_enqueue_style('thickbox');
    }

}
new sliderProjectWordPress();