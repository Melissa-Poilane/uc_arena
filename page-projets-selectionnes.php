<?php
/* Template Name: Projets Selectionnes */
get_header();
?>

<div class="projects-list grid">
    <h1 class="select-title">Liste des Projets et des Équipes associées</h1>
    <?php
    // Récupérer tous les projets (en supposant que tu as un Custom Post Type 'projet')
    $args = array(
        'post_type' => 'projet', // Remplace 'projet' par le slug de ton Custom Post Type
        'posts_per_page' => -1 // Récupérer tous les projets
    );
    $projects = new WP_Query($args);

    if ($projects->have_posts()) {
        while ($projects->have_posts()) {
            $projects->the_post();

            // Récupérer les équipes qui ont sélectionné ce projet via ACF
            $associated_teams = get_posts(array(
                'post_type' => 'equipe', // Remplace par le post type de tes équipes
                'meta_query' => array(
                    array(
                        'key' => 'choix_du_projets', // Nom du champ ACF dans les équipes
                        'value' => '"' . get_the_ID() . '"', // Recherche l'ID du projet
                        'compare' => 'LIKE'
                    )
                )
            ));

            // Afficher uniquement les projets qui ont des équipes associées
            if ($associated_teams) {
                ?>
                <div class="select-project">
                    <div class="single-projet__image description">
                        <?php if (has_post_thumbnail()): ?>
                            <div class="projet__image-container">
                                <?php the_post_thumbnail('large'); ?>
                                <div class="projet__image-overlay"></div>
                                <h1 class="projet__title-overlay">
                                    <?php echo esc_html(get_the_title()); ?>
                                </h1>
                            </div>
                        <?php endif; ?>
                    </div>
                    <!-- Type de projet (Taxonomie "nature") -->
                    <div class="projet__taxonomy-nature">
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

                    <div class="project__teams"> 
                        <strong class="project__teams-title">Équipes associées</strong>
                        <ul class="project__teams-list">
                            <?php foreach ($associated_teams as $team): ?>
                               <a href="<?php echo esc_url(get_permalink($team->ID)); ?>" class="project__teams-link">
                                 <li class="project__teams-item">
                                    
                                        <?php echo esc_html(get_the_title($team->ID)); ?>
                                    
                                    <div class="project__team-members">
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <?php $student = get_field('etudiant_' . $i, $team->ID); ?>
                                            <?php if ($student): ?>
                                                <div class="project__team-member">
                                                    <?php echo get_avatar($student['ID'], 48); ?>
                                                  </div>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    </div>
                                </li>
                                </a>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <?php
            }
        }
    }
    ?>
</div>

<?php get_footer(); ?>
