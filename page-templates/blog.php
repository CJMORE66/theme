<?php /* Template Name: Blog */ get_header(); ?>
<main class="blog">
<?php
query_posts('post_type=post');
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article <?php post_class(); ?>>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php the_excerpt(); ?>
    </article>
<?php endwhile; endif; wp_reset_query(); ?>
</main>
<?php get_footer(); ?>
