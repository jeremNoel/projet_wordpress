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
		';
    }

    public function widget($args, $instance) {
        $widthSlider =  apply_filters('widget_title', $instance['width']);
        $heightSlider = apply_filters('widget_title', $instance['height']);
        $transitionSpeed = apply_filters('widget_title', $instance['speed_transition'])*1000;
        $slideSpeed = apply_filters('widget_title', $instance['speed_slide'])*1000;

        echo '
        <div id="bloc_slider" style="width: '.$widthSlider.'px; '.$heightSlider.'px; margin: auto;">
            <div id="slide_fleche_gauche" class="slide_fleche" onClick=" return changeSlide_manuel(0);">
                <span class="oi oi-chevron-left"></span>
            </div>
            <div id="slide_fleche_droite" class="slide_fleche" onClick=" return changeSlide_manuel(1);">
                <span class="oi oi-chevron-right"></span>
            </div>
            <!-- DEBUT DES SLIDES  -->
            <div class="slide" style="width: '.$widthSlider.'px; height: '.$heightSlider.'px; position: absolute; transition: 1s; overflow: hidden; cursor: pointer; background-color: red; background-size: '.$widthSlider.'px '.$heightSlider.'px;">
                <div class="titreSlide" style="position: absolute; bottom: 0; color: white; width: '.$widthSlider.'px; font-size: 2em; background-color: rgba(0,0,0,0.5); padding: 7.5px 55px;">#La tête de mort de l\'enfer</div>
            </div>
            <div class="slide" style="width: '.$widthSlider.'px; height: '.$heightSlider.'px; position: absolute; transition: 1s; overflow: hidden; cursor: pointer; background-color: green; background-size: '.$widthSlider.'px '.$heightSlider.'px;">
                <div class="titreSlide" style="position: absolute; bottom: 0; color: white; width: '.$widthSlider.'px; font-size: 2em; background-color: rgba(0,0,0,0.5); padding: 7.5px 55px;">#La tête de blabloubla mort de l\'enfer</div>
            </div>
            <div class="slide" style="width: '.$widthSlider.'px; height: '.$heightSlider.'px; position: absolute; transition: 1s; overflow: hidden; cursor: pointer; background-color: blue; background-size: '.$widthSlider.'px '.$heightSlider.'px;">
                <div class="titreSlide" style="position: absolute; bottom: 0; color: white; width: '.$widthSlider.'px; font-size: 2em; background-color: rgba(0,0,0,0.5); padding: 7.5px 55px;">#La tête de blabloubla mort de l\'enfer</div>
            </div>
            <div class="slide" style="width: '.$widthSlider.'px; height: '.$heightSlider.'px; position: absolute; transition: 1s; overflow: hidden; cursor: pointer; background-color: yellow; background-size: '.$widthSlider.'px '.$heightSlider.'px;">
                <div class="titreSlide" style="position: absolute; bottom: 0; color: white; width: '.$widthSlider.'px; font-size: 2em; background-color: rgba(0,0,0,0.5); padding: 7.5px 55px;">#La tête de blabloubla mort de l\'enfer</div>
            </div>
            <!-- FIN DES SLIDES  -->
        </div>
		
		<script type="text/javascript">
            var contentSlides = document.getElementById("bloc_slider").getElementsByClassName("slide");
            var position_slide = contentSlides.length-1;
            var nb_total_slide = position_slide;
    
            function setChange_toSlide(numberSlide, parameter){
                switch(parameter){
                    case 0:
                        if(numberSlide%2 == 0){
                            contentSlides[numberSlide].style.width = "0px";
                        } else {
                            contentSlides[numberSlide].style.height = "0px";
                        }
                        break;
                    case 1:
                        if(numberSlide%2 == 0){
                            contentSlides[numberSlide].style.width = "'.$widthSlider.'px";
                        } else {
                            contentSlides[numberSlide].style.height = "'.$heightSlider.'px";
                        }
                        break;
                    default: alert(\'ERREUR 0XSL01\');
                }
            }
    
            function changeSlide(){
                if(position_slide == 0){
                    for(var i=0; i < nb_total_slide+1; i++){
                        contentSlides[i].style.width = "'.$widthSlider.'px";
                        contentSlides[i].style.height = "'.$heightSlider.'px";
                    }
                    position_slide = nb_total_slide;
                } else {
                    setChange_toSlide(position_slide, 0);
                    position_slide--;
                }
            }
    
            var timerSlide = setInterval("changeSlide()", '.$slideSpeed.');
    
            function changeSlide_manuel(direction){
                clearInterval(timerSlide);
                switch(direction){
                    case 0:
                        if(position_slide == nb_total_slide){
                            for(var i = position_slide; i > 0 ; i--){
                                setChange_toSlide(i, 0);
                            }
                            position_slide = 0;
                        } else if(position_slide == 0){
                            position_slide+=1;
                            setChange_toSlide(position_slide, 1);
                        } else {
                            position_slide+=1;
                            setChange_toSlide(position_slide, 1);
                        }
                        break;
                    case 1:
                        if(position_slide == nb_total_slide){
                            setChange_toSlide(position_slide, 0);
                            position_slide -= 1;
                        } else if (position_slide == 0){
                            for(var i=0; i < nb_total_slide+1; i++){
                                contentSlides[i].style.width = "'.$widthSlider.'px";
                                contentSlides[i].style.height = "'.$heightSlider.'px";
                            }
                            position_slide = nb_total_slide;
                        } else {
                            setChange_toSlide(position_slide, 0);
                            position_slide -= 1;
                        }
                        break;
                    default:
                        alert("ERREUR 0XSL02");
                }
                timerSlide = setInterval("changeSlide()", '.$slideSpeed.');
                return false;
            }
        </script>
		';

        echo $args['after_widget'];


    }

    function update($new, $old) {
        return $new;
    }





}