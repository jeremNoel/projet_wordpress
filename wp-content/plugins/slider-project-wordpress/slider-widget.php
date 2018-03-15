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
            'speed_transition' => '1',
            'speed_slide' => '3',
            'position_title' => 'haut',
            'display_fleche' => 'visible'
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
            <p>
                La position actuelle est <strong>'.$instance['display_fleche'].'</strong> :
                <input type="radio" id="flecheDisplayChoice1" name="'.$this->get_field_name('position_title').'" value="visible">
                <label for="flecheDisplayChoice1">Visible</label>
                <input type="radio" id="flecheDisplayChoice2" name="'.$this->get_field_name('position_title').'" value="cache">
                <label for="flecheDisplayChoice2">Cachée</label>
            </p>
		';
    }

    public function widget($args, $instance) {
        wp_enqueue_style('slider-project-wordpress-css', trailingslashit(plugins_url('slider-project-wordpress')).'style.css');
        wp_enqueue_script('slider-project-wordpress-script', trailingslashit(plugins_url('slider-project-wordpress')).'slider-ajbj.js');
        wp_enqueue_script( 'bootstrap', 'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), null, true);
        wp_enqueue_style( 'bootstrap', 'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );

        $widthSlider =  apply_filters('widget_title', $instance['width']);
        $heightSlider = apply_filters('widget_title', $instance['height']);
        $transitionSpeed = apply_filters('widget_title', $instance['speed_transition']);
        $slideSpeed = apply_filters('widget_title', $instance['speed_slide'])*1000;
        $positionTitle = apply_filters('widget_title', $instance['position_title']);
        $displayFleche = apply_filters('widget_title', $instance['display_fleche']);

        $displayFleche = ($positionTitle == "cache")?"none":"block";
        $displayTitle = ($positionTitle == "cache")?"none":"block";
        $positionTitle = ($positionTitle == "haut")?"top":"bottom";

        echo '
        <div class="content-slider" style="width: '.$widthSlider.'px; '.$heightSlider.'px;">
            <div id="bloc_slider" data-width="'.$widthSlider.'" data-height="'.$heightSlider.'" data-speed="'.$slideSpeed.'" style="width: '.$widthSlider.'px; '.$heightSlider.'px;">
                <div id="fleche-gauche-slide" class="fleche-slide" onClick=" return changeSlide_manuel(0);" style="height: '.$heightSlider.'px; display:'.$displayFleche.'">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true" style="line-height: '.$heightSlider.'px;"></span>
                </div>
                <div id="fleche-droite-slide" class="fleche-slide" onClick=" return changeSlide_manuel(1);" style="height: '.$heightSlider.'px; display:'.$displayFleche.'">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="line-height: '.$heightSlider.'px;"></span>
                </div>
                <!-- DEBUT DES SLIDES  -->
                <div class="slide" style="width: '.$widthSlider.'px; height: '.$heightSlider.'px; transition: '.$transitionSpeed.'s; background: url(\'https://wallpaperbrowse.com/media/images/70258224-full-hd-wallpapers.jpeg\'); background-size: cover;">
                    <div class="titre-slide" style="'.$positionTitle.': 0; width: '.$widthSlider.'px; display:'.$displayTitle.'">#Le paysage somptueux</div>
                </div>
                <div class="slide" style="width: '.$widthSlider.'px; height: '.$heightSlider.'px; transition: '.$transitionSpeed.'s; background: url(\'https://ae01.alicdn.com/kf/HTB1CpGDNFXXXXXTaXXXq6xXFXXXx/HD-foto-Poster-Astronauten-woondecoratie-Astronauten-op-de-maan-Stof-Doek-Gerold-Wall-Poster-90X60-cm.jpg\'); background-size: cover;">
                    <div class="titre-slide" style="'.$positionTitle.': 0; width: '.$widthSlider.'px; display:'.$displayTitle.'">#L\'espace fantastiquement fantastique</div>
                </div>
                <div class="slide" style="width: '.$widthSlider.'px; height: '.$heightSlider.'px; transition: '.$transitionSpeed.'s; background: url(\'https://cnet2.cbsistatic.com/img/KIB_CsbuJy1QgjzPCGBEwUfZYAo=/1600x900/2017/09/12/55df1d00-f09e-44fe-af5a-e81cceea595f/iphone-x.jpg\'); background-size: cover;">
                    <div class="titre-slide" style="'.$positionTitle.': 0; width: '.$widthSlider.'px; display:'.$displayTitle.'">#Le bullshit de l\'année 2017</div>
                </div>
                <!-- FIN DES SLIDES  -->
            </div>
        </div>
		';

        echo $args['after_widget'];


    }

    function update($new, $old) {
        return $new;
    }





}