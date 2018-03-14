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