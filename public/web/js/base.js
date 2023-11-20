$(".btnclick").on("click", function () {
  $('.menu-mobile').toggleClass("show");
  $('body').toggleClass("overflow-hidden");
  $('.open-menu').toggleClass("hidden");
  $('.close-menu').toggleClass("block");

});



$('.js-btn-modal').on('click', function(){
  $('#overlay').fadeIn();
  var id = $(this).data('id');
  $('.js-modal[data-id="modal' + id + '"]').fadeIn();
});

$('.js-close-btn').on('click', function(){
  $('#overlay').fadeOut();
  $('.js-modal').fadeOut();
});
$('#overlay').on('click', function(){
  $('#overlay').fadeOut();
  $('.js-modal').fadeOut();
});

$(window).load(function() {
  $(".simplecarousel-list").each(function() {
      var m_count = $(this).find("> div > div").children().length;
      var m_box_width = ($(this).find("> div > div > div").outerWidth()) + 22;
      $(this).find("> div > div").css("width", m_count * m_box_width);
  });
  $("body").addClass("overflowhide");

});

