<?php 
  $args = array(
    // interiors
    'post_type' => 'e9_interior',

    // sorted by menu order
    'orderby' => 'menu_order',
    'order' => 'ASC',

    // retrieve all posts
    'posts_per_page' => -1
  );
?>

<h1 class="page-title"><i class="gfx"></i><?php the_title(); ?></h1>

<?php $i = 0; $the_query = new WP_Query($args); if ( $the_query->have_posts() ) : ?>
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    <?php
    // Try to get the medium thumbnail from the featured image...
    if (has_post_thumbnail()) {
      $url = get_img_src(get_the_post_thumbnail(NULL, 'medium'));
    } 
    // ...but if it doesn't have a featured image attached, use the first image in
    // the bg_images gallery field
    elseif ($images = get_field('bg_images')) {
      $url = $images[0]['sizes']['medium'];
    }
    // if a url was found, output the card
    if ($url): ?>
      <div class="interior-card<?php echo 0 != $i++ % 2 ? " last" : "" ?>">
        <a href="<?php the_permalink() ?>">
          <img class="interior-image" src="<?php echo $url ?>">
          <span class="interior-content">
            <?php the_title() ?>
          </span>
        </a>
      </div>
    <?php endif; ?>
  <?php endwhile; ?>
<?php endif; ?>

<?php wp_reset_postdata(); ?>
