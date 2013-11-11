<?php 
  $args = array(
    'post_type' => 'e9_interior',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'posts_per_page' => -1
  );
?>

<?php $the_query = new WP_Query($args); if ( $the_query->have_posts() ) : ?>
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    <h2><?php the_title(); ?></h2>
  <?php endwhile; ?>
<?php endif; ?>

<?php wp_reset_postdata(); ?>
