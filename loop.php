<div class="loop">
<?php
$args = array(
    'posts_per_page' => 2
);
$query = new WP_Query($args);

if ($query->have_posts()) : ?>
    <p class="title">
    Hey ! Il y a des Posts !
    </p>
    <?php while ($query->have_posts()) : $query->the_post(); ?>
        <div class="post">
            <?php if (has_post_thumbnail()) : ?>
                <div>
                    <?php the_post_thumbnail(); ?>
                </div>
            <?php endif; ?>
            <h3 class="post-title">
                <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a>
            </h3>
            <p class="post-info">
                Posté le <?php echo esc_html(get_the_date()); ?> dans <?php the_category(', '); ?> <?php the_tags(', '); ?> par <?php echo esc_html(get_the_author()); ?>.
            </p>
            <div class="post-content">
                <?php the_content(); ?>
            </div>
        </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
<?php else : ?>
    <p class="nothing">
    Il n'y a pas de Post à afficher !
    </p>
<?php endif; ?>
</div>