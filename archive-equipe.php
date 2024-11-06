<?php
/* Template Name: Équipe */
get_header(); ?>

<div class="equipes special-grid">
    <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>
            <article class="equipe">
                <a href="<?php the_permalink(); ?>">
                    <div class="equipe__thumbnail">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                    <div class="equipe__logo">
                        <?php if (get_field('logo_de_lequipe')): ?>
                            <?php $logo = get_field('logo_de_lequipe'); ?>
                            <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>">
                        <?php endif; ?>
                    </div>
                    <h1 class="equipe__title"><?php the_title(); ?></h1>
                </a>
            </article>
        <?php endwhile; ?>
    <?php endif; ?>
</div>

<?php get_footer(); ?>