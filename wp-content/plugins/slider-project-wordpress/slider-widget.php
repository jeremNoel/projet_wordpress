<?php

/**
 * Widget Ma Newsletter
 */
class SliderWidgetAJBJ extends WP_Widget
{

    public function __construct()
    {
        add_action('admin_enqueue_scripts', array($this, 'scripts'));
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

        $checkRadioTitleHaut = ($instance['position_title'] == "haut")?"checked":"";
        $checkRadioTitleBas = ($instance['position_title'] == "bas")?"checked":"";
        $checkRadioTitleCache = ($instance['position_title'] == "cache")?"checked":"";

        $checkRadioFlecheCache = ($instance['display_fleche'] == "cache")?"checked":"";
        $checkRadioFlecheVisible = ($instance['display_fleche'] == "visible")?"checked":"";

        $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
        $image = ! empty( $instance['image'] ) ? $instance['image'] : '';

        $title2 = ! empty( $instance['title2'] ) ? $instance['title2'] : '';
        $image2 = ! empty( $instance['image2'] ) ? $instance['image2'] : '';

        $title3 = ! empty( $instance['title3'] ) ? $instance['title3'] : '';
        $image3 = ! empty( $instance['image3'] ) ? $instance['image3'] : '';

        $title4 = ! empty( $instance['title4'] ) ? $instance['title4'] : '';
        $image4 = ! empty( $instance['image4'] ) ? $instance['image4'] : '';

        $title5 = ! empty( $instance['title5'] ) ? $instance['title5'] : '';
        $image5 = ! empty( $instance['image5'] ) ? $instance['image5'] : '';

        $title6 = ! empty( $instance['title6'] ) ? $instance['title6'] : '';
        $image6 = ! empty( $instance['image6'] ) ? $instance['image6'] : '';

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
                <input type="radio" id="positionChoice1" name="'.$this->get_field_name('position_title').'" value="haut" '.$checkRadioTitleHaut.'>
                <label for="positionChoice1">Haut</label>
                <input type="radio" id="positionChoice2" name="'.$this->get_field_name('position_title').'" value="bas" '.$checkRadioTitleBas.'>
                <label for="positionChoice2">Bas</label>
                <input type="radio" id="positionChoice3" name="'.$this->get_field_name('position_title').'" value="cache" '.$checkRadioTitleCache.'>
                <label for="positionChoice3">Caché</label>
            </p>
            <p>
                La position actuelle est <strong>'.$instance['display_fleche'].'</strong> :
                <input type="radio" id="flecheDisplayChoice1" name="'.$this->get_field_name('display_fleche').'" value="visible" '.$checkRadioFlecheVisible.'>
                <label for="flecheDisplayChoice1">Visible</label>
                <input type="radio" id="flecheDisplayChoice2" name="'.$this->get_field_name('display_fleche').'" value="cache" '.$checkRadioFlecheCache.'>
                <label for="flecheDisplayChoice2">Cachée</label>
            </p>
		';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Titre slide 1:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e( 'Lien:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" type="text" value="<?php echo esc_url( $image ); ?>" />
            <button class="upload_image_button button button-primary">Upload Image</button>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'title2' ); ?>"><?php _e( 'Titre slide 2:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title2' ); ?>" name="<?php echo $this->get_field_name( 'title2' ); ?>" type="text" value="<?php echo esc_attr( $title2 ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'image2' ); ?>"><?php _e( 'Lien:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'image2' ); ?>" name="<?php echo $this->get_field_name( 'image2' ); ?>" type="text" value="<?php echo esc_url( $image2 ); ?>" />
            <button class="upload_image_button button button-primary">Upload Image</button>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'title3' ); ?>"><?php _e( 'Titre slide 3:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title3' ); ?>" name="<?php echo $this->get_field_name( 'title3' ); ?>" type="text" value="<?php echo esc_attr( $title3 ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'image3' ); ?>"><?php _e( 'Lien:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'image3' ); ?>" name="<?php echo $this->get_field_name( 'image3' ); ?>" type="text" value="<?php echo esc_url( $image3 ); ?>" />
            <button class="upload_image_button button button-primary">Upload Image</button>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'title4' ); ?>"><?php _e( 'Titre slide 4:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title4' ); ?>" name="<?php echo $this->get_field_name( 'title4' ); ?>" type="text" value="<?php echo esc_attr( $title4 ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'image4' ); ?>"><?php _e( 'Lien:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'image4' ); ?>" name="<?php echo $this->get_field_name( 'image4' ); ?>" type="text" value="<?php echo esc_url( $image4 ); ?>" />
            <button class="upload_image_button button button-primary">Upload Image</button>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'title5' ); ?>"><?php _e( 'Titre slide 5:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title5' ); ?>" name="<?php echo $this->get_field_name( 'title5' ); ?>" type="text" value="<?php echo esc_attr( $title5 ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'image5' ); ?>"><?php _e( 'Lien:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'image5' ); ?>" name="<?php echo $this->get_field_name( 'image5' ); ?>" type="text" value="<?php echo esc_url( $image5 ); ?>" />
            <button class="upload_image_button button button-primary">Upload Image</button>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'title6' ); ?>"><?php _e( 'Titre slide 6:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title6' ); ?>" name="<?php echo $this->get_field_name( 'title6' ); ?>" type="text" value="<?php echo esc_attr( $title6 ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'image6' ); ?>"><?php _e( 'Lien:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'image6' ); ?>" name="<?php echo $this->get_field_name( 'image6' ); ?>" type="text" value="<?php echo esc_url( $image6 ); ?>" />
            <button class="upload_image_button button button-primary">Upload Image</button>
        </p>
        <?php


    }

