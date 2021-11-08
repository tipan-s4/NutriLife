$(document).ready(function () {
    const lineas = $('.lines')
    const content = $('.content')
    const footer = $('footer')
    const hideimages = $('.queryhide')
    const backImage = $('.small-back-image')
    const pop = $('.fullscreen-container')
    const cicon = $(".calendar-icon")

    if (lineas != null) {
        lineas.on('click', function () {
            let ul = $('.nav-links');
            if (ul.hasClass('animate')) {
                content.fadeIn(600)
                footer.fadeIn(600)
                backImage.fadeIn(600)
                hideimages.fadeIn(500)
                ul.removeClass('animate')
                ul.addClass('animateout')
            } else {
                backImage.fadeOut(600)
                content.fadeOut(600)
                footer.fadeOut(600)
                hideimages.fadeOut(500)
                ul.removeClass('animateout')
                ul.addClass('animate')
            }

            $(this).toggleClass("toggle");
        })
    }

    if(pop.length >0){
        pop.fadeTo(1000, 1);
        $('.content').hide()
        $('footer').hide()
    }

    if(cicon.length >0){
        let cal = $('.calendar')
        cicon.on("click",function(){
            cal.toggle(400)
        })
    }

})
