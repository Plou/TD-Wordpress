<?php get_header(); ?>

<main class="container" role="main">
  <div class="row">
    <div class="col-md-9">
      <?php if ( have_posts() ) : ?>

        <?php
        // Start the loop.
        while ( have_posts() ) : the_post();

          /*
           * Insère la template correspondante au format ou au type du post
           * Si aucun fichier `content-{format|type}.php` n'est trouvé, `content.php` sera utilisé
           */
          get_template_part( 'partials/content', get_post_format() ? get_post_format() : get_post_type() );

        // End the loop.
        endwhile; ?>

        <div class="pagination">
          <?php
          // Pagination
            echo paginate_links();
          ?>
        </div>

      <?php else :
        // Contenu de secour au cas où aucun post n'est trouvé.
        get_template_part( 'partials/content', 'none' );

      endif; ?>
    </div>
    <div class="col-md-3">
      <ul class="list-cat">
        <?php
          wp_list_categories(array(
            'depth' => '1',
            'title_li' => ''
          ));
        ?>
      </ul>
    </div>
  </div>
</main>

<?php get_footer(); ?>
