<?php
/**
 * @file
 * Themes the header block, including the site name, slogan, header menu, and
 * social icons block if enabled.
 *
 * Available variables:
 *
 * - $base_path: The base URL path of the Backdrop installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $front_page: The URL of the front page. Use this instead of $base_path, when
 *   linking to the front page. This includes the language domain or prefix.
 * - $site_name: The name of the site, empty when display has been disabled.
 * - $site_slogan: The site slogan, empty when display has been disabled.
 * - $menu: The menu for the header (if any), as an HTML string.
 */
?>
<?php if ($menu): ?>
  <div class="header-menu-container">
    <nav class="header-menu">
      <?php print $menu; ?>
    </nav>
  </div>

  <button id="toggle-navigation" class="toggle-navigation">
    <span class="screen-reader-text">open menu</span>
    <svg width="24px" height="18px" viewBox="0 0 24 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g transform="translate(-148.000000, -36.000000)" fill="#6B6B6B">
          <g transform="translate(123.000000, 25.000000)">
            <g transform="translate(25.000000, 11.000000)">
              <rect x="0" y="16" width="24" height="2"></rect>
              <rect x="0" y="8" width="24" height="2"></rect>
              <rect x="0" y="0" width="24" height="2"></rect>
            </g>
          </g>
        </g>
      </g>
    </svg>
  </button>
<?php endif; ?>

<?php if ($logo): ?>
  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="logo">
    <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
  </a>
<?php endif; ?>

<?php if ($site_name || $site_slogan): ?>
  <div class="name-and-slogan">
    <?php if ($site_name): ?>
      <?php if (!$is_front): ?>
        <div class="site-name"><strong>
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
        </strong></div>
      <?php else: /* Use h1 when the content title is empty */ ?>
        <h1 class="site-name">
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
        </h1>
      <?php endif; ?>
    <?php endif; ?>
    <?php if ($site_slogan): ?>
      <div class="site-slogan"><?php print $site_slogan; ?></div>
    <?php endif; ?>
  </div> <!-- /#name-and-slogan -->
<?php endif; ?>
