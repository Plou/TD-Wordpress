<article id="post post-<?php the_ID(); ?>" <?php post_class('post-single'); ?>>
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
