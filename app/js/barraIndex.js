
$('.progress-bar').each(function () {
    let total = $('.cal-obj h4').text()
    let datawidth = $('.cal-neto h4').text()
    $('.cal-res h1').text(total-datawidth)
    datawidth = Math.round((100*datawidth)/total);

    if($(window).width()<1200){
        if (datawidth > 100) {
            datawidth = 100;
            $(this).animate({ left: datawidth - 5 + "%" }, 800);
        }
        else if (datawidth < 0 || datawidth == 0) {
            datawidth = 0;
            $(this).animate({ left: datawidth + "%" }, 800);
        } else {
            $(this).animate({ left: datawidth - 5 + "%" }, 800);
        }
    }else{
        if (datawidth > 100) {
            datawidth = 100;
            $(this).animate({ left: datawidth-3 + "%" }, 800);
        }
        else if (datawidth < 0 || datawidth == 0) {
            datawidth = 0;
            $(this).animate({ left: datawidth + "%" }, 800);
        } else {
            $(this).animate({ left: datawidth-3 + "%" }, 800);
        }
    }
    $(this).find("span.data-percent").html(datawidth + "%");
});
