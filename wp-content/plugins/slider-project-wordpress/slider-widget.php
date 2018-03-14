<?php

/**
 * Widget Ma Newsletter
 */
class SliderWidgetAJBJ extends WP_Widget
{

    public function __construct()
    {
        parent::__construct('my_slide_show', 'Slider AJBJ', array(
            'description' => 'Pour afficher un slider dynamique avec transition.'
        ));
    }

    public function form($instance) {
        $default = array(
            'width' => '1100',
            'height' => '350',
            'speed_transition' => '0.3',
            'speed_slide' => '3',
            'position_title' => 'haut'
        );
        $instance = wp_parse_args($instance, $default);

        echo '
            <p>
                <label for="'.$this->get_field_name('width').'">Largeur :</label>
			    <input id="'.$this->get_field_id('width').'" name="'.$this->get_field_name('width').'" value="'.$instance['width'].'" type="text"/>
            </p>
            <p>
                <label for="'.$this->get_field_name('height').'">Hauteur :</label>
			    <input id="'.$this->get_field_id('height').'" name="'.$this->get_field_name('height').'" value="'.$instance['height'].'" type="text"/>
            </p>
            <p>
                <label for="'.$this->get_field_name('speed_transition').'">Vitesse de transition :</label>
			    <input id="'.$this->get_field_id('speed_transition').'" name="'.$this->get_field_name('speed_transition').'" value="'.$instance['speed_transition'].'" type="text"/>
            </p>
            <p>
                <label for="'.$this->get_field_name('speed_slide').'">Vitesse de défilement :</label>
			    <input id="'.$this->get_field_id('speed_slide').'" name="'.$this->get_field_name('speed_slide').'" value="'.$instance['speed_slide'].'" type="text"/>
            </p>
            <p>
                La position actuelle est <strong>'.$instance['position_title'].'</strong> :
                <input type="radio" id="positionChoice1" name="'.$this->get_field_name('position_title').'" value="haut">
                <label for="positionChoice1">Haut</label>
                <input type="radio" id="positionChoice2" name="'.$this->get_field_name('position_title').'" value="bas">
                <label for="positionChoice2">Bas</label>
                <input type="radio" id="positionChoice3" name="'.$this->get_field_name('position_title').'" value="cache">
                <label for="positionChoice3">Caché</label>
            </p>
		';
    }

    public function widget($args, $instance) {
        wp_enqueue_style('slider-project-wordpress-css', trailingslashit(plugins_url('slider-project-wordpress')).'style.css');
        wp_enqueue_script('slider-project-wordpress-script', trailingslashit(plugins_url('slider-project-wordpress')).'slider-ajbj.js');

        $widthSlider =  apply_filters('widget_title', $instance['width']);
        $heightSlider = apply_filters('widget_title', $instance['height']);
        $transitionSpeed = apply_filters('widget_title', $instance['speed_transition']);
        $slideSpeed = apply_filters('widget_title', $instance['speed_slide'])*1000;
        $positionTitle = apply_filters('widget_title', $instance['position_title']);

        $displayTitle = ($positionTitle == "cache")?"none":"block";
        $positionTitle = ($positionTitle == "haut")?"top":"bottom";

        echo '
        <div id="bloc_slider" data-width="'.$widthSlider.'" data-height="'.$heightSlider.'" data-speed="'.$slideSpeed.'" style="width: '.$widthSlider.'px; '.$heightSlider.'px; margin: auto;">
            <div id="slide_fleche_gauche" class="slide_fleche" onClick=" return changeSlide_manuel(0);">
                <span class="oi oi-chevron-left"></span>
            </div>
            <div id="slide_fleche_droite" class="slide_fleche" onClick=" return changeSlide_manuel(1);">
                <span class="oi oi-chevron-right"></span>
            </div>
            <!-- DEBUT DES SLIDES  -->
            <div class="slide" style="width: '.$widthSlider.'px; height: '.$heightSlider.'px; transition: '.$transitionSpeed.'s; background: url(\'https://wallpaperbrowse.com/media/images/70258224-full-hd-wallpapers.jpeg\'); background-size: cover;">
                <div class="titreSlide" style="'.$positionTitle.': 0; width: '.$widthSlider.'px; display:'.$displayTitle.'">#La tête de mort de l\'enfer</div>
            </div>
            <div class="slide" style="width: '.$widthSlider.'px; height: '.$heightSlider.'px; transition: '.$transitionSpeed.'s; background-size: cover; background: url(\'https://wallpaperbrowse.com/media/images/70258224-full-hd-wallpapers.jpeg\');">
                <div class="titreSlide" style="'.$positionTitle.': 0; width: '.$widthSlider.'px; display:'.$displayTitle.'">#La tête de mort de l\'enfer</div>
            </div>
            <!-- FIN DES SLIDES  -->
        </div>
		';

        echo $args['after_widget'];


    }

    function update($new, $old) {
        return $new;
    }





}