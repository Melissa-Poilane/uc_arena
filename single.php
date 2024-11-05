<?php get_header(); ?>
<div class="main single">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <div class="post">
                <?php if (has_post_thumbnail()) : ?>
                    <div>
                        <?php the_post_thumbnail('thumbnail'); ?>
                    </div>
                <?php endif; ?>
                <h1 class="post-title"><?php echo esc_html(get_the_title()); ?></h1>
                <p class="post-info">
                    Posté le <?php echo esc_html(get_the_date()); ?> dans <?php echo esc_html(get_the_category_list(', ')); ?> par <?php echo esc_html(get_the_author()); ?>.
                </p>
                <div class="post-content">
                    <?php the_content(); ?>
                </div>
                <div class="post-comments">
                    <?php comments_template(); ?>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
