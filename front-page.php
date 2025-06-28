<?php get_header(); ?>
<div class="parallax">
    <div class="parallax__layer parallax__layer--back" data-depth="0.2">
        <img src="<?php echo get_template_directory_uri(); ?>/images/bg-back.jpg" alt="" />
    </div>
    <div class="parallax__layer parallax__layer--base" data-depth="0.6">
        <section class="hero">
            <h1><?php bloginfo('name'); ?></h1>
            <p><?php bloginfo('description'); ?></p>
        </section>
    </div>
</div>
<?php get_footer(); ?>
