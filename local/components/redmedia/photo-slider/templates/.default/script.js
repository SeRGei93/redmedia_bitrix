$(document).ready(function(){
    $('.photo_slider').owlCarousel({
        loop:true,
        margin:10,
        lazyLoad:true,
        nav:true,
        navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
        responsive:{
            1500:{

                items:3
            },
            992:{
                items:3
            },
            600:{
                items:2
            },
            300:{
                items:1
            }
        }
    })
});