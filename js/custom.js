jQuery(document).ready(function ($) {
  $('.dropdown-toggle').click(function () {
    $(this).next('.dropdown-menu').toggle();
  });

  console.log('Document is ready');

  $('.navbar-toggler').click(function () {
    console.log('Toggler clicked');
    $('#navbarNavDropdown').toggleClass('show');
  });

  $('.close-menu').click(function () {
    console.log('Close menu clicked');
    $('#navbarNavDropdown').removeClass('show');
  });

  $(document).mouseup(function (e) {
    var container = $('#navbarNavDropdown');

    if (!container.is(e.target) && container.has(e.target).length === 0) {
      container.removeClass('show');
    }
  });
});
