module.exports = function() {

  // begin callback-popup open
  $('.btn-popup--sm').on('click', function(e) {
    e.preventDefault();
    $('.popup--callback, .popup__layer').fadeIn();
  });
  // end callback-popup open

  // begin order-popup open
  $('.btn-popup--lg').on('click', function(e) {
    e.preventDefault();
    $('.popup--order, .popup__layer').fadeIn();
  });
  // end order-popup open

  // begin popup close
  $('.popup__layer, .popup-close').on('click', function() {
    $('.popup__layer,' +
      '.popup--callback,' +
      '.popup--order').fadeOut();
  });
  // end popup close

};