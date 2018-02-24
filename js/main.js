let box = $('.box');
let arrow = $('.expand_arrow');
arrow.hover(function() {
  box.addClass('transform_x');
  arrow.addClass('opacity');
});

box.mouseleave(function(event) {
  if (box.hasClass('transform_x')) {
    box.toggleClass('transform_x')
    arrow.removeClass('opacity')
  }
});
/*function() {

});
/*(function(event) {

  moreLess()
  bg_mustard()
});*/