$(document).ready(function() {

  (function() {

    $('.main').scrollex({
      mode: 'middle',
      delay: 300,
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

    // Smooth Scrolling

    let scroll = $('.scroll');
    let scrollSlow = $('.scroll_slow');

    scroll.click(function(event) {
      event.preventDefault();
      $('body,html').animate({
        scrollTop: $(this.hash).offset().top - 54
      }, 1000)
    });


    scrollSlow.click(function(event) {
      event.preventDefault();
      $('body,html').animate({
        scrollTop: $(this.hash).offset().top - 54
      }, 2000)
    });


    // Split P elememt

    /*
          let p = document.getElementById('text');
          let textNode = p.firstChild;
          let newNode = textNode.splitText(383);



          function newPara() {
          let newEl = $('#text').after('<p>');
          console.log(newNode);

    };
    newPara();
    function moveText() {


    };
            moveText();


    */

    // Split and append element

    function newElements() {

      let paragraph = document.getElementsByClassName('box');

      for (var i = 0; i < paragraph.length; i++) {
        paragraph[i]
        let el = document.createElement('p');
        paragraph[i].appendChild(el)
      };

    };
    newElements();






  })();
});
