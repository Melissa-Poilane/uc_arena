<?php
get_header(); ?>

<main class="content grid">
    <!-- Image principale du projet avec dégradé et titre -->
    <div class="single-projet__image description">
        <?php if (has_post_thumbnail()): ?>
            <div class="single-projet__image-container">
                <?php the_post_thumbnail('large'); ?>
                <div class="single-projet__image-overlay"></div>
                <h1 class="single-projet__title-overlay">
                    <?php the_title(); ?>
                </h1>
            </div>
        <?php endif; ?>
    </div>

    <!-- Conteneur des taxonomies et informations sur le projet -->
    <div class="single-projet__info">
        <div class="single-projet__info-container">
            <!-- Taxonomies "nature" du projet -->
            <div class="single-projet__taxonomy-nature">
                <strong class="single-projet__taxonomy-title">Type de projet</strong>
                <div class="single-projet__taxonomy-list">
                    <?php
                    $terms = get_the_terms(get_the_ID(), 'nature');
                    if ($terms && !is_wp_error($terms)) :
                        foreach ($terms as $term) : ?>
                            <a href="<?php echo esc_url(get_term_link($term)); ?>" class="single-projet__taxonomy-item">
                                <?php echo esc_html($term->name); ?>
                            </a>
                        <?php endforeach;
                    endif;
                    ?>
                </div>
            </div>

            <!-- Champs ACF -->
            <div class="single-projet__taxonomy-client">
            
                <?php if (get_field('commanditaire')) : ?>
                    <div class="single-projet__commanditaire">
                        <strong>Commanditaire</strong> 
                        <p><?php the_field('commanditaire'); ?></p>
                    </div>
                <?php endif; ?>

                <?php if (get_field('tuteur')) : ?>
                    <div class="single-projet__tuteur">
                        <strong>Tuteur</strong> <p><?php the_field('tuteur'); ?></p>
                    </div>
                <?php endif; ?>
                <?php if (get_field('deadline')) : ?>
                    <div class="single-projet__deadline">
                        <strong>Deadline</strong> <p><?php the_field('deadline'); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Liens vers le projet précédent et le projet suivant - stylisés -->
  
<!-- Section avec titre et description du projet -->
<section class="single-projet__details">
        <h2 class="single-projet__details-title">
            <?php the_title(); ?>
        </h2>
        <div class="single-projet__details-description">
            <?php the_content(); ?>
        </div>
    </section>


</main>
  <nav class="single-projet__navigation ">
        <div class="single-projet__navigation-item single-projet__navigation-item--previous">
            <?php
            $previous_post = get_previous_post();
            if (!empty($previous_post)): ?>
                <a class="single-projet__navigation-link single-projet__navigation-link-prev" href="<?php echo get_permalink($previous_post->ID); ?>">
                    &laquo; Projet précédent : <?php echo get_the_title($previous_post->ID); ?>
                </a>
            <?php endif; ?>
        </div>

        <div class="single-projet__navigation-item single-projet__navigation-item--next">
            <?php
            $next_post = get_next_post();
            if (!empty($next_post)): ?>
                <a class="single-projet__navigation-link next" href="<?php echo get_permalink($next_post->ID); ?>">
                    Projet suivant : <?php echo get_the_title($next_post->ID); ?> &raquo;
                </a>
            <?php endif; ?>
        </div>
    </nav>
<?php get_footer(); ?>
