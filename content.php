<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <header>
    <?php
      if ( is_single() ) :
        the_title( '<h1>', '</h1>' );
      else :
        the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
      endif;
    ?>
  </header>

  <?php
    the_content();
  ?>


  <footer class="entry-footer">
  </footer>

</article>
