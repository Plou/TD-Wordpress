<?php
/**
 * Template Name: Liste des évènements
 */

 ?>

 <?php
 /**
  * The main template file
  *
  */
 get_header(); ?>


 <?php

  $posts =  query_posts(array(
    'posts_per_page'   => 10,
   	'orderby'          => 'date',
   	'order'            => 'DESC',
   	'post_type'        => 'event',
   ));

 ?>


 <main class="container" role="main">
   <div class="row">
     <div class="col-md-8">
       <?php if ( have_posts() ) : ?>
         <?php
         // Start the loop.
         while ( have_posts() ) : the_post();

           /*
            * Include the Post-Format-specific template for the content.
            * If you want to override this in a child theme, then include a file
            * called content-___.php (where ___ is the Post Format name) and that will be used instead.
            */
           get_template_part( 'partials/content', get_post_format() ? get_post_format() : get_post_type() );
         // End the loop.
         endwhile;
       //
       // // If no content, include the "No posts found" template.
       // else :
       //   get_template_part( 'partials/content', 'none' );

       endif;
       ?>

       <div class="pagination">
         <?php
         // Pagination
           echo paginate_links();
         ?>
       </div>
     </div>
  <?php wp_reset_query(); ?>

     <div class="col-md-4">
       <ul class="list-cat">
         <?php
           wp_list_categories(array(
             'taxonomy' => 'event-category',
             'depth' => '1',
             'title_li' => '',
             'hide_empty' => '0'
           ));
         ?>
     </ul>
     </div>
   </div>

 </main>

 <?php get_footer(); ?>
