$(document).ready( function () {
  $('.newPassword').hide()
  $('#recoveryButton').click(function(e) {
    $('.recovery').hide()
    $('.loading').show()
    $('.loading').hide(800)
    $('.newPassword').fadeIn(2000);
    // setTimeout(function() {
    // }, 1000)
  })
})