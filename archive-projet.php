<?php
/* Template Name: Tous les Projets */
get_header(); ?>

<main class="projet ">
    <!-- Titre principal de la page - Occupe toute la largeur -->
    <h1 class="archive-projet__title ">Tous les Projets</h1>

    <!-- Carrousel des projets - Occupe toute la largeur -->
    <section class="archive-projet__carousel ">
        <div class="carousel">
            <?php
            // Boucle pour les projets du carrousel
            $carousel_projects = new WP_Query(array(
                'post_type' => 'projet',
                'posts_per_page' => -1, // Récupérer tous les projets pour le carrousel
            ));
            if ($carousel_projects->have_posts()) :
                while ($carousel_projects->have_posts()) : $carousel_projects->the_post(); ?>
                    <div class="carousel__item">
                        <h2 class="carousel__title"><?php the_title(); ?></h2>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="carousel__image">
                            <?php the_post_thumbnail('large'); ?>

                            </div>
                        <?php endif; ?>
                        <a href="<?php the_permalink(); ?>" class="carousel__button">Voir plus</a>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
        <button class="carousel__nav carousel__nav--prev">&lsaquo;</button>
        <button class="carousel__nav carousel__nav--next">&rsaquo;</button>
    </section>

    <!-- Liste de tous les projets - Occupe 8 colonnes -->
    <section class="archive-projet__list">
        <?php
        // Arguments pour récupérer tous les projets
        $args = array(
            'post_type' => 'projet', // Type de contenu 'projet'
            'posts_per_page' => -1, // Récupérer tous les projets
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
            echo '<p>Aucun projet trouvé.</p>';
        endif;
        ?>
    </section>
</main>

<?php get_footer(); ?>
