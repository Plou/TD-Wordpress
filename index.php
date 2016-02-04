<?php
/**
 * The main template file
 *
 */

get_header(); ?>

<main role="main">

  <?php if ( have_posts() ) : ?>

    <header>
      <h1 class="page-title"><?php the_title(); ?></h1>
    </header>

    <?php
    // Start the loop.
    while ( have_posts() ) : the_post();

      /*
       * Include the Post-Format-specific template for the content.
       * If you want to override this in a child theme, then include a file
       * called content-___.php (where ___ is the Post Format name) and that will be used instead.
       */
      get_template_part( 'content', get_post_format() );

    // End the loop.
    endwhile;

  // If no content, include the "No posts found" template.
  else :
    get_template_part( 'content', 'none' );

  endif;
  ?>

</main>

<?php get_footer(); ?>
