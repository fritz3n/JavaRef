function resizeSlideShow(){
    var slideShow = $(".slideshow");
    var parent = slideShow.parent();
    var width = parent.width();
    var height = parent.height();

    var size = width > height ? height : width;

    slideShow.css('height', size);
    slideShow.css('width', size);
}

var interval = setInterval(cycleSlideshow, 2000);

$(".slideshow").mouseover(function() {
    clearInterval(interval);
  });

$(".slideshow").mouseout(function() {
    interval = setInterval(cycleSlideshow, 2000);
  });

var slide = 0
function cycleSlideshow(delta = 1){
    var slides = document.getElementsByClassName("slideshow-slide");
    slide = (slide + delta) % slides.length;
    while(slide < 0){
        slide += slides.length;
    }
    
    for(i = 0; i < slides.length; i++){
        if(i == slide){
            slides[i].classList.add("show");
        }else{
            slides[i].classList.remove("show");
        }
    }
}




cycleSlideshow();
resizeSlideShow();
window.onresize = resizeSlideShow;
