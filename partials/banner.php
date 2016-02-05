<?php
  $bannerImg = get_the_post_thumbnail_url(is_home() ? get_option( 'page_for_posts' ) : null, 'large');
 ?>
<header class="banner" style="background-image: url('<?php _e($bannerImg ? $bannerImg : get_the_post_thumbnail_url(get_option( 'page_on_front' ))) ?>')">
  <div class="container">
    <h1 class="banner-title"><?php is_home() ? single_post_title() : the_title(); ?></h1>
  </div>
</header>
