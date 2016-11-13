<?php

  // Ajoute l'image à la une aux pages et articles
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 1200, 800, true );

  // Déclare des tailles d'images
  function image_size() {
      add_image_size( 'post-list', 600, 200, true );
  }
  add_action( 'after_setup_theme', 'image_size' );

  // Déclare des tailles d'images
  function editor_style() {
    // Affiche le selecteur de format
    add_filter( 'mce_buttons_2', function($buttons) {
      array_unshift( $buttons, 'styleselect' );
      return $buttons;
    });
    // Ajoute une feuille de style à l'éditeur de texte
    add_editor_style( array( 'assets/css/editor-style.css' ) );

    // Ajoute des formats personnalisés.
    add_filter( 'tiny_mce_before_init', function($settings) {
      $style_formats = array(
          /* Paragraphe */
          array( 'title' => 'Introduction', 'selector' => 'p', 'classes' => 'introduction' ),
      );

      $settings['style_formats'] = json_encode( $style_formats );
      $settings['remove_script_host'] = true;
      $settings['convert_urls'] = true;

      return $settings;
    });
  }
  add_action( 'after_setup_theme', 'editor_style' );

  // Créé les menus
  function register_menus()
  {
    register_nav_menus(array(
      'nav-main' => 'Menu principal',
      'nav-footer' => 'Pied de page',
    ));
  }
  add_action( 'init', 'register_menus' );

  // Retourne le titre approprié
  function get_title() {
    // Récupère la catégorie / étiquette
    if(is_tag()) {
        $term_id = get_query_var('tag_id');
        $taxonomy = 'post_tag';
        $args ='include=' . $term_id;
        $term = get_terms( $taxonomy, $args );
        echo $term[0]->name;
    }
    else if (is_category()){
        $cat_id = get_query_var('cat');
        $taxonomy = 'category';
        $args ='include=' . $cat_id;
        $term = get_terms( $taxonomy, $args );
        echo $term[0]->name;
    }
    else if (is_home()) {
      single_post_title();
    }
    else {
      the_title();
    }
  }

  // Liste les catégories
  function get_post_categories($post_id, $exclude = array(), $separator  = ', ', $limit = 10) {
    $tax = (get_post_type($post_id) != 'post' ? get_post_type($post_id).'-category' : 'category');
    $categories = array_slice(get_the_terms($post_id, $tax), 0, $limit);
    $names = array();
    foreach($categories as $category) {
      if(!in_array($category->cat_ID, $exclude)){
        array_push($names, $category->name);
      }
    }
    return implode($separator, $names);
  }

  // Enlève '[...]' à la fin des résumés d'articles.
  function new_excerpt_more( $more ) {
  	return '';
  }
  add_filter( 'excerpt_more', 'new_excerpt_more' );


  function register_post_types() {
    // Déclare un nouveau type de contenu
    register_post_type( 'event',
      array(
        'capability_type' => 'post',
        'label'  => 'Événements',
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        'rewrite' => array( 'slug' => 'agenda' ),
        'public' => true,
        'has_archive' => true,
        'with_front' => true,
        'menu_icon' => 'dashicons-calendar-alt'
      )
    );
  }

  function register_taxonomies() {
    // Déclare une nouvelle taxonomie
    register_taxonomy(
      'event-category',
      'event',
      array(
          'label' => 'Catégorie',
          'public' => true,
          'rewrite' => true,
          'hierarchical' => true,
          'show_ui' => true
      )
    );
  }
  add_action( 'init', 'register_post_types' );
  add_action( 'init', 'register_taxonomies' );

?>
