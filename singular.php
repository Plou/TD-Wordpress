<?php
/**
 * The main template file
 *
 */

get_header(); ?>

<main class="container" role="main">
  <div class="row">
    <div class="col-md-9">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
        get_template_part( 'partials/content', 'single' );
      endwhile;
      else :
        get_template_part( 'partials/content', 'none' );
      endif; ?>
    </div>
    <?php wp_reset_query(); ?>

    <div class="col-md-3">
      <?php

        query_posts(array(
          'posts_per_page'   => 10,
          'orderby'          => 'date',
          'order'            => 'DESC',
          'post_type'        => 'event',
        ));
      ?>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
        get_template_part( 'partials/content', 'thumb');
      endwhile; endif; ?>
      <?php wp_reset_query(); ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>
