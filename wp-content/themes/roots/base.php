<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>
  <!--[if lt IE 8]><div class="alert alert-warning"><?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?></div><![endif]-->
  <div id="root" class="row">
    <div class="sidebar"
      <?php if (get_theme_mod('bastone_sidebar_bg')): ?>
        style="background-image: url(<?php echo esc_url(get_theme_mod('bastone_sidebar_bg'))?>);"
      <?php endif; ?> >
      <?php
        do_action('get_header');
        get_template_part('templates/header');
      ?>
      <?php include roots_sidebar_path(); ?>
      <?php get_template_part('templates/footer'); ?>
    </div>
    <div class="mainWrapper">
      <?php if (!is_front_page()): ?>
        <div class="main">
          <div class="main-inner">
            <?php include roots_template_path(); ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
    <?php $images = get_field('bg_images'); if ($images): ?>
      <?php $pager = is_front_page() || 'e9_interior' == get_post_type(); ?>
        <div class="bg-images">
          <div class="bg-images-left"></div>
          <div class="bg-images-right">
            <div <?php echo count($images > 1) ? 'class="flexslider"' : '' ?> data-speed="<?php the_field('bg_images_duration') ?>" data-pager="<?php echo $pager ? "1" : "0" ?>">
              <ul class="slides">
                <?php foreach( $images as $image ): ?>
                  <li class="slide" style="background-image: url(<?php echo $image['url']; ?>);"></li> 
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</body>
</html>
