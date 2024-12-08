$('a[href*="#"]')
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    if (
      location.pathname.replace(/^\//, "") ==
        this.pathname.replace(/^\//, "") &&
      location.hostname == this.hostname
    ) {
      var target = $(this.hash);
      target = target.length ? target : $("[name=" + this.hash.slice(1) + "]");
      if (target.length) {
        event.preventDefault();
        $("html, body").animate(
          {
            scrollTop: target.offset().top
          },
          500,
          function() {
            var $target = $(target);
            $target.focus();
            if ($target.is(":focus")) {
              return false;
            } else {
              $target.attr("tabindex", "-1"); 
              $target.focus(); 
            }
          }
        );
      }
    }
  });

$(document).ready(function() {
  $(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll > 50) {
      $(".navbar").css("background", "#333");
    } else {
      $(".navbar").css("background", "transparent");
    }
  });
});

new WOW().init();
