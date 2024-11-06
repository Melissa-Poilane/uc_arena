<?php
/*
Template Name: Infos Legales
*/

get_header(); ?>

<div class="grid">
<?php
while (have_posts()) : the_post(); ?>
    <h1 class="legal__title"><?php the_title(); ?></h1>
    <div class="legal__content"><?php the_content(); ?></div>
<?php endwhile; ?>
</div>
<?php get_footer(); ?>