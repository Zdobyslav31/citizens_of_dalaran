function scroll_to_content() {
    $("html, body").animate({ scrollTop: $("#main-container").offset().top-70}, 1000);
}
$('a[href^="#"]').on('click', function(event) {
    let target = $(this.getAttribute('href'));
    if( target.length ) {
        event.preventDefault();
        $('html, body').stop().animate({
            scrollTop: target.offset().top-70
        }, 1000);
    }
});
$( ".scroll-up" ).each(function() {
    if ($( this ).offset().top < $(window).height() + $("#main-container").offset().top) {
        $( this ).addClass("d-none");
    }
});
