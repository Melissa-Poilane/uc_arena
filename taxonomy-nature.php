<?php
get_header();
?>

<main class="projet">
<h1 class="archive-projet__title ">Type de projet | <?php single_term_title(); ?></h1>

   
    
</main>
   
<section class="archive-projet__list">
    <?php
    // Récupérer la taxonomie actuelle
    $term = get_queried_object();

    // Arguments pour récupérer les projets avec la taxonomie actuelle
    $args = array(
        'post_type' => 'projet', // Type de contenu 'projet'
        'posts_per_page' => -1, // Récupérer tous les projets
        'tax_query' => array(
            array(
                'taxonomy' => $term->taxonomy,
                'field' => 'slug',
                'terms' => $term->slug,
            ),
        ),
    );

    $projets = new WP_Query($args);

    if ($projets->have_posts()) :
        echo '<ul class="project-list">';
        while ($projets->have_posts()) : $projets->the_post(); ?>
            <li class="project-list__item">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="project-list__image">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>
                <div class="project-list__content">
                <h2 class="project-list__title"><?php the_title(); ?></h2>
                        <p class="project-list__description"><?php the_excerpt(); ?></p>
                        <?php if (get_field('commanditaire')) : ?>
                            <p class="project-list__commenditaire">Commanditaire : <?php the_field('commanditaire'); ?></p>
                        <?php endif; ?>
                        <a href="<?php the_permalink(); ?>" class="project-list__button">Voir plus</a>
                </div>
            </li>
        <?php endwhile;
        echo '</ul>';
        wp_reset_postdata(); // Réinitialiser les données de post
    else :
        echo '<p>Aucun projet trouvé pour cette taxonomie.</p>';
    endif;
    ?>
</section>
<?php
get_footer();
