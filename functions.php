<?php

  // Ajoute l'image à la une aux pages et articles
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 1200, 800, true );

  // Déclare des tailles d'images
  function image_size() {
      add_image_size( 'post-list', 600, 200, true );
  }
  add_action( 'after_setup_theme', 'image_size' );

  // Créé les menus
  function register_menus()
  {
    register_nav_menus(array(
      'nav-main' => 'Menu principal',
      'nav-footer' => 'Pied de page',
    ));
  }
  add_action( 'init', 'register_menus' );

  // Liste les catégories
  function get_post_categories($exclude = array()) {
    $categories = get_the_category();
    $names = array();
    foreach($categories as $category) {
      if(!in_array($category->cat_ID, $exclude)){
        array_push($names, $category->name);
      }
    }
    return implode(', ', $names);
  }

  // Enlève '[...]' à la fin des résumés d'articles.
  function new_excerpt_more( $more ) {
  	return '';
  }
  add_filter( 'excerpt_more', 'new_excerpt_more' );

?>
