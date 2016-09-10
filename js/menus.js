/**
 * Attach a behavior to the main menu toggle button.
 */
Backdrop.behaviors.toggleMainMenu = {
  attach: function (context, settings) {
    $('.toggle-navigation', context).click(function() {
      var headerMenuContainer = $('.header-menu-container');

      // If the header menu has the "open" class...
      if (headerMenuContainer.hasClass('open')) {
        // Remove "open" classes from the header menu and toggle button.
        headerMenuContainer.removeClass('open');
        $(this).removeClass('open');

        // Reset its max-height to 0.
        // @todo Figure out why this doesn't work.
        // headerMenuContainer.css('max-height', '');

        // Scroll the window back to the top.
        $('html, body').animate({scrollTop: '0'}, 200);

        // Change the aria text.
        $(this).attr('aria-expanded', 'false');
      }
      else {
        // Otherwise add the "open" class.
        headerMenuContainer.addClass('open');
        $(this).addClass('open');

        // Expand the max-height of the menu.
        // @todo Figure out why this doesn't work.
        // var menuHeight = headerMenuContainer.outerHeight(true);
        // headerMenuContainer.css('max-height', menuHeight);

        // Change the aria text.
        $(this).attr('aria-expanded', 'true');
      }
    });
  }
};
