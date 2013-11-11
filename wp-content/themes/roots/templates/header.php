<header class="banner" role="banner">
  <h1>
    <a class="brand"
      <?php if (get_theme_mod('bastone_logo')): ?>
        style="background-image: url(<?php echo esc_url(get_theme_mod('bastone_logo')) ?>);"
      <?php endif; ?>
      href="<?php echo home_url(); ?>">
      <?php bloginfo('name'); ?>
    </a>
  </h1>
</header>
<nav class="nav-main" role="navigation">
  <?php
    if (has_nav_menu('primary_navigation')) :
      wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav'));
    endif;
  ?>
</nav>
