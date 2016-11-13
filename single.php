<?php
/**
 * The main template file
 *
 */

get_header(); ?>

<main class="container" role="main">
  <div class="row">
    <div class="col-md-8">

  <?php if ( have_posts() ) : ?>

    <?php
    // Start the loop.
    while ( have_posts() ) : the_post();

      /*
       * Include the Post-Format-specific template for the content.
       * If you want to override this in a child theme, then include a file
       * called content-___.php (where ___ is the Post Format name) and that will be used instead.
       */
      get_template_part( 'partials/content', 'single' );

    // End the loop.
    endwhile;

  // If no content, include the "No posts found" template.
  else :
    get_template_part( 'partials/content', 'none' );

  endif;
  ?>
  </div>
  <?php wp_reset_query(); ?>

  <div class="col-md-4">
    <?php

     $posts =  query_posts(array(
       'posts_per_page'   => 10,
       'orderby'          => 'date',
       'order'            => 'DESC',
       'post_type'        => 'event',
      ));

    ?>
      <?php if ( have_posts() ) : ?>
            <?php
            // Start the loop.
            while ( have_posts() ) : the_post();

              /*
               * Include the Post-Format-specific template for the content.
               * If you want to override this in a child theme, then include a file
               * called content-___.php (where ___ is the Post Format name) and that will be used instead.
               */
              get_template_part( 'partials/content', 'thumb');
            // End the loop.
            endwhile;
          //
          // // If no content, include the "No posts found" template.
          // else :
          //   get_template_part( 'partials/content', 'none' );

          endif;
          ?>
     <?php wp_reset_query(); ?>

  </div>
</main>
<?php get_footer(); ?>
