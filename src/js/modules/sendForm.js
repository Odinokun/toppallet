module.exports = function() {

  // begin отправка формы оформления заявки
  $("#footer__form, #order__form").submit(function () {
    $.ajax({
      type: "POST",
      url: "assets/php/form-order.php",
      data: $(this).serialize()
    }).done(function () {
      $('#footer__form')[0].reset();
      $('#order__form')[0].reset();
      $('.popup--order').fadeOut();
      $('.popup__layer, .popup--success').fadeIn();
    });
    return false;
  });
  // end отправка формы на странице контактов

  // begin отправка формы заказа обратного звонка
  $("#callback__form").submit(function () {
    $.ajax({
      type: "POST",
      url: "assets/php/form-callback.php",
      data: $(this).serialize()
    }).done(function () {
      $('#callback__form')[0].reset();
      $('.popup--callback').fadeOut();
      $('.popup__layer, .popup--success').fadeIn();
    });
    return false;
  });
  // end отправка формы заказа обратного звонка

}