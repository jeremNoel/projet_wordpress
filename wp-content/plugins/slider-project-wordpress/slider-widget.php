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
            'speed_slide' => '3'
        );
        $instance = wp_parse_args($instance, $default);
        $image = '';
        if(isset($instance['image']))
        {
            $image = $instance['image'];
        }

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
                <label for="'.$this->get_field_name('image').'">Image :</label>
                <input name="'.$this->get_field_name('image').'" id="'.$this->get_field_id('image').'" class="widefat" type="text" size="36"  value="'.esc_url($image).'" />
                <input class="upload_image_button" type="button" value="Upload Image" />
            </p>
            <p>
                <img src='.$instance['image'].'>
            </p>

            <p>
                <label for="'.$this->get_field_name('image').'">Image :</label>
                <input name="'.$this->get_field_name('image').'" id="'.$this->get_field_id('image').'" class="widefat image-url" type="hidden" size="36" value="'.esc_url( $image ).'" />
                <input class="upload-image-btn button button-primary" type="button" value="Upload Image" />
                <img src="'.esc_url($image).'" class="image-preview '.$image == '' ? ' hidden' : ''.'">
                <input class="remove-image-btn button button-error'.$image == '' ? ' hidden' : ''.'" type="button" value="Remove Image" />
            </p>
		';
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];
        echo $args['before_title'];
        echo apply_filters('widget_title', $instance['width']);
        echo $args['after_title'];

        echo '
		<form action="" method="post">
			<label for="ma_newsletter_email">Votre email:</label>
			<input id="ma_newsletter_email" name="ma_newsletter_email" type="email"/>
			<input type="submit"/>
		</form>
		';

        echo $args['after_widget'];


    }

    function update($new, $old) {
        return $new;
    }





}