<?php get_header(); ?>

<article class="all-matches">
    <h1 class="all-matches__title">Tous les Matchs</h1>
    
    <?php
    // Requête pour récupérer tous les matchs
    $match_args = array(
        'post_type' => 'match',
        'posts_per_page' => -1 // Récupérer tous les matchs
    );
    $match_query = new WP_Query($match_args);
    
    if ($match_query->have_posts()) : ?>
        <ul class="all-matches__matches-list">
            <?php while ($match_query->have_posts()) : $match_query->the_post(); ?>  <section class="all-matches__phase"><h3>Phase <span> <?php the_field('n_phase'); ?></span></h3><p><?php the_field('bracket'); ?></p></section>
                <li class="all-matches__matches-item">
                  
                   
                    <div class="all-matches__teams">
                        <?php 
                        // Récupérer les équipes via les champs ACF
                        $equipe_a = get_field('equipe_A'); 
                        $equipe_b = get_field('equipe_B'); 

                        // Vérifier si les équipes existent
                        if ($equipe_a) {
                            // Commence la boucle pour afficher les détails de l'équipe A
                            foreach ($equipe_a as $post) :
                                setup_postdata($post); // Prépare les données du post
                                ?>
                                <div class="team team--a">
                                    
                                    <?php the_post_thumbnail('thumbnail'); ?><a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                                </div>
                            <?php endforeach;
                            wp_reset_postdata(); // Réinitialise $post après la boucle
                        } else {
                            echo 'Équipe A non définie';
                        }

                        if ($equipe_b) {
                            // Commence la boucle pour afficher les détails de l'équipe B
                            foreach ($equipe_b as $post) :
                                setup_postdata($post); // Prépare les données du post
                                ?>
                                <div class="team team--b">
                               
                                    
                                    <?php the_post_thumbnail('thumbnail'); ?><a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3> </a>
                                </div>
                            <?php endforeach;
                            wp_reset_postdata(); // Réinitialise $post après la boucle
                        } else {
                            echo 'Équipe B non définie';
                        }
                        ?>
                    </div>
                    
                    <div class="all-matches__score">
                        <h3><?php the_field('score_equipe_a'); ?></h3>  <h3><?php the_field('score_equipe_B'); ?></h3>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <p class="all-matches__matches-empty">Aucun match trouvé pour le moment.</p>
    <?php endif; ?>

</article>

<?php get_footer(); ?>
