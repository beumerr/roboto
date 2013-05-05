$(document).ready(function(){
  // enable fitVids
  $(".site-main").fitVids();

  // enable fitText
  $("#roboto").fitText(0.46);

  // hide band info drawers on load

  $(".band-info--drawer").addClass("visuallyhidden");

  //

  $(".toggle-btn").on("click", function(){
    $(this).toggleClass("open");
    $(this).closest(".band-info").find(".band-info--drawer").toggleClass("visuallyhidden");
  });

});