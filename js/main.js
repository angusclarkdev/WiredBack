$(document).ready(function() {

  (function() {

    $('.main').scrollex({
      mode: 'middle',
      delay: 50,
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

    let rightArrow = $('.right_arrow');
    let leftArrow = $('.left_arrow')


    rightArrow.hover(function() {
      $(this).addClass('opacity')
      $('.box_right').addClass('transform_x');
    })

    $('.box').mouseleave(function(event) {
      $('.box_right').removeClass('transform_x');
      rightArrow.removeClass('opacity')
    });

    leftArrow.hover(function() {
      $(this).addClass('opacity')
      $('#box_right1').addClass('transform_x');
    })

    $('.box').mouseleave(function(event) {
      $('#box_right1').removeClass('transform_x');
      leftArrow.removeClass('opacity')
    });
  })();
});