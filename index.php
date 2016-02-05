<?php
/**
 * The main template file
 *
 */

get_header(); ?>

<main class="container" role="main">

  <?php if ( have_posts() ) : ?>

    <?php
    // Start the loop.
    while ( have_posts() ) : the_post();

      /*
       * Include the Post-Format-specific template for the content.
       * If you want to override this in a child theme, then include a file
       * called content-___.php (where ___ is the Post Format name) and that will be used instead.
       */
      get_template_part( 'partials/content', get_post_format() ? get_post_format() : get_post_type() );

    // End the loop.
    endwhile;

  // If no content, include the "No posts found" template.
  else :
    get_template_part( 'partials/content', 'none' );

  endif;
  ?>

</main>

<?php get_footer(); ?>
