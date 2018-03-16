/*
    contentSlides : contient notre balise dont l'id est SLIDER
    position_slide : joue le rôle d'itération. C'est lui qui détermine où en est notre slider
    nb_total_slide : contient le nombre total de slide du slider. Va de 0 à n-1.
 */
var contentSlides = document.getElementById("bloc_slider").getElementsByClassName("slide");
var position_slide = contentSlides.length-1;
var nb_total_slide = position_slide;

/*
    widthSlider : permet de récupérer la largeur du slider
    heightSlider : permet de récupérer la hauteur du slider
    speedSlider : permet de récupérer le temps d'arrêt sur chacune des images
 */
var widthSlider = document.getElementById("bloc_slider").getAttribute("data-width");
var heightSlider = document.getElementById("bloc_slider").getAttribute("data-height");
var speedSlider = document.getElementById("bloc_slider").getAttribute("data-speed");

/*
    Permet de savoir s'il n'y a qu'une image ou pas. S'il y en a une, on désactive automatiquement les flèches
 */
if(nb_total_slide <= 0){
    document.getElementById("fleche-gauche-slide").style.display ="none";
    document.getElementById("fleche-droite-slide").style.display ="none";
}

/*
    setChange_toSlider() comprend deux paramètres :
        - numberSlide : image en cours de traitement
        - parameter: paramètre pour le switch
    Globalement, elle va permettre d'aggrandir ou rétrécir les images
 */
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
                contentSlides[numberSlide].style.width = widthSlider+"px";
            } else {
                contentSlides[numberSlide].style.height = heightSlider+"px";
            }
            break;
        default: alert('ERREUR 0XSL01');
    }
}

/*
    changeSlider(), il s'agit de la principale fonction de notre Slider, c'est celle qui tourne en permanence grâce au setInterval
 */
function changeSlide(){
    if(position_slide == 0){
        for(var i=0; i < nb_total_slide+1; i++){
            contentSlides[i].style.width = widthSlider+"px";
            contentSlides[i].style.height = heightSlider+"px";
        }
        position_slide = nb_total_slide;
    } else {
        setChange_toSlide(position_slide, 0);
        position_slide--;
    }
}

// Interval créer pour permettre un déliement automatique
var timerSlide = setInterval("changeSlide()", speedSlider);

/*
    Cette fonction prend en paramètre la direction (droite ou gauche)
    Elle permet de changer manuellement le slider. La fonction va dans un premier temps couper le setInterval (et le relancer à la fin)
    Puis, va déterminer s'il s'agit de la premier ou dernière slide afin d'éviter tout désagrément. Puis ensuite effectuer le changement
 */
function changeSlide_manuel(direction){
    if(nb_total_slide > 0){
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
                        contentSlides[i].style.width = widthSlider+"px";
                        contentSlides[i].style.height = heightSlider+"px";
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
        timerSlide = setInterval("changeSlide()", speedSlider);
    }
    return false;
}