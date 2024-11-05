<?php
/* Template Name: Équipe */
get_header(); ?>

<div class="equipes special-grid">
    <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>
            <article class="equipe">
                <div class="equipe__thumbnail">
                    <?php the_post_thumbnail('large'); ?>
                </div>
                <h1 class="equipe__title"><?php the_title(); ?></h1>

                <div class="equipe__etudiants">
                    <?php 
                    // Boucle sur les champs 'etudiant_1' à 'etudiant_4'
                    for ($i = 1; $i <= 4; $i++) :
                        $user = get_field("etudiant_$i");
                        if ($user):
                            // Récupérer le prénom et le nom de l'utilisateur
                            $first_name = get_user_meta($user['ID'], 'first_name', true);
                            $last_name = get_user_meta($user['ID'], 'last_name', true);
                            ?>
                            <ul class="equipe__etudiants-list">
                                <li class="equipe__etudiants-item">
                                    <?php echo get_avatar($user['ID'], 40); // Affiche la photo de profil de l'étudiant ?>
                                    <span class="equipe__etudiants-name"><?php echo esc_html($first_name . ' ' . $last_name); ?></span>
                                </li> 
                            </ul>
                        <?php endif;
                    endfor; 
                    ?>
                </div>
               <a href="<?php the_permalink(); ?>" class="project-list__button">Voir plus</a>
            </article>
        <?php endwhile; ?>
    <?php endif; ?>
</div>
<?php get_footer(); ?>
