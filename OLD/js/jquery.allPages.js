$(function() {

    $(window).on('ready load', function () {
        //- use a popup for tel: links (when device can't call)
        $("a[href^='tel:']").tel();

        //- enable Over Under for easy class-based "media queries"
        $("body").overUnder();

        $('select').chosen();
    });

    //- push footer to bottom of window by adding a div with the class "footerSpacer" right before the footer
    $(window).bind("ready load resize", pushFooter);

    $('.hamburger').click(function (e) {
        $(this).parent().find('ol').toggleClass('active');
        $(this).toggleClass('active');
        $('.dimmer').toggleClass('active');
        $('body').toggleClass('no-scrolling');
    });

});

// pushes the .footer div to the bottom of the screen... fired above for window ready, load and resize events
function pushFooter() {
    $(".footerSpacer").height(0); //- remove .footerSpacer height for acurate calculations
    var browserHeight = $(window).height();
    var contentHeight = $("body").height();
    if (browserHeight > contentHeight) {
        var footerSpacerHeight = browserHeight-contentHeight;
        if (!$(".footerSpacer").length) { $(".footer").before("<div class='footerSpacer' />"); }
        $(".footerSpacer").height(footerSpacerHeight);
    }
}
