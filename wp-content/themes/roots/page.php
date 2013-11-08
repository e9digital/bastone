<?php if (!is_front_page()): ?>
<div class="main">
  <div class="main-inner">
    <?php get_template_part('templates/page', 'header'); ?>
    <?php the_content(); ?>
  </div>
</div>
<?php endif; ?>

<?php
  $images = get_field('bg_images');
  if ($images): ?>
    <div class="bg-images">
      <div class="bg-images-left"></div>
      <div class="bg-images-right">
        <div <?php echo count($images > 1) ? 'class="flexslider"' : '' ?>>
          <ul class="slides">
            <?php foreach( $images as $image ): ?>
              <li class="slide" style="background-image: url(<?php echo $image['url']; ?>);"></li> 
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  <?php endif;
