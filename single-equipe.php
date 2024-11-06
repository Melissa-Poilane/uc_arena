<?php get_header(); ?>
<?php if (have_posts()): ?>
    <?php while (have_posts()):
        the_post(); ?>
        <article class="single-projet-team special-grid">
            <div class="single-projet-team__thumbnail">
                <?php the_post_thumbnail('large'); ?>
            </div>
            <div class="single_equipe__name">
                <div class="single_equipe_logo">
                    <?php if (get_field('logo_de_lequipe')): ?>
                        <?php $logo = get_field('logo_de_lequipe'); ?>
                        <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>">
                    <?php endif; ?>
                </div>
                <div class="team_title--rank">
                    <h1 class="single-projet-team__title"><?php the_title(); ?></h1>
                    <small><span><strong>Rank | <?php $rank = get_field('rank_moyen_de_lequipe'); ?>
                                <?php echo esc_html($rank); ?></strong></span></small>
                </div>

            </div>
            <div class="equipe__etudiants">
                <?php
                // Boucle sur les champs 'etudiant_1' à 'etudiant_4'
                for ($i = 1; $i <= 5; $i++):
                    $user = get_field("etudiant_$i");
                    if ($user):
                        // Récupérer le prénom et le nom de l'utilisateur
                        
                        $valorant_id = get_user_meta($user['ID'], 'valorant_id', true);
                        $nickname = get_user_meta($user['ID'], 'nickname', true);
                        ?>
                        <ul class="equipe__etudiants-list">
                            <li class="equipe__etudiants-item">
                                <?php echo get_avatar($user['ID'], 40); // Affiche la photo de profil de l'étudiant ?>
                                <span class="equipe__etudiants-name"><?php echo esc_html($valorant_id . ' ' . $nickname); ?></span>
                            </li>
                        </ul>
                    <?php endif;
                endfor;
                ?>
            </div>
            <div class="single-projet-team__equipe">
                <h2 class="single-projet-team__equipe-title">Description</h2>
                <div class="single-projet-team__equipe-description">
                    <?php
                    $content = get_the_content();
                    if (!empty($content)) {
                        the_content();
                    } else {
                        echo "Cette équipe n'a pas encore de description, mais on est surs qu'elle est géniale !";
                    }
                    ?>
                </div>
<!-- Liste des matchs de l'équipe -->
<div class="single-projet-team__matches">
                <h2 class="single-projet-team__matches-title">Matchs de l'équipe</h2>
                <?php
                // Requête pour récupérer les matchs auxquels l'équipe a participé
                $match_args = array(
                    'post_type' => 'match',
                    'posts_per_page' => -1,
                    'meta_query' => array(
                        'relation' => 'OR',
                        array(
                            'key' => 'equipe_A',
                            'value' => get_the_ID(),
                            'compare' => '='
                        ),
                        array(
                            'key' => 'equipe_B',
                            'value' => get_the_ID(),
                            'compare' => '='
                        )
                    )
                );
                $match_query = new WP_Query($match_args);
                if ($match_query->have_posts()) : ?>
                    <ul class="single-projet-team__matches-list">
                        <?php while ($match_query->have_posts()) : $match_query->the_post(); ?>
                            <li class="single-projet-team__matches-item">
                                <a href="<?php the_permalink(); ?>" class="single-projet-team__matches-link">
                                    <h3 class="single-projet-team__matches-name"><?php the_title(); ?></h3>
                                    <p class="single-projet-team__matches-date">
                                        Date et Heure : <?php the_field('date_et_heure_du_match'); ?>
                                    </p>
                                    <p class="single-projet-team__matches-score">
                                        Score : <?php the_field('score_equipe_a'); ?> - <?php the_field('score_equipe_B'); ?>
                                    </p>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                    <?php wp_reset_postdata(); ?>
                <?php else : ?>
                    <p class="single-projet-team__matches-empty">Aucun match joué pour le moment.</p>
                <?php endif; ?>
            </div>
            </div>
        </article>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>