    public function widget($args, $instance) {
        wp_enqueue_style('slider-project-wordpress-css', trailingslashit(plugins_url('slider-project-wordpress')).'style.css');
        wp_enqueue_script('slider-project-wordpress-script', trailingslashit(plugins_url('slider-project-wordpress')).'/assets/js/slider-ajbj.js');
        wp_enqueue_script( 'bootstrap', 'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), null, true);
        wp_enqueue_style( 'bootstrap', 'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );

        $widthSlider =  apply_filters('widget_title', $instance['width']);
        $heightSlider = apply_filters('widget_title', $instance['height']);
        $transitionSpeed = apply_filters('widget_title', $instance['speed_transition']);
        $slideSpeed = apply_filters('widget_title', $instance['speed_slide'])*1000;
        $positionTitle = apply_filters('widget_title', $instance['position_title']);
        $displayFleche = apply_filters('widget_title', $instance['display_fleche']);

        $displayFleche = ($displayFleche == "cache")?"none":"block";
        $displayTitle = ($positionTitle == "cache")?"none":"block";
        $positionTitle = ($positionTitle == "haut")?"top":"bottom";

        $image = array();
        $titre = array();
        array_push($image, apply_filters('widget_title', $instance['image']));
        array_push($image, apply_filters('widget_title', $instance['image2']));
        array_push($image, apply_filters('widget_title', $instance['image3']));
        array_push($image, apply_filters('widget_title', $instance['image4']));
        array_push($image, apply_filters('widget_title', $instance['image5']));
        array_push($image, apply_filters('widget_title', $instance['image6']));
        array_push($titre, apply_filters('widget_title', $instance['title']));
        array_push($titre, apply_filters('widget_title', $instance['title2']));
        array_push($titre, apply_filters('widget_title', $instance['title3']));
        array_push($titre, apply_filters('widget_title', $instance['title4']));
        array_push($titre, apply_filters('widget_title', $instance['title5']));
        array_push($titre, apply_filters('widget_title', $instance['title6']));


        ?>
        <div class="content-slider" style="width: <?php echo $widthSlider;?>px; <?php echo $heightSlider;?>px;">
            <div id="bloc_slider" data-width="<?php echo $widthSlider;?>" data-height="<?php echo $heightSlider;?>" data-speed="<?php echo $slideSpeed;?>" style="width: <?php echo $widthSlider;?>px; <?php echo $heightSlider;?>px;">
                <div id="fleche-gauche-slide" class="fleche-slide" onClick=" return changeSlide_manuel(0);" style="height: <?php echo $heightSlider;?>px; display:<?php echo $displayFleche;?>">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true" style="line-height: <?php echo $heightSlider;?>px;"></span>
                </div>
                <div id="fleche-droite-slide" class="fleche-slide" onClick=" return changeSlide_manuel(1);" style="height: <?php echo $heightSlider;?>px; display:<?php echo $displayFleche;?>">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="line-height: <?php echo $heightSlider;?>px;"></span>
                </div>
                <?php
                    for($i = 0; $i < 6; $i++){
                        if(!empty($image[$i])){
                            ?>
                            <div class="slide" style="width: <?php echo $widthSlider;?>px; height: <?php echo $heightSlider;?>px; transition: <?php echo $transitionSpeed;?>s; background: url('<?php echo $image[$i]; ?>'); background-size: cover;">
                                <?php
                                    if(!empty($titre[$i])) {
                                        ?>
                                        <div class="titre-slide" style="<?php echo $positionTitle; ?>: 0; width: <?php echo $widthSlider; ?>px; display:<?php echo $displayTitle; ?>">
                                            #<?php echo $titre[$i];?>
                                        </div>
                                        <?php
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    }
                ?>
            </div>
        </div>
		<?php

        echo $args['after_widget'];


    }

    function update($new_instance, $old) {

        return $new_instance;
    }

    public function scripts()
    {
        wp_enqueue_script( 'media-upload' );
        wp_enqueue_media();
        wp_enqueue_script('our_admin', trailingslashit(plugins_url('slider-project-wordpress')) . '/assets/js/our_admin.js', array('jquery'));
    }




}