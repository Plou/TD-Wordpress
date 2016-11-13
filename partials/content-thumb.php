<?php _e(sprintf( '<a href="%s" rel="bookmark" class="link-block">', esc_url(get_permalink()))); ?>
  <article id="post post-<?php the_ID(); ?>" <?php post_class('post-thumb'); ?>>
    <?php the_title('<h2 class="post-title">', '</h2>'); ?>
  </article>
</a>
