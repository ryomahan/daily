jQuery(document).ready(function ($) {
  $(".logo").click(function (e) {
    e.preventDefault();
    window.location.href = wp.home
  });
});
