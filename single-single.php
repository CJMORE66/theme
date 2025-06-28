<?php get_header(); ?>
<main class="single-music">
<?php while ( have_posts() ) : the_post(); ?>
    <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>
    <?php if ( get_the_post_thumbnail() ) the_post_thumbnail(); ?>
<?php endwhile; ?>
</main>
<?php get_footer(); ?>
