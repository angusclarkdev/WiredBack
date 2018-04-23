$(document).ready(function() {

  (function() {

    $('.main').scrollex({
      mode: 'middle',
      delay: 100,
      initialize: function() {
        $(this).addClass('inactive');
      },
      terminate: function() {
        $(this).removeClass('inactive');
      },
      enter: function() {
        $(this).removeClass('inactive');
      },
      leave: function() {
        $(this).addClass('inactive');
      }
    });


    // Smooth Scrolling
    // Mobile scrolling

    let scroll = $('.scroll');
    let scrollSlow = $('.scroll_slow');
    let home = $('#home');
    let contact = $('#envelope');

    scroll.click(function(event) {
      event.preventDefault();
      $('body,html').animate({
        scrollTop: $(this.hash).offset().top
      }, 1000)
    });

    scrollSlow.click(function(event) {
      event.preventDefault();
      $('body,html').animate({
        scrollTop: $(this.hash).offset().top
      }, 2000)
    });

    home.click(function(event) {
      event.preventDefault();

      $('body,html').animate({
        scrollTop: $('body, html').offset().top

      }, 1)
    });
    contact.click(function(event) {
      event.preventDefault();
      $('body,html').animate({
        scrollTop: $(this.parentNode.hash).offset().top - 45
      }, 1)
    });

    // Form validation

    $('[type="submit"]').on('click', function() {
      // add required class to matched elements
      $(this)
        .closest('form')
        .find('[required]')
        .addClass('required');
    });

    // Show recaptcha

  }());
});
