<?php while (have_posts()) : the_post(); ?>
  <h1 class="page-title"><i class="gfx"></i><?php the_title(); ?></h1>
  <?php the_content(); ?>
<?php endwhile; ?>
