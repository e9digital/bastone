<?php 
  $args = array(
    'post_type' => 'e9_interior',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'posts_per_page' => -1
  );
?>

<h2>Interiors</h2>

<?php $the_query = new WP_Query($args); if ( $the_query->have_posts() ) : ?>
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    <?php
    if (has_post_thumbnail()) {
      $url = get_img_src(get_the_post_thumbnail(NULL, 'medium'));
    } 
    elseif ($images = get_field('bg_images')) {
      $url = $images[0]['sizes']['medium'];
    }

    if ($url): ?>
      <div class="interior-card">
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
