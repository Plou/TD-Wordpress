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
<?php if ( !is_single() ) {
  _e(sprintf( '<a href="%s" rel="bookmark" class="link-block">', esc_url(get_permalink())));
} ?>

  <article id="post post-<?php the_ID(); ?>" <?php post_class(is_single() ? 'post-single' : 'post-list'); ?>>
    <div class="post-list-thumbnail">
      <?php the_post_thumbnail('post-list'); ?>
    </div>

    <div class="<?php echo (is_single() ? 'post-single-content' : 'post-list-content'); ?>">
      <?php
        if ( is_single() ) {
          get_template_part('partials/meta');
          ?>
          <div class="content">
            <?php
            the_content();
            ?>
          </div>
          <?php
        }
        else {
          get_template_part('partials/meta');
          the_title('<h2 class="post-title">', '</h2>');
        }

      ?>
    </div>

  </article>
<?php if ( !is_single() ) { ?>
</a>
<?php } ?>
