<div class="post-meta row">
  <p class="post-meta-categories col col-md-9">
    <?php if (is_single()){
      the_category(', ');
    }
    else {
      echo get_post_categories(get_the_ID(), array(), ', ', 4);
    } ?>
  </p>
  <?php  ?>
  <p class="post-meta-date col col-md-3">
    <?php the_time('j F Y'); ?>
  </p>
</div>
