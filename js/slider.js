$(function(){
    var curSlide = 0;

    var maxSlider = $('.banner-single').length - 1;
    var delay = 3;

    initSlider();
    changeSlide();

    function initSlider(){
        $('.banner-single').hide();
        $('.banner-single').eq(0).show();
    }

    function changeSlide(){
         setInterval(function(){
             $('.banner-single').eq(curSlide).fadeOut(2000);
              curSlide++;
              if(curSlide > maxSlider)
                curSlider = 0; 
                $('.banner-single').eq(curSlide).fadeIn(2000,function(){
                    console.log('terminou o slider');
                });
         },delay * 1000);
    }
})