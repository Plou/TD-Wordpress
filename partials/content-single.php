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
  <article id="post post-<?php the_ID(); ?>" <?php post_class('post-single'); ?>>
    <div class="post-list-thumbnail">
      <?php the_post_thumbnail('post-list'); ?>
    </div>

    <div class="post-single-content">
      <?php
        get_template_part('partials/meta');
      ?>
      <div class="content">
        <?php
        the_content();
        ?>
      </div>
    </div>
  </article>
