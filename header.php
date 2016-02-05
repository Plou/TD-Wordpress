<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/style.css" charset="utf-8">
  <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/main.css" charset="utf-8">
  <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

  <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/main.js"></script>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php get_template_part('partials/nav-main'); ?>
<?php get_template_part('partials/banner'); ?>
